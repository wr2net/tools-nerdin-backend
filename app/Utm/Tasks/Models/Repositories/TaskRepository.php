<?php

namespace App\Utm\Tasks\Models\Repositories;

use App\Utm\Tasks\Models\Task;
use Exception;
use Illuminate\Support\Facades\DB;

/**
 * Class TaskRepository
 * @package App\Utm\Tasks\Models\Repositories
 */
class TaskRepository implements TaskRepositoryInterface
{
    /**
     * @param int $id
     * @return Task
     */
    public function findById(int $id)
    {
        return Task::withTrashed()
            ->findOrFail($id);
    }

    /**
     * @return Task[]
     */
    public function findAll()
    {
        return Task::withTrashed()
            ->get();
    }

    /**
     * @param array $data
     * @return Task
     */
    public function store(array $data)
    {
        $task = new Task;
        $task->name = $data['name'];
        $task->start_date = $data['start_date'];
        $task->conclusion_date = $data['conclusion_date'] ?? null;
        $task->status = $data['address'];
        $task->save();
        return $task;
    }

    /**
     * @param Task $task
     * @param array $data
     * @return Task
     */
    public function update(Task $task, array $data)
    {
        $task->name = $data['name'];
        $task->start_date = $data['start_date'];
        $task->conclusion_date = $data['conclusion_date'];
        $task->status = $data['status'];
        $task->save();
        return $task;
    }

    /**
     * @param Task $task
     * @return Task
     */
    public function enable(Task $task)
    {
        $task->restore();
        return $task;
    }

    /**
     * @param Task $task
     * @return Task
     */
    public function disable(Task $task)
    {
        $task->delete();
        return $task;
    }

    /**
     * @param Task $task
     * @return null
     */
    public function destroy(Task $task)
    {
        $task->forceDelete();
        return null;
    }
}
