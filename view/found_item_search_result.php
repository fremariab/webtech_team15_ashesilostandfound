<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Results</title>
    <link rel="stylesheet" href="../css/item_details.css">
    <link rel="stylesheet" href="../css/user_dash_style.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>
<style>
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
    z-index: 1001; 
}

.side-menu li {
    margin-bottom: 10px;
    margin-top: 10px;

}
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
                <li id="searchFoundItemsMenuItem">
                    <a href="../view/item_found.php">
                        <i class='bx bxs-report'></i>
                        <span class="text">Search Found Items</span>
                    </a>
                </li>
                <li id="searchLostItemsMenuItem">
                    <a href="../view/item_lost.php">
                        <i class='bx bxs-report'></i>
                        <span class="text">Search Lost Items</span>
                    </a>
                </li>
                <li id="reportFoundItemMenuItem">
                    <a href="../view/Submission.php">
                        <i class='bx bxs-report'></i>
                        <span class="text">Report Found Item</span>
                    </a>
                </li>
                <li id="reportLostItemMenuItem">
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

        <!-- Content Area -->
        <div class="items shifted-content">
            <h1>Search Results</h1>
            <div class="search-results">
                <?php
                include "../settings/connection.php";
                

                // Pagination variables
                $page = isset($_GET['page']) && is_numeric($_GET['page']) ? $_GET['page'] : 1;
                $prev_page = $page - 1;
                $next_page = $page + 1;
                $records_per_page = 2;

                if (isset($_GET["results"])) {
                    $searchResults = json_decode(urldecode($_GET["results"]), true);
                    if ($searchResults && !empty($searchResults)) {
                        $total_results = count($searchResults);
                        $num_pages = ceil($total_results / $records_per_page);
                        $start = ($page - 1) * $records_per_page;
                        $end = $start + $records_per_page;
                        $searchResults = array_slice($searchResults, $start, $records_per_page);

                        foreach ($searchResults as $result) {
                            echo "<div class='item'>";
                           
                            echo '<h3><a href="../view/items_details_found.php?itemid=' . $result["itemid"] . '">' . $result["item_name"] . '</a></h3>';

                            // echo "<h3>Item Name: " . $result["item_name"] . "</h3>";
                    
                            echo "<p>Location: " . $result["location"] . "</p>";
                            echo "<p>Description: " . $result["description"] . "</p>";
                            echo "</div>";
                        }

                        
                        echo "<div class='pages'>";
                        if ($page > 1) {
                            echo "<a href='found_item_search_result.php?page=$prev_page'><button id='prev-btn'>Previous</button></a>";
                        }
                        if ($page < $num_pages) {
                            echo "<a href='found_item_search_result.php?page=$next_page'><button id='next-btn'>Next</button></a>";
                        }
                        echo "</div>";
                    } else {
                        echo "<p>No matching items found.</p>";
                    }
                } else {
                    echo "<p>No search results available.</p>";
                }
                ?>
            </div>
        </div>
    </div>

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
