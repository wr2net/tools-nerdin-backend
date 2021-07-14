<?php

namespace App\Utm\Tasks\Services;

use App\Utm\Tasks\Models\Task;
use App\Utm\Tasks\Models\Repositories\TaskRepositoryInterface as TaskRepository;

/**
 * Class TaskService
 * @package App\Utm\Tasks\Services
 */
class TaskService
{
    /**
     * @var TaskRepository
     */
    private $taskRepository;

    /**
     * @param TaskRepository $taskRepository
     */
    public function __construct(TaskRepository $taskRepository) {
        $this->taskRepository = $taskRepository;
    }

    /**
     * @return mixed
     */
    public function findAll()
    {
        return $this->taskRepository->findAll();
    }

    /**
     * @param array $data
     * @return Task
     */
    public function store(array $data): Task
    {
        return $this->taskRepository->store($data);
    }

    /**
     * @param Task $task
     * @param array $data
     * @return Task
     */
    public function update(Task $task, array $data): Task
    {
        return $this->taskRepository->update($task, $data);
    }

    /**
     * @param Task $task
     * @return Task
     */
    public function enable(Task $task): Task
    {
        return $this->taskRepository->enable($task);
    }

    /**
     * @param Task $task
     * @return Task
     */
    public function disable(Task $task): Task
    {
        return $this->taskRepository->disable($task);
    }

    /**
     * @param Task $task
     * @return mixed
     */
    public function destroy(Task $task)
    {
        return $this->taskRepository->destroy($task);
    }
}
