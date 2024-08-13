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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
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
                        <div class="alert alert-warning project-alert" role="alert">
                            <strong>Setting Up Project </strong> Please wait...
                            <div class="spinner-border float-end" role="status">
                                <span class="visually-hidden">Loading...</span>
                            </div>
                        </div>
                        
                        <div class="alert alert-warning admin-alert" role="alert">
                            <strong>Creating An Admin </strong> Please wait...
                            <div class="spinner-border float-end" role="status">
                                <span class="visually-hidden">Loading...</span>
                            </div>
                        </div>
                    <?php } ?>


                    <?php if($is_inquiries_table_created){?>
                    <div class="alert alert-warning table-alert" role="alert">
                        <strong>Creating tables </strong> Please wait...
                        <div class="spinner-border float-end" role="status">
                            <span class="visually-hidden">Loading...</span>
                        </div>
                    </div>
                    <?php } ?>

                    <?php if($is_admin_created && $is_inquiries_table_created){?>
                        <!-- show admin login details -->
                        <div class="alert alert-info email-alert d-none" role="alert">
                            Admin email: <b><?php echo ADMIN_EMAIL; ?></b>
                        </div>
                        <div class="alert alert-info password-alert d-none" role="alert">
                            Admin password: <b><?php echo ADMIN_PASSWORD; ?></b>
                        </div>
                    <?php } ?>

                    <a href="<?php echo LOGIN_URL; ?>" class="btn btn-primary login-btn d-none">You can login from here</a>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.7.1.slim.js" integrity="sha256-UgvvN8vBkgO0luPSUl2s8TIlOSYRoGFAX4jlCIm9Adc=" crossorigin="anonymous"></script>
<script>
    $(document).ready(function() {
        setTimeout(() => {
            var projectAlert = $('.project-alert');
            projectAlert.removeClass('alert-warning');
            projectAlert.addClass('alert-success');
            projectAlert.html('Project Setuped Successfully!');
        }, 2000);

        setTimeout(() => {
            var adminAlert = $('.admin-alert');
            adminAlert.removeClass('alert-warning');
            adminAlert.addClass('alert-success');
            adminAlert.html('Admin Created Successfully!');
        }, 4000);

        setTimeout(() => {
            var tableAlert = $('.table-alert');
            tableAlert.removeClass('alert-warning');
            tableAlert.addClass('alert-success');
            tableAlert.html('Tables Created Successfully!');
        }, 6000);

        setTimeout(() => {
            var emailAlert = $('.email-alert');
            emailAlert.removeClass('d-none');
        }, 6500);

        setTimeout(() => {
            var passwordAlert = $('.password-alert');
            passwordAlert.removeClass('d-none');
        }, 7000);

        setTimeout(() => {
            var loginBtn = $('.login-btn');
            loginBtn.removeClass('d-none');
        }, 7500);
    });

</script>
</body>
</html>