<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Menu</title>
<link rel="stylesheet" href="../css/cadastrar_livro.css">

<script language = "javascript">
function blocknum(keypress)
{//bloqueia numeros

        if ((keypress >= 65 && keypress <= 90) || (keypress >= 97 && keypress <= 122))
        {
            return true;
        }
        else
        {
            return false;
        }
}

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
<div class = "fundo">
<div class = "form-container">
<div class = "form">

<h2>Cadastrar Livro</h2>
<form name="cliente"  method = "POST" action = "">
  
<div class="form-group">
    <input name="txttitulo" type="text" required >
    <label>Título:</label>
</div>

<div class="form-group">
    <input name="txtcategoria" type="text" onkeypress="return blocknum(window.event.keyCode)" required>
    <label>Categoria:</label>
</div>

<div class="form-group">
    <input name="isbn" type="text" data-mask="000-00-0000-00-0"required>
    <label>ISBN:</label>
</div>

<div class="form-group">
    <input name="txtidioma" type="text" onkeypress="return blocknum(window.event.keyCode)" required>
    <label>Idioma:</label>
</div>

<div class="form-group">
    <input name="txtquant" type="text" onkeypress="return blockletras(window.event.keyCode)" required>
    <label>Quantidade de Páginas:</label>
</div>

<div class = "botao">
    <input name="btnenviar" type="submit" value="Cadastrar" > 
    <input name="limpar" type="reset" value="Limpar" >
    <button><a href = "Menu.html">Voltar</a></button>
</div>

</form>

</div>
</div>
<img src="../img/livro.png" alt="livro">
</div>
</div>

<?php
  extract($_POST, EXTR_OVERWRITE);
  if(isset($btnenviar))
  {
      include_once 'livro.php';
      $livro = new Livro();
      $livro->setTitulo($txttitulo);
      $livro->setCategoria($txtcategoria);
      $livro->setISBN($isbn);
      $livro->setIdioma($txtidioma);
      $livro->setQtde_paginas($txtquant);
      echo "<h3><br><br>" . $livro->salvar() . "</h3>";
  }
?>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.0/jquery.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.js"></script>

</body>
</html>