<?php

namespace App\Http\Controllers;

use App\Model\Task;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;

class TaskController extends Controller
{

    public function index(Request $request)
    {
        return response([
            'data' => Task::where('archive', 0)
                //->where('user_id', $request->input('user_id'))
                ->orderBy('id', 'desc')->get()
        ], 200
        );
    }

    public function archived(Request $request)
    {
        return Task::where('archive', 1)->orderBy('id', 'desc')->get();
    }

    public function store(Request $request)
    {

        try {
            $this->validate($request, [
                'body' => 'required|max:500'
            ]);
        } catch (\Exception $e) {
            //too long text
        }


        try {

            $task = new Task();
            $task->title = $request->input('title');
            $task->user_id = $request->user()->id;
            $task->save();
        } catch (Exception $e) {
            return response()->json([
                'result' => 'failed',
            ]);
        }

        return response([
            'data' => Task::where('archive', 0)->orderBy('id', 'desc')->get()
        ], 200
        );


    }

    public function edit(Request $request)
    {

        $this->validate($request, [
            'body' => 'required|max:500'
        ]);

        $task = Task::findOrFail($request->id);
        $task->body = $request->body;
        $task->save();
    }

    public function archive(Request $request)
    {

        $this->validate($request, [
            'id' => 'required|max:500'
        ]);

        $task = Task::findOrFail($request->input('id'));
        $task->archive = !$task->archive;
        $task->save();
    }

    public function destroy(Request $request)
    {

        $task = Task::findOrFail($request->input('task_id'));
        $task->delete();

        return response([
            'data' => 'fatto'
        ], 200
        );
    }


}
