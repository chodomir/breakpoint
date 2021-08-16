<?php
interface IParamUseCase
{
    public function execute(mixed $param): mixed;
}