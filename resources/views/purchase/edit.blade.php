@extends('layouts.app')

@section('content')
    <h4>Отредактировать покупку</h4>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form method="POST" action="{{route('purchase.update')}}" enctype="multipart/form-data">
        {{csrf_field()}}
        <input type="hidden" name="purchase_id" value="{{$purchase->id}}">
        <div class="form-group">
            <label>Название покупки</label>
            <input type="text" class="form-control" name="title" value="{{$purchase->title}}" placeholder="Введите название">
        </div>
        <div class="form-group">
            <label>Введите цену</label>
            <input type="number" class="form-control" name="cost" value="{{$purchase->cost}}" placeholder="Введите цену">
        </div>
        <div class="form-group">
            <label >Выберите категорию</label>
            <select class="form-control" name="category">
                @foreach($categories as $category)
                    <option @if($category->id == $purchase->category_id) selected @endif value="{{$category->id}}">{{$category->title}}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-success">Обновить</button>
    </form>
@endsection
