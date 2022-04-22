<?php

namespace App\Http\Controllers\Api\V1;

use App\Helpers\ItemHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\ItemStoreRequest;
use App\Http\Resources\ListResource;
use App\Models\ListD;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Response;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;

class ListController extends Controller
{
    /**
     * @return AnonymousResourceCollection
     */

    //    Получение всех элементов
    public function index(): AnonymousResourceCollection
    {
        return ListResource::collection(ListD::all());
    }

    /**
     * @param ItemStoreRequest $request
     * @return ListResource
     */
    // создание объекта
    public function store(ItemStoreRequest $request): ListResource
    {
        $list = ListD::query()->create($request->validated());

        return new ListResource($list);
    }

    /**
     * @param ListD $list
     * @return ListResource
     */
    // получение объекта по параметру id
    public function show(ListD $list): ListResource
    {
        return new ListResource($list);
    }

    /**
     * @param ItemStoreRequest $request
     * @param ListD $list
     * @return ListResource
     */
    // обновление объекта
    public function update(ItemStoreRequest $request, ListD $list): ListResource
    {
        $list->update($request->validated());

        return new ListResource($list);
    }

    //Удаление

    /**
     * @param ListD $list
     * @return Application|ResponseFactory|Response
     */
    public function destroy(ListD $list)
    {

        // В данном случае для удаления можно использовать трейт

        ItemHelper::destroyItem($list, $list->cards());

        return response(null, ResponseAlias::HTTP_NO_CONTENT);
    }

    /**
     * @param ListD $list
     * @return ListResource
     */

    public function filter(ListD $list): ListResource
    {
        $list->filterItem($list);

        return new ListResource($list);
    }
}
