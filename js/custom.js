         //NOVO USUARIO

         async function insertProd(){
         const userForm = document.getElementById("user-form");

        
           console.log("chegou a requisição para ser adicionado")
     
           const dadosForm =  new FormData(userForm);
           dadosForm.append("add", 1)
           console.log(dadosForm)
     
           const dadosPubli = await fetch("php/addPonto.php",{
                 method: "POST",
                 body:dadosForm
             });
             const respostaCad = await dadosPubli.json();
             console.log(respostaCad);
          
             if(respostaCad['erro']){
                document.getElementById('msg').innerHTML ='<div class="alert alert-danger" style="color:#85202e; font-size: 22px;" role="alert"><i class="bx bxs-info-circle"   ></i>'+respostaCad['msg']+'</div>'  ;
                 }else{
                     
                    document.getElementById('msg').innerHTML ='<div class="alert alert-success" style="color:#0f5132;font-size: 22px;" role="alert"><i class="bx bx-check"   ></i>'+ respostaCad['msg']+'</div>'  ; 
                 }
          
     
     return false;

    }

     
  //BUSCAR POR ID 
  async function editarProd(id){
    console.log("Envido: " +id)
    const dados = await fetch("php/consultaPonto.php?id=" + id) //enviar
    const resposta = await dados.json(); //receber
    console.log(resposta)

    if(resposta['erro']){
    document.getElementById('msgRes').innerHTML ='<div class="alert alert-danger" role="alert">'+resposta['msg']+'</div>'  ;
    
     }else{

      
        document.getElementById('lat').innerHTML = '<input type="text" name="latitude" id="latitude" class="form-control" value="'+resposta['dado'].latitude+'" >' ;
        
        document.getElementById('long').innerHTML = '<input type="text" name="longitude" id="longitude" class="form-control" value="'+resposta['dado'].longitude+'" >' ;

        document.getElementById('det').innerHTML = '<input type="text" name="details" id="details" class="form-control" value="'+resposta['dado'].details+'" >' ;
        
        document.getElementById('id').innerHTML = '<input type="hidden" name="id" id="id" class="" value="'+resposta['dado'].id+'" >' ;
    }

 }


 //UPDATE 

 async function upProd(){

    const cadForm = document.getElementById("up-form");

        console.log("chegou a requisição para ser atualizada")

        const dadosForm =  new FormData(cadForm);
        dadosForm.append("add", 1)

        const dadosPubli = await fetch("php/atualizarPonto.php",{
            method: "POST",
            body:dadosForm
        });
        const respostaPubli = await dadosPubli.json();
        console.log(respostaPubli)

        if(respostaPubli['erro']){
            document.getElementById('msgADD').innerHTML ='<div class="alert alert-danger" role="alert">'+respostaPubli['msg']+'</div>'  ;
            
                //const visModal = document.getElementById("feedUser");
            // visModal.show();
        }else{
            document.getElementById('msgADD').innerHTML ='<div class="alert alert-success" role="alert">'+respostaPubli['msg']+'</div>'  ;

        }


 }

   //DELETAR  PUBLICAÇÃO
   async function apagarProd(id){
    console.log("Envido: " +id)
    const dados = await fetch("php/apagarProd.php?id=" + id) //enviar
    const resposta = await dados.json(); //receber
    

    if(resposta['erro']){
        
        alert(resposta['msg'])
         }else{
    
        alert(resposta['msg'])
            
        }

    window.location.reload();



}



