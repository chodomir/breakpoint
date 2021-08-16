<?php
interface IStore 
{
    public function insert(mixed $entity): bool;
    public function delete(mixed $entity): bool;
    public function update(mixed $entity): bool;
}
