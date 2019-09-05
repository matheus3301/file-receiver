<?php 


		$arquivo = $_FILES['file'];			

        $src = "uploads/".$arquivo['name'];

        if(!is_dir('uploads')){
            mkdir('uploads');
        }

        if(move_uploaded_file($arquivo['tmp_name'], $src)){
            echo "Sucesso";
        }else{
            echo "Erro";
        }
       


?>