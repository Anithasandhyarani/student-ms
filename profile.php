<?php
session_start();
if ($_SESSION['userisloggedin']) {
} else {
    header('location:s_login.php?error=101');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>user details</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>

<body>

    <div class="container py-5">
        <div class="row">
            <div class="col-lg-3">
                <?php include('s_navbar.php'); ?>
            </div>
            <div class="col-lg-9">
                <table class="table">
                    <thead>
                        <tr>
                            <th>User_id</th>
                            <th>Name</th>
                            <th>Type</th>
                            <th>Dob</th>
                            <th>Gender</th>
                            <th>Phone number</th>
                            <th>Address</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php

                        $uid =  $_SESSION['u_id'];

                        $con = mysqli_connect("localhost", "root", "", "student_db") or die('cant connect');
                        $sql = "SELECT * FROM login ";


                        $result = mysqli_query($con, $sql);
                        $count = mysqli_num_rows($result);

                        if ($count > 0) {


                            $_SESSION['userisloggedin'] = true;

                            $row = mysqli_fetch_assoc($result);
                            $user_id = $row["id"];



                            $result = mysqli_query($con, "
                        SELECT login.username,
                               details.user_id,
                               details.type,
                               details.dob,
                               details.gender,
                               details.phone,
                               details.address
                        FROM login
                        INNER JOIN details ON login.id = details.user_id  WHERE user_id=$uid");


                            while ($row = mysqli_fetch_assoc($result)) {

                        ?>
                                <tr>
                                    <td><?php echo $row['user_id']; ?></td>
                                    <td><?php echo $row['username']; ?></td>
                                    <td><?php echo $row['type']; ?></td>
                                    <td><?php echo $row['dob']; ?></td>
                                    <td><?php echo $row['gender']; ?></td>
                                    <td><?php echo $row['phone']; ?></td>
                                    <td><?php echo $row['address']; ?></td>



                                    </td>
                                </tr>
                            <?php
                            }
                            ?>
                </table>
            </div>
        </div>
    </div>

<?php
                        }
?>

</body>

</html>