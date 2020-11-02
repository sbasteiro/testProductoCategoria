<?php

$token = 'UwzuzCyq';

$tokenParam = isset($_SERVER['HTTP_TOKEN']) ? $_SERVER['HTTP_TOKEN'] : null;
if ($tokenParam != $token) {
    echo 'Token invalido';
    die;
}