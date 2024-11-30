<ul class="navbar-nav me-auto mb-2 mb-lg-0">
    <li class="nav-item">
        <a class="nav-link" href="deshboard.php">Home</a>
    </li>
    <?php

    $type = $_SESSION['type'];

    if ($type === "Teacher" or $type === "Admin") {
    ?> <li class="nav-item">
            <a class="nav-link" href="s_details.php">list</a>
        </li>

    <?php
    } else {
        echo "";
    } ?>
    <li class="nav-item">
        <a class="nav-link" href="profile.php">profile</a>
    <li class="nav-item">
        <a class="nav-link" href="s_logout.php">logout</a>


    </li>

</ul>