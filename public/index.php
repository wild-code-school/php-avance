<?php

use App\Hello;

require '../vendor/autoload.php';

$hello = new Hello();

echo $hello->talk();