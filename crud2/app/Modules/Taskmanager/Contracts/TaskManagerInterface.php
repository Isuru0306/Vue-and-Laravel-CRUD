<?php
namespace App\Modules\Taskmanager\Contracts;
use App\Contracts\MainRepositoryInterface;

interface TaskManagerInterface extends MainRepositoryInterface
{
    public function save_task(array $data);
    public function get_task();
    public function get_task_by_id($id);
    public function delete_task($id, array $data);
    public function update_task($id, array $data);

    public function update_task_name_date($id, array $data);
}
