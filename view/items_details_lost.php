<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <title>Items Details</title>
    <link rel="stylesheet" href="../css/item_details.css">
    <link rel="stylesheet" href="../css/user_dash_style.css">

    
</head>
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
            
            display: none;
            /* hidden by default */
        }


         /* Previous and Next Buttons */
    .pages {
        position: relative;
        margin-top: 24px;
        display: flex;
        justify-content: space-between;
    }

    .pages button {
        padding: 10px 20px;
        border-radius: 10px;
        background: var(--blue);
        color: var(--light);
        border: none;
        cursor: pointer;
        transition: background 0.3s ease;
    }

    .pages button:hover {
        background: var(--light-orange);
    }

    #prev-btn {
        position: absolute;
        left: 0;
    }

    #next-btn {
        position: absolute;
        right: 0;
    }

    #sidebar {
    position: fixed;
    top: 0;
    left: 0;
    width: 250px;
    height: 100%;
    background-color: #fff;
    transition: left 0.3s ease;
    z-index: 1000; 
}

#sidebarToggle {
    position: fixed;
    top: 10px;
    left: 220px;
    z-index: 1001; 
}

.side-menu li {
    margin-bottom: 10px;
    margin-top: 10px;

}

/* #sidebar .side-menu li.active {
    background: var(--grey);
    position: relative;
} */

.shifted-sidebar #sidebarToggle {
    left: 220px;
}

.unshifted-sidebar #sidebarToggle {
    left: 10px;
}
.shifted-content {
    margin-left: 250px; 
    transition: margin-left 0.3s ease; 
}


</style>
<body>

    <div class="overall">
       <button id="sidebarToggle"><i class="material-icons">menu</i></button>

        <div id="sidebar">

        
        <a href="../view/user_dash.php" class="brand">
            <img src="../images/logo.png" height="64px" alt="">
        </a>
        <ul class="side-menu top">
    <li id="dashboardMenuItem" >
        <a href="../view/user_dash.php">
            <i class='bx bxs-dashboard'></i>
            <span class="text">Dashboard</span>
        </a>
    </li>
    <li id="searchFoundItemsMenuItem" > 
        <a href="../view/item_found.php">
            <i class='bx bxs-report'></i>
            <span class="text">Search Found Items</span>
        </a>
    </li>
    <li id="searchLostItemsMenuItem" >
        <a href="../view/item_lost.php">
            <i class='bx bxs-report'></i>
            <span class="text">Search Lost Items</span>
        </a>
    </li>
    <li id="reportFoundItemMenuItem" >
        <a href="../view/Submission.php">
            <i class='bx bxs-report'></i>
            <span class="text">Report Found Item</span>
        </a>
    </li>
    <li id="reportLostItemMenuItem" >
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
    
        </div>


    <div class="items">


        <h2 style="text-align: center;"> Item Details</h2>

        <span style="float: right;">Items per page: 15</span>

        <div class="lost">
            <?php
                include "../actions/display_lost_item_details.php";

                
                if (isset($_GET['itemid'])) {
                    $itemid = $_GET['itemid'];
                    
                    $itemDetails = getItemDetails($conn, $itemid);

                    if (!empty($itemDetails)) {
                       
                        echo '<h2>Item Details</h2>';
                        echo '<img src="../uploads/' . $itemDetails['file_name'] . '" alt="Item Image" style="max-width: 300px;">'; // Display the image
                        echo '<p><strong>Item Name:</strong> ' . $itemDetails['item_name'] . '</p>';
                        echo '<p><strong>Description:</strong> ' . $itemDetails['description'] . '</p>';
                        echo '<p><strong>Interaction Time:</strong> ' . $itemDetails['interaction_time'] . '</p>';
                        echo '<p><strong>Location</strong> ' . $itemDetails['location'] . '</p>';
                        
                        echo '<p><strong>Category:</strong> ' . $itemDetails['category'] . '</p>';
                        echo '<p><strong>Status</strong> ' . $itemDetails['status'] . '</p>';
                    } else {
                        echo '<p>No item found with the provided ID.</p>';
                    }
                } else {
                    echo '<p>Item ID is not provided.</p>';
                }
                mysqli_close($conn);
                ?>
        </div>
    </div>

    <script src="../js/expand_item.js"></script>
<script>
document.addEventListener("DOMContentLoaded", function() {
    const sidebar = document.getElementById("sidebar");
    const sidebarToggle = document.getElementById("sidebarToggle");
    const content = document.querySelector(".items");

    sidebar.style.left = "0px"; 
    content.classList.add("shifted-content"); 
    sidebar.classList.add("shifted-sidebar"); 
    sidebarToggle.classList.add("shifted-sidebar");

    
    function toggleSidebar() {
        if (sidebar.style.left === "0px") {
            sidebar.style.left = "-250px";
            content.classList.remove("shifted-content");
            sidebar.classList.remove("shifted-sidebar");
            sidebarToggle.classList.remove("shifted-sidebar");
        } else {
            sidebar.style.left = "0px";
           content.classList.add("shifted-content");
            sidebar.classList.add("shifted-sidebar");
            sidebarToggle.classList.add("shifted-sidebar");
        }
    }

    
    sidebarToggle.addEventListener("click", toggleSidebar);
});


document.addEventListener("DOMContentLoaded", function() {
   
    const menuItems = document.querySelectorAll(".side-menu li");

    
    function setActiveMenuItemFromURL() {
        const currentURL = window.location.href;
        const relativePath = currentURL.split("/").pop(); 
        console.log("Relative Path:", relativePath);
        menuItems.forEach(menuItem => {
            const link = menuItem.querySelector("a");
            const menuItemURL = link.getAttribute("href");
            console.log("Menu Item URL:", menuItemURL);
            if (menuItemURL && menuItemURL.includes("item_found.php"))  {
                menuItem.classList.add("active");
            } else {
                menuItem.classList.remove("active");
            }
        });
    }

    
    setActiveMenuItemFromURL();

    
    menuItems.forEach(menuItem => {
        menuItem.addEventListener("click", function(event) {
            console.log("Clicked menu item:", menuItem);
            
            menuItems.forEach(item => {
                item.classList.remove("active");
            });
            
            menuItem.classList.add("active");
        });
    });
});


</script>

</body>

</html>