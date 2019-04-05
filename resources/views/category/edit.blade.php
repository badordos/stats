@extends('layouts.app')

@section('content')
    <h4>Отредактировать категорию</h4>

    @if (session('message'))
        <div class="alert alert-warning" role="alert">
            {{ session('message') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{route('category.update')}}" enctype="multipart/form-data">
        {{csrf_field()}}
        <input type="hidden" value="{{$category->id}}" name="category_id">
        <div class="form-group">
            <label>Название категории</label>
            <input type="text" class="form-control" name="title" value="{{$category->title}}" placeholder="Введите название">
        </div>
        <div class="form-group">
            <label>Введите лимит</label>
            <input type="number" class="form-control" name="limit" value="{{$category->limit}}" placeholder="Введите лимит">
        </div>
        <button type="submit" class="btn btn-success">Обновить</button>
    </form>

@endsection
