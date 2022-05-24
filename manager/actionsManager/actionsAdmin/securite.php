<?php
if(session_id() == '') {
    session_start();
   }
if(!isset($_SESSION['ad'])){
    $url = htmlspecialchars("login.php");
    echo '<script>window.location = "'.$url.'";</script>';
}