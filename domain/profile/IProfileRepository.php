<?php
interface IProfileRepository {
    public function get_profile(int $id): ?ProfileEntity;
}