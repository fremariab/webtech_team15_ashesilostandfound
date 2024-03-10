<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Boxicons -->
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <!-- My CSS -->
    <link rel="stylesheet" href="../css/user_dash_style.css">

    <title>User Dashboard</title>
</head>
<style>

    /* Previous and Next Buttons */
#content main .pagination {
    position: relative;
    margin-top: 24px;
    display: flex;
    justify-content: space-between;
}

#content main .pagination button {
    padding: 10px 20px;
    border-radius: 10px;
    background: var(--blue);
    color: var(--light);
    border: none;
    cursor: pointer;
    transition: background 0.3s ease;
}

#content main .pagination button:hover {
    background: var(--light-orange);
}

#content main #prev-btn {
    position: absolute;
    left: 0;
}

#content main #next-btn {
    position: absolute;
    right: 0;
}

</style>

<body>
    <section id="sidebar">
        <a href="../view/user_dash.php" class="brand">
            <img src="../images/logo.png" height="64px" alt="">
        </a>
        <ul class="side-menu top">
            <li class="active">
                <a href="#">
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
                <a href="../view/items_details.php">
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
    </section>
    <!-- SIDEBAR -->

    <!-- CONTENT -->
    <section id="content">
        <!-- NAVBAR -->
        <nav>

            <form action="../actions/main_search.php" method="GET">
                <div class="form-input">
                    <input type="search" name="keyword" placeholder="Search...">
                    <button type="submit" class="search-btn"><i class='bx bx-search'></i></button>
                </div>
            </form>

            <a href="#" class="notification">
                <i class='bx bxs-bell'></i>
                <span class="num">8</span>
            </a>
            <a href="#" class="profile">
                <img src="img/people.png">
            </a>
        </nav>
        <!-- NAVBAR -->

        <!-- MAIN -->
        <main>
            <div class="head-title">
                <div class="left">
                    <h1 style="color:#1C402E;">Dashboard</h1>
                    <ul class="breadcrumb">
                        <li>
                            <a href="#">Dashboard</a>
                        </li>
                        <li><i class='bx bx-chevron-right' style="color:#1C402E;"></i></li>
                        <li>
                            <a class="active" href="#">Home</a>
                        </li>
                    </ul>
                </div>

            </div>

            <ul class="box-info">
                <li>
                    <i class='bx bxs-calendar-check'></i>
                    <span class="text">
                        <h3 id="found-items-count"></h3>
                        <p>Found Items</p>
                    </span>
                </li>
                <li>
                    <i class='bx bxs-group'></i>
                    <span class="text">
                        <h3 id= "lost-items-count"> </h3>
                        <p>Lost Items</p>
                    </span>
                </li>
                <li>
                    <i class='bx bxs-check'></i>
                    <span class="text">
                        <h3  id= "claimed-items-count"></h3>
                        <p>Claimed Items</p>
                    </span>
                </li>
            </ul>

            <div class="table-data">
                <div class="order">
                    <div class="head">
                        <h3>Recent Activities</h3>
                        <i class='bx bx-search'></i>
                        <i class='bx bx-filter'></i>
                    </div>
                    <table>
                        <thead>
                            <tr>
                                <th>User</th>
                                <th>Date</th>
                                <th>Activity</th>
                            </tr>
                        </thead>
                        <tbody id="activity-table-body">
                            <?php include "../actions/user_dash_activities.php"; ?>
                            <!-- <tr>
                                <td>
                                    <img src="img/people.png">
                                    <p>John Doe</p>
                                </td>
                                <td>01-10-2021</td>
                                <td>Reported a lost item</td>
                            </tr>
                            <tr>
                                <td>
                                    <img src="img/people.png">
                                    <p>John Doe</p>
                                </td>
                                <td>01-10-2021</td>
                                <td>Found a lost item</td>
                            </tr>
                            <tr>
                                <td>
                                    <img src="img/people.png">
                                    <p>John Doe</p>
                                </td>
                                <td>01-10-2021</td>
                                <td>Claimed a found item</td>
                            </tr> -->
                        </tbody>


                    
                    </table>
                    <!-- NEXT AND PREVIOUS BUTTON -->
                    <div class="pagination">
                        <button id="prev-btn" onclick="loadPreviousPage()">Previous</button>
                        <button id="next-btn" onclick="loadNextPage()">Next</button>
                    </div>

                </div>

            </div>
        </main>
        <!-- MAIN -->
    </section>
    <!-- CONTENT -->


    <script src="../js/user_dash_script.js"></script>

    <script>
        
        
        var xhr = new XMLHttpRequest();
        xhr.open("GET", "../actions/user_dash_stats.php", true);
        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4 && xhr.status === 200) {
                console.log("Yes")
                var statistics = JSON.parse(xhr.responseText);
                console.log("Statistics:", statistics); 
                
                document.getElementById("found-items-count").textContent = statistics.found_items;
                document.getElementById("lost-items-count").textContent = statistics.lost_items;
        document.getElementById("claimed-items-count").textContent = statistics.claimed_items;
            }
        };
        xhr.send();

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
            xhr.open("GET", "../actions/user_dash_activities.php?page=" + page, true);
            xhr.onreadystatechange = function () {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    var tableBody = document.getElementById("activity-table-body");
                    tableBody.innerHTML = xhr.responseText; 
                }
            };
            xhr.send();
        }


                
    </script>
</body>

</html>