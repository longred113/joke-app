<?php

namespace App\Http\Controllers;

use App\Models\Jokes;
use App\Repositories\Interfaces\JokeRepositoryInterface;
use App\Repositories\Interfaces\VoteRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class JokeController extends Controller
{
    protected $request;

    private $jokeRepository;

    private $voteRepository;

    public function __construct(Request $request, JokeRepositoryInterface $jokeRepository, VoteRepositoryInterface $voteRepository)
    {
        $this->request = $request;
        $this->jokeRepository = $jokeRepository;
        $this->voteRepository = $voteRepository;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jokesData = $this->jokeRepository->findAll();
        $countData = $this->jokeRepository->countAll();

        $id = $jokesData['id'];
        $jokeContent = $jokesData['jokeContent'];
        $existsIds[] = $id;

        return view('joke', compact('id', 'jokeContent', 'countData', 'existsIds'));
    }

    public function getNextJoke()
    {
        if (isset($this->request['existsJokeIds'])) {
            $jokeId = $this->request['jokeId'];
            if (isset($jokeId)) {
                $voteData = [
                    "jokeId" => $jokeId,
                    "voteStatus" => $this->request['status'],
                ];
                $newVote = $this->voteRepository->create($voteData);
            }
            $existsIds = explode(',', $this->request['existsJokeIds']);
            $joke = $this->jokeRepository->getNextJoke($existsIds);
            if (!empty($joke)) {
                $id = strval($joke['id']);
                array_push($existsIds, $id);
                $jokeContent = $joke['jokeContent'];
            } else {
                $id = '';
                $jokeContent = '';
            }
        }
        $countData = $this->request['countData'];
        $all = $this->request->all();

        return view('joke', compact('id', 'jokeContent', 'countData', 'existsIds'));

        return $all;
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
        $newJoke = $this->jokeRepository->create($jokeData);


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
