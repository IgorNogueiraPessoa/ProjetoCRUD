<html>
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

<h2>Cadastrar Autoria</h2>
<form name="autoria"  method = "POST" action = "">
  
<div class="form-group">
    <input name="txtautor" type="text" onkeypress="return blockletras(window.event.keyCode)" required>
    <label>Código do autor:</label>
</div>

<div class="form-group">
    <input name="txtlivro" type="text" onkeypress="return blockletras(window.event.keyCode)" required> 
    <label>Código do livro:</label>
</div>

<div class="form-group">
    <input name="txteditora" type="text" required>
    <label>Editora:</label>
</div>

<div class="form-group">
    <input name="txtlancamento" type="text" data-mask="0000-00-00"required> 
    <label>Lançamento:</label>
</div>

<div class = "botao">
    <input name="btnenviar" type="submit" value="Cadastrar" > 
    <input name="limpar" type="reset" value="Limpar" >
    <button><a href = "Menu.html">Voltar</a></button>
</div>
</form>

</div>
</div>
<img src="../img/autoria.png" alt="autoria">
</div>
</div>
 

<?php
  extract($_POST, EXTR_OVERWRITE);
  if(isset($btnenviar))
  {
      include_once 'autoria.php';
      $autoria = new Autoria();
      $autoria->setCod_autor($txtautor);
      $autoria->setCod_livro($txtlivro);
      $autoria->setData_lancamento($txtlancamento);
      $autoria->setEditora($txteditora);
      echo "<h3><br><br>" . $autoria->salvar() . "</h3>";
  }
?>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.0/jquery.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.js"></script>

</body>
</html>