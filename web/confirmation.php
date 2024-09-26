<?php
$name = $_POST['name'];
$email = $_POST['email'];
$level = $_POST['level'];

$str = $name . ", jūs esat veiksmīgi reģistrējusies(-ies) " . $level . " līmeņa webināram ar e-pastu " . $email;

echo("<h2>" . $str . "</h2>");