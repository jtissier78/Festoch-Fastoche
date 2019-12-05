<?php
session_start();

var_dump($_SESSION['begin']);
var_dump($_SESSION['end']);
var_dump($_SESSION);
foreach ($_SESSION['result'] as $result) {
    var_dump($result);
}


