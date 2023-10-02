<!DOCTYPE html>
<html>
<head>
    <title>მომხმარებლები</title>
    <style>
        h1 {text-align: center;}
    </style>
</head>
<body>
<div style = "text-align:center;">   
 <h1>შექმენი ახალი მომხმარებელი</h1>
</div>
 
<div style = "text-align:center;">
 <form action="" method="post">
        <label for="name">სახელი:</label>

<br>
        <input type="text" id="name" name="name" required><br>
<br>
<div style = "text-align:center;">
        <label for="lastname">გვარი:</label>
 <br>
      <input type="text" id="lastname" name="lastname" required><br>
</div>
<br>
<!--<div style = "text-align:right;">-->    
    <label for="address">მისამართი:</label>
<br>
<!--</div> -->   
  
 <input type="text" id="address" name="address" required><br>
<br>

<label for="phone" class = "text-left">ტელ.ნომერი:</label>

<br>
       <input type="text" id="phone" name="phone" required><br>
<br>
      
<label for"personn"> პირადი ნომერი:</label> 
<br>
 <input type="text"  id="personn" name="personn" required><br>      
  <br>
      <button type="submit" name="save">შეინახე</button>

    </form>
</div>
<br>
<form action="view_data.php" method="get">
        <button type="submit" name="view">მომხმარებლების ნახვა</button>
    </form>
<br>
<form action="roles.php" method="get">
     <button type="submit" name="view">როლების გააქტიურება</button>

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

    // Check if the form was submitted for saving
    if (isset($_POST["save"])) {
        // Retrieve data from the POST request
        $name = $_POST["name"];
        $lastname = $_POST["lastname"];
        $address = $_POST["address"];
        $phone = $_POST["phone"];
        $personn = $_POST["personn"];

  // Insert data into the database
        $sql = "INSERT INTO userdat (username, lastname, address, phone, personn) VALUES ('$name', '$lastname', '$address', '$phone', '$personn')";

        if ($conn->query($sql) === TRUE) {
            echo "Data saved successfully!";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }

    // Close the database connection
    $conn->close();
    ?>
</body>
</html>



                                                              
