<?php

require_once "../paths.php";
require_once $path["config.php"];
session_start();

Password::signIn($database, $_POST["password"]);
Password::ifNotSignedInGoTo("../sign-in.php?er=1");
header("Location: ../admin.php");

?>