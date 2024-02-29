<?php defined('DS') or define('DS', DIRECTORY_SEPARATOR);
set_include_path(DS . 'volume1' . DS . 'web' . DS . 'leht' . DS);
include_once('../connection.php');
include_once('php/update.php');
include_once('php/upload.php');
include_once('php/kinnita.php');
include_once('juh_header.php');
//include_once('admin/php/fetch.php');
include_once('php/it_insert.php');
include_once('php/ohuolukord_sisestus.php');
session_start();
?>