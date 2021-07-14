<?php

namespace App\Utm\Tasks\Models\Repositories;

use App\Utm\Tasks\Models\Task;

/**
 * Interface TaskRepositoryInterface
 * @package App\Utm\Tasks\Models\Repositories
 */
interface TaskRepositoryInterface
{
    /**
     * @inheritDoc
     */
    public function findById(int $id);

    /**
     * @inheritDoc
     */
    public function findAll();

    /**
     * @inheritDoc
     */
    public function store(array $data);

    /**
     * @inheritDoc
     */
    public function update(Task $task, array $data);

    /**
     * @inheritDoc
     */
    public function enable(Task $task);

    /**
     * @inheritDoc
     */
    public function disable(Task $task);

    /**
     * @inheritDoc
     */
    public function destroy(Task $task);
}
