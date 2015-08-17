<?php

namespace App\Http\Controllers;

use App\Src\Answer\AnswerRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AnswerController extends Controller
{
    /**
     * @var AnswerRepository
     */
    private $answerRepository;

    /**
     * @param AnswerRepository $answerRepository
     */
    public function __construct(AnswerRepository $answerRepository)
    {
        Auth::loginUsingId(3);
        $this->answerRepository = $answerRepository;
    }

    /**
     * @return \Illuminate\View\View
     */
    public function index()
    {

    }

    /**
     * @param $id
     */
    public function createAnswer($id)
    {
        // check if valid question
        // check if the educator can answer the question ( Has Subject and Valid Level )



    }

    /**
     * @param Request $request
     */
    public function store(Request $request)
    {
    }
}
