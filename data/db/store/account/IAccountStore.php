<?php
require_once("base/IStore.php");

interface IAccountStore extends IStore {
    public function get_account(int $id): ?AccountEntity;
}