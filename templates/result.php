<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Result scanning</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="styles/result.css">
</head>
<body>
<header>
    <nav class="navbar navbar-expand-lg bg-light">
        <!-- Navbar content -->
        <a class="navbar-brand" href="../index.php">
            <img src="images/key.png" width="30" height="30" alt="">
            Viruscheck
        </a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

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
        <a href="login.php">
            <button class="btn btn-outline-info" id="login" type="button">Login</button>
        </a>
    </nav>
</header>

<button class="btn btn-success" onclick="getResponse()">Get Response</button>

<main class="main_container" style="display:flex; justify-content: center; align-items: center; gap: 20%; margin-top: 10%;">
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


<!--<h1>Result from 32 antiviruses</h1>-->

<!-- JavaScript Bundle with Popper -->
<script src="scripts/result.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2"
        crossorigin="anonymous"></script>
</body>
</html>
