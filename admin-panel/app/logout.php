<?php
session_start();
session_destroy();
require 'config.php';
header("location:$p11base");
?>