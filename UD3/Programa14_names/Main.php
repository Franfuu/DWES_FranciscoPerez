<?php
require_once 'Users/Admin.php';
require_once 'Users/Guest.php';


use Users\Admin;
//use Users\Guest;


$admin = new Admin();
echo "<br> Rol del usuario: " . $admin->getRole(); // Output: Rol del usuario: Administrador


$guest = new Users\Guest();
echo "<br> Rol del usuario: " . $guest->getRole(); // Output: Rol del usuario: Invitado


?>
