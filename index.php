<?php
require_once("utils/DB.php");
require_once("utils/Logger.php");
require_once("domain/account/GetAccount.php");
require_once("data/db/store/account/AccountStore.php");
require_once("data/repository/account/AccountRepository.php");
// TODO
// Throw exceptions everywhere when error or something unexpected happens
// Make this in an App class
// Initialize it before dashboard or something like that
$db = new DB();
$logger = new Logger("H:i:s d-M-Y");
$acc_store = new AccountStore($db, $logger);
$acc_repo = new AccountRepository($acc_store);
$get_acc = new GetAccount($acc_repo);
$done = $acc_store->delete(new AccountEntity(10, "" ,"", ""));
$done = $done && $acc_store->delete(new AccountEntity(11, "" ,"", ""));
$done = $done && $acc_store->delete(new AccountEntity(12, "" ,"", ""));
$done = $done && $acc_store->delete(new AccountEntity(13, "" ,"", ""));
var_dump($done);
