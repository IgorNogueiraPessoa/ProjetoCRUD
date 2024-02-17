<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<center><font face = "Century Gothic" size = "6"><b>Alteração de Produtos Cadastrados</b><font size = "4">
<font face = "Century Gothic" size = "3"><b>
    
<fieldset>
    <legend><b>Alterar</b></legend>
    <?php
       $txtid=$_POST["txtid"];
       include_once 'Produto.php';
       $p = new Produto();
       $p->setId($txtid);
       $pro_bd=$p->alterar(); //chamada do método com retorno - o $p é o parametro enviado
    ?>
    <br><form name = "cliente2" method = "POST" action = "">
    <?php
       foreach($pro_bd as $pro_mostrar)
       {
    ?>
      <input type = "hidden" name = "txtid" size = "5" value='<?php echo $pro_mostrar[0]?>'>
      <b> <?php echo "ID: " . $pro_mostrar[0]; //como é matriz, posição 0 ?></b>
      <br><br> <b> <?php echo "Nome: ";?></b>
      <input type = "text" name = "txtnome" size = "25" value='<?php echo $pro_mostrar[1]?>'>
      <br><br> <b> <?php echo "Estoque: ";?></b>
      <input type = "text" name = "txtestoq" size = "10" value='<?php echo $pro_mostrar[2]?>'>
      <br><br><br><center>
      <input name="btnalterar" type="submit" value="Alterar">
    <?php
       }
    ?>
    </form>
    </fieldset>
    <?php
    extract($_POST, EXTR_OVERWRITE);
    if(isset($btnalterar))
    {
       include_once 'produto.php';
       $pro = new Produto();
       $pro->setNome($txtnome);
       $pro->setEstoque($txtestoq);
       $pro->setId($txtid);
       echo"<br><br><br>" . $pro->alterar2() . "</h3>";
       header("location:consultar_alterar.php");
    }
    ?>
    <center> <br><br><br><br>
    <button><a href = "Menu.html">Voltar</a></button>
    </body>
</html>