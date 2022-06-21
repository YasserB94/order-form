<?php

declare(strict_types=1);
session_start();
echo $_SERVER['DOCUMENT_ROOT'] . "/models/test.php";
require $_SERVER['DOCUMENT_ROOT'] . "/models/test.php";
