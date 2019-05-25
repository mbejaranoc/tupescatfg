<?php
@session_start();
session_destroy();
header("Location: http://localhost/bootstrap/index.php?page=index.php");
exit();
?>