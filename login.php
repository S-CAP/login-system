<?php
session_start();
include("connection.php");

if (isset($_SESSION['email'])) {

    header("location:welcome.php");
}

if ($_SERVER['REQUEST_METHOD'] == "POST") {

    $email = $_POST['email'];
    $password = $_POST['password'];


    if (!empty($email) && !empty($password)) {
        // now run SELCET query

        $query = "SELECT * FROM vivo WHERE email = '$email' AND password = '$password' ";
        $result = mysqli_query($conn, $query);

        if ($result) {
            if ($result && mysqli_num_rows($result) > 0) {

                $user = mysqli_fetch_assoc($result);


                $_SESSION['email'] = $email;
                $_SESSION['fname'] = $user['first_name'];
                $_SESSION['lname'] = $user['last_name'];

                header("Location: welcome.php");
                die;
            }
        }
        echo "wrong username";
    } else {
        echo "wrong  username password";
    }
}




?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
</head>

<body>

    <div class="container col-sm-4 ">
        <div class="mt-5">
            <h1>login here</h1>

        </div>
        <form method="POST">



            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="name" name="email" class="form-control" id="username" placeholder="enter your email" required>

            </div>
            <div class="mb-3">
                <label for="Password" class="form-label">Password</label>
                <input type="password" name="password" class="form-control" id="Password" placeholder="enter your password" required>

            </div>



            <button type="submit" name="submit" class="btn btn-primary">submit</button>

            <br>
            <br>

            <div class="mt-1 text-center">

                <p></p>

                <a href="singup.php" class=" text-decoration-none">register here</a>
            </div>

        </form>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
</body>

</html>