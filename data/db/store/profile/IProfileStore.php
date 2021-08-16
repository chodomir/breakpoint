<?php
interface IProfileStore extends IStore {
    public function get_profile(int $id): ?ProfileEntity;
}