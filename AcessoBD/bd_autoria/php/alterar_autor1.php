<html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alterar</title>
    <link rel="stylesheet" href="../css/excluir_livro.css">
    <script language="javascript">
    function blockletras(keypress)
    {//bloqueia letras
    if (keypress>=48 && keypress<=57)
        {
            return true;
        }
        else
        {
            return false;
        }
    }
     </script>
</head>
<body>

<div class = "container">

<h2>Pesquisar Código do Autor Para Alteração</h2>
<form name = "cliente" method = "POST" action = "alterar_autor2.php">


<div class = "form-group">    
<input name = "txtid" type = "text" onkeypress="return blockletras(window.event.keyCode)" required>
    <label>Código do autor: </label>
</div>  

<div class = "botao">
    <input name = "btnenviar" type = "submit" value = "Pesquisar"> 
    <input name = "limpar" type = "reset" value = "Limpar">
    <button><a href = "Menu.html">Voltar</a></button>
</div>

</form>

<img src="../img/search.png" alt="search">

</fieldset>
<center> <br><br><br><br>
</div>

</body>
</html>
