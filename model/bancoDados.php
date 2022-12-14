<?php
 date_default_timezone_set('America/Sao_Paulo');

 define('BD_SERVIDOR', 'localhost');
 define('BD_USUARIO', 'root');
 define('BD_SENHA', '');
 define('BD_BANCO', 'bancophp');

 class BancoDados{

    private $mysqli;

    public function __construct(){
        $this->conexao();
    }

    private function conexao(){
        $this->mysqli = new mysqli(BD_SERVIDOR, BD_USUARIO, BD_SENHA, BD_BANCO);
    }

    public function setCadastro($email, $senha, $endereco, $bairro, $cep, $cidade, $estado){
        $stmt = $this->mysqli->prepare("INSERT INTO cadastro (`email`,`senha`,`endereco`,`bairro`,`cep`, `cidade`, `estado`) VALUES(?,?,?,?,?,?,?)");
        $stmt->bind_param("sssssss", $email, $senha, $endereco, $bairro, $cep, $cidade, $estado);
        
        if( $stmt -> execute() == TRUE){
            return true;
        }else{
            return false;
        }
    }
 }

?>