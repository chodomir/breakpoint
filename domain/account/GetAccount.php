<?php
require_once("base/IParamUseCase.php");
require_once("domain/account/IAccountRepository.php");

class GetAccount implements IParamUseCase
{
    private IAccountRepository $accountRepository;

    public function __construct(IAccountRepository $repository)
    {
        $this->accountRepository = $repository;
    }

    /**
     * Summary of execute
     * @param int $param Integer denoting user id to get from db
     * @return AccountEntity Entity fetched from the db
     */
    public function execute(mixed $param): ?AccountEntity
    {
        return $this->accountRepository->get_account($param);
    }
}
