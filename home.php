<?php
session_start();
if (empty($_SESSION['user_name'])) {
    header("location:index.php");
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
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="panel panel-success">
                <div class="panel-heading text-center">
                    <h1>Welcome Bro</h1>
                </div>
                <div class="panel-body">
                    <a href="logout.php" class="btn btn-danger">Logout</a>
                    <h1>Welcome <span style="color:coral;">
                            <?php
                            if (isset($_SESSION['user_name'])) {
                                echo $_SESSION['user_name'];
                            }
                            ?>
                        </span>
                    </h1>
                </div>
            </div>
        </div>
    </div>
</body>

</html>