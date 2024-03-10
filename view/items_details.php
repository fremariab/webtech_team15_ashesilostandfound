<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Items Details</title>
    <link rel="stylesheet" href="../css/item_details.css">

    <style>
        .overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            /* semi-transparent black */
            z-index: 1000;
            /* ensure it's above other elements */
            display: none;
            /* hidden by default */
        }

        .form-container {
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: white;
            padding: 20px;
            border-radius: 5px;
            z-index: 1001;
            /* ensure it's above overlay */
            display: none;
            /* hidden by default */
        }
    </style>
</head>

<body>

    <div class="side-menu">
        <h2>Menu</h2>
        <ul>
            <li>
                <a href="#">
                    <i class='bx bxs-search-alt'></i>
                    <span class="text">Search Found Items</span>
                </a>
            </li>
            <li>
                <a href="#">
                    <i class='bx bxs-search-alt'></i>
                    <span class="text">Search Lost Items</span>
                </a>
            </li>
            <li>
                <a href="#">
                    <i class='bx bxs-hand-spock'></i>
                    <span class="text">Report Found Item</span>
                </a>
            </li>
            <li>
                <a href="../view/ItemLostPage.php">
                    <i class='bx bxs-report'></i>
                    <span class="text">Report Lost Item</span>
                </a>
            </li>
        </ul>
        <ul class="side-menu">
            <li>
                <a href="#">
                    <i class='bx bxs-user'></i>
                    <span class="text">Profile</span>
                </a>
            </li>
            <li>
                <a href="#" class="logout">
                    <i class='bx bxs-log-out-circle'></i>
                    <span class="text">Logout</span>
                </a>
            </li>
        </ul>
        </ul>
    </div>


    <div class="items">


        <!--Place a search icon in the bar if you can or just do the side-->
        <div class="search-bar">
            <input type="text" placeholder="Search" style="float: right;">
        </div>

        <h2 style="text-align: center;">All Lost Items</h2>
        <form action="../actions/sort_items_action.php" method="post">
            <label for="sort-by">Sort By:</label>
            <select id="sort-by" name="sort_by">
                <option value="name">Name</option>
                <option value="date">Date</option>
            </select>
            <input type="submit" name="submit_lost" value="Apply">
        </form>

        <span style="float: right;">Items per page: 15</span>

        <div class="lost">
            <?php
            include "../functions/display_lost_items_fxn.php";

            ?>
        </div>
    </div>
    <div id="overlay" class="overlay" onclick="closeForm()"></div>
    <div id="form-container" class="form-container">
        <div class="item-details">
            <span class="close" onclick="closeForm()">&times;</span>
            <img id="item-image" src="" alt="" class="image">
            <h2 id="item-name">Item Name</h2>
            <p id="item-description">Item Description</p>
            <p id="item-location">Location: </p>
            <p id="item-date-lost">Date Lost: </p>
        </div>
    </div>
    <script src="../js/expand_item.js"></script>
</body>

</html>