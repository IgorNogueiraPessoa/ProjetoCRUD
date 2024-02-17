<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>listar</title>
    <link rel="stylesheet" href="../css/listar_autoria.css">
</head>
<body>
    <h1>Relação de autorias cadastrados</h1>
     <div class = "container">
     <div class = "card">
    <?php
    include_once 'autoria.php';
    $at = new Autoria();
    $autoria_bd = $at->listar();
    ?>

    <table>
        <tr>
            <th>Código do autor</th>
            <th>Código do livro</th>
            <th>Data de lançamento</th>
            <th>Editora</th>
        </tr>
        <?php
        foreach ($autoria_bd as $at_mostrar) {
            echo "<tr>";
            echo "<td>" . $at_mostrar[0] . "</td>";
            echo "<td>" . $at_mostrar[1] . "</td>";
            echo "<td>" . $at_mostrar[2] . "</td>";
            echo "<td>" . $at_mostrar[3] . "</td>";
            echo "</tr>";
        }
        ?>
    </table>
    </div>
    </div>
    <a href="Menu.html" class="button">Voltar</a>

</body>
</html>