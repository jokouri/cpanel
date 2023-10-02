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
    <title>თანამშრომლები</title>
</head>
<div style = "text-align:center;">
<body>
<div style = "text-align:center;">
    <h1>თანამშრომლები</h1>
</div>
<div style = "text-align:center;">
    <form action="view_data.php" method="post">
        <input type="text" name="search" placeholder="Search..." value="<?php echo $search; ?>">
        <button type="submit">ძებნა</button>
    </form>
<br>
 <a href="index.php"><button type="button">მთავარ გვერდზე გადასვლა</button></a>
</div>
<div style = "text-align:center;">
    <table border='1' class='center'>


       <tr>
            
            <th>სახელი</th>
            <th>გვარი</th>
            <th>მისამართი</th>
            <th>ტელ ნომერი</th>
            <th>პირადი ნომერი</th>
        </tr>

        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
$highlightedName = str_replace($search, "<span style='color: red;'>$search</span>", $row["username"]);
                $highlightedSurname = str_replace($search, "<span style='color: red;'>$search</span>", $row["lastname"]);
                $highlightedAddress = str_replace($search, "<span style='color: red;'>$search</span>", $row["address"]);
$highlightedphone = str_replace($search, "<span style='color: red;'>$search</span>", $row["phone"]);
$highlightedpersonn = str_replace($search, "<span style='color: red;'>$search</span>", $row["personn"]);
                echo "<tr>";
                echo "<td>" . $highlightedName  . "</td>";
                echo "<td>" . $highlightedSurname  . "</td>";
                echo "<td>" . $highlightedAddress  . "</td>";
                echo "<td>" . $highlightedphone  . "</td>";
                echo "<td>" . $highlightedpersonn . "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='3'>მომხმარებლის ბაზა ცარიელია</td></tr>";
        }
        ?>

    </table>
</div>    
<br>
<!-- droebiti komentari Rilaki qvemot -->
 <!--   <a href="index.php"><button type="button">მთავარ გვერდზე გადასვლა</button></a>-->
</body>

</html>

