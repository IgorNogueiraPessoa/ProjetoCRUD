<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form </title>
    <link rel="stylesheet" href="css/entrar.css">
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
    <div class="login-box">
        <h2>Login</h2>
        <form name = "cliente" method = "POST" action = "">
            <div class="user-box">
                <input type="text" name="txtlogin" required>
                <label>Usuário</label>
            </div>
            <div class="user-box">
                <input type="text" name="txtsenha" required onkeypress="return blockletras(window.event.keyCode)">
                <label>Senha</label>
            </div>
            <a href="#">
                <span></span>
                <span></span>
                <span></span>
                <span></span>
                <input name="btnenviar" type="submit" style="border: none; background-color: transparent; cursor: pointer; color: white;">
            </a>
            <a href="#" style="margin-left: 38%;">
                <span></span>
                <span></span>
                <span></span>
                <span></span>
                <button name="btnlimpar" type="reset" style="border: none; background-color: transparent; cursor: pointer; color: white;">Limpar</button>
            </a>
        </form>
    </div>
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
        <div style="margin-bottom: 38%;"></div>
        <br><b><center><?php echo '<span style="color:white;">Bem vindo! Usuário: '.$pro_mostrar[0].'</span>';?></center></b><br><br>

        <center>
        <a href="#">
                <span></span>
                <span></span>
                <span></span>
                <span></span>
                <button name="btnenviar" type="submit" style="width: 8%; height: 40px; border-radius: 5px; border: none; background-color: rgba(161, 160, 160, 0.1) ; cursor: pointer; color: white;"><a href="php/menu.html" style="text-decoration: none; color: white;">Entrar</a></button>
            </a>
        </center>
        <?php 
    }
    if($existe==false)
    {
       header("location:php/logininvalido.html");
    }
}
?>

</body>
</html>