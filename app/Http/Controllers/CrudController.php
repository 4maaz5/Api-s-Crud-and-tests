<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\FeedBack;
use App\Events\TaskUpdated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CrudController extends Controller
{
    public function index(){

        return view('task');
    }

    public function store(Request $request)
    {

        $validated = $request->validate([
            'firstname' => 'required',
            'lastname' => 'required',
        ]);
        if ($validated) {
            $save = new Task();
            $save->title = $request->firstname;
            $save->description = $request->lastname;
            $save->save();
            return redirect()->back()->with('success','Task Added Successfully!');
        } else {
            return redirect()->back()->with('success','Something wrong!');
        }
    }
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'firstname' => 'required',
            'lastname' => 'required',
        ]);

        $task = Task::find($id);
        $task->title = $request->firstname;
        $task->description = $request->lastname;
        $task->save();

        // Fire the event
        event(new TaskUpdated($task));

        return redirect()->back()->with('success', 'Task updated Successfully!');
    }
public function delete($id){
    Task::destroy($id);
    return redirect()->back()->with('delete','Task Deleted Successfully!');
}
public function feedback(Request $request){

    $data=new FeedBack();
    // dd($request->Auth::user()->id);
    $data->user_id=Auth::user()->id;
    $data->feedback = $request->input('feedback_value');
    $data->save();
    return redirect()->Back();
}
public function tasks(){
    $data=Task::all();
    return view('tasks',compact('data'));
}
}
