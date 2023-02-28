<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <p>Hello</p>
    <p>
        <?php echo 'world'; ?>
        <?php $fname = "Max";
        $lname = "${fname} Smith";
        echo $lname; ?>
        <?php
        //print_r($GLOBALS);

        date_default_timezone_set('Asia/Kolkata');
        echo date_default_timezone_get();
        echo date('y/m/d g:ia');

        ?>

    </p>
</body>
</html>