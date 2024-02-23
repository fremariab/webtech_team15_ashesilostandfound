<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Items Details</title>
    <link rel="stylesheet" href="../css/item_details.css">
    <!--The items details page is for the lost items I guess. The owners post their pictures of the lost items with description and where it got 
    lost maybe if they remember. Someone chances upon it and report to the website and thence the claiming process begins.-->


    <!-------------Things this page will need-------------->
    <!--
        1. menu
        2. search bar to browse lost items
        3. image of the item iconised to be enlarged to display more details
        4. The description, tags to categorise the lost items 

    -->
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

        <div class="box"><label for="sort-by" style="font-size: 16px;">Sort By:</label>
            <select id="sort-by">
                <option value="name">Name</option>
                <option value="price">Date</option>
            </select>
        </div>
        <span style="float: right;">Items per page: 15</span>

        <div class="lost">
            <?php
            include "../settings/connection.php";

            $sql = "SELECT * FROM Lost_Items";
            $result = mysqli_query($conn, $sql);


            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    $image_id = $row['image_id'];

                    $sql_img = "SELECT * FROM image WHERE image_id = $image_id";
                    $result_img = mysqli_query($conn, $sql_img);

                    if ($result_img && mysqli_num_rows($result_img) > 0) {
                        while ($img_row = mysqli_fetch_assoc($result_img)) {
                            echo '<div class="item">';
                            echo '<img src="../uploads/' . $img_row['file_name'] . '" alt="" class="image">';
                            echo '<h3>' . $row['item_name'] . '</h3>';
                            echo '<p>' . $row['description'] . '</p>';
                            echo '<button onclick="openForm(\'../uploads/' . $img_row['file_name'] . '\', \'' . $row['item_name'] . '\', \'' . $row['description'] . '\', \'' . $row['location'] . '\', \'' . $row['time'] . '\')">View Details</button>';
                            echo '</div>';
                        }
                    }
                }
            } else {
                echo '<p>No lost items found.</p>';
            }

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