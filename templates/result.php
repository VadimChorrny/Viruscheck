<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Result scanning</title>
    <link rel="stylesheet" href="styles/result.css">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
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

<!--<h1>Result from 32 antiviruses</h1>-->

<main>
    <div id="main" class="well">
        <div class="row">
            <div class="col-md-6 infoBox">
                <div><i class="fa fa-file"></i> <strong>Filename</strong><br>
                    <div class="resultNewLine">nhm_windows_3.0.8.2.exe</div>
                </div>
                <br>
                <div class="resultDiv"><i class="fa fa-star"></i> <strong>Detected by</strong><br>
                    <div class="resultNewLine" id="detected">

                        <div class="redText">4/26</div>

                    </div>
                </div>
            </div>
            <div class="col-md-6 infoBox">
                <br>
                <div class="resultDiv"><i class="fa fa-laptop"></i> <strong>MD5</strong><br>
                    <div class="resultNewLineSha256">
                        ad35f746dc9064acc2992acfb60b6696                        </div>
                </div>
                <br>
                <div class="resultDiv"><i class="fa fa-calendar"></i> <strong>Scan Date</strong><br>
                    <div class="resultNewLine">14-06-2022 14:07:55<span class="define"></span></div>
                </div>
            </div>
        </div>
        <br>
        <p>
            Your file has been scanned with 26 different antivirus software <strong>(no results have been
                distributed)</strong>.<br>
            The results of the scans has been provided below in alphabetical order.
        </p>
        <hr>
        <div class="row">
            <div class="col-md-6 flatLineScanResult">


                <div class="iconsDisplay adaware"></div> <strong>Ad-Aware Antivirus:</strong> <span class="resultScan redText" data-name="adaware">Trojan.GenericKD.39677795</span><br>

                <div class="iconsDisplay ahnlab"></div> <strong>AhnLab V3 Internet Security:</strong> <span class="resultScan greenText" data-name="ahnlab">Clean</span><br>

                <div class="iconsDisplay alyac"></div> <strong>Alyac Internet Security:</strong> <span class="resultScan redText" data-name="alyac">detected</span><br>

                <div class="iconsDisplay avast"></div> <strong>Avast:</strong> <span class="resultScan greenText" data-name="avast">Clean</span><br>

                <div class="iconsDisplay avg"></div> <strong>AVG:</strong> <span class="resultScan greenText" data-name="avg">Clean</span><br>

                <div class="iconsDisplay avira"></div> <strong>Avira:</strong> <span class="resultScan greenText" data-name="avira">Clean</span><br>

                <div class="iconsDisplay bitdef"></div> <strong>BitDefender:</strong> <span class="resultScan redText" data-name="bitdef">Trojan.GenericKD.39677795</span><br>

                <div class="iconsDisplay bullguard"></div> <strong>BullGuard:</strong> <span class="resultScan greenText" data-name="bullguard">Clean</span><br>

                <div class="iconsDisplay clam"></div> <strong>ClamAV:</strong> <span class="resultScan greenText" data-name="clam">Clean</span><br>

                <div class="iconsDisplay comodo"></div> <strong>Comodo Antivirus:</strong> <span class="resultScan greenText" data-name="comodo">Clean</span><br>

                <div class="iconsDisplay drweb"></div> <strong>DrWeb:</strong> <span class="resultScan greenText" data-name="drweb">Clean</span><br>

                <div class="iconsDisplay emsisoft"></div> <strong>Emsisoft:</strong> <span class="resultScan greenText" data-name="emsisoft">Clean</span><br>

                <div class="iconsDisplay nod32"></div> <strong>Eset NOD32:</strong> <span class="resultScan greenText" data-name="nod32">Clean</span><br>
            </div>
            <div class="col-md-6 adjustLineScanResult">

                <div class="iconsDisplay fortinet"></div> <strong>Fortinet:</strong> <span class="resultScan greenText" data-name="fortinet">Clean</span><br>

                <div class="iconsDisplay fsec"></div> <strong>F-Secure:</strong> <span class="resultScan greenText" data-name="fsec">Clean</span><br>

                <div class="iconsDisplay ikarus"></div> <strong>IKARUS:</strong> <span class="resultScan greenText" data-name="ikarus">Clean</span><br>

                <div class="iconsDisplay kasper"></div> <strong>Kaspersky:</strong> <span class="resultScan greenText" data-name="kasper">Clean</span><br>

                <div class="iconsDisplay mcafeetp"></div> <strong>McAfee:</strong> <span class="resultScan greenText" data-name="mcafeetp">Clean</span><br>

                <div class="iconsDisplay mbytes"></div> <strong>Malwarebytes:</strong> <span class="resultScan greenText" data-name="mbytes">Clean</span><br>

                <div class="iconsDisplay pandagp"></div> <strong>Panda Antivirus:</strong> <span class="resultScan redText" data-name="pandagp">detected</span><br>

                <div class="iconsDisplay sophos"></div> <strong>Sophos:</strong> <span class="resultScan greenText" data-name="sophos">Clean</span><br>

                <div class="iconsDisplay trend"></div> <strong>Trend Micro Internet Security:</strong> <span class="resultScan greenText" data-name="trend">Clean</span><br>

                <div class="iconsDisplay webroot"></div> <strong>Webroot SecureAnywhere:</strong> <span class="resultScan greenText" data-name="webroot">Clean</span><br>

                <div class="iconsDisplay mssec"></div> <strong>Windows 10 Defender:</strong> <span class="resultScan greenText" data-name="mssec">Clean</span><br>

                <div class="iconsDisplay zonealarm"></div> <strong>Zone Alarm:</strong> <span class="resultScan greenText" data-name="zonealarm">Clean</span><br>

                <div class="iconsDisplay zillya"></div> <strong>Zillya:</strong> <span class="resultScan greenText" data-name="zillya">Clean</span><br>
            </div>
        </div>
    </div>
</main>

<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2"
        crossorigin="anonymous"></script>
</body>
</html>
