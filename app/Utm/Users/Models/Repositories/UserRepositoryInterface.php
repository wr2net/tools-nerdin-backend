<?php

namespace App\Utm\Users\Models\Repositories;

use App\Utm\Users\Models\User;

/**
 * Interface UserRepositoryInterface
 * @package App\Utm\Users\Models\Repositories
 */
interface UserRepositoryInterface
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
    public function update(User $user, array $data);

    /**
     * @inheritDoc
     */
    public function enable(User $user);

    /**
     * @inheritDoc
     */
    public function disable(User $user);

    /**
     * @inheritDoc
     */
    public function destroy(User $user);
}
