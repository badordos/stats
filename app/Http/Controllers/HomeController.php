<?php

namespace App\Http\Controllers;

use App\Category;
use App\Purchase;
use Carbon\Carbon;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('home');
    }

    public function stats($date = null){

        if(!$date){
            $date = Carbon::now()->startOfMonth();
        }else{
            $date = Carbon::parse($date)->startOfMonth();
        }

        $categories = Category::where('user_id', auth()->user()->id)->get();
        $purchases = Purchase::where('user_id', auth()->user()->id)->whereBetween('created_at',[$date, $date->copy()->endOfMonth()])->get();

        $limit = $categories->sum('limit');
        $purchases_sum = $purchases->sum('cost');

        return view('stats', compact('categories', 'purchases', 'date', 'limit', 'purchases_sum'));
    }

    public function all($year = null){

        $purchases = Purchase::where('user_id', auth()->user()->id)->with('category')->get()->sortByDesc('created_at');

        return view('all', compact('purchases'));
    }
}
