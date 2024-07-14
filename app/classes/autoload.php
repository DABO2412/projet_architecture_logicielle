<?php
    spl_autoload_register(
        function($class_name){
            $path = "classes/{$class_name}.class.php";
            if(file_exists($path)){
                include $path;
            } 
        }
    );
    spl_autoload_register(
        function($class_name){
            $path = "../classes/{$class_name}.class.php";
            if(file_exists($path)){
                include $path;
            }
        }
    );
    spl_autoload_register(
        function($class_name){
            $path = "../../classes/{$class_name}.class.php";
            if(file_exists($path)){
                include $path;
            }
        }
    );
?>