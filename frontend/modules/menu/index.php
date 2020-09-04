<?php
header("Content-Type: application/json; charset=UTF-8");
if (isset($_GET['nc'])) header("X-Accel-Expires: 0");


// Основные подключения
$root = realpath($_SERVER['DOCUMENT_ROOT']);
require $root.'/constants/common.php';
require $root.'/configuration.php';
require $root.'/core/class.database.inc';
require $root.'/core/class.core.inc';
require $root.'/core/class.page.inc';
require $root.'/core/class.menu.inc';
require $root.'/core/class.reviews.inc';
require $root.'/core/functions.php';
require $root.'/frontend/libs/smarty/libs/Smarty.class.php';

$Core = new Core();
$Menu = new Menu();

echo json_encode(array(
    'moskovskayaOblast' => $Menu::getMenuMoskovskayaOblast(),
    'moskva'            => $Menu::getMenuMoskva()
));
