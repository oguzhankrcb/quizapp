<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\QuestionUpdateRequest;
use App\Models\Question;
use App\Models\Quiz;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($quiz_id)
    {
        $questions = Question::where('quiz_id', $quiz_id)->get();

        $data['questions'] = $questions;
        $data['quiz'] = Quiz::find($quiz_id);

        //return $quiz_id;
        return view('admin.questions.list')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($quiz_id)
    {
        return $quiz_id;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($quiz_id, $question_id)
    {
        $question = Question::where('quiz_id', $quiz_id)->orderBy('id')->get();

        if (!$question){
            abort(404, "Quiz Bulunamadı");
        }
        else{
            return $question[$question_id - 1];
            //return view('admin.questions.show', compact('question'));
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($quiz_id, $question_id)
    {
        $question = Question::where('id', $question_id)->first();

        $data['question'] = $question;
        $data['quiz'] = Quiz::find($quiz_id);

        //return $quiz_id;
        return view('admin.questions.edit')->with($data);
        //return $question;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(QuestionUpdateRequest $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
