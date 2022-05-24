<?php
if(session_id() == '') {
    session_start();
}
$_SESSION = [];
session_destroy();
header('Location: ../../index.php');