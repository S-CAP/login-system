<?php
session_start();

include("connection.php");


if (isset($_SESSION['email'])) {
    header("location:welcome.php");
}



if ($_SERVER['REQUEST_METHOD'] == "POST") {

    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];

    $msg = "";
    $msg_er = "";

    $chk = "SELECT * FROM vivo WHERE email = '$email' ";

    $tex = mysqli_query($conn, $chk);

    if (mysqli_num_rows($tex) > 0) {

        $msg = "email already exits";
    } elseif ($password !== $cpassword) {

        $msg_er = "not match";
    } else {

        $sql = "INSERT INTO vivo(first_name,last_name,email,password) values('$fname','$lname','$email','$password')";

        $query = mysqli_query($conn, $sql);

        if ($query) {

            $msg = "user created";
        }
    }
}





?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>signup</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
</head>

<body>
    <div class="container mt-5 col-sm-4">
        <div>
            <h2>Register here</h2>
        </div>

        <form method="POST" class="mt-5">
            <div class="mb-3">
                <label for="name" class="form-label">First name</label>
                <input type="name" name="fname" class="form-control" id="name" required>

            </div>
            <div class="mb-3">
                <label for="last name" class="form-label">Last name</label>
                <input type="name" name="lname" class="form-control" id="last name" required>

            </div>
            <div class="mb-3">
                <label for="Email1" class="form-label">Email </label>
                <input type="email" name="email" class="form-control" id="Email1" required>

                <span><?php echo @$msg; ?></span>


            </div>

            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input type="password" name="password" class="form-control" id="exampleInputPassword1">
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">confirm password</label>
                <input type="password" name="cpassword" class="form-control" id="cpassword" required>

                <span><?php echo @$msg_er; ?></span>


            </div>

            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
            <div>
                <p>already register ?</p>
                <a href="login.php">login here</a>
            </div>
        </form>

    </div>


















    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
</body>

</html>