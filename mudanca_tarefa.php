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
        $idMudar = isset($_POST["idUpdate"]) ? $_POST["idUpdate"] : null;
        $modificacaoSelecionada = isset($_POST["modificacao"]) ? $_POST["modificacao"] : null;
        $novoValor = isset($_POST["novoValor"]) ? $_POST["novoValor"] : null;

        if (!is_numeric($idMudar) || $idMudar < 0) {
            echo "ID inválido.";
        } else {
            if ($modificacaoSelecionada === "Id_Do_Responsavel" || $modificacaoSelecionada === "descricao" || $modificacaoSelecionada === "prioridade" || $modificacaoSelecionada === "estado") {
                $query = "UPDATE Tarefa SET $modificacaoSelecionada = '$novoValor' WHERE id = $idMudar";

                if ($mysqli->query($query)) {
                    echo  "<script>alert('Alteração realizada com Sucesso');</script>";
                } else {
                    echo "Erro: " . $mysqli->error;
                }
            } else {
                echo "Opção de modificação inválida.";
            }
        }
    }

    $mysqli->close();
}
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alterar Tarefas</title>
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
    <div>
        <h2>Alterar Tarefas</h2>

        <form method="post">
            <label for="idUpdate">ID da Tarefa:</label>
            <input type="number" id="idUpdate" name="idUpdate" required>

            <label for="modificacao">Campo a Alterar:</label>
            <select id="modificacao" name="modificacao" onchange="exibirDropdown()">
            <option value="">Escolha uma opção abaixo</option>
                <option value="Id_Do_Responsavel">ID do Responsável</option>
                <option value="descricao">Descrição</option>
                <option value="prioridade">Prioridade</option>
                <option value="estado">Estado</option>
            </select>

            <label for="novoValor">Nova Informação:</label>

            <div id="dropdownContainer" style="display: none;">

        </div>

            <button type="submit">Executar Ação</button>
        </form>

        <button onclick="redirecionarParaHome()">Ir para Home</button>

    </div>

    <script>


        function redirecionarParaHome() {

            window.location.href = 'menu.html';
        }
  


        function exibirDropdown() {
            var dropdownContainer = document.getElementById("dropdownContainer");
            var modificacaoSelecionada = document.getElementById("modificacao").value;


            dropdownContainer.innerHTML = "";

            if (modificacaoSelecionada === "prioridade") {
                dropdownContainer.innerHTML = '<select name="novoValor" required>' +
                    '<option value="Alta">Alta</option>' +
                    '<option value="Media">Média</option>' +
                    '<option value="Baixa">Baixa</option>' +
                    '</select>';
            } else if (modificacaoSelecionada === "estado") {
                dropdownContainer.innerHTML = '<select name="novoValor" required>' +
                    '<option value="Em andamento">Em Andamento</option>' +
                    '<option value="Pendente">Pendente</option>' +
                    '<option value="Concluido">Concluído</option>' +
                    '</select>';
            } else if (modificacaoSelecionada === "Id_Do_Responsavel" || modificacaoSelecionada === "descricao") {
                // Adiciona campo de texto para as opções "Id_Do_Responsavel" e "descricao"
                dropdownContainer.innerHTML = '<input type="text" id="novoValor" name="novoValor" required>';
            }

            // Exibe o container apenas se a opção for prioridade, estado, Id_Do_Responsavel ou descricao
            dropdownContainer.style.display = (modificacaoSelecionada === "prioridade" || modificacaoSelecionada === "estado" || modificacaoSelecionada === "Id_Do_Responsavel" || modificacaoSelecionada === "descricao") ? "block" : "none";
        }
    </script>
</body>

</html>
