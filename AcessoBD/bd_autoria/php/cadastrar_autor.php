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

<h2>Cadastrar Autor</h2>
<form name="autor"  method = "POST" action = "">
  
<div class="form-group">
    <input name="txtnome" type="text" onkeypress="return blocknum(window.event.keyCode)" required>
    <label>Nome do autor:</label>
</div>

<div class="form-group">
    <input name="txtsobrenome" type="text" onkeypress="return blocknum(window.event.keyCode)" required> 
    <label>Sobrenome:</label>
</div>

<div class="form-group">
    <input name="txtemail" type="email" required>
    <label>Email:</label>
</div>

<div class="form-group">
    <input name="txtnascimento" type="text" data-mask="0000-00-00" required>
    <label>Nascimento:</label>
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
      include_once 'autor.php';
      $autor = new Autor();
      $autor->setNome_autor($txtnome);
      $autor->setSobrenome($txtsobrenome);
      $autor->setEmail($txtemail);
      $autor->setNasc($txtnascimento);
      echo "<h3><br><br>" . $autor->salvar() . "</h3>";
  }
?>


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.0/jquery.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.js"></script>

</body>
</html>
