<?php
    session_start();
?>
<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
<title>Portfolio</title>
<link rel='stylesheet' href='css/reset.css'>
<link rel='stylesheet' href='css/index.css'/>
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
        
        $error = "";
        $error_status = false;
        
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $email = $_POST['email'];
            $password = $_POST['password'];
            $sql = "SELECT * FROM users WHERE email='$email' AND password='$password'";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                $_SESSION['firstName'] = $result->fetch_assoc()['firstName'];
            } else {
                $error_status = true;
                $error = "Invalid email or password";
            }
        }
        $conn->close();
    ?>

    <?php
        if (isset($_SESSION['firstName'])) {
            echo "<div class='welcome'>
            <h2>Welcome, " . $_SESSION['firstName'] . "!</h2><br>
                <div class='buttons'>
                    <a class='button' href='addpost.php'>Continue</a>
                    <a class='button' href='logout.php'>Logout</a>
                </div>
            </div><br>";
        } else {
            echo "<form class='login' action='" . $_SERVER['PHP_SELF'] . "' method='post'>
            <fieldset>
                <legend>Login</legend>
                <label for='email'>Email:</label><br>
                <input type='email' id='email' name='email' placeholder='johndoe@example.com' required><br>
                <br>
                <label for='password'>Password:</label><br>
                <input type='password' id='password' name='password' required><br>
                <br> ";
                if ($error_status) {
                    echo "<p id='error'>$error</p>";
                } 
            echo "<input type='submit' value='Login'>
                </fieldset>
            </form>";
        }
    ?>

    <footer>
        <p>© 2023 Falak Sheikh Mohammad</p>
    </footer>
</body>
</html>