<?php

namespace App\Http\Controllers;

use App\Category;
use App\Purchase;
use Illuminate\Http\Request;

class PurchaseController extends Controller
{
    public function create()
    {
        $categories = Category::where('user_id', auth()->user()->id)->get();

        if ($categories->isEmpty()) {
            return redirect(route('category.create'))->with('message', 'Сначала создайте хотя бы одну категорию');
        }

        return view('purchase.create', compact('categories'));
    }

    public function store(Request $request)
    {

        $request->validate([
            'title' => 'string|max:255|required',
            'cost' => 'numeric|between:1,1000000|required',
            'category' => 'numeric|required',
        ]);

        $purchase = new Purchase();
        $purchase->title = $request->title;
        $purchase->cost = $request->cost;
        $purchase->category_id = $request->category;
        $purchase->user_id = auth()->user()->id;
        $purchase->save();

        return redirect(route('home'))->with('message', 'Покупка успешно добавлена.');
    }

    public function edit(Purchase $purchase)
    {
        if(auth()->user()->id != $purchase->user_id){
            return redirect(route('home'))->with('message', 'Вы не можете редактировать сущность, которая вам не принадлежит');
        }

        $categories = Category::where('user_id', auth()->user()->id)->get();
        return view('purchase.edit', compact('purchase','categories'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'title' => 'string|max:255|required',
            'cost' => 'numeric|between:1,1000000|required',
            'category' => 'numeric|required',
        ]);

        $purchase = Purchase::find($request->purchase_id);

        if(auth()->user()->id != $purchase->user_id){
            return redirect(route('home'))->with('message', 'Вы не можете редактировать сущность, которая вам не принадлежит');
        }

        if($purchase){
            $purchase->title = $request->title;
            $purchase->cost = $request->cost;
            $purchase->category_id = $request->category;
            $purchase->update();

            return redirect(route('all'))->with('message', 'Покупка успешно обновлена.');
        }else{
            return redirect(route('all'))->with('message', 'Такой покупки не существует.');
        }

    }

    public function delete(Purchase $purchase)
    {
        if(auth()->user()->id != $purchase->user_id){
            return redirect(route('home'))->with('message', 'Вы не можете редактировать сущность, которая вам не принадлежит');
        }

        $purchase->delete();

        return back()->with('message', 'Покупка успешно удалена.');
    }
}
