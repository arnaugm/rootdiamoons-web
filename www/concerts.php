<?php

$lang = $_GET['l'];

if ($lang == 'cas') {
    $locale = 'es';
} elseif ($lang == 'eng') {
    $locale = 'en';
} else {
    $locale = 'ca';
}
header('Location: /'.$locale.'/concerts');
