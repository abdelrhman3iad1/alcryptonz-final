<?php

namespace App\Http\Controllers;

use App\Models\Qa;
use Illuminate\Http\Request;

class QaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $qs = Qa::all();
        return view("Dashboard.questions.index", compact("qs"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("Dashboard.questions.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate(
            [
                "question" => "required|string",
                "answer" => "required|string",
            ],
            [
                'question.required' => 'يجب إدخال السؤال.',
                'question.string' => 'يجب أن يكون السؤال نصًا.',
                'answer.required' => 'يجب إدخال الإجابة.',
                'answer.string' => 'يجب أن تكون الإجابة نصًا.',
            ]
        );
        $validated['user_id'] = auth()->id();
        Qa::create($validated);
        return redirect()->route('questions.index')->with("success", "تم إضافة السؤال بنجاح.");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $question = Qa::findOrFail($id);
        return view("Dashboard.questions.show", compact("question"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $q = Qa::findOrFail($id);
        return view("Dashboard.questions.edit", compact("q"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate(
            [
                "question" => "required|string",
                "answer" => "required|string",
            ],
            [
                'question.required' => 'يجب إدخال السؤال.',
                'question.string' => 'يجب أن يكون السؤال نصًا.',
                'answer.required' => 'يجب إدخال الإجابة.',
                'answer.string' => 'يجب أن تكون الإجابة نصًا.',
            ]
        );

        $question = Qa::findOrFail($id);
        $question->update($validated);
        return redirect()->route('questions.index')->with("success", "تم تحديث السؤال بنجاح.");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $question = Qa::findOrFail($id);
        $question->delete();
        return redirect()->route('questions.index')->with("success", "تم حذف السؤال بنجاح.");
    }
}
