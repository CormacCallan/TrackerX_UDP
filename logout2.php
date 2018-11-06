<?php
session_start();
session_destroy();
header("Location: lecture_login.php");
