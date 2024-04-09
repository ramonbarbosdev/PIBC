<?php 

include_once "../class/conexao.php";


$dados = filter_input_array(INPUT_POST,  FILTER_DEFAULT);




if(!empty($dados)){
   

    $query = "UPDATE  `pontos` SET  latitude = :latitude,  longitude = :longitude, details = :details WHERE id = :id";
    $cad_coment = $conn->prepare($query);
    $cad_coment->bindParam(':id', $dados['id']);
    $cad_coment->bindParam(':latitude', $dados['latitude']);
    $cad_coment->bindParam(':longitude', $dados['longitude']);
    $cad_coment->bindParam(':details', $dados['details']);
    $cad_coment->execute();
    
    


    $retorna = ['erro' => false, 'msg' => 'Produto atualizado', 'dados' => $dados];
}else{
    $retorna = ['erro' => true, 'msg' => 'Erro ao atualizar'];
}


echo json_encode($retorna);