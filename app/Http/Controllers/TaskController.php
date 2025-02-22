<?php
 
namespace App\Http\Controllers;
 
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Task;
use App\Repositories\TaskRepository;
 
class TaskController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
        /**
     * The task repository instance.
     *
     * @var TaskRepository
     */
    protected $tasks;
 
    /**
     * Create a new controller instance.
     *
     * @param  TaskRepository  $tasks
     * @return void
     */
    public function __construct(TaskRepository $tasks)
    {
        $this->middleware('auth');
 
        $this->tasks = $tasks;
    }
 
    /**
     * Display a list of all of the user's task.
     *
     * @param  Request  $request
     * @return Response
     */
    public function index(Request $request)
    {
        return view('tasks.index', [
            'tasks' => $this->tasks->forUser($request->user()),
        ]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
        ]);
     
        $request->user()->tasks()->create([
            'name' => $request->name,
        ]);
     
        return redirect('/tasks');
    }

    /**
     * Destroy the given task.
     *
     * @param  Request  $request
     * @param  Task  $task
     * @return Response
     */
    public function destroy(Request $request, Task $task)
    {
        $this->authorize('destroy', $task);
    
        $task->delete();
    
        return redirect('/tasks');
    }
}