<?php 
    function veriCorreo($correo){
        if(!filter_var($correo, FILTER_VALIDATE_EMAIL)){
            return FALSE;
        } else{
            return TRUE;
        }
    }

    function estadoPagina(){
        $activa = $_SESSION["estadoinicio"] ?? FALSE;   
        return $activa;
    }
?>