<?php

namespace App\Repositories;

use App\Repositories\Interfaces\JokeRepositoryInterface;
use App\Models\Jokes;

class JokeRepository implements JokeRepositoryInterface
{
    public function findAll()
    {
        return Jokes::all();
    }
    public function create($data)
    {
        return Jokes::create($data);
    }
}
