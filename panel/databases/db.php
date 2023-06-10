<?php
/*
    Panther.CMS Database Initialization File
*/

require_once(__DB_DIR__.'/config.php');
require_once(__DB_DIR__.'./'.DB_TYPE);

$conn = db_connect(DB_HOST, DB_LOGIN, DB_PASSWORD, DB_NAME);