<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/excluir_livro.css">
</head>
<body>
<div class = "container">

<h2>Pesquisar Autoria</h2>
<form name = "cliente" method = "POST" action = "">


<div class = "form-group">    
    <input name = "editora" type = "text" required>
    <label>Nome da editora para autoria desejada: </label>
</div>  

<div class = "botao">
    <input name = "btnenviar" type = "submit" value = "Pesquisar"> 
    <input name = "limpar" type = "reset" value = "Limpar">
    <button><a href = "Menu.html">Voltar</a></button>
</div>

</form>

<img src="../img/search.png" alt="search">


<?php
   extract($_POST, EXTR_OVERWRITE);
   if(isset($btnenviar))
   {
      include_once 'autoria.php';
      $at = new Autoria();
      $at->setEditora($editora.'%');
      $pro_bd=$at->consultar();
      if ($pro_bd == "NENHUM_RESULTADO") 
      {
        echo "<script>
        window.location.replace('pagina_erro.php'); 
        </script>";
                    
      }
      else{
      foreach($pro_bd as $pro_mostrar)
      {
        ?> <br>
        <br><br>
        <b><?php echo "<font face = 'Tahoma' color = 'white'>Código do autor: </font>" . "<font face = 'Tahoma' color = 'white'>" . $pro_mostrar[0] . "</font>";?></b>&nbsp;&nbsp;&nbsp;&nbsp;
        <b><?php echo "<font face = 'Tahoma' color = 'white'>Código do livro: </font>" . "<font face = 'Tahoma' color = 'white'>" . $pro_mostrar[1] . "</font>";?></b>&nbsp;&nbsp;&nbsp;&nbsp;
        <b><?php echo "<font face = 'Tahoma' color = 'white'>Data de lançamento: </font>" . "<font face = 'Tahoma' color = 'white'>" . $pro_mostrar[2] . "</font>";?>&nbsp;&nbsp;&nbsp;&nbsp;
        <b><?php echo "<font face = 'Tahoma' color = 'white'>Editora: </font>" . "<font face = 'Tahoma' color = 'white'>" . $pro_mostrar[3] . "</font>";?></b>
        <?php
      }
   }
}
?>
</fieldset>
<center> <br><br><br><br>
</div>

</body>
</html>