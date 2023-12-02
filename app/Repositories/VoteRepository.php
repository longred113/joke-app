<?php

namespace App\Repositories;


use App\Models\Jokes;
use App\Models\Votes;
use App\Repositories\Interfaces\VoteRepositoryInterface;

class VoteRepository implements VoteRepositoryInterface
{
    public function create($data)
    {
        return Votes::create($data);
    }
}
