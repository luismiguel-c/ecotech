<?php
session_start();
session_unset();
session_destroy();
// Bug corrigido: o redirect era relativo (teladelogin.php) e dava 404 fora de PAGLOGIN
header("Location: /PPI/PAGLOGIN/teladelogin.php");
exit();
