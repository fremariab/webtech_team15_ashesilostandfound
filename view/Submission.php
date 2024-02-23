<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/Submission.css">
    <title>Found Item Submission</title>
</head>

<body>
    <div class="container">
        <h2>Report a Found Item</h2>
        <form>
            <div class="form-group">
                <label style="color : green;" for="item">Item Name</label>
                <input type="text" id="item" name="item" placeholder="e.g., Wallet, Phone" required>
            </div>
            <div class="form-group">
                <label style="color : green;" for="location">Location Found</label>
                <input type="text" id="location" name="location" placeholder="e.g., Park, Restaurant" required>
            </div>
            <div class="form-group">
                <label style="color : green;" for="date">Date Found</label>
                <input type="date" id="date" name="date" placeholder="mm/dd/yyyy" required>
            </div>
            <div class="form-group">
                <label style="color : green;" for="photo">Upload Item Photo</label>
                <input type="file" id="photo" name="photo" accept="image/*" required>
            </div>
            <button type="submit">Submit</button>
        </form>
    </div>
</body>

</html>