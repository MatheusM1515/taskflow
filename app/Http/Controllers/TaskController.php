<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    public function dashboard()
    {
        if(!Auth::check()){
            return redirect('/login');
        }

        $tasks = Task::where('user_id', Auth::id())->get();

        return view('dashboard', compact('tasks'));

    }

    public function store(Request $request)
    {
        Task::create([
            'titulo' => $request->titulo,
            'status' => 'pendente',
            'user_id' => Auth::id() // ✅ CORRETO
        ]);

        return back();
    }

    public function update($id)
    {
        $task = Task::find($id);
        $task->status = 'concluida';
        $task->save();

        return back();
    }

    public function destroy($id)
    {
        Task::find($id)->delete();
        return back();
    }

}