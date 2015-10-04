<?php 

class Banco{    
   
    private $servidor = 'localhost';
    private $login = 'root';
    private $senha = '';
    private $banco = 'loja';
    private $tabela;
    private $restult;

  

    function __construct(){
      $this->conectar();
    }
    
  
    public function conectar(){  

        mysql_connect($this->servidor,$this->login,$this->senha) or die (mysql_error("Nao conectou"));
        mysql_select_db($this->banco) or die (mysql_error("banco nao localizado")); 
    }
    
    public function desconectar(){
        return mysql_close();
    }

    public function insert($dados=NULL,$tabela=NULL)
    {

      if ($dados != NULL) 
      {        

        if (is_array($dados)) {

          $sql = "INSERT INTO ".$tabela." (";

          foreach ($dados as $campo => $valor) {
            $sql .= $campo.',';
          }

          $sql = substr_replace($sql, '', -1);
          $sql .=" ) VALUES ( ";

          foreach ($dados as $valor) {
            $sql .= "'" . $valor. "'" .',';
          }
          
          $sql = substr($sql,0,-1);

          $sql .= ")";
        }

       echo  $this->query($sql);
      }

     return false;

    }

    public function select_all($tabela=NULL)
    { 

      if ($tabela!=NULL) {

        $sql = "SELECT * FROM " .$tabela;

        $sql = mysql_query($sql);

        if($sql){

          while($rs = mysql_fetch_object($sql)){
            $dados[]=$rs;
          }

           return $dados;

        }else{

          echo '<p style="font-family: sans-serif;background-color: #ccc;padding: 10px;color: #444;">Error:'.mysql_error().'</p>';
        
        }  
      }
    }

     public function select_where($tabela=NULL,$where)
    {

      if ($tabela!=NULL) {
       
        $sql = mysql_query("SELECT * FROM " .$tabela." WHERE ".$where);

       
          while($rs = mysql_fetch_object($sql)){
           
           $dados[]=$rs;
          }

          return $dados;
      }
      return false;
    }

    public function query($sql)
    {
     if(mysql_query($sql)){
      return true;
     }else{
      return '<p style="background: #ccc none repeat scroll 0 0;display: inline-block;font-family: sans-serif;font-size: 11px;padding: 7px;width: 100%;>'.mysql_error().'</p>';
     }
      
    }

    public function clear_table($tabela=NULL)
    {

      $sql = "TRUNCATE TABLE ".$tabela;
      mysql_query($sql);
    }


    public function get()
    {
      return $this->result;
    }

    
}

  
           /* $values = $valor.',';
            
            */