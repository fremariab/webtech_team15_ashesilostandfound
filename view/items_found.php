<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Found Items</title>
    <!--    <style>
        body{
            font-family: Arial, sans-serif;
            font-size: 16px;
        }

        .menubar{
            position: fixed;
            width: 24%;
            background: #1C402E;
            height: 100vh;
            font-size: 0.65em;
        }
        .navbar{
            position: relative;
            margin: 0 15%;
            text-align: center;
            top: 50%;
            transform: translateY(-50%);
        }
        .navbar ul{
            list-style: none;
        }

        li{
            position: relative;
            margin: 3.2em 0;
        }

        a{
            line-height: 5em;
            text-decoration: none;
            letter-spacing: 1px;
            color: rgba(#ffffff, #ffffff, #ffffff, 0.35);
            display: block;
            transition: all ease-out 300ms;

        }

        hr{
            color: #ffffff;
        }

        &.active a{
            color: #ffffff;
        }

        &:not(.active):hover a{
            color: rgba(#ffffff, #ffffff, #ffffff, 0.75);
        }

        &::after{
            content: '';
            position: absolute;
            width: 100%;
            height: 0.2em;
            background: black;
            left: 0;
            bottom: 0;
        }

        .found{
            position: relative;
            width: 75%;
            float: right;
            height: 100vh;
        }

        .search-bar{
            padding-top: 36px;
        }

        .search-bar input{
            width: 100%;
            padding: 12px 24px;
            float: right;

            background-color: transparent;
            transition: transform 250ms ease-in-out;
            font-size: 14px;
            line-height: 18px;

            color: rgb(91, 74, 74);
            background-repeat: no-repeat;
        background-size: 18px 18px;
        background-position: 95% center;
        border-radius: 50px;
        border: 1px solid #575756;
        transition: all 250ms ease-in-out;
        backface-visibility: hidden;
        transform-style: preserve-3d;
        }
        
        &::placeholder {
            color: color(#575756 a(0.8));
            text-transform: uppercase;
            letter-spacing: 1.5px;
        }
        
        &:hover,
        &:focus {
            padding: 12px 0;
            outline: 0;
            border: 1px solid transparent;
            border-bottom: 1px solid #575756;
            border-radius: 0;
            background-position: 100% center;
        
        }



    </style> <!-->
</head>
<body>

    <!--The found items are items a person chanced upon just lying there  without the owner reported as found.-->
    <!-----Things the page will need
      1. search bar
      2. menu
      3. gotta make this page accessible to people that have lost items
      4. filtering the tags 
      5. items found
      6. how to register an item as yours?
        ------>
    <!--main content of the page
    <main>
        <aside class="menubar">
            <nav class="navbar">
                <ul>
                    <li> <a href="">Logo</a></li>
                    <li><a href= "">Dashboard</a></li>
                    <li><a href="">Lost Items</a></li>
                    <li><a href="">Found Items</a></li>
                    <li><a href="">Report an Item</a></li>
                    <br><br><br><br><br><br>
                    <hr>
                    <li><a href="">Help & FAQs</a></li>
                    <li><a href="">Log out</a></li>

                </ul>
            </nav>
        </aside>

        <!--The found items -->
        <section class="found">
            <div class="container">
                <!--Place a search icon in the bar if you can or just do the side-->
          <div class="search-bar">
            <input type="text" placeholder="Search">
        </div>

        <div class="items">
            <h2>Items Found</h2> <!--Center align it-->

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
                    <h3>Name</h3>  <!--There should be a link to redirect to the full page with description-->
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
                </div><div class="item">
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
                </div><div class="item">
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
                </div><div class="item">
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
                </div><div class="item">
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
        </section>

    </main> -->
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
              <h2>Items Found</h2> <!--Center align it-->
  
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
                      <h3>Name</h3>  <!--There should be a link to redirect to the full page with description-->
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
                  </div><div class="item">
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
                  </div><div class="item">
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
                  </div><div class="item">
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
                  </div><div class="item">
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
