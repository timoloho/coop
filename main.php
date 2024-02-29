<?php defined('DS') or define('DS', DIRECTORY_SEPARATOR);
set_include_path(DS . 'volume1' . DS . 'web' . DS . 'leht' . DS);
include_once('connection.php');
include_once('admin/php/update.php');
include_once('admin/php/upload.php');
include_once('admin/php/kinnita.php');
include_once('header.php');
//include_once('admin/php/fetch.php');
include_once('admin/php/it_insert.php');
include_once('admin/php/v66ras_insert.php');
//include_once('admin/php/search.php');
session_start();
?>