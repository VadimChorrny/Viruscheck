<?php
$conn = new PDO('mysql:host=localhost;dbname=antiscan', 'root', '');
$searchErr = '';
$user_details='';
$search = '';
if(isset($_POST['save']))
{
    if(!empty($_POST['search']))
    {
        $search = $_POST['search'];
        $stmt = $conn->prepare("select * from users where username like '%$search%' ");
        $stmt->execute();
        $user_details = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    else
    {
        $searchErr = "Please enter the information";
    }
}
?>

<html>
<head>
    <title>Users</title>
    <link rel="stylesheet"
          href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <style>
        table {
            border-collapse: collapse;
        }
        .inline{
            display: inline-block;
            float: right;
            margin: 20px 0px;
        }

        input, button{
            height: 34px;
        }

        .pagination {
            display: inline-block;
        }
        .pagination a {
            font-weight:bold;
            font-size:18px;
            color: black;
            float: left;
            padding: 8px 16px;
            text-decoration: none;
            border:1px solid black;
        }
        .pagination a.active {
            background-color: pink;
        }
        .pagination a:hover:not(.active) {
            background-color: skyblue;
        }
    </style>
</head>
<body>

<center>
    <?php
    // Import the file where we defined the connection to Database.
    $conn = mysqli_connect('localhost', 'root', '');
    if (! $conn) {
        die("Connection failed" . mysqli_connect_error());
    }
    else mysqli_select_db($conn, 'antiscan');
    $per_page_record = 5;  // Number of entries to show in a page.
    // Look for a GET variable page if not found default is 1.
    if (isset($_GET["page"])) {
        $page  = $_GET["page"];
    }
    else {
        $page=1;
    }

    $start_from = ($page-1) * $per_page_record;

    $query = "SELECT * FROM users LIMIT $start_from, $per_page_record";
    $rs_result = mysqli_query ($conn, $query);
    ?>

    <div class="container">
        <br>
        <div>
            <h1>Users list</h1>
            <table class="table table-striped table-condensed
                                          table-bordered">
                <thead>
                <tr>
                    <th width="10%">ID</th>
                    <th>Username</th>
                    <th>Email</th>
                </tr>
                </thead>
                <tbody>
                <?php
                while ($row = mysqli_fetch_array($rs_result)) {
                    // Display each field of the records.
                    ?>
                    <tr>
                        <td><?php echo $row['id']; ?></td>
                        <td><?php echo $row["username"]; ?></td>
                        <td><?php echo $row["email"]; ?></td>
                    </tr>
                    <?php
                };
                ?>
                </tbody>
            </table>

            <div class="pagination">
                <?php
                $query = "SELECT COUNT(*) FROM users";
                $rs_result = mysqli_query($conn, $query);
                $row = mysqli_fetch_row($rs_result);
                $total_records = $row[0];

                echo "</br>";
                // Number of pages required.
                $total_pages = ceil($total_records / $per_page_record);
                $pagLink = "";

                if($page>=2){
                    echo "<a href='users.php?page=".($page-1)."'>  Prev </a>";
                }

                for ($i=1; $i<=$total_pages; $i++) {
                    if ($i == $page) {
                        $pagLink .= "<a class = 'active' href='users.php?page="
                            .$i."'>".$i." </a>";
                    }
                    else  {
                        $pagLink .= "<a href='users.php?page=".$i."'>   
                                                ".$i." </a>";
                    }
                };
                echo $pagLink;

                if($page<$total_pages){
                    echo "<a href='users.php?page=".($page+1)."'>  Next </a>";
                }

                ?>
            </div>
        </div>
    </div>
</center>

<script>
    function go2Page()
    {
        var page = document.getElementById("page").value;
        page = ((page><?php echo $total_pages; ?>)?<?php echo $total_pages; ?>:((page<1)?1:page));
        window.location.href = 'index1.php?page='+page;
    }
</script>
</body>
</html>