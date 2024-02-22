<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Items Details</title>
    <link rel="stylesheet" href="../items_display_style.css">
</head>

<body>
    <!--The items details page is for the lost items I guess. The owners post their pictures of the lost items with description and where it got 
    lost maybe if they remember. Someone chances upon it and report to the website and thence the claiming process begins.-->


    <!-------------Things this page will need-------------->
    <!--
        1. menu
        2. search bar to browse lost items
        3. image of the item iconised to be enlarged to display more details
        4. The description, tags to categorise the lost items 

    -->
    <div class="overall">
        <div class="side-menu">
            <h2>Menu</h2>
            <p>The things on the menu go here.</p>
        </div>

        <!--Place a search icon in the bar if you can or just do the side-->
        <div class="search-bar">
            <input type="text" placeholder="Search">
        </div>

        <div class="items">
            <h2>All Lost Items</h2> <!--Center align it-->

            <!--<div> --->
            <label for="sort-by">Sort By:</label>
            <select id="sort-by">
                <option value="name">Name</option>
                <option value="price">Price</option>
            </select>
            <!---</div>---->
            <span>Items per page: 15</span> <!---Align this to the right-->

            <div class="lost">
                <div class="item">
                    <img src="pic.png" alt="" class="image">
                    <h3>Name</h3>
                    <p>Replace with tags</p>
                </div>
                <div class="item">
                    <img src="" alt="" class="image">
                    <h3>Name</h3>
                    <p>Replace with tags</p>
                </div>
                <div class="item">
                    <img src="" alt="" class="image">
                    <h3>Name</h3>
                    <p>Replace with tags</p>
                </div>
                <div class="item">
                    <img src="pic.png" alt="" class="image">
                    <h3>Name</h3>
                    <p>Replace with tags</p>
                </div>
                <div class="item">
                    <img src="" alt="" class="image">
                    <h3>Name</h3>
                    <p>Replace with tags</p>
                </div>
                <div class="item">
                    <img src="" alt="" class="image">
                    <h3>Name</h3>
                    <p>Replace with tags</p>
                </div>
                <div class="item">
                    <img src="pic.png" alt="" class="image">
                    <h3>Name</h3>
                    <p>Replace with tags</p>
                </div>
                <div class="item">
                    <img src="" alt="" class="image">
                    <h3>Name</h3>
                    <p>Replace with tags</p>
                </div>
                <div class="item">
                    <img src="" alt="" class="image">
                    <h3>Name</h3>
                    <p>Replace with tags</p>
                </div>
                <div class="item">
                    <img src="pic.png" alt="" class="image">
                    <h3>Name</h3>
                    <p>Replace with tags</p>
                </div>
                <div class="item">
                    <img src="" alt="" class="image">
                    <h3>Name</h3>
                    <p>Replace with tags</p>
                </div>
                <div class="item">
                    <img src="" alt="" class="image">
                    <h3>Name</h3>
                    <p>Replace with tags</p>
                </div>
                <div class="item">
                    <img src="pic.png" alt="" class="image">
                    <h3>Name</h3>
                    <p>Replace with tags</p>
                </div>
                <div class="item">
                    <img src="" alt="" class="image">
                    <h3>Name</h3>
                    <p>Replace with tags</p>
                </div>
                <div class="item">
                    <img src="" alt="" class="image">
                    <h3>Name</h3>
                    <p>Replace with tags</p>
                </div>
            </div>

            <div class="pagination">
                <a href="#">&laquo;</a>
                <a href="#">1</a>
                <a class="active" href="#">2</a>
                <a href="#">3</a>
                <a href="#">4</a>
                <a href="#">5</a>
                <a href="#">6</a>
                <a href="#">&raquo;</a>
            </div>


        </div>

    </div>
</body>

</html>