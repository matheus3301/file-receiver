<?php
    
    $path = '../valida/uploads/'.$_GET['dir'];
    
    $files = array();
    $folders = array();   

    
    
    
    $diretorio = dir($path);

    while($arquivo = $diretorio->read()){
        if($arquivo == "." || $arquivo == ".."){}else{
        
            if(is_dir($path.$arquivo)){
                $folders[] = $arquivo;
            }else{
                $files[] = $arquivo;
            }
        
        }
    }
    $diretorio->close();

    $scan = array("folders" => $folders, "files" => $files);
    
    header('Content-Type: application/json');

    
    echo json_encode($scan);
?>