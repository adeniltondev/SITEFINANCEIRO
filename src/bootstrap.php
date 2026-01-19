<?php
// Bootstrap file for autoloading and session start
// Configurações de sessão seguras
ini_set('session.cookie_httponly', 1);
ini_set('session.use_strict_mode', 1);
if (isset($_SERVER['HTTPS'])) {
	ini_set('session.cookie_secure', 1);
}
session_start();
require_once __DIR__ . '/Database.php';
require_once __DIR__ . '/csrf.php';
// ...autoload other classes as needed
