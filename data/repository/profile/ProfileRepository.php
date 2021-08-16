<?php
class ProfileRepository implements IProfileRepository {
    private IProfileStore $store;

    public function __construct(IProfileStore $store)
    {
        $this->store = $store;
    }

    public function get_profile(int $id): ?ProfileEntity {
        return $this->store->get_profile($id);
    }
}