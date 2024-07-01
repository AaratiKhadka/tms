<?php
session_start();

if (!isset($_SESSION['email'])) {
    echo "<meta http-equiv=\"refresh\" content=\"0;URL=index.php?msg=error\">";
} 

?>