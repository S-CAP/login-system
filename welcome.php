<?php

session_start();
include("connection.php");


if (!isset($_SESSION['email'])) {

    header("location:login.php");
}

$result = "SELECT * FROM vivo";

$query = mysqli_query($conn, $result);
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>welcome</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
</head>

<body>
    <div class="conatiner mt-5">
        <div>
            <a href="logout.php">logout</a>
        </div>

        <div class="conatainer">
            <h1>welcome here</h1>
        </div>
        <br>
        welcome, <?php echo $_SESSION['fname']; ?>
        <?php echo $_SESSION['lname']; ?>
        <?php echo $_SESSION['email']; ?>

        <table class="table">
            <thead>
                <tr>
                    <th scope="col">id</th>
                    <th scope="col">First</th>
                    <th scope="col">Last</th>
                    <th scope="col">email</th>
                    <th scope="col">created</th>
                    <th scope="col">edit </th>
                    <th scope="col">delete</th>
                </tr>
            </thead>
            <tbody>
                <?php

                $count = 1;

                while ($row = mysqli_fetch_assoc($query)) {

                    // echo "<pre>";
                    // print_r($row);

                ?>
                    <tr class="ml-5">

                        <td>
                            <?php echo $count ?>
                        </td>

                        <td>
                            <?php echo $row['first_name'] ?>
                        </td>

                        <td>
                            <?php echo $row['last_name'] ?>
                        </td>
                        <td>
                            <?php echo $row['email'] ?>
                        </td>

                        <td>
                            <?php echo $row['created_at'] ?>
                        </td>

                        <td>
                            <a href="edit.php?id=<?php echo $row["id"]; ?>" class="text-decoration-none">Edit</a>
                        </td>

                        <td>
                            <a href="delete.php?id=<?php echo $row["id"]; ?>" class="text-decoration-none">Delete</a>

                        </td>


                    </tr>
                <?php
                    $count++;
                }
                ?>


            </tbody>
        </table>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
</body>

</html>