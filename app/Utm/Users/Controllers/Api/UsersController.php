<?php

namespace App\Utm\Users\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Utm\Users\Models\User;
use App\Utm\Users\Requests\UserRequest;
use App\Utm\Users\Resources\UserResource;
use App\Utm\Users\Services\UserService;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

/**
 * Class UserController
 * @package App\Utm\Users\Controllers\Api
 */
class UserController extends Controller
{
    /**
     * @var UserService
     */
    private $service;

    /**
     * @param UserService $service
     */
    public function __construct(UserService $service)
    {
        $this->service = $service;
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index(Request $request)
    {
        $list = $this->service->findAll();
        return UserResource::collection($list);
    }

    /**
     * @param UserRequest $request
     * @return JsonResponse
     */
    public function store(UserRequest $request)
    {
        $user = $this->service->store($request->validated());
        return response()->json($user, Response::HTTP_CREATED);
    }

    /**
     * @param User $user
     * @return JsonResponse
     */
    public function show(User $user)
    {
        return response()->json($user, Response::HTTP_OK);
    }

    /**
     * @param UserRequest $request
     * @param User $user
     * @return JsonResponse
     */
    public function update(UserRequest $request, User $user)
    {
        $user = $this->service->update($user, $request->validated());
        return response()->json($user, Response::HTTP_OK);
    }

    /**
     * @param User $user
     * @return JsonResponse
     */
    public function enable(User $user)
    {
        $user = $this->service->enable($user);
        return response()->json($user, Response::HTTP_OK);
    }

    /**
     * @param User $user
     * @return JsonResponse
     * @throws AuthorizationException
     */
    public function disable(User $user)
    {
        $this->authorize('disable', $user);
        $user = $this->service->disable($user);
        return response()->json($user, Response::HTTP_OK);
    }

    /**
     * @param User $user
     * @return JsonResponse
     * @throws AuthorizationException
     */
    public function destroy(User $user)
    {
        $this->authorize('destroy', $user);
        $this->service->destroy($user);
        return response()->json([], Response::HTTP_NO_CONTENT);
    }
}
