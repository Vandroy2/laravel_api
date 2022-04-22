<?php

namespace App\Http\Controllers\Api\V1;

use App\Helpers\ItemHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\ItemStoreRequest;
use App\Http\Resources\DeskResource;
use App\Models\Desk;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Response;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;

class DeskController extends Controller
{

    //    Получение всех объектов
    /**
     * @return AnonymousResourceCollection
     */
    public function index(): AnonymousResourceCollection
    {
        return DeskResource::collection(Desk::all());
    }

    /**
     * @param ItemStoreRequest $request
     * @return DeskResource
     */

// создание объекта
    public function store(ItemStoreRequest $request): DeskResource
    {
        $desk = Desk::query()->create($request->validated());

        return new DeskResource($desk);
    }

    /**
     * @param Desk $desk
     * @return DeskResource
     */

    // получение объекта по параметру id
    public function show(Desk $desk): DeskResource
    {
        return new DeskResource($desk);
    }

    /**
     * @param ItemStoreRequest $request
     * @param Desk $desk
     * @return DeskResource
     */

    // обновление объекта
    public function update(ItemStoreRequest $request, Desk $desk): DeskResource
    {
        $desk->update($request->validated());

        return new DeskResource($desk);
    }

    //Удаление

    /**
     * @param Desk $desk
     * @return Application|Response|ResponseFactory
     */
    public function destroy(Desk $desk)
    {
// В данном случае для удаления можно использовать трейт

        ItemHelper::destroyItem($desk, $desk->lists());

        return response(null, ResponseAlias::HTTP_NO_CONTENT);
    }

    public function filter(Desk $desk): DeskResource
    {
        $desk->filterItem($desk);

        return new DeskResource($desk);
    }


}
