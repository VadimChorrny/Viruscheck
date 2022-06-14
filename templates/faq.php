<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>FAQ | Viruschecker</title>
    <link rel="stylesheet" href="styles/faq.css">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
</head>
<body>
<!--Header Navigation-->
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
                <li class="nav-item active">
                    <a class="nav-link" href="/templates/faq.php">FAQ <span class="sr-only">(current)</span></a>
                </li>
            </ul>
        </div>
        <a href="login.php">
            <button class="btn btn-outline-info" id="login" type="button">Login</button>
        </a>
    </nav>
</header>

<main>
    <div class="faq-section">
        <header>
            <h2>FAQs</h2>
            <p>Answers to the most frequently asked questions.</p>
        </header>

        <details>
            <summary>
                <h4>How much costs your ass?</h4>
                <span class="material-symbols-outlined">Expand for more details</span>
            </summary>
            <p><span>Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                    Architecto ea expedita nihil non numquam odio perferendis placeat quo saepe temporibus.
                    Fugiat fugit illo maxime minus numquam odio porro quae quis.</span>
            </p>
        </details>

        <hr>

        <details>
            <summary>
                <h4>How much will Team features cost?</h4>
                <span class="material-symbols-outlined">Expand for more details</span>
            </summary>
            <p><span>Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                    Aliquam ducimus ea illum magni porro? A deserunt est voluptatem?
                    Alias delectus doloribus non numquam pariatur perferendis quasi,
                    repudiandae saepe tempore totam!</span></p>
        </details>

        <hr>

        <details>
            <summary>
                <h4>Where I can find a girlfriend?</h4>
                <span class="material-symbols-outlined">Expand for more details</span>
            </summary>
            <p><span>Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                    Aspernatur cum ea eius in, natus possimus quaerat sit unde voluptate.
                    Consectetur consequatur dolores enim perspiciatis quia quidem,
                    rem repellendus saepe tempora.</span></p>
        </details>

    </div>
</main>

</body>
</html>