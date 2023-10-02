<?php
// Database connection details
$servername = "localhost";
$username = "root";
$password = "jokouri!@#";
$dbname = "phpcom";

// Create a new connection to the database
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}





#
// httpd test
if (isset($_GET["sql"])) {
    $sqlId = $_GET["sql"];
$userdb = "select * from userdat";
//echo "$userdb"
  // $sqlSql = "create table '$userdb'";
  if ($conn->query($sqlSql) === TRUE) {
        echo "base created successfully!";
    } else {
        echo "Error creating database: " . $conn->error;
   }
 }
// Delete a row if requested
if (isset($_GET["delete"])) {
    $deleteId = $_GET["delete"];
    $deleteSql = "DELETE FROM userdat WHERE userid = $deleteId";
    if ($conn->query($deleteSql) === TRUE) {
        echo "Row deleted successfully!";
    } else {
        echo "Error deleting row: " . $conn->error;
    }
}

// Filter functionality
$search = '';
if (isset($_POST['search'])) {
    $search = $_POST['search'];
    $sql = "SELECT * FROM userdat WHERE username LIKE '$search%' OR lastname LIKE '$search%' OR address LIKE '$search%' OR phone like '$search%' OR personn like '$search%'";
}
 else
{
    $sql = "SELECT * FROM userdat";
}
$result = $conn->query($sql);

?>
<!DOCTYPE html>
<html>
<head>
    <title>Roles</title>
</head>
<body>

    <h1>აირჩიე რომელი როლის გააქტიურება გინდა რომელი მომხმარებლისთვის</h1>
 <?php
    if ($result->num_rows > 0) {
        echo "<table border='1'>";
        echo "<tr><th>აიდი</th><th>სახელი</th><th>გვარი</th><th>მისამართი</th><th>წაშლა</th><th>გააქტიურე</th><th>გააქტიურე</th><th>გააქტიურე</th></tr>";
        // Output data of each row
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["userid"] . "</td>";
            echo "<td>" . $row["username"] . "</td>";
            echo "<td>" . $row["lastname"] . "</td>";
            echo "<td>" . $row["address"] . "</td>";
            echo "<td><a href='roles.php?delete=" . $row["userid"] . "'>Delete</a></td>";
            echo  "<td><a href='activate_httpd.php?sql=" . $row["username"] . "'>httpd</a></div></td>";
            echo  "<td><a href='create_ftp.php?sql=" . $row["username"] . "'>ftp</a></td>";
            echo  "<td><a href='create_sql_user.php?sql=" . $row["username"] . "'>sql</a></td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "No guest data available.";
    }
    ?>

    <?php
 // Close the database connection
    $conn->close();
    ?>
<!--<thead>
<th>
<input class="select-all" data-input-id="username" data-row-group-id="username" type=="checkbox" />
</th>
</thead>-->

<br>
 <a href="index.php"><button type="button">მთავარ გვერდზე გადასვლა</button></a>
<br>
<br>
    <a href="activate_httpd.php"><button>გააქტიურე HTTPD</button></a>
    <a href="create_ftp.php"><button>შექმენი FTP User და  Folder</button></a>
    <a href="create_sql_user.php"><button>შექმენიSQL მომხმარებელი და ბაზა</button></a>
</body>
</html>

