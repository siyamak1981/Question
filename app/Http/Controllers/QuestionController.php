<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Question;
use Auth;
use Gate;
use App\Http\Requests\AskQuestionRequest;


class QuestionController extends Controller
{
    public function __construct(){
        return $this->middleware('auth')->except(['index', 'show']);
    }
    
        
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $questions = Question::with('user')->latest()->paginate(5);
        return view('questions.index', compact('questions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $question = new Question;
        return view('questions.create', compact('question'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AskQuestionRequest $request)
    {

        // $question = new Question;
        // $question->title = $request->title;
        // $question->body = $request->body;
        // $question->user_id = Auth::id();
        // $question->save();
        $request->user()->questions()->create($request->only('title', 'body'));
        return redirect(route('questions.index'))
            ->with('success', 'You are send a message successfully !');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Question $question)
    {
        $question->increment('views');
        return view('questions.show', compact('question'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Question $question)
    {
        // if(\Gate::denies('update-question',$question)){

        //     return abort(403, 'access denied');
        // }
        $this->authorize('update', $question);
        return view('questions.edit', compact('question'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AskQuestionRequest $request, Question $question)
    {
        $question->update($request->only('title', 'body'));
        return redirect(route('questions.index'))->with('success', 'Your Question is updated succesfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Question $question)
    {
        // if(\Gate::denies('update_question',$question)){
        //     return abort(403, 'access denies');
        // }
        $this->authorize('delete', $question);
        $question->delete();
        return back()->with('success', 'Question was deleted successfully !');
        
    }
}
