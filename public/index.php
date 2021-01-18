<?php
if(!session_id()) {
    session_start();
}
require_once '../app/init.php'; //bootstraping : panggil satu file maka file itu akan memanggil seluruh aplikasi mvc

$app = new App;  