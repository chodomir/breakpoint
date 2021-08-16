<?php
interface IAccountRepository 
{
    public function get_account(int $id): ?AccountEntity;
}