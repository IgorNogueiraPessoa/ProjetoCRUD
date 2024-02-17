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

<h2>Pesquisar Livro</h2>
<form name = "cliente" method = "POST" action = "">


<div class = "form-group">    
    <input name = "titulo" type = "text" required>
    <label>Titulo do livro: </label>
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
      include_once 'livro.php';
      $l = new Livro();
      $l->setTitulo($titulo.'%');
      $pro_bd=$l->consultar();
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
       <b><?php echo "<font face = 'Tahoma' color = 'white'>Código: </font>" . "<font face = 'Tahoma' color = 'white'>" . $pro_mostrar[0] . "</font>";?></b>&nbsp;&nbsp;&nbsp;&nbsp;
       <b><?php echo "<font face = 'Tahoma' color = 'white'>Título: </font>" . "<font face = 'Tahoma' color = 'white'>" . $pro_mostrar[1] . "</font>";?></b>&nbsp;&nbsp;&nbsp;&nbsp;
       <b><?php echo "<font face = 'Tahoma' color = 'white'>Categoria: </font>" . "<font face = 'Tahoma' color = 'white'>" . $pro_mostrar[2] . "</font>";?>&nbsp;&nbsp;&nbsp;&nbsp;
       <b><?php echo "<font face = 'Tahoma' color = 'white'>ISBN: </font>" . "<font face = 'Tahoma' color = 'white'>" . $pro_mostrar[3] . "</font>";?></b>&nbsp;&nbsp;&nbsp;&nbsp;
       <b><?php echo "<font face = 'Tahoma' color = 'white'>Idioma: </font>" . "<font face = 'Tahoma' color = 'white'>" . $pro_mostrar[4] . "</font>";?></b>&nbsp;&nbsp;&nbsp;&nbsp;
       <b><?php echo "<font face = 'Tahoma' color = 'white'>Quantidade de páginas: </font>" . "<font face = 'Tahoma' color = 'white'>" . $pro_mostrar[5] . "</font>";?></b>
       <?php
      }
    }
   }
?>
<center> <br><br><br><br>
</div>

</body>
</html>