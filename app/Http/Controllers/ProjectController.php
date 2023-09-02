<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class ProjectController extends Controller
{

    function __construct()
    {
        $this->middleware('permission:ver-proyectos|crear-proyectos|editar-proyectos|borrar-proyectos', ['only' => ['index']]);;
        $this->middleware('permission:ver-proyectos', ['only' => ['show', 'show']]);
        $this->middleware('permission:crear-proyectos', ['only' => ['create', 'store']]);
        $this->middleware('permission:editar-proyectos', ['only' => ['edit', 'update']]);
        $this->middleware('permission:borrar-proyectos', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = Project::paginate(10);
        return view('proyectos.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $liderRole = Role::where('name', 'Lider')->first();
        $users = $liderRole->users()->pluck('name', 'id');
        return view('proyectos.crear', compact('users'));
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
            'avatar' => 'nullable|string',
            'alias' => 'required|string|unique:projects',
            'status' => 'required|string',
            'initial_date' => 'nullable|date',
            'final_date' => 'nullable|date',
            'leader_user' => 'required|exists:users,id',
        ]);

        Project::create($request->all());

        return redirect()->route('proyectos.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $project = Project::findOrFail($id);
        $liderRole = Role::where('name', 'LIDER')->first();
        $users = $liderRole->users()->pluck('name', 'id');
        return view('proyectos.mostrar', compact('project', 'users'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $project = Project::findOrFail($id);
        $liderRole = Role::where('name', 'LIDER')->first();
        $users = $liderRole->users()->pluck('name', 'id');

        return view('proyectos.editar', compact('project', 'users'));
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
            'avatar' => 'nullable|string',
            'alias' => 'required|string|unique:projects,alias,'.$id,
            'status' => 'required|string',
            'initial_date' => 'nullable|date',
            'final_date' => 'nullable|date',
            'leader_user' => 'required|exists:users,id',
        ]);

        $project = Project::findOrFail($id);
        $project->update($validatedData);

        return redirect()->route('proyectos.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $project = Project::findOrFail($id);
        $project->delete();

        return redirect()->route('proyectos.index')->with('success', 'Proyecto eliminado exitosamente.');
    }
}
