<?php

namespace App\Http\Controllers;

use App\Http\Requests\WorkerRequest;
use App\Models\Worker;
use Illuminate\Http\Request;

class WorkersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $workers = Worker::all();

        return view('admin/workers/index', compact('workers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('admin/workers/form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\WorkerRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(WorkerRequest $request)
    {
        Worker::create($request->only(['name']));

        return redirect()->route('workers.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Worker  $worker
     * @return \Illuminate\Http\Response
     */
    public function show(Worker $worker)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Worker  $worker
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit(Worker $worker)
    {
        return view('admin/workers/form', compact('worker'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\WorkerRequest  $request
     * @param  \App\Models\Worker  $worker
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(WorkerRequest $request, Worker $worker)
    {
        $worker->update($request->only(['name']));

        return redirect()->route('workers.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Worker  $worker
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Worker $worker)
    {
        $worker->delete();

        return redirect()->route('workers.index');
    }
}
