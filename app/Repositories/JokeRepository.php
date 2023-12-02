<?php

namespace App\Repositories;

use App\Repositories\Interfaces\JokeRepositoryInterface;
use App\Models\Jokes;

class JokeRepository implements JokeRepositoryInterface
{
    public function findAll()
    {
        return Jokes::all()->random(1)->first();;
    }

    public function countAll()
    {
        return Jokes::count();
    }

    public function create($data)
    {
        return Jokes::create($data);
    }

    public function getNextJoke($existsIds)
    {
        return  Jokes::whereNotIn('id', $existsIds)
            ->inRandomOrder()
            ->first();
    }
}
