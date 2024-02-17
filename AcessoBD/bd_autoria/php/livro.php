<?php

include_once 'conectar.php';

//parte 1 - atributos
class Livro
{
   private $cod_livro;
   private $titulo;
   private $categoria;
   private $ISBN;
   private $idioma;
   private $qtde_paginas;
   private $conn;

//parte 2 - os getters e setter

public function getCod_livro(){
    return $this->cod_livro;
}

public function setCod_livro($codlivro){
    $this->cod_livro = $codlivro;
}

public function getTitulo(){
    return $this->titulo;
}

public function setTitulo($tituloo){
    $this->titulo = $tituloo;
}

public function getCategoria(){
    return $this->categoria;
}

public function setCategoria($category){
    $this->categoria = $category;
}

public function getISBN(){
    return $this->isbn;
}

public function setISBN($isbnn){
    $this->isbn = $isbnn;
}

public function getIdioma(){
    return $this->idioma;
}

public function setIdioma($idiom){
    $this->idioma = $idiom;
}

public function getQtde_paginas(){
    return $this->quantidade;
}

public function setQtde_paginas($quant){
    $this->quantidade = $quant;
}

//listar
function listar()
{
   try
   {
     $this->conn = new Conectar();
     $sql = $this->conn->query("Select * from livro order by cod_livro");
     $sql->execute();
     return $sql->fetchAll();
     $this->conn = null;
   }
   catch(PDOException $exc)
   {
     echo "Erro ao executar consulta. " . $exc->getMessage();
   }
}

//salvar
function salvar()
{
    try
    {
      $this-> conn = new Conectar();
      $sql = $this->conn->prepare("insert into livro values (null,?,?,?,?,?)");
      @$sql-> bindParam(1, $this->getTitulo(), PDO::PARAM_STR);
      @$sql-> bindParam(2, $this->getCategoria(), PDO::PARAM_STR);
      @$sql-> bindParam(3, $this->getISBN(), PDO::PARAM_STR);
      @$sql-> bindParam(4, $this->getIdioma(), PDO::PARAM_STR);
      @$sql-> bindParam(5, $this->getQtde_paginas(), PDO::PARAM_STR);
      if($sql->execute() == 1)
      {
        echo "<script type='text/javascript'>alert('Registro salvo com sucesso!');</script>";
      }
       $this->conn = null;
    }
    catch(PDOException $exc)
    {
        echo "<script type='text/javascript'>alert('Erro ao salvar o registro: " . $exc->getMessage() . "');</script>";
    }
}


function verificarExistencia()
{
    try {
        $this->conn = new Conectar();
        $sql = $this->conn->prepare("SELECT COUNT(*) FROM livro WHERE cod_livro = ?");
        @$sql->bindParam(1, $this->getCod_livro(), PDO::PARAM_STR);
        $sql->execute();

        return $sql->fetchColumn() > 0; // Retorna true se o livro existe
    } catch (PDOException $exc) {
        echo "Erro ao verificar existência " . $exc->getMessage();
        return false;
    }
}

//excluir
function excluir()
{
    try
    {
      $this-> conn = new Conectar();
      $sql = $this->conn->prepare("delete from livro where cod_livro = ?"); //informe o ? (parametro)
      @$sql-> bindParam(1, $this->getCod_livro(), PDO::PARAM_STR);//essa linha define o parametro
      if($sql->execute() == 1)
      {
        return "<font face = 'Tahoma' color = 'white'><b>Excluído com sucesso!</b></font>";
      }
      else
      {
        return "Erro na exclusão";
      }
       $this->conn = null;
    }
    catch(PDOException $exc)
    {
      echo "Erro ao excluir " . $exc->getMessage();
    }
}

//consultar
function consultar()
{
    try
    {
      $this-> conn = new Conectar();
      $sql = $this->conn->prepare("select * from livro where titulo like ?"); //informe o ? (parametro)
      @$sql-> bindParam(1, $this->getTitulo(), PDO::PARAM_STR);//essa linha define o parametro
      $sql->execute();
      $results = $sql->fetchAll();
      
      if (count($results) == 0) { 
          return "NENHUM_RESULTADO"; // valor específico para indicar que não há resultados
      }
      
      return $results;
      $this->conn = null;
    }
    catch(PDOException $exc)
    {
      echo "Erro ao alterar " . $exc->getMessage();
    }
}

//alterar
function alterar()
{
  try
  {
    $this-> conn = new Conectar();
    $sql = $this->conn->prepare("select * from livro where cod_livro = ?"); //informe o ? (parametro)
    @$sql-> bindParam(1, $this->getCod_livro(), PDO::PARAM_STR);//essa linha define o parametro
    $sql->execute();
    $results = $sql->fetchAll();
    
    if (count($results) == 0) { 
        return "NENHUM_RESULTADO"; // valor específico para indicar que não há resultados
    }
    
    return $results;
    $this->conn = null;
  }
  catch(PDOException $exc)
  {
    echo "Erro ao alterar " . $exc->getMessage();
  }
}

function alterar2()
{
  try
  {
    $this-> conn = new Conectar();
    $sql = $this->conn->prepare("update livro set titulo = ?, categoria = ?, ISBN = ?, idioma = ?, qtde_paginas = ? where cod_livro = ?"); //informe o ? (parametro)
    @$sql-> bindParam(1, $this->getTitulo(), PDO::PARAM_STR);//essa linha define o parametro
    @$sql-> bindParam(2, $this->getCategoria(), PDO::PARAM_STR);
    @$sql-> bindParam(3, $this->getISBN(), PDO::PARAM_STR);
    @$sql-> bindParam(4, $this->getIdioma(), PDO::PARAM_STR);
    @$sql-> bindParam(5, $this->getQtde_paginas(), PDO::PARAM_STR);
    @$sql-> bindParam(6, $this->getCod_livro(), PDO::PARAM_STR);
    if ($sql->execute() == 1)
    {
      return "Registro alterado com sucesso";
    }
    $this->conn = null;
  }
  catch(PDOException $exc)
  {
    echo "Erro ao salvar o registro " . $exc->getMessage();
  }
}

}//encerramento da classe produto
?>
