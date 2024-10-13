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

    <section class="projects">
        <h2>PROJECTS</h2>
        <div class="project-container">
            <div class="project-card">
                <h3>Amazon-eBay Price Comparison</h3>
                <p>- <b>Languages:</b> Python</p>
                <p>- Crawls through Amazon and eBay and returns product information sorted by price in a csv file.</p>
                <p>- <b>Status:</b><i> Completed.</i></p>
            </div>
            <div class="project-card">
                <h3>Problematic Chronicles</h3>
                <p>- <b>Languages:</b> Python (Pygame)</p>
                <p>- A mathematics-based, top-down shooter that revolves around the user answering maths questions to
                    progress.</p>
                </p>
                <p><b>Status:</b><i> Completed</i></p>
            </div>
            <div class="project-card">
                <h3>In progress...</h3>
            </div>
            <div class="project-card">
                <h3>In progress...</h3>
            </div>
        </div>
    </section>
    
    <footer>
        <p>© 2023 Falak Sheikh Mohammad</p>
    </footer>
</body>
</html>