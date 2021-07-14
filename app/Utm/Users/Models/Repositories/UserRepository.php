<?php

namespace App\Utm\Users\Models\Repositories;

use App\Utm\Users\Models\User;
use Exception;
use Illuminate\Support\Facades\DB;

/**
 * Class UserRepository
 * @package App\Utm\Users\Models\Repositories
 */
class UserRepository implements UserRepositoryInterface
{
    /**
     * @param int $id
     * @return User
     */
    public function findById(int $id)
    {
        return User::withTrashed()
            ->findOrFail($id);
    }

    /**
     * @return User[]
     */
    public function findAll()
    {
        return User::withTrashed()
            ->get();
    }

    /**
     * @param array $data
     * @return User
     */
    public function store(array $data)
    {
        $user = new User;
        $user->name = $data['name'];
        $user->email = $data['email'];
        $user->password = $data['password'];
        $user->save();
        return $user;
    }

    /**
     * @param User $user
     * @param array $data
     * @return User
     */
    public function update(User $user, array $data)
    {
        $user->name = $data['name'];
        $user->email = $data['email'];
        $user->password = $data['password'];
        $user->save();
        return $user;
    }

    /**
     * @param User $tuser
     * @return User
     */
    public function enable(User $user)
    {
        $user->restore();
        return $user;
    }

    /**
     * @param User $user
     * @return User
     */
    public function disable(User $user)
    {
        $user->delete();
        return $user;
    }

    /**
     * @param User $user
     * @return null
     */
    public function destroy(User $user)
    {
        $user->forceDelete();
        return null;
    }
}
