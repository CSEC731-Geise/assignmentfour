<?php

    $method=$_GET["method"];
    $name=$_GET["name"];
    $contents=$_GET["contents"];

    if($method=="create") {
        create($name, $contents);   
    }
    elseif ($method=="del") {
        del($name);  
    }
    elseif ($method=="view") {
        view($name);
    }

    
	function create($name, $contents) {
        $check = file_put_contents("/tmp/webapp/" . realpath(escapeshellarg($name)), $contents);
        
        if($check==False) {
            return "Failure";
        }
        else {
            return "File Created";
        }
	}

	function del($name) {
        if(!unlink(realpath($name))) {
            return "Failed";
        }
        else {
            return "Succeeded";
        }
    }
    function view($name) {
        $contents= file_get_contents("/tmp/webapp/".realpath($name));
        
        if($contents==False) {
            return "Failed";
        }
        else {
            echo $contents;
            return "Succeeded";
        }
    }
	
?>
