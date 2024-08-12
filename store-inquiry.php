<?php
include 'conn.php';
$data = $_POST;
foreach($data as $key => $value){
    if($key == 'email'){
        $data[$key] = sanatize($value, 'email');
    }else{
        $data[$key] = sanatize($value);
    }
}

$sqlKeys = implode(',', array_keys($data));
$sqlValues = implode("','", array_values($data));
$sql = "INSERT INTO inquiries ($sqlKeys) VALUES ('$sqlValues')";
if($conn->query($sql)){
    $_SESSION['submitted'] = true;
    header('Location: '.THANK_YOU_URL);
}else{
    $_SESSION['submitted'] = false;
    echo 'Error: '.$conn->error;
}


?>