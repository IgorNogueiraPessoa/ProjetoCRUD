<?php

include_once 'conectar.php';

//parte 1 - atributos
class Autor
{
   private $cod_autor;
   private $nome_autor;
   private $sobrenome;
   private $email;
   private $nasc;
   private $conn;

//parte 2 - os getters e setter

public function getCod_autor(){
    return $this->cod_autor;
}

public function setCod_autor($codautor){
    $this->cod_autor = $codautor;
}

public function getNome_autor(){
    return $this->nome_autor;
}

public function setNome_autor($nomeautor){
    $this->nome_autor = $nomeautor;
}

public function getSobrenome(){
    return $this->sobrenome;
}

public function setSobrenome($sobren){
    $this->sobrenome = $sobren;
}

public function getEmail(){
    return $this->email;
}

public function setEmail($emaill){
    $this->email = $emaill;
}

public function getNasc(){
    return $this->nasc;
}

public function setNasc($nascimento){
    $this->nasc = $nascimento;
}

//listar
function listar()
{
   try
   {
     $this->conn = new Conectar();
     $sql = $this->conn->query("Select * from autor order by cod_autor");
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
      $sql = $this->conn->prepare("insert into autor values (null,?,?,?,?)");
      @$sql-> bindParam(1, $this->getNome_autor(), PDO::PARAM_STR);
      @$sql-> bindParam(2, $this->getSobrenome(), PDO::PARAM_STR);
      @$sql-> bindParam(3, $this->getEmail(), PDO::PARAM_STR);
      @$sql-> bindParam(4, $this->getNasc(), PDO::PARAM_STR);
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
        $sql = $this->conn->prepare("Select * from autor where cod_autor = ?");
        @$sql->bindParam(1, $this->getCod_autor(), PDO::PARAM_STR);
        $sql->execute();

        return $sql->fetchColumn() > 0; 
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
      $sql = $this->conn->prepare("delete from autor where cod_autor = ?"); 
      @$sql-> bindParam(1, $this->getCod_autor(), PDO::PARAM_STR);
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
      $sql = $this->conn->prepare("select * from autor where nome_autor like ?"); //informe o ? (parametro)
      @$sql-> bindParam(1, $this->getNome_autor(), PDO::PARAM_STR);//essa linha define o parametro
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
    $sql = $this->conn->prepare("select * from autor where cod_autor = ?"); //informe o ? (parametro)
    @$sql-> bindParam(1, $this->getCod_autor(), PDO::PARAM_STR);//essa linha define o parametro
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
    $sql = $this->conn->prepare("update autor set nome_autor = ?, sobrenome = ?, email = ?, nasc = ? where cod_autor = ?"); //informe o ? (parametro)
    @$sql-> bindParam(1, $this->getNome_autor(), PDO::PARAM_STR);//essa linha define o parametro
    @$sql-> bindParam(2, $this->getSobrenome(), PDO::PARAM_STR);
    @$sql-> bindParam(3, $this->getEmail(), PDO::PARAM_STR);
    @$sql-> bindParam(4, $this->getNasc(), PDO::PARAM_STR);
    @$sql-> bindParam(5, $this->getCod_autor(), PDO::PARAM_STR);
    if ($sql->execute() == 1)
    {
      return;
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