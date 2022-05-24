<?php
if(session_id() == '') {
    session_start();
   }
if(!isset($_SESSION['ad'])){
    header('Location: login.php');
}