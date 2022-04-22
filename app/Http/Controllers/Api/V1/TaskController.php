<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\TaskRequest;
use App\Http\Resources\TaskResource;
use App\Models\Task;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Response;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;

class TaskController extends Controller
{
    /**
     * @return AnonymousResourceCollection
     */
    //    Получение всех элементов
    public function index(): AnonymousResourceCollection
    {
        return TaskResource::collection(Task::all());
    }

    /**
     * @param TaskRequest $request
     * @return TaskResource
     */
    // создание объекта
    public function store(TaskRequest $request): TaskResource
    {
        $task = Task::query()->create($request->validated());

        return new TaskResource($task);
    }

    /**
     * @param Task $task
     * @return TaskResource
     */
    // получение объекта по параметру id
    public function show(Task $task): TaskResource
    {
        return new TaskResource($task);
    }

    /**
     * @param TaskRequest $request
     * @param Task $task
     * @return TaskResource
     */
    // обновление объекта
    public function update(TaskRequest $request, Task $task): TaskResource
    {
        $task->update($request->validated());

        return new TaskResource($task);
    }

    //Удаление

    /**
     * @param Task $task
     * @return Application|ResponseFactory|Response
     */
    public function destroy(Task $task)
    {
        $task->delete();

        return response(null, ResponseAlias::HTTP_NO_CONTENT);
    }
}
