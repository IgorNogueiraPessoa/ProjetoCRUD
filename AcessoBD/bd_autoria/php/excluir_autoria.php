<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/excluir_livro.css">
    <script language = "javascript">
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

<h2>Excluir Autoria Cadastrada</h2>
<form name = "cliente" method = "POST" action = "">


<div class = "form-group">    
    <input name = "txtida" type = "text" onkeypress="return blockletras(window.event.keyCode)" required>
    <label>Código do autor: </label>
</div>  

<div class = "form-group">    
    <input name = "txtid" type = "text" onkeypress="return blockletras(window.event.keyCode)" required>
    <label>Código do livro: </label>
</div>

<div class = "botao">
    <input name = "btnenviar" type = "submit" value = "Excluir"> 
    <input name = "limpar" type = "reset" value = "Limpar">
    <button><a href = "Menu.html">Voltar</a></button>
</div>

</form>

<img src="../img/delete.png" alt="delete">


<?php
   extract($_POST, EXTR_OVERWRITE);
   if(isset($btnenviar))
   {
      include_once 'autoria.php';
      $at = new Autoria();
      $at->setCod_autor($txtida);
      $at->setCod_livro($txtid);
      if ($at->verificarExistencia()) {
        echo "<h3>" . "<br><br><br><br><br>" . $at->excluir() . "</h3>";
    } else {
        header("Location: pagina_erro.php");
        exit();
    }
}
?>

<center> <br><br><br><br>
</div>

</body>
</html>