<?php
if (isset($_GET['sql'])) {
   $sqlu = $_GET['sql'];
//echo $sql;
//mysql_connect('localhost', 'root', 'jokouri!@#');
//$db=mysql_select_db($sql);
//if (!$db){

//mysql_query("CREATE USER ' '$sql'@'localhost' IDENTIFIED BY '$sql';");
//mysql_query("create datebase '$sql'");
//mysql_query("GRANT ALL ON '$sql'.* TO '$sql'@'localhost'");
//mysql_close();
//} else { // database is available
// }

//$usage = 
//  "dbusercreate - quickly create a db with user and password with privileges\n".
//  'php '.$argv[0].' <db-user-pass> <root-password>'."\n";

//if (empty($argv[1])){
//  die($usage);
//}
//if (empty($argv[2])){
//  die($usage);
//}



//$dbuserpass = $argv[1];
//$rootpass = $argv[2];
$con=mysqli_connect("localhost","root", "jokouri!@#");
// check con...
if (mysqli_connect_errno())
{
  echo "Failed to connect to MySQL: " . mysqli_connect_error()."\n";
  exit(1);
}

// Create user
//$sql='GRANT usage on *.* to ' . $sqlu . '@localhost identified by ' . "'" . "$sqlu" . "'";
$sql="CREATE USER '$sqlu'@'localhost' IDENTIFIED BY '$sqlu';";
//echo "$sql"."\n";
echo "${sqlu} username and pass:${sqlu} created in my sql";
if (mysqli_query($con,$sql) == false){
  echo "Error creating database user: " . mysqli_error($con)."\n";
  exit(1);
}



// Create database
$sql="CREATE DATABASE $sqlu";
//echo $sql."\n";
echo "${sqlu} database created in my sql";
if (mysqli_query($con,$sql) == false){
  echo "Error creating database: " . mysqli_error($con)."\n";
  exit(1);
}

// Create user
//$sql='GRANT usage on *.* to ' . $sqlu . '@localhost identified by ' . "'" . "$sqlu" . "'";
//$sql="CREATE USER '$sqlu'@'host' IDENTIFIED BY '$sqlu';";
//echo "$sql"."\n";
//if (mysqli_query($con,$sql) == false){
//  echo "Error creating database user: " . mysqli_error($con)."\n";
//  exit(1);
//}

// Create user permissions
$sql="GRANT all privileges on $sqlu.* to $sqlu@localhost";
//echo "$sql"."\n";
if (mysqli_query($con,$sql) == false){
  echo "Error creating database user: " . mysqli_error($con)."\n";
  exit(1);
}

echo "Database Name: $sqlu"."\n";
echo "Database Username: $sqlu"."\n";
echo "Database Password: $sqlu"."\n";
echo "Database Host: localhost"."\n";








//echo $sql;
} else {
    // Fallback behaviour goes here
}

?>
