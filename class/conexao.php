<?php


$host = "localhost";
$user = "root";
$pass = "";
$dbname = "testes";

try{
    
   $conn = new PDO("mysql:host=$host;dbname=". $dbname, $user, $pass);


}catch(PDOException $erro){
   echo "ERRO NA CONEÇÃO. ERRO GERADO:" .$erro->getMessage();

}