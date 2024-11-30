<?php
session_start();
?>
<!DOCTYPE html>
<html>

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <title> login form</title>
</head>

<body>
    <div class="container mt-4">

        <?php
        $msg = $_GET['msg'] ?? '';
        $error = $_GET["error"] ?? "";
        

        if ($error) {
            echo ' <div class="alert d-inline-block py-1 alert-danger" role="alert">' .
                $error . ' <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';
        } else {
            echo "";
        }
        if ($msg) {
            echo ' <div class="alert d-inline-block py-1 alert-success" role="alert">' .
                $msg . ' <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';
        } else {
            echo "";
        }
        ?>


        <form action=s_authentication.php method="post">
            <h2>login page</h2>

            <div class="mb-3">
                <label for="name" class="form-label">Enter Name:</label>
                <input type="text" class="form-control w-25" name="name" value="<?php echo isset($_SESSION['name']) ? $_SESSION['name'] : '' ?>"><br>
            </div>

            <div class=" mb-3">
                <label for="password" class="form-label">Enter the password:</label>
                <input type="text" class="form-control w-25" name="password" value="<?php echo isset($_SESSION['password']) ? $_SESSION['password'] : '' ?>"><br>
                <button type="submit" class="btn btn-primary">login</button>
            </div>

            Create account <a href='s_register.php'>Register</a>
    </div>
</body>
</form>

</html>