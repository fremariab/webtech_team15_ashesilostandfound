<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard</title>
    <link rel="stylesheet" href="../css/admin_dash_style.css">


</head>
<body>
    <div class = "dashboard-container">
        <aside class = "sidebar">
            <div class = "sidebar-logo">
                <img id = "Logo" src = "../images/logo.png" height="64px" > 
            </div>
            <div class="sidebar-top">
                <a href="founditem_reporting_page.php"> Dashboard</a>
                <a href="founditem_reporting_page.php"> Show all lost items</a>
                <a href="founditem_reporting_page.php"> Show found items</a>
                <a href="founditem_reporting_page.php"> Change status</a>
            </div>
            
            <div class="sidebar-bottom">
                <hr>
                <a href="founditem_reporting_page.php"> Profile</a>
                <a href="founditem_reporting_page.php"> Logout</a>
            </div>

        </aside>

        <main class = "main-content">
            <header class = "header">
                <h1>Dashboard</h1>
                <p>Admin Name</p>
            </header>

            <section class = "stats">
                <div class = "box">
                <h3 id="found-items-count"></h3>
                    <p>Found Items</p>
                </div>
                <div class = "box">
                <h3 id="lost-items-count"> </h3>
                    <p>Lost Items</p>
                </div>
                <div class = "box">
                <h3 id="claimed-items-count"></h3>
                    <p>Claimed Items</p>
                </div>
            </section>
            

            <section class="recent-activities">
                <h2>Recent Activities</h2>
                <table>
                    <thead>
                         <tr>
                            <th>User</th>
                            <th>Date</th>
                            <th>Activity</th>
                        </tr>
                    </thead>
                    <tbody>
                    <tbody id="activity-table-body">
                            <?php include "../actions/admin_dash_activities.php"; ?>
                    </tbody>
</table>
<div class="pagination">
                        <button id="prev-btn" onclick="loadPreviousPage()">Previous</button>
                        <button id="next-btn" onclick="loadNextPage()">Next</button>
                    </div>
            </section>
            
        </main>

       
    
    </div>
    
    <script src="../js/admin_dash_script.js"></script>

    <script>
        var xhr = new XMLHttpRequest();
        xhr.open("GET", "../actions/admin_dash_stats.php", true);
        xhr.onreadystatechange = function() {
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
            xhr.open("GET", "../actions/admin_dash_activities.php?page=" + page, true);
            xhr.onreadystatechange = function() {
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