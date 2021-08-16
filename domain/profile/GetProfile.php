<?php
class GetProfile implements IParamUseCase {
    private IProfileRepository $profileRepository;

    public function __construct(IProfileRepository $repository)
    {
        $this->profileRepository = $repository;
    }

    /**
     * Summary of execute
     * @param int $param id of profile to get
     * @return ProfileEntity with the given id
     */
    public function execute(mixed $param): mixed
    {
        return $this->profileRepository->get_profile($param);
    }
}