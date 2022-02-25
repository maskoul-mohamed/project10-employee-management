<?php
     session_start();

     if(isset($_COOKIE[session_name()])){
        setcookie(session_name(),'',time() - 3600, '/');
     }
     // unset data in $_SESSION
        $_SESSION[] = array();

        // destroy the session
        session_destroy();
        header("Location: signin.php");
?>