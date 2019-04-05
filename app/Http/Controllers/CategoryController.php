<?php

namespace App\Http\Controllers;

use App\Category;
use App\Purchase;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    public function create()
    {

        return view('category.create');
    }

    public function store(Request $request)
    {

        $request->validate([
            'title' => 'string|max:255|required',
            'limit' => 'numeric|between:1,1000000|required'
        ]);

        $category = new Category();
        $category->title = $request->title;
        $category->limit = $request->limit;
        $category->user_id = auth()->user()->id;
        $category->save();

        return redirect(route('home'))->with('message', 'Категория успешно создана.');
    }

    public function show(Category $category, $date)
    {
        $date = Carbon::parse($date);

        $purchases = Purchase::where('category_id', $category->id)->whereBetween('created_at', [$date->copy()->startOfMonth(), $date->copy()->endOfMonth()])->get();

        return view('category.show', compact('category','date' ,'purchases'));
    }

    public function edit(Category $category){

        if(auth()->user()->id != $category->user_id){
            return redirect(route('home'))->with('message', 'Вы не можете редактировать сущность, которая вам не принадлежит');
        }

        return view('category.edit', compact('category'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'title' => 'string|max:255|required',
            'limit' => 'numeric|between:1,1000000|required'
        ]);

        $category = Category::find($request->category_id);

        if(auth()->user()->id != $category->user_id){
            return redirect(route('home'))->with('message', 'Вы не можете редактировать сущность, которая вам не принадлежит');
        }

        $category->title = $request->title;
        $category->limit = $request->limit;
        $category->update();

        return redirect(route('home'))->with('message', 'Категория успешно обновлена.');
    }
}
