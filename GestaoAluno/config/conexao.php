<?php 
$host="localhost";//Endereço do servidor MySQL
$port="3306";//Porta do serviço MySQL (por padrão é 3306)
$dbname="bdaula";//Nome do banco de dados
$user="root";//Nome de usuário do banco de dados
$pass="";//Senha do MySQL
try
{
    $conn= new PDO("mysql:host=$host;port=$port;dbname=$dbname",$user,$pass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

}
catch(PDOException $e){
    $erro= $e-> getMessage();
    echo $erro;
}

?>