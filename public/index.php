<?php ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
ini_set("xdebug.var_display_max_children", '-1');
ini_set("xdebug.var_display_max_data", '-1');
ini_set("xdebug.var_display_max_depth", '-1');
define('VG_ACCESS', true);

use App\Controller\Routing;
header('Content-Type:text/html;charset=utf8');


require_once dirname(__DIR__) . '/App/Config/settings.php';
if(session_id() == '') {
    session_start();
    if(empty($_SESSION['token'])) {
        $_SESSION['token'] = bin2hex(random_bytes(32));
    }
    $token = $_SESSION['token'];
}
try {
    spl_autoload_register(function ($className) {
        include_once dirname(__DIR__) . '/' . str_replace('\\', '/', $className) . '.php';
    });

    (new Routing())->routing();

}
catch (\Throwable $e) {
    $messageException = "[" . date('Y-m-d H:i:s', time()) . "] Exception message: " . $e->getMessage() . " in file: " . $e->getFile() . " line number: " . $e->getLine() . PHP_EOL;
            file_put_contents(dirname(__DIR__) . '/App/Log/throwable.txt', $messageException, FILE_APPEND | LOCK_EX);
    exit($e->getMessage());
}


