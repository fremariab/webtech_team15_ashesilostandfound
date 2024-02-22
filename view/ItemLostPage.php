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
    <form>
        <div class="form-field">
            <label style = "color : green " for="itemName">Item Name</label>
            <input type="text" id="itemName" name="itemName" required>
        </div>
        <div class="form-field">
            <label style = "color : green " for="locationFound">Location Found</label>
            <input type="text" id="locationFound" name="locationFound" required>
        </div>
        <div class="form-field">
            <label style = "color : green; display: block" for="dateFound">Date Found</label>
            <input  type="date" id="date" name="date" placeholder="mm/dd/yyyy" style="width: 150px;"required>
        </div>
        <div class="form-field">
            <label style = "color : green " for="itemDescription">Item Description</label>
            <textarea id="itemDescription" name="itemDescription" rows="4" required></textarea>
        </div>
        <div class="form-field">
            <label style="color: green;" for="photo">Upload Photo</label>
            <input type="file" id="photo" name="photo" accept="image/*" required>
        </div>
        <button type="submit" class="submit-button">Submit</button>
    </form>
</div>

</body>
</html>