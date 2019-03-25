@extends('layouts.app')

@section('content')
    <h4>Создать покупку</h4>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form method="POST" action="{{route('purchase.store')}}" enctype="multipart/form-data">
        {{csrf_field()}}
        <div class="form-group">
            <label>Название покупки</label>
            <input type="text" class="form-control" name="title" value="{{old('title')}}" placeholder="Введите название">
        </div>
        <div class="form-group">
            <label>Введите цену</label>
            <input type="number" class="form-control" name="cost" value="{{old('cost')}}" placeholder="Введите цену">
        </div>
        <div class="form-group">
            <label >Выберите категорию</label>
            <select class="form-control" name="category">
                <option selected disabled>Выберите категорию...</option>
            @foreach($categories as $category)
                    <option value="{{$category->id}}">{{$category->title}}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-success">Создать</button>
    </form>
@endsection
