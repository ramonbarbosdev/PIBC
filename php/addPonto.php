<?php 

include_once "../class/conexao.php";


$dados = filter_input_array(INPUT_POST,  FILTER_DEFAULT);


if(!empty($dados['latitude'])){


    $query = "INSERT INTO `pontos` (latitude, longitude, details) VALUES(:latitude, :longitude, :details)";
    $cad_user = $conn->prepare($query);
    $cad_user->bindParam(':latitude', $dados['latitude']);
    $cad_user->bindParam(':longitude', $dados['longitude']);
    $cad_user->bindParam(':details', $dados['details']);
    
    $cad_user->execute();

    $msg ="Cadastrado com sucesso";
    $retorna = ['erro' => false, 'msg' => $msg ];

   


}else{
    $retorna = ['erro' => true, 'msg' => 'Erro ao cadastrar'];

}





echo json_encode($retorna);
