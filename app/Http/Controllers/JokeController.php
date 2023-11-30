<?php

namespace App\Http\Controllers;

use App\Repositories\Interfaces\JokeRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class JokeController extends Controller
{
    protected $request;

    private $JokeRepository;

    public function __construct(Request $request, JokeRepositoryInterface $JokeRepository)
    {
        $this->request = $request;
        $this->JokeRepository = $JokeRepository;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jokesData = $this->JokeRepository->findAll();

        include 'joke.blade.php';
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store()
    {

        $validator = Validator::make(
            $this->request->all(),
            [
                'jokeContent' => 'required',
            ]
        );
        if ($validator->fails()) {
            return $this->errorBadRequest($validator->getMessageBag()->toArray());
        }

        $jokeData = $this->request->all();
        $newJoke = $this->JokeRepository->create($jokeData);

        return $this->successRequest($newJoke);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
