<?php
    session_start();
    $_SESSION["estadoinicio"] = false;
    header("Location: index.php");
    exit();
?>
