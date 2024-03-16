<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>

    <link rel="stylesheet" href="../css/item_details.css">
    <link rel="stylesheet" href="../css/user_dash_style.css">
    <title>Lost Items</title>
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
    left: 220px;
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
            <li class="active">
                <a href="../view/user_dash.php">
                    <i class='bx bxs-dashboard'></i>
                    <span class="text">Dashboard</span>
                </a>
            </li>
            <li>
                <a href="../view/item_found.php">
                    <i class='bx bxs-report'></i>
                    <span class="text">Search Found Items</span>
                </a>
            </li>
            <li>
                <a href="../view/item_lost.php">
                    <i class='bx bxs-report'></i>
                    <span class="text">Search Lost Items</span>
                </a>
            </li>
            <li>
                <a href="../view/Submission.php">
                    <i class='bx bxs-report'></i>
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
    
        </div>

        <div class="items shifted-content">
            <h2>Items Lost</h2>

            <form action="../actions/lost_item_search.php" method="GET">
                <div class="form-input">
                <input type="search" name="keyword" placeholder="Search" style="width: calc(10% - 10px);float: right;">
                <button type="submit" class="search-btn" ><i class='bx bx-search'></i></button>
            </div>
            </form>
            <span>Items per page: 10</span>

            <form id="filterForm">
                <!-- Filtering Options -->
                <label for="item_type">Item Type:</label>
                <select name="item_type" id="item_type">
                    <option value="">All</option>
                    <option value="electronics">Electronics</option>
                    <option value="clothing">Clothing</option>
                    <option value="books">Books</option>
                    <option value="Others">Others</option>
                </select>

                <label for="location">Location:</label>
                <select name="location" id="location-select" onchange="toggleCustomLocationInput()">
                    <option value="">All</option>
                    <option value="cafeteria">Cafeteria</option>
                    <option value="library">Library</option>
                    <option value="research_building">Research Building</option>
                    <option value="nana_araba_apt_hall">Nana Araba Apt Hall</option>
                    <option value="hostels">Hostels</option>
                    <option value="other">Other</option>
                </select>
                <input type="text" id="custom-location" name="custom-location" placeholder="Enter custom location" style="display: none;">
                <button type="submit" class="search-btn"><i class='bx bx-search'></i></button>

                <!-- Sorting Options -->
                <label for="sort-by">Sort By:</label>
                <select name="sort-by">
                    <option value="time_desc">Time (Newest First)</option>
                    <option value="time_asc">Time (Oldest First)</option>
                    <option value="name_asc">Name (A-Z)</option>
                    <option value="name_desc">Name (Z-A)</option>
                </select>

                <button type="button" id="apply-filters">Apply Filters & Sort</button>
            </form>

            <div class="items">

                <div class="lost">
                    <?php
                    include "../actions/retrieve_item_lost.php";
                    ?>
                </div>
            </div>

            <!-- NEXT AND PREVIOUS BUTTON -->
            <div class="pages">
                <button id="prev-btn">Previous</button>
                <button id="next-btn">Next</button>
            </div>

        </div>
    </div>

    <script>
function toggleCustomLocationInput() {
    var locationSelect = document.getElementById("location-select");
    var customLocationInput = document.getElementById("custom-location-input");
    if (locationSelect.value === "other") {
        customLocationInput.style.display = "block";
    } else {
        customLocationInput.style.display = "none";
    }
}
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
            sidebarToggle.style.left = "10px";
        } else {
            sidebar.style.left = "0px";
           content.classList.add("shifted-content");
            sidebar.classList.add("shifted-sidebar");
            sidebarToggle.classList.add("shifted-sidebar");
            sidebarToggle.style.left = "220px";
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
            if (menuItemURL && menuItemURL.includes(relativePath)) {
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

        var currentPage = 1;

        function loadNextPage() {
            currentPage++;
            loadData(currentPage);
        }

        function loadPreviousPage() {
            if (currentPage > 1) {
                currentPage--;
                loadData(currentPage);
            }
        }

        function loadData(page) {
            var form = document.getElementById('filterForm');
            var formData = new FormData(form);
            formData.append('page', page);

            var xhr = new XMLHttpRequest();
            xhr.open("GET", "../actions/retrieve_item_lost.php?" + new URLSearchParams(formData).toString(), true);
            console.log('Ready state:', xhr.readyState);
            xhr.onreadystatechange = function () {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    console.log("girl");
                    console.log(xhr.responseText);
                    
                    var itemsContainer = document.querySelector(".lost");
                    itemsContainer.innerHTML = "";
                    var items = JSON.parse(xhr.responseText);
                    items.forEach(function (item) {
                        var itemHTML = '<div class="item">' +
                            '<img src="' + item.image_id + '" alt="" class="image">' +
                            '<h3><a href="../view/items_details_lost.php?itemid=' + item.itemid + '">' + item.item_name + '</a></h3>' +
                            '<p>' + item.description + '</p>' +
                            '<p>' + item.interaction_time + '</p>'
                        '</div>';
                        itemsContainer.innerHTML += itemHTML;
                    });
                }
            };
            xhr.send();
        }

        document.getElementById('apply-filters').addEventListener('click', function () {
            currentPage = 1;
            loadData(currentPage);
        });

         loadData(currentPage);
    </script>

</body>

</html>
