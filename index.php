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

    <div class="landing">
        <section class="wrapper">
            <aside class="icons">
                <span><a href="https://github.com/ZioFalak"><img src="image/github-logo.svg" alt=""></a></span>
                <p>Github</p>
                <span><a href="https://www.linkedin.com/in/falaksheikhmohammad/"><img src="image/linkedin-logo.svg" alt=""></a></span>
                <p>LinkedIn</p>
                <span><a href="mailto:falak16sm@gmail.com"><img src="image/email-logo.svg" alt=""></a></span>
                <p>falak16sm@gmail.com</p>
            </aside>
            <div>
                <h2 id="title">Welcome to my website. :)</h2>
                <br>
                <div id="loginButton">
                    <a class="button" href="login.php">Login</a>
                </div>
            </div>
        </section>
    </div>

    <section id="about">
        <article class="about">
            <figure>
                <img src="image/falak.jpg" alt="Falak Sheikh Mohammad">
                <figcaption>Aspiring Full-Stack Developer</figcaption>
            </figure>
            <div>
                <h2>About</h2><hr>
                <h3><i>Computer Science undergraduate student at Queen Mary, University of London</i></h3>
                <p>Hello! I'm Falak, a driven computer science student passionate about mastering full-stack development. 
                What excites me most about full-stack development is the ability to see a project through from conception to execution.
                With a blend of creativity and problem-solving skills, I'm dedicated to build functional solutions to real-world problems.
            </p>
            </div>
        </article>
    </section>
    
    <footer>
        <p>© 2023 Falak Sheikh Mohammad</p>
    </footer>
</body>
</html>