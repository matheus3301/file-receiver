<?php 


		$arquivo = $_FILES['file'];			

        $src = "uploads/".$arquivo['name'];

        if(move_uploaded_file($arquivo['tmp_name'], $src)){
            echo "Sucesso";
        }else{
            echo "Erro";
        }
       


?>