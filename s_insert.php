<?php
session_start();
$_SESSION['name'] = $_POST['name'];
$_SESSION['password'] = $_POST['password'];
$_SESSION['dob'] = $_POST['dob'];
$_SESSION['gender'] = $_POST['gender'];
$_SESSION['type'] = $_POST['type'];
$_SESSION['phone'] = $_POST['phone'];
$_SESSION['address'] = $_POST['address'];


$error = "";

if (empty($_POST["name"])) {
    $error = 1;
} else if (!preg_match("/^[a-zA-z]*$/", htmlspecialchars(stripslashes(trim($_POST["name"]))))) {
    $error = 2;
} else if (empty($_POST['password'])) {
    $error = 9;
} else if (!preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).{8,}$/', $_POST['password'])) {
    $error = 10;
} else if (empty($_POST['gender'])) {
    $error = 5;
} else if (empty($_POST['dob'])) {
    $error = 3;
} else if (!preg_match("/^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$/", $_POST['dob'])) {
    $error = 4;
} else if (empty($_POST['address'])) {
    $error = 8;
} else if (empty($_POST['type'])) {
    $error = 6;
} else if (empty($_POST['phone'])) {
    $error = 7;
} else if (!preg_match(("/^[0-9]*$/"), $_POST['phone'])) {
    $error = 11;
}

if ($error == "") {


    $con = mysqli_connect("localhost", "root", "", "student_db") or die('cant connect'); //connecting to database

    $name = $_POST['name'];
    $user = mysqli_query($con, "SELECT * FROM login where username = '$name'");
    if (mysqli_num_rows($user) >= 1) {
        $user = 'User Already exists';
        header("location:s_register.php?user=$user");
    } else {


        //foreign key combine
        $sql = "INSERT INTO login (username,password) VALUES('" . $_POST['name'] . "','" . $_POST['password'] . "')";
        //$sql = "INSERT INTO login (username,password) values('test','test')";
        if ($con->query($sql) === TRUE) {
            $last_id = $con->insert_id;
            $sql2 = "INSERT INTO details (user_id,type,dob,gender,phone,address) VALUES(" . $last_id . ",'" . $_POST['type'] . "','" . $_POST['dob'] . "','" . $_POST['gender'] . "','" . $_POST['phone'] . "','" . $_POST['address'] . "')";
            //$sql = "INSERT INTO details (user_id,dob,gender) values($last_id,'20-10-2025',0)";
            $con->query($sql2);

            echo "registration successfully completed";
            $msg = "registration successfully completed";
            session_destroy();
            header("location:s_login.php?msg=$msg");
        } else {
            echo "Error: " . $sql . "<br>" . $con->error;
            header("location:s_register.php?error=" . $error);
        }
    }
} else {
    echo "Error: " . $sql . "<br>" . $con->error;
    header("location:s_register.php?error=" . $error);
}
