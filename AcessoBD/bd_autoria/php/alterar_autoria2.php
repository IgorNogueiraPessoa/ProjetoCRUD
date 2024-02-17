<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alterar</title>
    <link rel="stylesheet" href="../css/cadastrar_livro.css">
</head>
<body>
    
<?php
    $txtid=$_POST["txtid"];
    $txtid2=$_POST["txtid2"];
    include_once 'autoria.php';
    $p = new Autoria();
    $p->setCod_autor($txtid);
    $p->setCod_livro($txtid2);
    $pro_bd=$p->alterar();//chamada de método com retorno - $p é o parâmetro enviado
    if ($pro_bd == "NENHUM_RESULTADO") 
    {
    echo "<script>
    window.location.replace('pagina_erro.php'); 
    </script>";
    }
    ?>

   <div class = "container">
   <div class = "fundo">
   <div class = "form-container">
   <div class = "form">

   <h2>Alteração de Autorias Cadastradas</h2>
   <form name="autor"  method = "POST" action = "">
   <?php
       foreach($pro_bd as $a_mostrar)
       {
    ?>
   <div class="form-group1">
    <input type = "hidden" name = "txtid" size = "25" value='<?php echo $a_mostrar[0]?>'>
    <label>ID do Autor: <?php echo $a_mostrar[0]?></label>
   </div>   

   <div class="form-group1">
    <input type = "hidden" name = "txtid2" size = "25" value='<?php echo $a_mostrar[1]?>'>
    <label>ID do Livro: <?php echo $a_mostrar[1]?></label>
   </div>   

   <div class="form-group">
    <input type = "text" name = "txtlancamento" size = "25" value='<?php echo $a_mostrar[2]?>' data-mask="0000-00-00">
    <label>Data de lançamento:</label>
   </div>

   <div class="form-group">
    <input type = "text" name = "txteditora" size = "10" value='<?php echo $a_mostrar[3]?>'> 
    <label>Editora:</label>
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
<img src="../img/autoria.png" alt="livro">
</div>
</div>

    <?php
     extract($_POST, EXTR_OVERWRITE);
     if(isset($btnalterar))
      {
        $autoria = new Autoria();
        $autoria->setCod_autor($txtid);
        $autoria->setCod_livro($txtid2);
        $autoria->setData_lancamento($txtlancamento);
        $autoria->setEditora($txteditora);
        echo "<h3><br><br>" . $autoria->alterar2() . "</h3>";
        echo "<script language='JavaScript'>
        alert('Alteração realizada com sucesso!');
        window.location.replace('alterar_autoria1.php');
        </script>";
      }
    ?>
    <center> <br><br><br><br>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.0/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.js"></script>

    </body>
</html>



