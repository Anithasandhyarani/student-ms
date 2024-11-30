<?php
session_start();
$type = $_SESSION['type'];
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


                <?php
                if ($type === "Admin") {
                ?>

                    <div class="bg-light">
                        <div class="nav nav-pills">
                            <div class="card p-3 shadow">
                                <h2 class="text-center p-3">Details</h2>
                                <nav>
                                    <div class="nav nav-tabs mb-3" id="nav-tab" role="tablist">
                                        <button class="nav-link active" id="nav-Students-tab" data-bs-toggle="tab" data-bs-target="#nav-Students" type="button" role="tab" aria-controls="nav-Students" aria-selected="true">Students</button>
                                        <button class="nav-link" id="nav-Teachers-tab" data-bs-toggle="tab" data-bs-target="#nav-Teachers" type="button" role="tab" aria-controls="nav-Teachers" aria-selected="false">Teachers</button>

                                    </div>


                                </nav>


                                <div class="tab-content p-3 border bg-light" id="nav-tabContent">
                                    <div class="tab-pane fade active show" id="nav-Students" role="tabpanel" aria-labelledby="nav-Students-tab">
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
                                            <tbody> <?php
                                                    $con = mysqli_connect("localhost", "root", "", "student_db") or die('cant connect');





                                                    $type = $_SESSION['type'];
                                                    if ($type === "Admin") {
                                                        $result = mysqli_query($con, "
SELECT *
FROM login
INNER JOIN details ON login.id = details.user_id where type='Student'");
                                                    } else {
                                                    } ?> <?php


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



                                                    </tr>


                                                <?php
                                                            }
                                                ?>
                                        </table>
                                    </div>
                                    <div class="tab-pane fade" id="nav-Teachers" role="tabpanel" aria-labelledby="nav-Teachers-tab">

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
                                            <tbody> <?php
                                                    $con = mysqli_connect("localhost", "root", "", "student_db") or die('cant connect');





                                                    $type = $_SESSION['type'];
                                                    if ($type === "Admin") {
                                                        $result = mysqli_query($con, "
SELECT *
FROM login
INNER JOIN details ON login.id = details.user_id where type='Teacher'");
                                                    }   ?> <?php


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



                                                    </tr>


                                                <?php
                                                            }
                                                ?>
                                        </table>

                                    </div>





                                <?php } else { ?>

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
                                            $con = mysqli_connect("localhost", "root", "", "student_db") or die('cant connect');





                                            $type = $_SESSION['type'];
                                            if ($type === "Teacher") {
                                                $result = mysqli_query($con, "
SELECT * 
FROM login
INNER JOIN details ON login.id = details.user_id where type='Student'");
                                            }   ?> <?php


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



                                                </tr>


                                            <?php
                                                    }
                                            ?>
                                    </table>
                                <?php  }
                                ?>

                                </div>
                            </div>




                            <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
                            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body







    </html>