<?php
//if ($_SERVER["REQUEST_METHOD"] == "POST") {
//    header('location: templates/result.php');
//}
//?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Viruschecker</title>
    <link rel="stylesheet" href="./templates/styles/index.css">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script>

    </script>
</head>
<body>
<!--Main Navigation-->
<header>
    <nav class="navbar navbar-expand-lg bg-light">
        <!-- Navbar content -->
        <a class="navbar-brand" href="index.php">
            <img src="./templates/images/key.png" width="30" height="30" alt="">
            Viruscheck
        </a>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="/templates/about.php">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/templates/faq.php">FAQ</a>
                </li>
            </ul>
        </div>
        <a href="templates/login.php">
            <button class="btn btn-outline-info" id="login" type="button">Login</button>
        </a>
    </nav>
</header>

<!--Main Navigation-->
<main>
    <form action="" method="post" name="upload_form">
        <input class="form-control" name="scan_file" id="scan_file" onchange="getData()" type="file" id="formFile">
        <input class="form-control" name="apiKey" type="hidden">
        <input class="form-control" name="task_type" type="hidden">
        <input class="form-control" name="engines" type="hidden">
        <input class="form-control" name="response_type" type="hidden">

        <button type="submit" class="btn btn-primary" id="btn-scan">
            Scan File
        </button>
        <div class="wrapper">
            <img src="./templates/images/cloud.png" alt="upload-image">
            <h1 onclick="uploadFile()">Scan A File</h1>
            <p>Select your file in order to scan your file with over 26 anti-viruses.</p>
        </div>
    </form>
</main>

<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2"
        crossorigin="anonymous"></script>
<script src="templates/scripts/file_upload_animation.js"></script>
<script src="templates/scripts/avcheck.js"></script>
</body>
</html>