 <?php
    session_start();
    $con = mysqli_connect("localhost", "root", "", "student_db"); //database connection

    $name = $_POST["name"];
    $password = $_POST["password"];
    $sql = "SELECT * FROM login WHERE username='$name' AND password='$password'";


    $result = mysqli_query($con, $sql);
    $count = mysqli_num_rows($result);

    if ($count > 0) {


        $_SESSION['userisloggedin'] = true;
        //$_SESSION['password'] = "$password";
        $row = mysqli_fetch_assoc($result);
        $user_id = $row["id"];
        $det = "SELECT * FROM details  WHERE user_id=" . $user_id;
        $result = mysqli_query($con, $det);
        $row = mysqli_fetch_assoc($result);
        $_SESSION['type'] = $row['type'];
        if ($row['type'] = "Teacher") {

 
            $_SESSION['u_id'] =  $user_id;

            header("location:deshboard.php");
        }
    } else {
        echo '<script>
    alert("invalid details")
</script>';
        $error = "invalid details";

        header("location:s_login.php?error= $error ");
        //exit(0);
        //echo "error";
    }
