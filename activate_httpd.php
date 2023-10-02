<?php

if (isset($_GET['sql'])) {
   $sqlu = $_GET['sql'];
echo "{$sqlu}";
putenv("FILENAME=$sqlu");
$output = exec('/var/www/html/cpanel/test.sh');
} else {
    // Fallback behaviour goes here
}

?>
