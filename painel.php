<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema DNIT</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #785EEF;
        }

        header {
            background-color: #333;
            color: #fff;
            text-align: center;
            padding: 10px 0;
        }

        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .form-container {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
            max-width: 400px;
            width: 100%;
        }

        label {
            display: block;
            margin-bottom: 5px;
            color: #333;
        }

        input[type="number"],
        input[type="text"] {
            width: calc(100% - 12px);
            padding: 6px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }

        input[type="submit"] {
            width: 100%;
            padding: 10px;
            border: none;
            background-color: #007bff;
            color: #fff;
            cursor: pointer;
            border-radius: 3px;
            transition: background-color 0.3s ease;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }

        .result {
            margin-top: 20px;
            background-color: #f5f5f5;
            padding: 10px;
            border-radius: 5px;
        }

        .image-container {
            margin-right: 20px;
            
        }

        .image-container img {
            width: 300px;
            height: auto;
            display: block;
        }
    </style>
</head>
<body>
    <header>
        <h1>Sistema DNIT</h1>
    </header>

    <div class="container">
        <div class="image-container">
            <img src="./img/caminhao.png" alt="Imagem" >
        </div>
        <div class="form-container">
            <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                <label for="peso">Digite o peso do caminhão em toneladas:</label><br>
                <input type="number" step="0.01" id="peso" name="peso" required><br><br>
                <input type="submit" value="Verificar">
            </form>

            <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['peso'])) {

                $peso = $_POST['peso'];

                if ($peso > 50) {
                    $excesso = $peso - 50;

                    $multa = $excesso * 400;

                    echo "<div class='result'>";
                    echo "<p>Peso excedente: $excesso toneladas</p>";
                    echo "<p>Valor da multa: R$ $multa</p>";
                    echo "</div>";

                    echo "<form method='post' action='".$_SERVER['PHP_SELF']."'>";
                    echo "<label for='placa'>Informe a placa do caminhão:</label><br>";
                    echo "<input type='text' id='placa' name='placa' required><br><br>";
                    echo "<label for='endereco'>Informe o local da pesagem:</label><br>";
                    echo "<input type='text' id='endereco' name='endereco' required><br><br>";
                    echo "<input type='hidden' name='excesso' value='$excesso'>";
                    echo "<input type='submit' value='Enviar'>";
                    echo "</form>";

                } else {
                    echo "<div class='result'>";
                    echo "<p>Não há excesso de peso. Sem multa. Siga sua viagem.</p>";
                    echo "</div>";
                }
            }

            if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['excesso'])) {

                $placa = $_POST['placa'];
                $endereco = $_POST['endereco'];
                $excesso = $_POST['excesso'];

                echo "<div class='result'>";
                echo "<p>A quantidade excedida foi de $excesso toneladas</p>";
                echo "<p>Placa do caminhão: $placa</p>";
                echo "<p>Local da pesagem: $endereco</p>";
                echo "</div>";
            }
            ?>
        </div>
    </div>

</body>
</html>
