<?php
include 'conn.php';

$adminSql = "CREATE TABLE IF NOT EXISTS users (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(50) NOT NULL,
    password VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

$adminEmail = ADMIN_EMAIL;
$adminPassword = password_hash(ADMIN_PASSWORD, PASSWORD_ALGO);
$is_admin_created = false;

if($conn->query($adminSql)){
    $adminInsertSql = "INSERT INTO users (email, password) VALUES ('$adminEmail', '$adminPassword')";
    if($conn->query($adminInsertSql)){
        $is_admin_created = true;
    }else{
        echo 'Error: '.$conn->error;
    }
}



$inquiriesTableKeys = FORM_FIELDS;
$is_inquiries_table_created = false;
$createInquiriesTableSql = "CREATE TABLE IF NOT EXISTS inquiries (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    ";
foreach ($inquiriesTableKeys as $key) {
    $createInquiriesTableSql .= "$key TEXT NOT NULL,";
}
$createInquiriesTableSql .= "created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if($conn->query($createInquiriesTableSql)){
    $is_inquiries_table_created = true;
}else{
    echo 'Error: '.$conn->error;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>

<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="card mt-5">
                <div class="card-header">
                    <h3>Setup Project</h3>
                </div>
                <div class="card-body">
                    <?php if($is_admin_created){?>
                    <div class="alert alert-success" role="alert">
                        Project setup successfully
                    </div>
                    <div class="alert alert-success" role="alert">
                        Admin created successfully
                    </div>
                    <?php } ?>
                    <?php if($is_inquiries_table_created){?>
                    <div class="alert alert-success" role="alert">
                        Inquiries table created successfully
                    </div>
                    <?php } ?>

                    <?php if($is_admin_created && $is_inquiries_table_created){?>
                        <!-- show admin login details -->
                        <div class="alert alert-info" role="alert">
                            Admin email: <?php echo ADMIN_EMAIL; ?>
                        </div>
                        <div class="alert alert-info" role="alert">
                            Admin password: <?php echo ADMIN_PASSWORD; ?>
                        </div>
                    <?php } ?>

                    <a href="<?php echo LOGIN_URL; ?>" class="btn btn-primary">You can login from here</a>
                </div>
            </div>
        </div>
    </div>
</div>
    
</body>
</html>