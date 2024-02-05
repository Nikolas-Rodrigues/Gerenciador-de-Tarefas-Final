<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adicionar Funcionário</title>
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

        input {
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
            background-color: #45a049;
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
    <?php
    $hostname = "localhost";
    $bancodedados = "projeto";
    $usuario = "root";
    $senha = "";

    // Verifica se o formulário foi enviado
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Obtém os dados do formulário
        $nome = $_POST["nome"];
        $telefone = $_POST["telefone"];
        $email = $_POST["email"];

        // Conectar ao banco de dados
        $conn = new mysqli($hostname, $usuario, $senha, $bancodedados);

        // Verifica a conexão
        if ($conn->connect_error) {
            die("Erro na conexão: " . $conn->connect_error);
        }

        // Prepara e executa a instrução SQL para inserir os dados na tabela funcionario
        $sql = "INSERT INTO funcionario (nome, telefone, email) VALUES ('$nome', '$telefone', '$email')";

        if ($conn->query($sql) === TRUE) {
            echo  "<script>alert('Funcionario adicionado com Sucesso');</script>";
        } else {
            echo "Erro ao adicionar funcionário: " . $conn->error;
        }

        // Fecha a conexão com o banco de dados
        $conn->close();
    }
    ?>

    <div>
        <h2>Adicionar Funcionário</h2>

        <form method="post">
            <label for="nome">Nome:</label>
            <input type="text" id="nome" name="nome" required>

            <label for="telefone">Telefone:</label>
            <input type="tel" id="telefone" name="telefone" required>

            <label for="email">E-mail:</label>
            <input type="email" id="email" name="email" required>

            <button type="submit">Adicionar Funcionário</button>
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