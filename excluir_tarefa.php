<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Excluir Tarefa</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            color: #333;
            margin: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }


        form {
            max-width: 300px;
            margin: 20px;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        label {
            display: block;
            margin-bottom: 8px;
        }

        input {
            width: 100%;
            padding: 8px;
            margin-bottom: 16px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            background-color: #4caf50;
            color: #fff;
            border: none;
            padding: 10px 15px;
            border-radius: 4px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #000000;
        }

        button {
            background-color: #4caf50;
            border: none;
            color: #fff;
            padding: 10px 15px;
            border-radius: 4px;
            cursor: pointer;
            margin-top: 10px;
            width: 100%;
        }

        button:hover {
            background-color: #000000;
        }
    </style>
</head>

<body>



    <?php
    $hostname = "localhost";
    $bancodedados = "projeto";
    $usuario = "root";
    $senha = "";

    $mysqli = new mysqli($hostname, $usuario, $senha, $bancodedados);
    if ($mysqli->connect_errno) {
        echo "Falha ao conectar: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
    } else {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $idTarefaParaExcluir = $_POST["id_tarefa"];

            $stmt = $mysqli->prepare("DELETE FROM Tarefa WHERE id = ?");
            $stmt->bind_param("i", $idTarefaParaExcluir);

            if ($stmt->execute()) {
                echo  "<script>alert('Tarefa excluída com sucesso');</script>";
            } else {
                echo "<p>Erro ao excluir a tarefa: " . $stmt->error . "</p>";
            }

            $stmt->close();
        }
    }
    ?>

    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <h2>Excluir Tarefa</h2>
        <label for="id_tarefa">ID da Tarefa a ser excluída:</label>
        <input type="text" name="id_tarefa" required>
        <input type="submit" value="Excluir Tarefa">
        <button onclick="redirecionarParaHome()">Ir para Home</button>
    </form>



    <script>
        function redirecionarParaHome() {
            window.location.href = 'menu.html';
        }
    </script>

</body>

</html>