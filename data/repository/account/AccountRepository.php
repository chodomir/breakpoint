<?php
class AccountRepository implements IAccountRepository {
    private IAccountStore $store;

    public function __construct(IAccountStore $store)
    {
        $this->store = $store;
    }

    public function get_account(int $id): ?AccountEntity {
        return $this->store->get_account($id);
    }
}