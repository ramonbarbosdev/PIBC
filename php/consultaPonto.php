<?php 

include_once "../class/conexao.php";


$id = filter_input(INPUT_GET, "id", FILTER_SANITIZE_NUMBER_INT);


 if(!empty($id)){

     //Consulta Feed
    $queryFeed =  "SELECT * FROM `pontos` WHERE id = :id ";
     $resultFeed = $conn->prepare($queryFeed);
     $resultFeed->bindParam(':id', $id);
     $resultFeed->execute();
     $dados = $resultFeed->fetch();

 
   
    
     $retorno = ['erro' => false, 'msg' => 'Sucesso no tramite', 'dado' => $dados];
 }else{
     $retorno = ['erro' => true, 'msg' => 'Erro no tramite'];

 }

echo json_encode($retorno);


?>