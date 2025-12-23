<?php
include "config.php";
session_destroy();
header('Location: ' . $config['base_url'] . '/user/login');
exit;
