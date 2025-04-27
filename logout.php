<?php
        session_start(); 
        session_destroy(); 
        $url = 'login2.php';
        header('Location: ' . $url); 
?>