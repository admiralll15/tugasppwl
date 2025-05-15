<?php

namespace App\Http\Controllers;

use App\Models\task;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class TodolistController extends Controller
{
    public function todolist(): View{
        $task = task::all();
        return view(view: 'home-template',data: [
            'task' => $task

        ]);
    }

    public function create(): View{
        return view(view: 'tambah');
    }
    public function store(Request $request): RedirectResponse
    {
        $validation = $request->validate(rules: [
            'task' => 'required|min:5|max:255|',
        ]);
    
        Task::create(attributes: [
            'task' => $validation['task'],
            'tanggal' => now()
        ]);
    
        return redirect('/');
    }

    public function destroy(Request $request): RedirectResponse
    {
        $task = task::findorFail($request->id);
        $task->delete();
    
        return redirect('/')->with('success', 'TASK BERHASIL DIHAPUS');
    }

   public function edit(Request $request) {
        $task = Task::find($request->id);
        return view('edit', [
            'task' => $task
    ]);
    }

public function update(Request $request, $id) {
    $validation = $request->validate([
        'task' => 'required|min:5|max:255|',
    ]);

    task::where('id', $id)->update([
        'task' => $validation['task'],
        'tanggal' => now()
    ]);

    return redirect('/')->with('success', 'TASK BERHASIL DIUPDATE');
}
}


