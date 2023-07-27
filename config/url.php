<?php

$BASE_URL = "http://" . $_SERVER['SERVER_NAME'] . dirname($_SERVER['REQUEST_URI'] . '?') . "/";
$BASE_URL = str_replace("\\", '', $BASE_URL);