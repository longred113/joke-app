<?php

namespace App\Providers;

use App\Models\Jokes;
use App\Repositories\Interfaces\JokeRepositoryInterface;
use App\Repositories\Interfaces\VoteRepositoryInterface;
use App\Repositories\JokeRepository;
use App\Repositories\VoteRepository;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(JokeRepositoryInterface::class, JokeRepository::class);
        $this->app->bind(VoteRepositoryInterface::class, VoteRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
