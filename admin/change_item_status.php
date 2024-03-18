<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change Item Status</title>
    <link rel="stylesheet" href="../css/dash_style.css">
    <link rel="stylesheet" href="../css/signup_style.css">

    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>

</head>
<body>
    <div class = "dashboard-container">
    <div class = "sidebar">
            <div class = "sidebar-logo">
                <a href="../admin/admin_dash.php">
                <img id = "Logo" src = "../images/logo.png" height="64px" > </a>
            </div>
            <div class="sidebar-top">
                <a href="../admin/admin_dash.php"> Dashboard</a>
                <a href="../admin/all_lost_items.php"> All Lost Items</a>
                <a href="../admin/all_found_items.php"> All Found Items</a>
                <a href="../admin/all_claimed_items.php"> All Claimed Items</a>
                <a href="../admin/change_item_status.php"> Change Item Status</a>
                <a href="../admin/send_mail.php"> Send mail</a>
            </div>
            
            <div class="sidebar-bottom">
                <hr>
                <a href="../view/user_profile.php"> Profile</a>
                <a href="../login/logout.php"> Logout</a>
            </div>

</div>
<div class="main-content">
<form action="../actions/change_item_status_action.php" method="POST">
<?php
                    if (isset($_GET['userror'])) { ?>
                        <p class="error" style="color:red"><?php echo $_GET['error'] ?></p>
                    <?php } ?>
            <label for="item_type">Select Item Type:</label><br>
            <input type="radio" id="lost" name="item_type" value="lost" required>
            <label for="lost">Lost Item</label><br>
            <input type="radio" id="found" name="item_type" value="found" required>
            <label for="found">Found Item</label><br><br>
            <label for="item_id">Item ID:</label>
            <input type="text" name="item_id" id="item_id" required><br><br>
            <label for="uid">User ID:</label>
            <input type="text" name="uid" id="uid" required><br><br>
            <input type="submit" value="Claim Item">
        </form>
</div>
</div>
</body>
</html>