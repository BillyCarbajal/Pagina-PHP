<?php


class View {
    public static function show($viewName,$data=null){
        include_once ("header.php");
        
        include("$viewName.php");
        if (!empty($_SESSION['mensaje'])) {
            include("mensaje.php");
            $_SESSION['mensaje'] = null;
        }    
        include_once ("footer.php");
    }
    public static function showadmin($viewName,$data=null,$data1 = null){
        include_once ("header.php");
        include ("admin.php");
        include("$viewName.php");    
        include_once ("footer.php");
    }
}


?>