<?php

namespace App\Http\Controllers;

//import Model 
use App\Models\Task;

//return type View
use Illuminate\View\View;

use Illuminate\Http\Request;

use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;

class TaskController extends Controller
{
    /**
     * index
     *
     * @return View
     */
    public function index(): View
    {
        //get posts
        $task = Task::latest()->get();

        //render view with posts
        return view('index', compact('task'));
    }

    /**
     * create
     *
     * @return View
     */
    public function create(): View
    {
        return view('create');
    }

    /**
     * store
     *
     * @param  mixed $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        //validate form
        $this->validate($request, [
            'judul'     => 'required',
            'deskripsi' => 'required',
            'status'    => 'required'
        ]);

        //create post
        Task::create([
            'judul'     => $request->judul,
            'deskripsi'     => $request->deskripsi,
            'status'   => $request->status
        ]);

        //redirect to index
        return redirect('/')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    /**
     * edit
     *
     * @param  mixed $id
     * @return View
     */
    public function edit(string $id): View
    {
        //get post by ID
        $task = Task::findOrFail($id);

        $list = array('Complete', 'Incomplete');

        //render view with post
        return view('edit', compact('task', 'list'));
    }

    /**
     * update
     *
     * @param  mixed $request
     * @param  mixed $id
     * @return RedirectResponse
     */
    public function update(Request $request, $id): RedirectResponse
    {
        //get post by ID
        $task = Task::findOrFail($id);

        //update post without image
        $task->update([
            'judul'     => $request->judul,
            'deskripsi'   => $request->deskripsi,
            'status'   => $request->status,
        ]);

        //redirect to index
        return redirect('/')->with(['success' => 'Data Berhasil Diubah!']);
    }

    public function destroy($id): RedirectResponse
    {
        $task = Task::findOrFail($id);

        $task->delete();

        return redirect('/');
    }

    public function complete()
    {
        $task = Task::where('status', 'Complete')->get();

        return view('complete', compact('task'));
    }

    public function incomplete()
    {
        $task = Task::where('status', 'Incomplete')->get();

        return view('incomplete', compact('task'));
    }

    public function editStatus(string $id)
    {
        //get post by ID
        $task = Task::findOrFail($id);

        $list = array('Complete', 'Incomplete');

        //render view with post
        return redirect('/update/{id}/status', compact('task'));
    }

    public function updateStatus(Request $request, $id): RedirectResponse
    {
        //get post by ID
        $task = Task::findOrFail($id);

        if ($request->where('status', 'Complete')) {
            //update post without image
            $task->update([
                'status'   => $request->Incomplete,
            ]);
        }

        //redirect to index
        return redirect('/')->with(['success' => 'Data Berhasil Diubah!']);
    }
}
