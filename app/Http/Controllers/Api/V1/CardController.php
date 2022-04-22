<?php

namespace App\Http\Controllers\Api\V1;

use App\Helpers\ItemHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\ItemStoreRequest;
use App\Http\Resources\CardResource;
use App\Models\Card;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Response;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;

class CardController extends Controller
{

    /**
     * @return AnonymousResourceCollection
     */
    //    Получение всех объектов

    public function index(): AnonymousResourceCollection
    {
        return CardResource::collection(Card::all());
    }

    /**
     * @param ItemStoreRequest $request
     * @return CardResource
     */
    // создание объекта из полей, которые были провалидированы--
    public function store(ItemStoreRequest $request): CardResource
    {
        $card = Card::query()->create($request->validated());

        return new CardResource($card);
    }

    /**
     * @param Card $card
     * @return CardResource
     */
    // Получение объекта по параметру id. В параметр можно передать $id и по нему найти нужный объект.
    // Это сокращенная запись
    public function show(Card $card): CardResource
    {
        return new CardResource($card);
    }

    /**
     * @param ItemStoreRequest $request
     * @param Card $card
     * @return CardResource
     */
    // обновление объекта из полей, которые были провалидированы--
    public function update(ItemStoreRequest $request, Card $card): CardResource
    {
        $card->update($request->validated());

        return new CardResource($card);
    }

    //Удаление

    /**
     * @param Card $card
     * @return Application|ResponseFactory|Response
     */
    public function destroy(Card $card)
    {
        // Используем универсальный хелпер. В данном случае для удаления можно использовать трейт

        ItemHelper::destroyItem($card, $card->tasks());

        return response(null, ResponseAlias::HTTP_NO_CONTENT);
    }
}
