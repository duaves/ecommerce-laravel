<?php

namespace App\Http\Controllers;

use App\Models\Like;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    public function index(){
        return view('like.index');  
    }

    public function add(Request $request, $id){
        //Получает значение cookie с именем 'like_id'. Это идентификатор избранного, если он уже существует.
        $like_id = $request->cookie('like_id');
        //Получает значение параметра 'quantity' из запроса. Если параметр не передан, устанавливает значение по умолчанию в 1.
        $quantity = $request->input('quantity');
        //Проверка существования избранного
        if(empty($like_id)){
            // если избранное еще не существует — создаем объект
            $like = Like::create();
            // получаем идентификатор, чтобы записать в cookie
            $like_id = $like->id;
        }else {
            // Обновление времени избранного:
            // избранное уже существует, получаем объект избранного
            $like = Like::findOrFail($like_id);
            // обновляем поле `updated_at` таблицы `likes`
            $like->touch();
        }
        //Добавление или обновление товара в избранном
        if ($like->products->contains($id)) {
            // если такой товар есть в избранном — изменяем кол-во
            $pivotRow = $like->products()->where('product_id', $id)->first()->pivot;
            $quantity = $pivotRow->quantity + $quantity;
            $pivotRow->update(['quantity' => $quantity]);
        } else {
            // если такого товара нет в избранном — добавляем его
            $like->products()->attach($id, ['quantity' => $quantity]);
        }
        // выполняем редирект обратно на страницу, где была нажата кнопка «В избранное»
        return back()->withCookie(cookie('like_id', $like_id, 525600));
    }
}
