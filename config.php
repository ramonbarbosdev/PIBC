<?php

 //Variaveis



$con = mysqli_connect('localhost','root','','testes');
// Varificando conexão
if (mysqli_connect_errno())
{
 echo "Failed to connect to MySQL: " . mysqli_connect_error();
}


?>