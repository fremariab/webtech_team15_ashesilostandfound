<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard</title>
    <link rel="stylesheet" href="../css/dash_style.css">


</head>
<body>
    <div class = "dashboard-container">
        <aside class = "sidebar">
            <div class = "sidebar-logo">
                <img id = "Logo" src = "Ashesi-logo.png">
            </div>
            <div class="sidebar-top">
                <a href="Submission.html"> Dashboard</a>
                <a href="Submission.html"> Show all lost items</a>
                <a href="Submission.html"> Show found items</a>
                <a href="Submission.html"> Change status</a>
            </div>
            
            <div class="sidebar-bottom">
                <hr>
                <a href="Submission.html"> Profile</a>
                <a href="Submission.html"> Logout</a>
            </div>

        </aside>

        <main class = "main-content">
            <header class = "header">
                <h1>Dashboard</h1>
                <p>Admin Name</p>
            </header>

            <div class="subheader">
                <div class="left">
                    <text>
                        <a href="#">Dashboard ></a> <a href="#">Home</a>
                    </text>
                </div>

            </div>

            <section class = "stats">
                <div class = "box">
                    <h3> 1020</h3>
                    <p>Found Items</p>
                </div>
                <div class = "box">
                    <h3>1020</h3>
                    <p>Lost Items</p>
                </div>
                <div class = "box">
                    <h3>1020</h3>
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
                        <tr>
                            <td>John Doe</td>
                            <td>01-03-2024</td>
                            <td>Reported a lost item</td>
                        </tr>
                    </tbody>
            </section>
            
        </main>

       
    
    </div>
    
</body>