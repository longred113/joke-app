<?php

namespace App\Repositories\Interfaces;

interface JokeRepositoryInterface
{
    public function findAll();
    public function create($data);
}
