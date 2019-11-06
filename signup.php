<?php
if (!empty($_POST['signup'])) {
    require_once("db.php");
    $error = '';
    $message = '';

    if ($_POST["pass"] != $_POST["con_pass"]) {
        $error = "Passwords not same";
    } else {
        $sql = "INSERT INTO users (username,password) VALUES ('" . $_POST["user"] . "','" . $_POST["pass"] . "')";

        mysqli_query($conn, $sql) or die("unable to insert");
        $cur_id = mysqli_insert_id($conn);
        if (!empty($cur_id)) {
            $message = "Successfully added";
            echo '<div class="alert alert-success alert-dismissable fade in">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong>"' . $message . '"</strong>
                </div>';
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.css" type="text/css">
    <title>Document</title>
    <style>
        .well {
            top: 20%;
            left: 0;
            position: absolute;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="container">
            <?php
            if (isset($error)) {
                echo '<div class="alert alert-danger alert-dismissable fade in">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong>"' . $error . '"</strong>
                </div>';
            }
            ?>
        </div>
        <div class="col-md-4 col-md-offset-4 well">
            <form action="" method="post" autocomplete="off">
                <h1 class="text-center">Signup Form</h1>
                <div class="form-group">
                    <label for="user">Email Id</label>
                    <input type="email" class="form-control" placeholder="Enter Username" required name="user">
                </div>
                <div class="form-group">
                    <label for="pass">Password</label>
                    <input type="password" class="form-control" placeholder="Enter Password" required name="pass">
                </div>
                <div class="form-group">
                    <label for="con_pass">Confirm Password</label>
                    <input type="password" class="form-control" placeholder="Confirm Password" required name="con_pass">
                </div>
                <div class="form-group text-center">
                    <input type="submit" name="signup" value="Signup" class="btn btn-danger">
                    <a href="index.php" class="btn btn-link">Login Here</a>
                </div>
        </div>
    </div>
    </div>
    </div>
    </div>
</body>

</html>