<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Portfolio</title>
<link rel="stylesheet" href="css/reset.css">
<link rel="stylesheet" href="css/index.css"/>
<link rel="stylesheet" href="css/mobile.css" media="screen and (max-width:768px)">
<script src="js/header.js" defer></script>
</head>
<body>
<header>
        <a href="index.php" id="logo">Falak Sheikh Mohammad.</a>
        <nav>
            <a class="hideNav" href="index.php">HOME</a>
            <a class="hideNav" href="index.php#about">ABOUT</a>
            <a class="hideNav" href="profile.php">PROFILE</a>
            <a class="hideNav" href="profile.php#experience">EXPERIENCE</a>
            <a class="hideNav" href="projects.php">PROJECTS</a>
            <a class="hideNav" href="blog.php">BLOG</a>
            <a class="menu-btn" onclick=showSidebar() href="#"><img src="image/menu.svg" alt=""></a>
        </nav>
        <nav class="sidebar">
            <a class="close" onclick=hideSidebar() href="#"><img src="image/x.svg" alt=""></a>
            <a href="index.php">HOME</a>
            <a href="index.php#about">ABOUT</a>
            <a href="profile.php">PROFILE</a>
            <a href="profile.php#experience">EXPERIENCE</a>
            <a href="projects.php">PROJECTS</a>
            <a href="blog.php">BLOG</a>
        </nav>
    </header>

    <div class="blog-container">
        <div class="blog-section">
            <h2>Blog</h2><hr>
            <div class="filterSect">
                <form class="filterForm" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="get">
                    <label>Select month:</label>
                    <select name="month" id="month">
                        <option value="">All Months</option>
                        <?php
                        for ($i = 1; $i <= 12; $i++) {
                            $month_name = date('F', mktime(0, 0, 0, $i, 1));
                            echo "<option value='$month_name'>$month_name</option>";
                        }
                        ?>
                    </select>
                    <input class="button" type="submit" value="Filter">
                </form>
            </div>
            <?php
                $servername = "127.0.0.1";
                $username = "root";
                $password = "";
                $dbname = "ecs417";

                $conn = new mysqli($servername, $username, $password, $dbname);

                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

                $sql = "SELECT * FROM blog";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    $rows = array();
                    while ($row = $result->fetch_assoc()) {
                        $rows[] = $row;
                    }

                    $size = count($rows);
                    for ($i = 0; $i < $size; $i++) {
                        for ($j = 0; $j < $size - 1 - $i; $j++) {
                            if (strtotime($rows[$j]['date_created']) < strtotime($rows[$j + 1]['date_created'])) {
                                $temp = $rows[$j];
                                $rows[$j] = $rows[$j + 1];
                                $rows[$j + 1] = $temp;
                            }
                        }
                    }

                    // Filter by month
                    // (not ai generated)

                    if (isset($_GET['month']) && $_GET['month'] != "") {
                        $filtered_rows = array();
                        foreach ($rows as $row) {
                            if (date('F', strtotime($row['date_created'])) == $_GET['month']) {
                                $filtered_rows[] = $row;
                            }
                        }
                        $rows = $filtered_rows;
                    }

                    // end of filter

                    if ($rows != null) {
                        foreach ($rows as $row) {
                            echo "<div class='blog-card'>
                            <div id='date'>" . $row['date_created'] . "</div>
                            <h3>" . $row['title'] . "</h3>
                            <p>" . $row['content'] . "</p>
                            </div>";
                        }
                    } else {
                        echo "<div class='blog-card'>
                        <h3 id='no-post'>No posts yet</h3>
                        </div>";
                    }
                } else {
                    echo "<div class='blog-card'>
                    <h3 id='no-post'>No posts yet</h3>
                    </div>";
                }
                $conn->close();
            ?>
        </div>
        <div class="addPost">
            <?php
                if (isset($_SESSION['firstName'])) {
                    echo "<a href='addpost.php'><img src='image/plus.svg' alt=''><p>Add Post</p></a>";
                } else {
                    echo "<a href='login.php'><img src='image/plus.svg' alt=''><p>Add Post</p></a>";
                }
            ?>
        </div>
    </div>
    
    <footer>
        <p>© 2023 Falak Sheikh Mohammad</p>
    </footer>
</body>
</html>