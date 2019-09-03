<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Enviar Arquivos</title>
  
  <link rel="stylesheet" href="css/style.css">


</head>
<body onload="loadContent('')">
    <style>
        
    </style>
    <center><h1 class="title"><a href="index.php">Início</a>/Arquivos</h1></center>
    <div class="container-lg" style="background-color:lightgray">
            <div class="container-header">
                    <center><h2>Arquivos Recebidos</h2></center><br>            
                    <div style="flex:1;background-color:#fff;padding:10px;border-radius:4px;border:1px solid #666;margin-left:10px;margin-right:10px;">Uploads/</div>
            </div>
        
            <div class="uploaded" style="background-color:#fff;min-height:350px;border-radius:4px;" >
                

                
                
            </div>
  
        
   
  </div>
  
  <script src="js/jquery.min.js"></script>
  <script>
      function loadContent(dir){
                           $.ajax({
                            url : "includes/openfolder.php",
                            type : 'get',
                            dataType:'JSON',
                            data : {
                                dir:dir,                                
                            },
                            beforeSend : function(){
                                //alert('Enviando');
                                //$("#resultado").html("ENVIANDO...");
                            }
                            })
                            .done(function(msg){
                                //alert(JSON.stringify(msg));

                                loadView(msg);
                                //$("#resultado").html(msg);
                            })
                            .fail(function(jqXHR, textStatus, msg){
                                alert(msg);
                            });        

      }
      
      function loadView(content){

        $('.uploaded').html("");
        
        //folders
        for(var i = 0; i < content.folders.length; i++ ){
          $('.uploaded').html($('.uploaded').html()+"<div class='uploadedFile' onClick=loadContent('"+content.folders[i]+"')><img src='assets/folder.png' alt='Pasta'>'"+content.folders[i]+"</div>");
        }

        //files
        for(var i = 0; i < content.files.length; i++ ){
          $('.uploaded').html($('.uploaded').html()+'<div class="uploadedFile"><img src="assets/folder.png" alt="Pasta">'+content.files[i]+'</div>');
        }
      
        
      }

    
    
    
  </script>
</body>
</html>