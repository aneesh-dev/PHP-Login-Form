<?php
session_start();
require_once('db.php');

$errmsg = "";

if (!empty($_POST["login"])) {
    $query = "SELECT * FROM users WHERE username ='" . $_POST["username"] . "' and password = '" . $_POST["password"] . "'";
    $sql = mysqli_query($conn, $query);

    $row = mysqli_fetch_array($sql);
    if (is_array($row)) {
        $_SESSION["user_name"] = $row["username"];
        setcookie("user", $row["username"]);
        header("Location:home.php");
    } else {
        $errmsg = "Invalid Username or Password";
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
    <title>Login Form</title>
    <style>
        .error-msg {
            text-align: center;
            color: teal;
            width: auto;
            height: 50px;
            margin: 20px;
            padding: 20px;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="panel panel-info">
                <div class="panel-heading text-center">
                    <h1>Login Form</h1>
                </div>
                <div class="panel-body">
                    <div class="error-msg">
                        <?php
                        if (isset($errmsg)) {
                            echo $errmsg;
                        }
                        ?>
                    </div>
                    <div class="col-md-4 col-md-offset-4 well">
                        <form role="form" action="" method="post" autocomplete="off">
                            <div class="form-group">
                                <label for="user"></label>
                                <input type="email" class="form-control" placeholder="Enter Username" required name="username">
                            </div>
                            <div class="form-group">
                                <label for="pass"></label>
                                <input type="password" class="form-control" placeholder="Enter Password" required name="password">
                            </div>
                            <div class="form-group text-center">
                                <input type="submit" name="login" value="Login" class="btn btn-primary">
                                <a href="signup.php" class="btn btn-link">Sign Up Here</a>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>