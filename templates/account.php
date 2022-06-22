<?php
// Initialize the session
session_start();

// Check if the user is logged in, if not then redirect him to login page
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: login.php");
    exit;
}

$hostname = "localhost";
$username = "root";
$password = "";
$dbname = "antiscan";
$current_user = $_SESSION["username"];

// Create connection with database
$conn = mysqli_connect($hostname, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT email, username, password FROM users where username like '%$current_user'";
$result = mysqli_query($conn, $sql);


mysqli_close($conn);

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>My Profile</title>
    <style>
        header {
            width: 100%;
        }

        nav {
            width: 100%;
        }

        .navbar-brand {
            margin-left: 15px;
        }

        nav a {
            margin-right: 15px;
        }
    </style>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
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
        <a href="main.php" class="btn btn-outline-info d-flex align-items-center">
            <ion-icon name="arrow-back-outline"></ion-icon>Back
        </a>
    </nav>
</header>

<main class="d-flex justify-content-center align-items-center flex-column">
    <img class="mt-5 mb-5"
         src="https://c.tenor.com/pvFJwncehzIAAAAM/hello-there-private-from-penguins-of-madagascar.gif"/>
    <h1 class="my-3 text-center">Hi, <b><?php echo htmlspecialchars($_SESSION["username"]); ?></b>!</h1>
    <h2 class="my-5 text-center"><?php
        if (mysqli_num_rows($result) > 0) {
            // output data of each row
            while ($row = mysqli_fetch_assoc($result)) {
                echo "Email: " . $row["email"] . " ";
            }
        } else {
            echo "0 results";
        }
        ?>
    </h2>
    <label class="mb-3">
        You can change your password
    </label>
    <a href="reset-password.php" class="btn btn-info">Reset Your Password</a>
    <label class="mb-3">
        You can logout from your profile
    </label>
    <a href="logout.php" class="btn btn-danger">Logout</a>

</main>

</body>
</html>