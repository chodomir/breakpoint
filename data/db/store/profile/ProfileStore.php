<?php
class ProfileStore implements IProfileStore
{
    // TODO: pass in database connection here
    // TODO: make every call in separate thread (IO thread)
    // TODO: open/close connections where needed (start/end of action)

    public function update(mixed $entity): bool
    {
        //TODO
        return false;
    }

    public function delete(mixed $entity): bool
    {
        // TODO: check if is array
        return false;
    }

    public function insert(mixed $entity): bool
    {
        // TODO: check if is array
        return false;
    }

    public function get_profile(int $id): ?ProfileEntity 
    {
        // TODO
        return null;
    }
}
