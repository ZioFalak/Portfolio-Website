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

    <section class="profile">
        <h2>PROFILE</h2>
        <div class="profile-container">
            <div class="profile-card" id="education">
                <aside class="skills">
                    <h3>Skills</h3>
                    <ul>
                        <li>Java</li>
                        <li>Python</li>
                        <li>HTML/CSS</li>
                    </ul>
                </aside>
                <div class="content">
                    <h3>Education</h3>
                    <p><b>Queen Mary, University of London.</b></p>
                    <li><b>2023-2026:</b> BSc Computer Science, Queen Mary University of London.</li>
                    <p><b>Loxford School, Sixth Form</b></p>
                    <li><b>2021-2023:</b> A-Levels: Mathematics, Further Maths, Computer Science.</li>
                    <li><b>A*, A, B</b></li>
                    <p><b>Loxford School</b></p>
                    <li><b>2016-2021:</b> GCSEs: Grade 9-6</li>
                </div>
            </div>
            <div class="profile-card" id="experience">
                <div class="content">
                    <h3>Experience & Qualifications</h3>
                    <p>Moreton Bay Regional Council: Web Development Job Simulation on Forage.</p>
                    <p><b>Achievements:</b></p>
                    <ul>
                        <li>Completed a job simulation involving website planning and creation</li>
                        <li>Created a sitemap and userflow using a diagram creation tool.</li>
                        <li>Used HTML & CSS to create a landing page.</li><br>
                    </ul>
                </div>
                <div class="content">
                    <p></p>
                </div>
            </div>
        </div>
    </section>

    <footer>
        <p>© 2023 Falak Sheikh Mohammad</p>
    </footer>
</body>
</html>