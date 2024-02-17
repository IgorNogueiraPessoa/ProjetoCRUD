<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>listar</title>
    <link rel="stylesheet" href="../css/listar_livro.css">
</head>
<body>
    <h1>Relação de autores cadastrados</h1>
    <div class = "container">
    <div class = "card">

    <?php
    include_once 'autor.php';
    $at = new Autor();
    $autoria_bd = $at->listar();
    ?>

    <table>
        <tr>
            <th>Código do autor</th>
            <th>Nome do autor</th>
            <th>Sobrenome</th>
            <th>Email</th>
            <th>Nascimento</th>
        </tr>
        <?php
        foreach ($autoria_bd as $a_mostrar) {
            echo "<tr>";
            echo "<td>" . $a_mostrar[0] . "</td>";
            echo "<td>" . $a_mostrar[1] . "</td>";
            echo "<td>" . $a_mostrar[2] . "</td>";
            echo "<td>" . $a_mostrar[3] . "</td>";
            echo "<td>" . $a_mostrar[4] . "</td>";
            echo "</tr>";
        }
        ?>
    </table>
    </div>
    </div>

    <a href="Menu.html" class="button">Voltar</a>

</body>
</html>