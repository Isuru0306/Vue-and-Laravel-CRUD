<?php
namespace App\Modules\Taskmanager\Repositories;

use App\Modules\Taskmanager\Contracts\TaskManagerInterface;
use App\Repositories\MainRepository;
use App\Models\task_manager;


class TaskManagerRepository extends MainRepository implements TaskManagerInterface{

    function model()
    {
        return 'App\Models\task_manager';
    }

    public function save_task(array $data)
    {
        return task_manager::create($data);
    }

    public function get_task()
    {
        return task_manager::all();
    }

    public function get_task_by_id($id)
    {
        return task_manager::where('id',$id)->first();
    }

    public function delete_task($id, $data)
    {
//        return task_manager::destroy($id);
        $task = $this->get_task_by_id($id);
        $task->deleted_status = $data['deleted_status'];
        return $task->update();


    }


    public function update_task($id, array $data)
    {
        $task = $this->get_task_by_id($id);
        $task->reminder = $data['reminder'];
        return $task->update();
    }

    public function update_task_name_date($id, array $data)
    {
//        dd($data);
        $task = $this->get_task_by_id($id);
        $task->task_name = $data['task_name'];
        $task->date = $data['date'];
        $task->reminder = $data['reminder'];

        return $task->update();
    }


}
