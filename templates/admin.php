<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        @import url("https://fonts.googleapis.com/css2?family=Lato:wght@300;400&display=swap");

        *,
        ::after,
        ::before {
            margin: 0;
            box-sizing: border-box;
        }

        body {
            font-family: "Lato", sans-serif;
        }

        :root {
            --bg-color: #000811;
            --primary-color: #006ce0;
            --border-radius: 6px;
            --color: #2b82df;
            /* --box-shadow: #0b488a 5px 0px 50px 0px; */
        }

        .sidebar {
            height: 100vh;
            position: fixed;
            top: 0;
            left: 0;
            width: 300px;
            background: var(--bg-color);
            transition: left 0.5s ease;
            -webkit-transition: left 0.5s ease;
            -moz-transition: left 0.5s ease;
            -ms-transition: left 0.5s ease;
            -o-transition: left 0.5s ease;
        }

        .sidebar ul {
            list-style: none;
            margin-top: 5rem;
            height: 100%;
        }

        .sidebar ul li {
            margin-top: 1rem;
            padding: 0.3rem;
            width: 100%;
            display: flex;
            align-items: center;
            position: relative;
        }

        .sidebar ul li.active {
            background: var(--primary-color);
            border-bottom-left-radius: var(--border-radius);
            border-top-left-radius: var(--border-radius);
            transition: background 0.5s linear;
            box-shadow: rgba(20, 114, 238, 0.918) 0px 2px 10px 0px;
        }

        .sidebar li .icon {
            margin-right: 1rem;
            padding: 0.5rem;
        }

        .sidebar li a {
            text-decoration: none;
            font-size: 1.3rem;
            color: white;
            display: flex;
            align-items: center;
        }

        .sidebar li a:hover {
            margin-left: 2px;
        }

        .close-icon {
            color: white;
            position: absolute;
            top: 0;
            right: 0;
            font-size: 2.2rem;
            margin: 1rem;
            cursor: pointer;
        }

        .hamburger-menu {
            position: absolute;
            top: 0;
            right: 0;
            margin: 1rem;
            font-size: 3rem;
            color: #006ce0;
            cursor: pointer;
        }

        body .toggle.sidebar {
            left: -300px;
        }

        body.toggle.section {
            margin-left: 0;
            width: 100%;
        }
    </style>
    <script type="module" src="https://cdn.jsdelivr.net/npm/@ionic/core/dist/ionic/ionic.esm.js"></script>
    <script nomodule src="https://cdn.jsdelivr.net/npm/@ionic/core/dist/ionic/ionic.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@ionic/core/css/ionic.bundle.css"/>
</head>
<body>
<menu>
    <div class="hamburger-menu">
        <ion-icon name="menu-outline" id="hamburger-icon"></ion-icon>
    </div>
    <div class="sidebar" id="sidebars">
        <div class="close-icon" id="close" onclick="closeNav() ">
            <ion-icon name="close-outline"></ion-icon>
        </div>

        <ul class="links">
            <li class="link active">
                <a href="#">
                    <ion-icon name="home-outline" class="icon"></ion-icon>
                    Home
                </a>
            </li>
            <li class="link">
                <a href="./users.php">
                    <ion-icon name="analytics-outline" class="icon"></ion-icon>
                    Users
                </a>
            </li>
            <li class="link">
                <a href="#">
                    <ion-icon name="eye-outline" class="icon"></ion-icon>
                    Overview
                </a>
            </li>
            <li class="link">
                <a href="#">
                    <ion-icon name="person-outline" class="icon"></ion-icon>
                    About
                </a>
            </li>
            <li class="link">
                <a href="#">
                    <ion-icon name="mail-outline" class="icon"></ion-icon>
                    Contact
                </a>
            </li>
            <li class="link">
                <a href="#">
                    <ion-icon name="key-outline" class="icon"></ion-icon>
                    Account
                </a>
            </li>
            <li class="link">
                <a href="#">
                    <ion-icon name="settings-outline" class="icon"></ion-icon>
                    Setting
                </a>
            </li>
        </ul>
    </div>
</menu>
<script>
    const hamburgerMenu = document.getElementById("hamburger-icon");
    const link = document.querySelectorAll(".link");
    const closeBtn = document.getElementById("close");

    for (let i = 0; i < link.length; i++) {
        link[i].addEventListener("click", function () {
            var current = document.getElementsByClassName("active");
            current[0].className = current[0].className.replace(" active", "");
            this.className += " active";
        });
    }

    // Menu
    hamburgerMenu.addEventListener("click", function () {
        const sidebar = document.getElementById("sidebars");
        sidebar.classList.toggle("toggle");
    });

    //   close icon
    function closeNav() {
        const sidebar = document.getElementById("sidebars");
        sidebar.classList.toggle("toggle");
    }

</script>
</body>
</html>