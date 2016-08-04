<?php

require_once "../paths.php";
require_once $path["config.php"];

session_start();
Password::signOut();

header("Location: ../admin.php");

?>