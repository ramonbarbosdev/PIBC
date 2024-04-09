<?php

include_once "../class/conexao.php";



$id = filter_input(INPUT_GET, "id", FILTER_SANITIZE_NUMBER_INT);


if(!empty($id)){


  
    //Deletar Produto
    $queryProd =  "DELETE FROM `pontos` WHERE id = :id ";
    $resultProd = $conn->prepare($queryProd);
    $resultProd->bindParam(':id', $id);
    $resultProd->execute();


    
    $dados = ['erro' => false,'msg' => 'Apagado com sucesso!' ];

}else{
    $dados = ['erro' => true, 'msg' => 'Erro ao apagar'];

}

echo json_encode($dados);


?>