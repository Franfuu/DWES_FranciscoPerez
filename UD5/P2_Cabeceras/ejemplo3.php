<?php


//header('Location: ejemplo1.php', true, 302);
// o permanente:
// header('Location: https://ejemplo.com', true, 301);
header('Content-Type: application/json; charset=utf-8');
header('Cache-Control: no-store, no-cache, must-revalidate, max-age=0');
header('Pragma: no-cache');


echo print_r(headers_list());
exit; // importante




?>
