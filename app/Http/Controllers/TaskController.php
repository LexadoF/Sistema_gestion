<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Task;

class TaskController extends Controller
{

    function __construct()
    {
            $this->middleware('permission:ver-tareas|crear-tareas|editar-tareas|borrar-tareas', ['only'=> ['index']]);;
            $this->middleware('permission:ver-tareas', ['only'=> ['show', 'show']]);
            $this->middleware('permission:crear-tareas', ['only'=> ['create', 'store']]);
            $this->middleware('permission:editar-tareas', ['only'=> ['edit', 'update']]);
            $this->middleware('permission:borrar-tareas', ['only'=> ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tasks = Task::paginate(10);
        return view('tareas.index', compact('tasks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::pluck('name', 'id');
        $tasks = Task::pluck('alias', 'id')->prepend('Ninguna', '');

        return view('tareas.crear', compact('users', 'tasks'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'alias' => 'required|string|unique:tasks',
            'status' => 'required|string',
            'initial_date' => 'nullable|date',
            'final_date' => 'nullable|date',
            'assigned_to' => 'required|exists:users,id',
            'time_used' => 'nullable|numeric',
            'percentage_progress' => 'nullable|integer|min:0|max:100',
        ]);

        Task::create($request->all());

        return redirect()->route('tareas.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $task = Task::findOrFail($id);
        return view('tareas.mostrar', compact('task'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tarea = Task::findOrFail($id);
        $tasks = Task::pluck('alias', 'id')->prepend('Ninguna', '');
        $users = User::pluck('name', 'id');

        return view('tareas.editar', compact('tarea','tasks', 'users'));
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
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'alias' => 'required|string|unique:tasks,alias,'.$id,
            'status' => 'required|string',
            'initial_date' => 'nullable|date',
            'final_date' => 'nullable|date',
            'assigned_to' => 'required|exists:users,id',
            'time_used' => 'nullable|string',
        ]);

        $task = Task::findOrFail($id);
        $task->update($validatedData);

        return redirect()->route('tareas.index')
                         ->with('success', 'Tarea actualizada exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Task $tarea)
    {
        $tarea->delete();

        return redirect()->route('tareas.index');
    }
}
