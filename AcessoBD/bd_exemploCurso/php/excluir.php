<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<center><font face = "Century Gothic" size = "6"><b>Exclusão de Produtos Cadastrados</b><font size = "4">
<font face = "Century Gothic" size = "3"><b>
    
</b></center>

<form name = "cliente" method = "POST" action = "">
    <fieldset id = "a">
        <legend><b> Informe o id do produto desejado: </b></legend>
        <p> Id: <input name = "txtid" type = "text" size = "20" maxlength = "5" placeholder = "id do produto">
        <br><br<center>
        <input name = "btnenviar" type = "submit" value = "Excluir"> &nbsp;&nbsp;
        <input name = "limpar" type = "reset" value = "Limpar">
    </fieldset>
</form>

<fieldset id = "b">
<legend><b>Resultado: </b></legend>

<?php
   extract($_POST, EXTR_OVERWRITE);
   if(isset($btnenviar))
   {
      include_once 'Produto.php';
      $p = new Produto();
      $p->setId($txtid);
      echo "<h3>" . $p->excluir() . "</h3>"; //chamando o método de exclusao
   }
?>
</fieldset>
<center> <br><br><br><br>
<button><a href = "Menu.html">Voltar</a></button>

</body>
</html>
