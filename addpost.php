<?php
    session_start();
    if (!isset($_SESSION['firstName'])) {
        header('Location: login.php');
    }
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
<script src="js/addpost.js" defer></script>
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

    <div id="previewOverlay" class="overlay">
        <div class="blog-container">
            <div class="blog-section">
                <h2>Blog</h2><hr>
                <div class="blog-card">
                    <div id='date'>
                        <?php
                        date_default_timezone_set('UTC');
                        echo date('jS F Y, H:i', strtotime("+1 hour")). ' UTC';
                        ?>
                    </div>
                    <h3 id="previewTitle"></h3>
                    <p id="previewContent"></p>
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

                    foreach ($rows as $row) {
                        echo "<div class='blog-card'>
                        <div id='date'>" . $row['date_created'] . "</div>
                        <h3>" . $row['title'] . "</h3>
                        <p>" . $row['content'] . "</p>
                        </div>";
                    }
                } 
                $conn->close();
                ?>
                <div class="addPost">
                    <button id="confirm" type="button" class="addPost-button">Confirm <br> Preview</button>
                    <button id="cancel" type="button" class="addPost-button">Cancel <br> Preview</button>
                </div>
            </div>
        </div>
    </div>

    <form class="addBlog" id="addBlog" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
        <fieldset>
            <legend>Add Blog</legend>
            <input type="text" id="title" name="title" placeholder="Title"><br>
            <br>
            <textarea id="content" name="content" placeholder="Enter your text here"></textarea><br>
            <br>
            <input class="addPost-button" type="submit" value="Post">
            <button class="addPost-button" id="preview" type="button">Preview</button>
            <input class="addPost-button" id="clear" type="reset" value="Clear">
        </fieldset>
    </form>

    <?php
        $servername = "127.0.0.1";
        $username = "root";
        $password = "";
        $dbname = "ecs417";
        // Creates connection
        $conn = new mysqli($servername, $username, $password, $dbname);
        // Checks connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        date_default_timezone_set('UTC');

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $title = $_POST['title'];
            $content = $_POST['content'];
            $date = date('jS F Y, H:i', strtotime("+1 hour")). ' UTC';
            $sql = "INSERT INTO blog (title, content, date_created) VALUES ('$title', '$content', '$date')";
            $conn->query($sql);
            header('Location: blog.php');
        }
        $conn->close();
    ?>
    
    <footer>
        <p>© 2023 Falak Sheikh Mohammad</p>
    </footer>
</body>
</html>