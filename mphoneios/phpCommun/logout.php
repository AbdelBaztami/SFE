<?php
header("Expires: Mon, 26 Jul 2025 05:00:00 GMT");
session_start();
session_unset();
session_destroy();

header("Location:login.php");