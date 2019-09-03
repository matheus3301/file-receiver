<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Enviar Arquivos</title>
  
  <link rel="stylesheet" href="css/style.css">


</head>
<body>
    <style>
        
    </style>
  <center><h1>File Receiver</h1></center><br>
  <div class="container">
            <center><h2>Enviar Arquivos</h2></center><br>
            
            <form name="fileUploader" action="valida/upload.php" class="dropzone"><input onChange="addFile(this.files)"type="file" multiple="" class="input" >
            <div class="message">
                <span>Solte os arquivos aqui ;-;</span>
            </div>
  </form>
  <div class="uploadedNow">
      
      
    
  </div>
  
        
   
  </div>
  <a class="btnUpload" id="btn" href="arquivos.php">Arquivos</a>
  <script src="js/jquery.min.js"></script>
  <script>
    

    function addFile(files){
        console.log(files);
        document.getElementById("btn").disabled = false;

        for(var i = 0; i < files.length;i++){
               

            $(".uploadedNow").html('<div class="file"><div class="fileData"><img src="assets/mimes/'+files[i].type+'.png"  alt=""><span class="fileName">'+files[i].name+'</span></div><div class="fileStatus"><img id="img'+i+'"src="assets/loading.gif" alt="Status" ></div></div>'+$(".uploadedNow").html());
        
            uploadFiles(files[i],i);
        }

        

    }

    function uploadFiles(file,index){
                        var that = this;
                        var formData = new FormData();

                        formData.append('file',file);

                        $.ajax({
                            async: true,
                            data: formData,
                            cache: false,
                            contentType: false,
                            processData: false,
                            xhr: function () {
                                var myXhr = $.ajaxSettings.xhr();
                                if (myXhr.upload) {
                                    //myXhr.upload.addEventListener('progress', that.progressHandling, false);
                                }
                                return myXhr;
                            },
                            url : "valida/upload.php",
                            type : 'post',
                            
                            beforeSend : function(){
                                //alert('Enviando');
                                //$("#resultado").html("ENVIANDO...");
                            }
                            })
                            .done(function(msg){
                                $("#img"+index).attr("src","assets/checked.png");

                                console.log(msg);
                                
                            })
                            .fail(function(jqXHR, textStatus, msg){
                                alert(msg);
                            });      

    }
    
    
  </script>
</body>
</html>