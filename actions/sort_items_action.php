<?php

if (isset($_POST['submit_lost'])) {
    if (isset($_POST["user-role"])) {
        $sort_type = $_POST["sort_by"];
    } else {
        header("Location: ../login/signup_view.php?error=Please select a role.");
        exit();
    }
} else if (isset($_POST['submit_found'])) {
} else {
}
