<?php
//Configurari privind sesiunea!
session_set_cookie_params(0);
session_start();

/*Header uri ce vizeaza controlul informatiilor ce virt fi cache uite
NU ne dorim ca aceste pagini sa fie salvate in istoricul browser ului!
*/
header("Cache-Control: no-cache, no-store, must-revalidate");
header("Pragma: no-cache");
header("Expires: 0");

//Ne asiguram, desi face asta PHP u automat, CA fiecare sesiune are un UNIC ID!!!
session_regenerate_id(true);
