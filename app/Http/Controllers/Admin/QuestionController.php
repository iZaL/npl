<?php

namespace App\Http\Controllers\Admin;


use App\Src\Question\QuestionRepository;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    /**
     * @var QuestionRepository
     */
    private $questionRepository;

    /**
     * @param QuestionRepository $questionRepository
     */
    public function __construct(QuestionRepository $questionRepository)
    {
        $this->middleware('auth');
        $this->questionRepository = $questionRepository;
    }

    public function index()
    {

    }

    public function show()
    {

    }

    public function create()
    {


    }

    /**
     * @param Request $request
     */
    public function store(Request $request)
    {

    }

    /**
     * @param $id
     */
    public function edit($id)
    {

    }

    /**
     * @param $id
     */
    public function update($id)
    {

    }

    /**
     * @param $id
     */
    public function delete($id)
    {

    }

    /**
     * @param $id
     */
    public function destroy($id)
    {

    }
}
