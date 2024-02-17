<html>
<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Menu</title>
<link rel="stylesheet" href="../css/cadastrar.css">

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

<h2>Cadastrar produto</h2>
<form name="autor"  method = "POST" action = "">
  
<div class="form-group">
    <input name="txtnome" type="text" onkeypress="return blocknum(window.event.keyCode)" required>
    <label>Nome do produto:</label>
</div>

<div class="form-group">
    <input name="txtestoq" type="text" onkeypress="return blockletras(window.event.keyCode)" required>
    <label>Estoque:</label>
</div>

<div class = "botao">
    <input name="btnenviar" type="submit" value="Cadastrar" > 
    <input name="limpar" type="reset" value="Limpar" >
    <button><a href = "Menu.html">Voltar</a></button>
</div>
</form>

</div>
</div>
<img src="../img/autor.png" alt="livro">
</div>
</div>

<?php
  extract($_POST, EXTR_OVERWRITE);
  if(isset($btnenviar))
  {
      include_once 'produto.php';
      $pro = new produto();
      $pro->setNome($txtnome);
      $pro->setEstoque($txtestoq);
      echo "<h3><br><br>" . $pro->salvar() . "</h3>";
  }
?>

<br>

</body>
</html>




