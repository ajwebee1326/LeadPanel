<?php
include 'config.php';
session_start();
$conn = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

function sanatize($data, $flag = null){
    global $conn;
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    if($flag == 'email'){
        // $data = filter_var($data, FILTER_SANITIZE_EMAIL);
        // $data = filter_var($data, FILTER_VALIDATE_EMAIL);
    }elseif($flag == 'int'){
        $data = filter_var($data, FILTER_SANITIZE_NUMBER_INT);
    }elseif($flag == 'float'){
        $data = filter_var($data, FILTER_SANITIZE_NUMBER_FLOAT);
    }
    return $conn->real_escape_string($data);
}

function alert($msg){
    echo '<script>alert("'.$msg.'")</script>';
}

function redirect($url){
    echo '<script>window.location.href="'.$url.'"</script>';
}

function logout(){
    session_destroy();
    redirect(APP_URL);
}

function validae_login(){
    if(!isset($_SESSION['user'])){
        redirect(LOGIN_URL);
    }
}

function printMessage(){
    if(isset($_SESSION['submitted']) && $_SESSION['submitted'] == false){
        echo ERROR_MESSAGE;
        unset($_SESSION['submitted']);
        return;
    }
    if(isset($_SESSION['submitted']) && $_SESSION['submitted'] == true){
        echo THANK_YOU_MESSAGE;
        unset($_SESSION['submitted']);
        return;
    }


}



?>