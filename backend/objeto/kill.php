<?php
session_start();
session_destroy();
session_abort();
header('Location: ../../frontend/principal/index.php');
?>