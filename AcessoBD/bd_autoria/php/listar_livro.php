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
    <h1>Relação de livros cadastrados</h1>
    <div class = "container">
    <div class = "card">

    <?php
    include_once 'livro.php';
    $l = new Livro();
    $autoria_bd = $l->listar();
    ?>

    <table>
        <tr>
            <th>Código do livro</th>
            <th>Titulo</th>
            <th>Categoria</th>
            <th>ISBN</th>
            <th>Idioma</th>
            <th>Quantidade de páginas</th>
        </tr>
        <?php
        foreach ($autoria_bd as $l_mostrar) {
            echo "<tr>";
            echo "<td>" . $l_mostrar[0] . "</td>";
            echo "<td>" . $l_mostrar[1] . "</td>";
            echo "<td>" . $l_mostrar[2] . "</td>";
            echo "<td>" . $l_mostrar[3] . "</td>";
            echo "<td>" . $l_mostrar[4] . "</td>";
            echo "<td>" . $l_mostrar[5] . "</td>";
            echo "</tr>";
        }
        ?>
    </table>
    </div>
    
    </div>
    <a href="Menu.html" class="button">Voltar</a>
</body>
</html>