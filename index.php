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

        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .image img {
            margin-right: 20px;
        }

        .form {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
            max-width: 400px;
            width: 100%;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        h1 {
            text-align: center;
            color: #333;
        }

        label {
            display: block;
            margin-bottom: 5px;
            color: #333;
            text-align: center; }

        input[type="text"],
        input[type="password"] {
            width: calc(100% - 12px);
            padding: 6px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border: none;
            outline: none;
        }

        input[type="text"]:focus,
        input[type="password"]:focus {
            border-color: #007bff; 
        }

        button[type="submit"] {
            width: 100%;
            padding: 10px;
            border: none;
            background-color: #007bff;
            color: #fff;
            cursor: pointer;
            border-radius: 3px;
            transition: background-color 0.3s ease;
        }

        button[type="submit"]:hover {
            background-color: #0056b3;
        }

        .error {
            color: red;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="image">
            <img src="./img/form.png" alt="Logo">
        </div>
        <div class="form">
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                <h1>Sistema DNIT</h1>
                <?php
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    $usuario = $_POST['usuario'];
                    $senha = $_POST['senha'];

                    
                    $usuario_correto = 'usuario';
                    $senha_correta = 'senha';

                    if ($usuario == $usuario_correto && $senha == $senha_correta) {
                        header("Location:painel.php");
                        exit; 
                    } else {
                        echo "<p class='error'>Credenciais inválidas. Por favor, tente novamente.</p>";
                    }
                }
                ?>
                <p>
                    <label for="usuario">Usuário:</label>
                    <input type="text" id="usuario" name="usuario" required>
                </p>
                <p>
                    <label for="senha">Senha:</label>
                    <input type="password" id="senha" name="senha" required>
                </p>
                <p>
                    <button type="submit">Entrar</button>
                </p>
            </form>
        </div>
    </div>
</body>
</html>




