<!DOCTYPE html>
<html lang="en" style="height:auto">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Enviar Arquivos</title>
  
  <link rel="stylesheet" href="css/style.css">


</head>
<body onload="loadContent('uploads/')" style="height:auto">
    <style>
        
    </style>
     <center><h1> <a href="index.php"><img src="assets/folder.png"  style="width:20px;"alt=""></a> Arquivos</h1></center><br>
    
    <div class="container-lg" style="background-color:lightgray">
            <div class="container-header">
                    <center><h2>Arquivos Recebidos</h2></center>         
                    <div class="path" id="path"></div>
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
                                $("#path").html("<img src='assets/loading.gif' class='loading'><span>Carregando...</span>");
                                //$("#resultado").html("ENVIANDO...");
                            }
                            })
                            .done(function(msg){
                                $("#path").html("<img src='assets/folder.png' onClick=loadContent('uploads/') style='width:24px;margin-top:3px;margin-bottom:3px;margin-left:3px;margin-right:6px;cursor:pointer'><span>"+msg.path+"</span>");
                                //$("#path").html(msg.path);
                                

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
          $('.uploaded').html($('.uploaded').html()+"<div class='uploadedFile' onClick=loadContent('"+content.path+content.folders[i]+"/')><img src='assets/closedfolder.png' alt='Pasta'>"+content.folders[i]+"</div>");
        }

        //files
        for(var i = 0; i < content.files.length; i++ ){
          $('.uploaded').html($('.uploaded').html()+'<div class="uploadedFile" onClick=window.open("valida/'+content.path+content.files[i]+'")><img src="assets/file.png" alt="Arquivo">'+content.files[i]+'</div>');
        }
      
        
      }

    
    
    
  </script>
</body>
</html>