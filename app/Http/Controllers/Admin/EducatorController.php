<?php

namespace App\Http\Controllers\Admin;

use App\Src\Educator\EducatorRepository;

class EducatorController extends Controller
{
    /**
     * @var EducatorRepository
     */
    private $educatorRepository;

    /**
     * @param EducatorRepository $educatorRepository
     */
    public function __construct(EducatorRepository $educatorRepository)
    {
        $this->middleware('auth', ['except' => 'index']);
        $this->educatorRepository = $educatorRepository;
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