<?php

namespace App\Modules\Taskmanager\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\Storetask_managerRequest;
use App\Http\Requests\Updatetask_managerRequest;
use App\Models\Product;
use App\Models\task_manager;

use App\Models\User;
use App\Modules\Taskmanager\Contracts\TaskManagerInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use \Illuminate\Support\Facades\Validator;
use function PHPUnit\Framework\isEmpty;

class TaskManagerController extends Controller
{

    private $TaskRepo;
    public function __construct(TaskManagerInterface $taskManager)
    {
        $this->TaskRepo = $taskManager;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
//        dd(1524154);
        return $this->TaskRepo->get_task();
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Storetask_managerRequest  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function storeTask(Request $request)
    {
        $input = $request->all();

        $validator = Validator::make($input,[
            'task_name' => 'required',
            'date' => 'required',
        ]);

        if($validator->fails()){
            return response()->json($validator->errors());
        }

        $data = [
            'task_name' => $request->task_name,
            'date' => $request->date,
            'reminder' => $request->reminder,
            'deleted_status' => 0,
        ];

//        dd($data);

        $this->TaskRepo->save_task($data);

        return response()->json([
            "status" => 1,
            "data" => $data
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\task_manager  $task_manager
     * @return \Illuminate\Http\JsonResponse
     */
    public function showTask($id)
    {
        $tasks = $this->TaskRepo->get_task_by_id($id);
        if (is_null($tasks)) {
            return response()->json([
                "status" => 0,
                "data" => "Task not found."
            ]);
        }
        return response()->json([
            "status" => 1,
            "data" => $tasks
        ]);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Updatetask_managerRequest  $request
     * @param  \App\Models\task_manager  $task_manager
     * @return \Illuminate\Http\JsonResponse
     */
    public function updateTaskReminder(Request $request, $id)
    {

        $input = $request->all();

//        dd($input['reminder']);
        if ($input['reminder']){
            $data = ['reminder' => 1];
        }else{
            $data = ['reminder' => 0];
        }

        $status = $this->TaskRepo->update_task($id, $data);

        return response()->json([
            "status" => 1,
            "data" => $status
        ]);

    }

    public function updateTaskNameDate(Request $request, $id){
        $input = $request->all();

//        dd($input['task_name']);
        $validator = Validator::make($input,[
            'task_name' => 'required',
            'date' => 'required',
        ]);

        if($validator->fails()){
            return response()->json($validator->errors());
        }


        $status= $this->TaskRepo->update_task_name_date($id,$input);

        return response()->json([
            "status" => 1,
            "data" => $status
        ]);

    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\task_manager  $task_manager
     * @return \Illuminate\Http\JsonResponse
     */
//    public function destroyTask(Request $request, $id)
    public function destroyTask(Request $request, $id)
    {
//        $input = $request->all();
        if ($id){
            $data = ['deleted_status' => 1];
        }
        $status = $this->TaskRepo->delete_task($id, $data);

        return response()->json([
            "status" => 1,
            "data" => $status ? 'deleted' : 'error'
        ]);

    }
}
