<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alterar</title>
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

    <?php
    $txtid=$_POST["txtid"];
    include_once 'autor.php';
    $a = new Autor();
    $a->setCod_Autor($txtid);
    $a_bd=$a->alterar();//chamada de método com retorno - $p é o parâmetro enviado
    if ($a_bd == "NENHUM_RESULTADO") {
        echo "<script>
        window.location.replace('pagina_erro.php'); 
        </script>";
                    
        }
    ?>

   <div class = "container">
   <div class = "fundo">
   <div class = "form-container">
   <div class = "form">

   <h2>Alteração de Autores Cadastrados</h2>
   <form name="autor"  method = "POST" action = "">
   <?php
       foreach($a_bd as $a_mostrar)
       {
    ?>
   <div class="form-group1">
    <input type = "hidden" name = "txtid" size = "25" value='<?php echo $a_mostrar[0]?>'>
    <label>ID do Autor: <?php echo $a_mostrar[0]?></label>
   </div>   

   <div class="form-group">
    <input type = "text" name = "txtnome" size = "25" value='<?php echo $a_mostrar[1]?>' onkeypress="return blocknum(window.event.keyCode)">
    <label>Nome do autor:</label>
   </div>

   <div class="form-group">
    <input type = "text" name = "txtsobrenome" size = "10" value='<?php echo $a_mostrar[2]?>' onkeypress="return blocknum(window.event.keyCode)"> 
    <label>Sobrenome:</label>
   </div>

   <div class="form-group">
    <input type = "text" name = "txtemail" size = "25" value='<?php echo $a_mostrar[3]?>'>
    <label>Email:</label>
   </div>

   <div class="form-group">
    <input type = "text" name = "txtnascimento" size = "25" value='<?php echo $a_mostrar[4]?>' data-mask="0000-00-00">
    <label>Nascimento:</label>
   </div>


   <div class = "botao">
    <input name="btnalterar" type="submit" value="Alterar" > 
    <input name="limpar" type="reset" value="Limpar" >
    <?php
       }
    ?>
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
     if(isset($btnalterar))
      {
         include_once 'autor.php';
         $pro=new Autor();
         $pro->setNome_autor($txtnome);
         $pro->setSobrenome($txtsobrenome);
         $pro->setEmail($txtemail);
         $pro->setNasc($txtnascimento);
         $pro->setCod_autor($txtid);
        echo "<h3><br><br>" . $pro->alterar2() . "</h3>";
        echo "<script language='JavaScript'>
        alert('Alteração realizada com sucesso!');
        window.location.replace('alterar_autor1.php');
        </script>";
      }
    ?>
    <center> <br><br><br><br>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.0/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.js"></script>


    </body>
</html>

