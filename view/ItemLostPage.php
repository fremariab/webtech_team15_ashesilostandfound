<?
include "../settings/core.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/ItemLostPage.css">
    <title>Report a Found Item Form</title>
</head>

<body>
    <div class="form-container">
        <div class="form-header"><b>Report a Found Item</b></div>
        <form action="../actions/item_lost_action.php" method="POST" enctype="multipart/form-data">
            <?php
            if (isset($_GET['error'])) { ?>
                <p class="error" style="color:red"><?php echo $_GET['error'] ?></p>
            <?php } ?>
            <div class="form-field">
                <label style="color : green " for="itemName">Item Name</label>
                <input type="text" id="itemName" name="itemName">
            </div>
            <div class="form-field">
                <label style="color : green " for="locationFound">Location Found</label>
                <input type="text" id="locationFound" name="locationFound">
            </div>
            <div class="form-field">
                <label style="color : green; display: block" for="dateFound">Date Found</label>
                <input type="date" id="date" name="time" placeholder="mm/dd/yyyy" style="width: 150px;">
            </div>
            <div class="form-field">
                <label style="color : green " for="itemDescription">Item Description</label>
                <textarea id="itemDescription" name="itemDescription" rows="4"></textarea>
            </div>
            <div class="form-field">
                <label style="color: green;" for="photo">Upload Photo</label>
                <input type="file" id="photo" name="photo">
            </div>
            <input type="submit" class="button" name="submit_button" id="submit_button">
        </form>
    </div>

</body>

</html>