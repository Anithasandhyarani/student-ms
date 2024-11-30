<!DOCTYPE html>
<html>

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</head>

<body>
    <form action="s_insert.php" method="post">

        <div class="container mt-3">
            <h2>Registration form</h2>


            <?php
            session_start();
            $user = $_GET['user'] ?? '';
            if ($user) {
                echo ' <div class="alert d-inline-block py-1 alert-success" role="alert">' .
                    $user . ' <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';
            } else {
                echo "";
            }
            ?>

            <div style="font-size:14px;color:red">

                <?php
                $error_array = [
                    0 => "",
                    1 => 'Name is required',
                    2 => 'Name contains special characters',
                    3 => 'DOB is required',
                    4 => 'DOB is invalid',
                    5 => 'gender is required',
                    6 => 'type is required',
                    7 => 'phone number required',
                    8 => 'address is required',
                    9 => 'password is required',
                    10 => ' password minimum length should be 8,
at least one uppercase letter,
& lowercase letter,
and one digit. ',
                    11 => 'phone number contains 0-9 numbers only'
                ];
                $error_number = $_GET['error'] ?? 0;
                echo $error_array[$error_number];
                ?>
            </div>
            <div class="mb-3">
                <label for="name" class="form-label">Enter Name:</label>
                <input type="text" class="form-control w-25" name="name" value="<?php echo isset($_SESSION['name']) ? $_SESSION['name'] : '' ?>">
            </div>
            <div class=" mb-3">
                <label for="password" class="form-label">Enter the password:</label>
                <input type="text" class="form-control w-25" name="password" value="<?php echo isset($_SESSION['password']) ? $_SESSION['password'] : '' ?>">
            </div>

            <div class="mb-3">
                <label class="form-label">Select type:</label>
                <div class="form-check form-check-inline">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="type" value="Admin" <?php echo (isset($_SESSION['type']) && $_SESSION['type'] == "Admin") ? 'checked' : ''; ?> id="Admin">
                        <label class="form-check-label" for="Admin">Admin</label>
                    </div>
                </div>

                <div class="form-check form-check-inline">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="type" value="Teacher" <?php echo (isset($_SESSION['type']) && $_SESSION['type'] == "Teacher") ? 'checked' : ''; ?> id="Teacher">
                        <label class="form-check-label" for="Teacher">Teacher</label>
                    </div>
                </div>


                <div class="form-check form-check-inline">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="type" value="Student" <?php echo (isset($_SESSION['type']) && $_SESSION['type'] == "Student") ? 'checked' : ''; ?>id="Student">
                        <label class="form-check-label" for="Student">Student</label>
                    </div>
                </div>


                <div class="mb-3">
                    <label for="dob" class="form-label">Enter DOB:</label>
                    <input type="date" class="form-control w-25" id="dob" name="dob" value="<?php echo isset($_SESSION['dob']) ? $_SESSION['dob'] : '' ?>">

                </div>
                <div class="mb-3">
                    <label class="form-label">Select gender:</label>
                    <div class="form-check form-check-inline">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="gender" value="female" <?php echo (isset($_SESSION['gender']) && $_SESSION['gender'] == "female") ? 'checked' : ''; ?> id="female">

                            <label class="form-check-label" for="female">Female</label>
                        </div>

                    </div>
                    <div class="form-check form-check-inline">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="gender" value="male" <?php echo (isset($_SESSION['gender']) && $_SESSION['gender'] == "male") ? 'checked' : ''; ?> id="male">
                            <label class="form-check-label" for="male">Male</label>
                        </div>
                    </div>
                    <div class="form-check form-check-inline">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="gender" value="others" <?php echo (isset($_SESSION['gender']) && $_SESSION['gender'] == "others") ? 'checked' : ''; ?> id="others">
                            <label class="form-check-label" for="others">Others</label><br>

                        </div>

                    </div> <br>
                    <div class="mb-3">
                        <label for="phone" class="form-label">Enter the number:</label>
                        <input type="tel" class="form-control w-25" id="phone" placeholder="Enter the number" name="phone" value="<?php echo isset($_SESSION['phone']) ? $_SESSION['phone'] : '' ?>">
                    </div>

                    <div class="mb-3 mt-3">
                        <label for="address">address:</label>
                        <textarea class="form-control" rows="5" id="address" placeholder="Enter the address" name="address"><?php echo isset($_SESSION['address']) ? $_SESSION['address'] : '' ?></textarea>
                    </div>
                </div><br>

                <button type="submit" class="btn btn-primary">Submit</button>


    </form>

    </div>


    </div>


</body>

</html>