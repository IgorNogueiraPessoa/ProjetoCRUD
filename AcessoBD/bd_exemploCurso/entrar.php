<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

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

<form name = "cliente" method = "POST" action = "">
    <fieldset id = "a">
        <legend><b> Login de acesso: </b></legend>
        <p> Login: <input name = "txtlogin" type = "text" size = "40" maxlength = "50" placeholder = "seu login" required>
        <br><br<center>
        <p> senha: <input name = "txtsenha" type = "text" size = "40" maxlength = "3" placeholder = "sua senha" required  onkeypress="return blockletras(window.event.keyCode)">
        <br><br<center>
        <input name = "btnenviar" type = "submit" value = "Acessar"> &nbsp;&nbsp;
        <input name = "limpar" type = "reset" value = "Limpar">
    </fieldset>
</form>

<?php
extract($_POST,EXTR_OVERWRITE);
if(isset($btnenviar))
{
    include_once 'php/usuario.php';
    $u = new usuario();
    $u->setUsu($txtlogin);
    $u->setSenha($txtsenha);
    $pro_bd=$u->logar();

    $existe = false;
    foreach($pro_bd as $pro_mostrar)
    {
        $existe = true;
        ?>
        <br><b><?php echo "Bem vindo! Usuário: ".$pro_mostrar[0];?></b><br><br>

        <center>
        <button><a href="php/menu.html">Entrar</a></button>
        </center>
        <?php 
    }
    if($existe==false)
    {
       header("location:logininvalido.html");
    }
}
?>

</body>
</html>