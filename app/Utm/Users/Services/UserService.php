<?php

namespace App\Utm\Users\Services;

use App\Utm\Users\Models\User;
use App\Utm\Users\Models\Repositories\UserRepositoryInterface as UserRepository;

/**
 * Class UserService
 * @package App\Utm\Users\Services
 */
class UserService
{
    /**
     * @var UserRepository
     */
    private $userRepository;

    /**
     * @param UserRepository $userRepository
     */
    public function __construct(UserRepository $userRepository) {
        $this->userRepository = $userRepository;
    }

    /**
     * @return mixed
     */
    public function findAll()
    {
        return $this->userRepository->findAll();
    }

    /**
     * @param array $data
     * @return User
     */
    public function store(array $data): User
    {
        return $this->userRepository->store($data);
    }

    /**
     * @param User $user
     * @param array $data
     * @return User
     */
    public function update(User $user, array $data): User
    {
        return $this->userRepository->update($user, $data);
    }

    /**
     * @param User $user
     * @return User
     */
    public function enable(User $user): User
    {
        return $this->userRepository->enable($user);
    }

    /**
     * @param User $user
     * @return User
     */
    public function disable(User $user): User
    {
        return $this->userRepository->disable($user);
    }

    /**
     * @param User $user
     * @return mixed
     */
    public function destroy(User $user)
    {
        return $this->userRepository->destroy($user);
    }
}
