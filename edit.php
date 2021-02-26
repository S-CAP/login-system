<?php
include("connection.php");

$id = $_GET['id'];
// echo $id;
// exit;


// select query
$update = "SELECT * FROM vivo WHERE id = '$id' ";
$result = mysqli_query($conn, $update);
$row = mysqli_fetch_assoc($result);




// click on update button
if (isset($_POST['update'])) {



    $fname = $_POST['fname'];

    $lname = $_POST['lname'];
    $email = $_POST['email'];

    $sql = "UPDATE vivo SET first_name = '$fname', last_name = '$lname', email ='$email' WHERE id ='$id' ";


    $power = mysqli_query($conn, $sql);


    if ($power) {
        header("location:welcome.php");
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
</head>

<body>
    <h3>Update Data</h3>

    <div class="container">
        <form method="POST">
            <div>
                <label for="fname">fname</label>
                <input type="text" name="fname" value="<?php echo $row['first_name'] ?>">
            </div>
            <br>
            <br>

            <div>
                <label for="lname">lname</label>
                <input type="text" name="lname" value="<?php echo $row['last_name'] ?>">
            </div>
            <br>
            <br>
            <div>
                <label for="email">email</label>
                <input type="text" name="email" value="<?php echo $row['email'] ?> ">
            </div>

            <br>
            <br>

            <button type="submit" name="update">update</button>
        </form>
    </div>

</body>

</html>