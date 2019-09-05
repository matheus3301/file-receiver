<?php
    $file = $_POST['file'];

    if(@unlink($file)){
        echo "Deletado";
    }else{
        echo "Erro";

    }

?>