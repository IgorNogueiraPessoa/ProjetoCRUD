<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<center><font face = "Century Gothic" size = "6"><b>Consulta de Produtos Cadastrados</b><font size = "4">
<font face = "Century Gothic" size = "3"><b>
    
</b></center>

<form name = "cliente" method = "POST" action = "">
    <fieldset id = "a">
        <legend><b> Informe o id do produto desejado: </b></legend>
        <p> Nome: <input name = "txtnome" type = "text" size = "40" maxlength = "40" placeholder = "nome do produto">
        <br><br<center>
        <input name = "btnenviar" type = "submit" value = "Consultar"> &nbsp;&nbsp;
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
      $p->setNome($txtnome.'%');//busca aproximada, começa com uma determinada coisa e continua com qualquer coisa
      $pro_bd=$p->consultar();
      foreach($pro_bd as $pro_mostrar)
      {
       ?> <br>
       <b><?php echo "ID: " . $pro_mostrar[0];?></b> &nbsp;&nbsp;&nbsp;&nbsp;
       <b><?php echo "Nome: " . $pro_mostrar[1];?></b> &nbsp;&nbsp;&nbsp;&nbsp;
       <b><?php echo "Estoque: " . $pro_mostrar[2];?></b> &nbsp;&nbsp;&nbsp;&nbsp;
       <?php
      }
   }
?>
</fieldset>
<center> <br><br><br><br>
<button><a href = "Menu.html">Voltar</a></button>

</body>
</html>