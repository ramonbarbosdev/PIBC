
<?php include('class/Site.php');
 include('config.php');
 include 'class/conexao.php';
 
 ?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="shortcut icon" href="favicon.png" type="image/x-icon">
    <!--CSS-->
    
    <link rel="stylesheet" href="css/style.css">

    <!--markercluster-->
    <link rel="stylesheet" href="dist/MarkerCluster.css">
    <link rel="stylesheet" href="dist/MarkerCluster.Default.css">
    <!----------------------------------------------------------------->

    <!--Link do CSS - Framework-->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css" integrity="sha256-kLaT2GOSpHechhsozzB+flnD+zUyjE2LlfWPgU04xyI=" crossorigin="" />
    <!----------------------------------------------------------------->

    <!--Link do JS do - framework-->
    <script src="https://unpkg.com/leaflet@1.9.3/dist/leaflet.js" integrity="sha256-WBkoXOwTeyKclOHuWtc+i2uENFpDZ9YPdf5Hf+D7ewM=" crossorigin=""></script>
    <!----------------------------------------------------------------->

    
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--Bootstrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <!---------BOXICONS-------------------------------------------------------->

    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <!--jQuery -->
    <script src="js/jquery-3.6.3.js"></script>
    <title>Monitoramento de agua</title>
</head>
<body>

    <?php Component::carregarNav(); ?>

  
    <header>
        <div class="header-content">
            <div class="cords">
                <h2></h2>
            </div>

            
            <?php Component::carregarMap(); ?>
            
           

        </div>
    </header>

  



    <!--Bootstrap-->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
    <!----------------------------------------------------------------->


    <!--markercluster-->
    <script src="dist/leaflet.markercluster.js"></script>
    <script src="js/custom.js"></script>
    

    
   

</body>
</html>


<!-- Adicionar -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Adicionar Ponto</h5>
        <button type="button" class="btn-close" onclick="window.location.reload()" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="conteiner-form">
                          
                          <form  id="user-form" method="post" enctype="multipart/form-data">


                          <span id="msg" ></span>

                                <div class="mb-3">
                              <div id="emailHelp" class="form-text">É facil e rapido.</div>
                                </div>
                                <div class="line"></div>

                            <!--User-->
                              <div class="mb-3">
                                <input type="text" class="form-control"  placeholder="Latitude" id="latitude" name="latitude" required>
                              </div>
                               <!--Nome-->
                               <div class="mb-3">
                                <input type="text" class="form-control"  placeholder="Longitude"  id="longitude" name="longitude"required >
                              </div>
                               <!--Sobrenome-->
                               <div class="mb-3">
                                <input type="text" class="form-control" id="details" name="details" placeholder="Details" required >
                              </div>
  
                                <!--Botão enviar--> 

                              <div class="container-btn">
                                <button type="button" onclick="insertProd()" class="btn btn-success" class="btn register" name="acao">Adicionar</button>
                            </div>
                                <!--Voltar ao Login -->
                           
                        

                            </form>

                           
                      </div>
                  </div>
      </div>
      <div class="modal-footer">
 
      </div>
    </div>
  </div>
</div>


<!-- Listagem -->
<div class="modal fade" id="listamodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Listagem de Pontos</h5>
        <button type="button" class="btn-close" onclick="window.location.reload()" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="conteiner-form">
                          
        <table class="table table-hover">
                                <thead>
                                    <tr>
                                    <th scope="col">Codigo</th>
                                    <th scope="col">Latitude</th>
                                    <th scope="col">Longitude</th>
                                    <th scope="col">Detalhes</th>
                                    <th scope="col"> </th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php 
                                
                                        $sql = $conn->prepare("SELECT * FROM `pontos`");
                                        $sql->execute();
                                        $listas = $sql->fetchAll();
                                        foreach( $listas as $key => $value){ 
                                            
                                           
                                            
                                    ?>
              
                                    <tr>
                                        <th scope="row"><?php echo $value['id'] ?></th>
                                        <td ><?php echo $value['latitude'] ?></td>
                                        <td ><?php echo $value['longitude'] ?></td>
                                        <td ><?php echo $value['details'] ?></td>
                                        <td><a     onclick="editarProd(<?php echo $value['id'] ?>)" data-bs-toggle="modal" data-bs-target="#editarmodal" ><i class='bx bxs-pencil' style='color:#01aaf6; font-size:25px'  ></i></a></td>
                                        <td><a     onclick="apagarProd(<?php echo $value['id'] ?>)" ><i class='bx bxs-trash' style='color:#f60118;font-size:25px'  ></i></a></td>
                                     </tr>
                                    <?php }?>
                                </tbody>
                    </table>

                           
                      </div>
                  </div>
      </div>
      <div class="modal-footer">
 
      </div>
    </div>
  </div>
</div>



<!-- Editar -->
<div class="modal fade" id="editarmodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Editar Ponto</h5>
        <button type="button"  onclick="window.location.reload()" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="conteiner-form">
                          
                          <form id="up-form"  method="post" enctype="multipart/form-data">
                                
                                <span id="msgRes" ></span>
                                <span id="msgADD" ></span>
                                

                                <div class="mb-3">
                              <div id="emailHelp" class="form-text">É facil e rapido.</div>
                                </div>
                                <div class="line"></div>

                            <!--Latitude-->
                              <div class="mb-3">
                                <span id="lat" ></span>
                              </div>
                               <!--Longitude-->
                               <div class="mb-3">
                               
                                <span id="long" ></span>

                              </div>
                               <!--Detalhes-->
                               <div class="mb-3">
                               <span id="det" ></span>
                              </div>
                               
                              <span id="id" ></span>
                                <!--Botão enviar-->

                              <div class="container-btn">
                                <button type="button" onclick="upProd()"  class="btn btn-success" class="btn register" name="acao">Atualizar</button>
                            </div>
                                <!--Voltar ao Login -->
                           
                        

                            </form>

                           
                      </div>
                  </div>
      </div>
      <div class="modal-footer">
 
      </div>
    </div>
  </div>
</div>



