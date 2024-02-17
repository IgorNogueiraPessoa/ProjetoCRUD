<?php

include_once 'conectar.php';

//parte 1 - atributos
class Autoria
{
   private $cod_autor;
   private $cod_livro;
   private $data_lancamento;
   private $editora;
   private $conn;

//parte 2 - os getters e setter

public function getCod_autor(){
    return $this->cod_autor;
}

public function setCod_autor($codautor){
    $this->cod_autor = $codautor;
}

public function getCod_livro(){
    return $this->cod_livro;
}

public function setCod_livro($codlivro){
    $this->cod_livro = $codlivro;
}

public function getData_lancamento(){
    return $this->Data_lancamento;
}

public function setData_lancamento($data){
    $this->Data_lancamento = $data;
}

public function getEditora(){
    return $this->editora;
}

public function setEditora($editoraa){
    $this->editora = $editoraa;
}


//listar
function listar()
{
   try
   {
     $this->conn = new Conectar();
     $sql = $this->conn->query("Select * from autoria order by cod_autor");
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
      $sql = $this->conn->prepare("insert into autoria values (?,?,?,?)");
      @$sql-> bindParam(1, $this->getCod_autor(), PDO::PARAM_STR);
      @$sql-> bindParam(2, $this->getCod_livro(), PDO::PARAM_STR);
      @$sql-> bindParam(3, $this->getData_lancamento(), PDO::PARAM_STR);
      @$sql-> bindParam(4, $this->getEditora(), PDO::PARAM_STR);
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
        $sql = $this->conn->prepare("SELECT COUNT(*) FROM autoria WHERE cod_autor = ? and cod_livro = ?");
        @$sql->bindParam(1, $this->getCod_autor(), PDO::PARAM_STR);
        @$sql-> bindParam(2, $this->getCod_livro(), PDO::PARAM_STR);
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
      $sql = $this->conn->prepare("delete from autoria where cod_autor = ? and cod_livro = ?");
      @$sql-> bindParam(1, $this->getCod_autor(), PDO::PARAM_STR);
      @$sql-> bindParam(2, $this->getCod_livro(), PDO::PARAM_STR);
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
      $sql = $this->conn->prepare("select * from autoria where editora like ?"); //informe o ? (parametro)
      @$sql-> bindParam(1, $this->getEditora(), PDO::PARAM_STR);//essa linha define o parametro
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
    $sql = $this->conn->prepare("select * from autoria where cod_autor = ? and cod_livro = ?"); //informe o ? (parametro)
    @$sql-> bindParam(1, $this->getCod_autor(), PDO::PARAM_STR);//essa linha define o parametro
    @$sql-> bindParam(2, $this->getCod_livro(), PDO::PARAM_STR);
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
    $sql = $this->conn->prepare("update autoria set data_lancamento = ?, editora = ? where cod_autor = ? and cod_livro = ?"); //informe o ? (parametro)
    @$sql-> bindParam(1, $this->getData_lancamento(), PDO::PARAM_STR);//essa linha define o parametro
    @$sql-> bindParam(2, $this->getEditora(), PDO::PARAM_STR);
    @$sql-> bindParam(3, $this->getCod_autor(), PDO::PARAM_STR);
    @$sql-> bindParam(4, $this->getCod_livro(), PDO::PARAM_STR);
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