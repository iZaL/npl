<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Src\Answer\AnswerRepository;
use App\Src\Question\QuestionRepository;
use Illuminate\Http\Request;

class AnswerController extends Controller
{
    /**
     * @var QuestionRepository
     */
    private $questionRepository;
    /**
     * @var AnswerRepository
     */
    private $answerRepository;

    /**
     * @param AnswerRepository $answerRepository
     * @param QuestionRepository $questionRepository
     */
    public function __construct(AnswerRepository $answerRepository, QuestionRepository $questionRepository)
    {
        $this->questionRepository = $questionRepository;
        $this->answerRepository = $answerRepository;
    }

    public function index()
    {
        $answers = $this->answerRepository->model->has('parentAnswers')->paginate(50);

        $answers->load('question');
        $answers->load('childAnswersCount');

        return view('admin.modules.answer.index', compact('answers'));

    }

    public function show($id)
    {
        return redirect()->back()->with('info', 'Method Not Yet Implemented');
    }

    public function edit($id)
    {
        $answer = $this->answerRepository->model->with(['user','question'])->find($id);

        return view('admin.modules.answer.edit', compact('answer'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'body_en'    => 'required'
        ]);
        $answer = $this->answerRepository->model->find($id);

        $answer->fill($request->all());

        if ($answer->isDirty('body_en')) {
            // @todo: fire event to notify educators about new question
        }
        $answer->save($request->all());

        return redirect()->back()->with('success', 'Answer Updated');

    }


    /**
     * @param $id
     */
//    public function destroy($id)
//    {
//        // IF Parent Answer delete All Child Answers
//        $answer = $this->answerRepository->model->find($id);
//
//        if(!$answer) {
//            return redirect()->back()->with('error','incorrect access');
//        }
//        $answer->childAnswers()->delete();
//
////        $answer->question()->delete();
//
//        $answer->delete();
//
//    }

    public function destroy($id)
    {
        // IF Parent Answer delete All Child Answers
        $answer = $this->answerRepository->model->find($id);

        if(!$answer) {
            return redirect()->back()->with('error','incorrect access');
        }

        if($answer->isParent()) {

            foreach($answer->childAnswers as $child) {
                $child->notifications()->delete();
            }
            $answer->childAnswers()->delete();
        }
        $answer->notifications()->delete();

        $answer->delete();

    }
}
