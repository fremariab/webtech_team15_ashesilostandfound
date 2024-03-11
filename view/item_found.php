<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/item_details.css">
    <link rel="stylesheet" href="../css/user_dash_style.css">
    <title>Found Items</title>
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

</style>

<body>
    <div class="overall">
        <div class="side-menu">
            <h2>Menu</h2>
            <p>The things on the menu go here.</p>
        </div>

        <div class="items">
            <h2>Items Found</h2>

            <div class="search-bar">
                <input type="text" placeholder="Search" style="float: right;">
            </div>

            <span>Items per page: 10</span>

            <form action="search_results.php" method="GET">
                <!-- Filtering Options -->
                <label for="item_type">Item Type:</label>
                <select name="item_type">
                    <option value="">All</option>
                    <option value="electronics">Electronics</option>
                    <option value="clothing">Clothing</option>
                    <option value="books">Books</option>
                </select>

                <label for="location">Location:</label>
                <select name="location">
                    <option value="">All</option>
                    <option value="Cafetaria">Cafetaria</option>
                    <option value="Library">Library</option>
                    <option value="RB">Research Building</option>
                    <option value="NAAH">Nana Araba Apt Hall</option>
                    <option value="Hostels">Hostels</option>
                </select>

                <!-- Sorting Options -->
                <label for="sort-by">Sort By:</label>
                <select name="sort-by">
                    <option value="time_asc">Time (Oldest First)</option>
                    <option value="time_desc">Time (Newest First)</option>
                    <option value="name_asc">Name (A-Z)</option>
                    <option value="name_desc">Name (Z-A)</option>
                </select>

                <!-- Apply Button -->
                <button type="submit" name="apply_filters">Apply Filters & Sort</button>
            </form>

            <div class="items">

            <div class="lost">
                <?php
                
                include "../actions/retrieve_item_found.php";

                
                $foundItems = getFoundItems($conn);

                
                if (!empty($foundItems)) {
                    
                    foreach ($foundItems as $item) {
                ?>
                        <div class="item">
                           
                            <img src="<?php echo $item['image_id']; ?>" alt="" class="image">

                            <!-- Link to redirect to the full page with description -->
                            <h3><a href="item_detail?item_id=<?php echo $item['itemid']; ?>"><?php echo $item['item_name']; ?></a></h3>
                            <p><?php echo $item['description']; ?></p>
                        </div>
                <?php
                    }
                } else {
                   
                    echo "<p>No items found.</p>";
                }
                ?>
            </div>
            </div>

             <!-- NEXT AND PREVIOUS BUTTON -->
            <div class="pages">
                <button id="prev-btn" onclick="loadPreviousPage()">Previous</button>
                <button id="next-btn" onclick="loadNextPage()">Next</button>
            </div>
        
        </div>
    </div>


    <script>

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
        var xhr = new XMLHttpRequest();
        xhr.open("GET", "../actions/retrieve_item_found.php?page=" + page, true); 
        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4 && xhr.status === 200) {
                var itemsContainer = document.querySelector(".lost");
                itemsContainer.innerHTML = ""; 
                var items = JSON.parse(xhr.responseText); 
                items.forEach(function(item) {
                    
                    var itemHTML = '<div class="item">' +
                        '<img src="' + item.image_id + '" alt="" class="image">' +
                        '<h3>' + item.item_name + '</h3>' +
                        '<p>' + item.description + '</p>' +
                        '</div>';
                    itemsContainer.innerHTML += itemHTML;
                });
            }
        };
        xhr.send();
    }

 
    loadData(currentPage);
</script>



</body>

</html>
