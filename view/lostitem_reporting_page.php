<?
include "../settings/core.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/ItemLostPage.css">
    <title>Report a Lost Item Form</title>
</head>

<body>
    <div class="form-container">
        <div class="form-header"><b>Report a Lost Item</b></div>
        <form action="../actions/item_lost_action.php" method="POST" enctype="multipart/form-data">
            <?php
            if (isset($_GET['error'])) { ?>
                <p class="error" style="color:red"><?php echo $_GET['error'] ?></p>
            <?php } ?>
            <div class="form-field">
                <label style="color : green " for="itemName">Item Name</label>
                <input type="text" id="itemName" name="itemName">

                <label style="color : green " for="locationLost">Location Lost</label>
                <input type="text" id="locationFound" name="locationLost">
                <div>
                    <label style="color: green; display: block;" for="dateFound">Date & Time Lost</label>
                    <input type="date" id="date" name="date" style="width: 150px; display: inline-block;">
                    <input type="time" id="time" name="time" style="width: 150px; display: inline-block;">
                </div>

                <label style="color:green " for="itemDescription">Item Description</label>
                <textarea id="itemDescription" name="itemDescription" rows="4"></textarea>
                <label style="color: green;" for="category">Category</label>
                <br>
                <select id="category" name="category" required>
                    <option value="Electronics">Electronics</option>
                    <option value="Books">Books</option>
                    <option value="Clothing">Clothing</option>
                    <option value="Others">Others</option>
                </select>
                <br>
                <br>
                <label style="color: green;" for="photo">Upload Photo</label>
                <input type="file" id="photo" name="photo">
            </div>
            <input type="submit" class="button" name="submit_button" id="submit_button">
        </form>
    </div>

</body>

</html>