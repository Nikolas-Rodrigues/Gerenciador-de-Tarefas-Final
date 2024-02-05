<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alterar Funcionário</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: lightgray;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
        }

        div {
            max-width: 400px;
            padding: 20px;
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        h2 {
            color: #333;
        }

        label {
            display: block;
            margin-bottom: 8px;
            color: #333;
        }

        input,
        select {
            width: 100%;
            padding: 8px;
            margin-bottom: 16px;
            box-sizing: border-box;
        }

        button {
            background-color: #4caf50;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            width: 100%;
            margin-top: 10px;
        }

        button:hover {
            background-color: #000;
        }

        a {
            text-decoration: none;
            color: #333;
            display: block;
            margin-top: 10px;
        }
    </style>
</head>

<body>
    <div>
        <h2>Alterar Funcionário</h2>

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
                $idFuncionario = isset($_POST["idFuncionario"]) ? $_POST["idFuncionario"] : null;
                $nome = isset($_POST["nome"]) ? $_POST["nome"] : null;
                $telefone = isset($_POST["telefone"]) ? $_POST["telefone"] : null;
                $email = isset($_POST["email"]) ? $_POST["email"] : null;

                if (!is_numeric($idFuncionario) || $idFuncionario < 0) {
                    echo "ID inválido.";
                } else {
                    if (empty($nome) || empty($telefone) || empty($email)) {
                        echo "Todos os campos são obrigatórios.";
                    } else {
                        $query = "UPDATE Funcionario SET nome = '$nome', telefone = '$telefone', email = '$email' WHERE id = $idFuncionario";

                        if ($mysqli->query($query)) {
                            echo  "<script>alert('Alteração realizada com Sucesso');</script>";
                        } else {
                            echo "Erro: " . $mysqli->error;
                        }
                    }
                }
            }

            $mysqli->close();
        }
        ?>

        <form method="post">
            <label for="idFuncionario">ID do Funcionário:</label>
            <input type="number" id="idFuncionario" name="idFuncionario" required>

            <label for="nome">Nome:</label>
            <input type="text" id="nome" name="nome" required>

            <label for="telefone">Telefone:</label>
            <input type="text" id="telefone" name="telefone" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>

            <button type="submit">Alterar Funcionário</button>
        </form>

        <button onclick="redirecionarParaHome()">Ir para Home</button>
    </div>
    <script>
        function redirecionarParaHome() {

            window.location.href = 'menu.html';
        }
    </script>
</body>

</html>
