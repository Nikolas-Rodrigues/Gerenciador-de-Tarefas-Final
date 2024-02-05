<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tarefas</title>
    <style>
        body {
            align-items: center;
            align-self: center;
        }

        button {
            background-color: #4caf50;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            width: 20%;
            margin-top: 10px;
        }

        button:hover {
            background-color: #000;


        }

        table {
            margin: auto;
            border-collapse: collapse;
            background-color: #FFFFFF;
        }

        th,
        td {
            border: 1px solid black;
            text-align: left;
            padding: 8px;
        }


        td:nth-child(1) {
            width: 50px;
        }

        td:nth-child(2) {
            width: 200px;
        }

        td:nth-child(3) {
            width: 100px;
        }

        td:nth-child(4) {
            width: 100px;
        }

        #desc_tabela {
            text-align: center;
            padding-top: 10px;
        }

        #tabela {
            font-size: 40px;

        }
    </style>
</head>

<body bgcolor="lightgray">

    <button onclick="redirecionarParaHome()">Ir para Home</button>
    <br>
    <br>
    <div id="desc_tabela">
        <text id="tabela">Tabela de Funcionarios</text>
    </div>
    <?php
$hostname = "localhost";
$bancodedados = "projeto";
$usuario = "root";
$senha = "";

$mysqli = new mysqli($hostname, $usuario, $senha, $bancodedados);
if ($mysqli->connect_errno) {
    echo "Falha ao conectar: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
} else {
    $consultaFuncionarios = "SELECT * FROM Funcionario ORDER BY Id ASC";
    $resultadoFuncionarios = $mysqli->query($consultaFuncionarios);

    $consultaTarefas = "SELECT * FROM Tarefa ORDER BY Prioridade ASC, Estado DESC";
    $resultadoTarefas = $mysqli->query($consultaTarefas);

    $consultaContagem = "SELECT Id_Do_Responsavel, COUNT(*) as contagem FROM Tarefa GROUP BY Id_Do_Responsavel HAVING COUNT(*) > 3";
    $resultadoContagem = $mysqli->query($consultaContagem);

    if ($resultadoFuncionarios && $resultadoTarefas && $resultadoContagem) {
        echo '<table id="funcionarioTable" class="hidden">';
        echo '<tr>';
        echo '<th>ID</th>';
        echo '<th>Nome</th>';
        echo '<th>Email</th>';
        echo '<th>Telefone</th>';
        echo '</tr>';
        while ($linha = $resultadoFuncionarios->fetch_assoc()) {
            echo '<tr>';
            echo '<td>' . $linha['Id'] . '</td>';
            echo '<td>' . $linha['Nome'] . '</td>';
            echo '<td>' . $linha['Email'] . '</td>';
            echo '<td>' . $linha['Telefone'] . '</td>';
            echo '</tr>';
        }
        echo '</table>';
?>
        <div id="desc_tabela">
            <text id="tabela">Tabela de Tarefas</text>
        </div>
<?php
        echo '<table id="tarefaTable" class="hidden">';
        echo '<tr>';
        echo '<th>id</th>';
        echo '<th>Descrição</th>';
        echo '<th>ID Do Responsável</th>';
        echo '<th>Prioridade</th>';
        echo '<th>Estado</th>';
        echo '</tr>';
        while ($linha = $resultadoTarefas->fetch_assoc()) {
            echo '<tr>';
            echo '<td>' . $linha['id'] . '</td>';
            echo '<td>' . $linha['Descricao'] . '</td>';
            echo '<td>' . $linha['Id_Do_Responsavel'] . '</td>';
            echo '<td>' . $linha['Prioridade'] . '</td>';
            echo '<td>' . $linha['Estado'] . '</td>';
            echo '</tr>';
        }
        echo '</table>';

        $idsExcedentes = array();

        while ($linhaContagem = $resultadoContagem->fetch_assoc()) {
            $idResponsavel = $linhaContagem['Id_Do_Responsavel'];
            $contagem = $linhaContagem['contagem'];

            if ($contagem > 3) {
                $idsExcedentes[] = $idResponsavel;
            }
        }

        if (!empty($idsExcedentes)) {
            echo '<script>';
            echo 'alert("Os seguintes responsáveis atingiram o limite de atividades: ' . implode(', ', $idsExcedentes) . '");';
            echo '</script>';
        }
    } else {
        echo 'Erro na consulta: ' . $mysqli->error;
    }

    $mysqli->close();
}
?>




    <script>
        function redirecionarParaHome() {

            window.location.href = 'menu.html';
        }
    </script>

</body>

</html>