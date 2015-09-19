<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Src\Level\LevelRepository;
use App\Src\Subject\SubjectRepository;

class LevelController extends Controller
{
    /**
     * @var SubjectRepository
     */
    private $subjectRepository;
    /**
     * @var LevelRepository
     */
    private $levelRepository;

    /**
     * @param LevelRepository $levelRepository
     * @param SubjectRepository $subjectRepository
     */
    public function __construct(LevelRepository $levelRepository, SubjectRepository $subjectRepository)
    {
        $this->subjectRepository = $subjectRepository;
        $this->levelRepository = $levelRepository;
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
