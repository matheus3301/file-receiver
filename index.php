<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Enviar Arquivos</title>
  <link rel="stylesheet" href="css/basic.css">
  <link rel="stylesheet" href="css/dropzone.css">
  <link rel="stylesheet" href="css/style.css">


</head>
<body>
  <h2>Receber Arquivos</h2>
  <div class="container">
      <form action="valida/validaUpload.php" class="dropzone">
        <div class="fallback">
          <input name="file" type="file" multiple />
        </div>
      </form>
  </div>
<script src="js/dropzone.js"></script>  
</body>
</html>