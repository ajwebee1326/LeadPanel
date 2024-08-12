<?php 
include 'conn.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="<?php echo FORM_SUBMIT_URL;?>" method="POST">
        <input type="text" name="name" placeholder="Name">
        <input type="text" name="email" placeholder="Email">
        <input type="text" name="phone" placeholder="Phone">
        <input type="text" name="message" placeholder="Message">
        <button type="submit">Submit</button>
    </form>
    <div style="background-color: aqua;color:black">
        <?php printMessage(); ?>
    </div>
</body>
</html>