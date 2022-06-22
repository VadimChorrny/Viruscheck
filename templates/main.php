<?php
// Initialize the session
session_start();

// Check if the user is logged in, if not then redirect him to login page
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="styles/result.css">
    <script type="module" src="https://cdn.jsdelivr.net/npm/@ionic/core/dist/ionic/ionic.esm.js"></script>
    <script nomodule src="https://cdn.jsdelivr.net/npm/@ionic/core/dist/ionic/ionic.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@ionic/core/css/ionic.bundle.css" />
</head>
<body>
<header>
    <nav class="navbar navbar-expand-lg bg-light">
        <!-- Navbar content -->
        <a class="navbar-brand" href="../index.php">
            <img src="images/key.png" width="30" height="30" alt="">
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
        <a href="account.php" class="btn btn-outline-info mr-3 d-flex align-items-center">
            <ion-icon class="mr-1" name="briefcase-outline"></ion-icon>My Profile
        </a>
    </nav>
</header>

<h1 class="my-5 text-center">Hi, <b><?php echo htmlspecialchars($_SESSION["username"]); ?></b>. Welcome to our site.</h1>

<p style="display:flex; justify-content: center; align-items: center;">
    <button class="btn btn-success d-flex justify-content-center align-items-center" onclick="getResponse()">Show result after scanning...</button>
</p>

<main id="main"
      style="display:flex; justify-content: center; align-items: center; gap: 20%; margin-top: 5%; opacity: 0">
    <div class="leftColumn">
        <div class="leftBlock">
            <img src="images/icons/adaware.png">
            Ad-Aware Antivirus: <span id="adaware_result">Null</span>
        </div>
        <div class="leftBlock">
            <img src="images/icons/ahnlab.png">
            AhnLab V3 Internet Security: <span id="ahnlab_result">Null</span>
        </div>
        <div class="leftBlock">
            <img src="images/icons/alyac.png">
            Alyac Internet Security: <span id="alyac_result">Null</span>
        </div>
        <div class="leftBlock">
            <img src="images/icons/avast.png">
            Avast: <span id="avast_result">Null</span>
        </div>
        <div class="leftBlock">
            <img src="images/icons/avg.png">
            AVG: <span id="avg_result">Null</span>
        </div>
        <div class="leftBlock">
            <img src="images/icons/avira.png">
            Avira: <span id="avira_result">Null</span>
        </div>
        <div class="leftBlock">
            <img src="images/icons/bitdef.png">
            BitDefender: <span id="bitdef_result">Null</span>
        </div>
        <div class="leftBlock">
            <img src="images/icons/bullguard.png">
            BullGuard: <span id="bullguard_result">Null</span>
        </div>
        <div class="leftBlock">
            <img src="images/icons/clamav.png">
            ClamAV: <span id="clamav_result">Null</span>
        </div>
        <div class="leftBlock">
            <img src="images/icons/comodo.png">
            Comodo Antivirus: <span id="comodo_result">Null</span>
        </div>
        <div class="leftBlock">
            <img src="images/icons/drweb.png">
            DrWeb: <span id="drweb_result">Null</span>
        </div>
        <div class="leftBlock">
            <img src="images/icons/emsisoft.png">
            Emsisoft: <span id="emsisoft_result">Null</span>
        </div>
        <div class="leftBlock">
            <img src="images/icons/eset.png">
            Eset NOD32: <span id="eset_result">Null</span>
        </div>
    </div>

    <div class="rightColumn">
        <div class="rightBlock">
            <img src="images/icons/fortinet.png">
            Fortinet: <span id="fortinet_result">Null</span>
        </div>
        <div class="rightBlock">
            <img src="images/icons/fsecure.png">
            F-Secure: <span id="fsecure_result">Null</span>
        </div>
        <div class="rightBlock">
            <img src="images/icons/ikarus.png">
            IKARUS: <span id="ikarus_result">Null</span>
        </div>
        <div class="rightBlock">
            <img src="images/icons/kis.png">
            Kaspersky: <span id="kis_result">Null</span>
        </div>
        <div class="rightBlock">
            <img src="images/icons/mcafee.png">
            McAfee: <span id="mcafee_result">Null</span>
        </div>
        <div class="rightBlock">
            <img src="images/icons/malwarebytes.png">
            Malwarebytes: <span id="malwarebytes_result">Null</span>
        </div>
        <div class="rightBlock">
            <img src="images/icons/panda.png">
            Panda Antivirus: <span id="panda_result">Null</span>
        </div>
        <div class="rightBlock">
            <img src="images/icons/sophos.png">
            Sophos: <span id="sophos_result">Null</span>
        </div>
        <div class="rightBlock">
            <img src="images/icons/trend.png">
            Trend Micro Internet Security: <span id="trend_result">Null</span>
        </div>
        <div class="rightBlock">
            <img src="images/icons/webroot.png">
            Webroot SecureAnywhere: <span id="webroot_result">Null</span>
        </div>
        <div class="rightBlock">
            <img src="images/icons/windef.png">
            Windows 10 Defender: <span id="windef_result">Null</span>
        </div>
        <div class="rightBlock">
            <img src="images/icons/zonealarm.png">
            Zone Alarm: <span id="zonealarm_result">Null</span>
        </div>
        <div class="rightBlock">
            <img src="images/icons/zillya.png">
            Zillya: <span id="zillya_result">Null</span>
        </div>
    </div>
</main>
<script src="scripts/result.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2"
        crossorigin="anonymous"></script>
</body>
</html>