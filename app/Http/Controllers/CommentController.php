<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use App\Models\Comment;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Task $task_id)
    {
        $task = Task::findOrFail($task_id);
        return view('comments.crear', compact('task'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'comment' => 'required|string',
            'tags' => 'nullable|string',
            'task_id' => 'required|exists:tasks,id',
        ]);


        $comment = new Comment();
        $comment->title = $validatedData['title'];
        $comment->comment = $validatedData['comment'];
        $comment->tags = $validatedData['tags'];
        $comment->user_id = auth()->user()->id;
        $comment->task_id = $validatedData['task_id'];
        $comment->save();

        return redirect()->route('tareas.show', $validatedData['task_id']);
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $comment = Comment::findOrFail($id);
        return view('comments.mostrar', compact('comment'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $comment = Comment::findOrFail($id);
        return view('comments.editar', compact('comment'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $comment = Comment::findOrFail($id);

        $request->validate([
            'title' => 'required|string|max:255',
            'comment' => 'required|string',
            'tags' => 'nullable|array',
        ]);

        $commentData = $request->only(['title', 'comment', 'tags']);
        $comment->update($commentData);

        return redirect()->route('comments.mostrar', $comment->id)->with('success', 'Comentario actualizado exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $comment = Comment::findOrFail($id);
        $comment->delete();

        return redirect()->route('tareas.mostrar', $comment->task_id)->with('success', 'Comentario eliminado exitosamente.');
    }
}
