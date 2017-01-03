<?php

require'../class/sessions.php';
$objses = new Sessions();
$objses->init();

$objses->destroy();

header('Location: ../#/ver_visitas');
?>