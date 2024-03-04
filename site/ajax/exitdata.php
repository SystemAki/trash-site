<?php
setcookie('log', $_COOKIE['log'], time() - 3600 * 24 * 30, "/");
unset($_COOKIE['log']);
echo true;
 ?>
