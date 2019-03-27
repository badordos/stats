@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">

                @if (session('message'))
                    <div class="alert alert-warning" role="alert">
                        {{ session('message') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif

                <div class="card">
                    <div class="card-header text-center"><h3>Добро пожаловать!</h3></div>

                    <div class="card-body">
                        <div class="row">

                            <div class="col-lg-6 col-sm-12 mt-3"><a class="btn btn-primary" href="{{route('category.create')}}">Создать категорию</a></div>
                            <div class="col-lg-6 col-sm-12 mt-3"><span class="m-l-5 ">Создайте категорию ваших покупок и установите лимит на нее.</span></div>

                            <div class="col-lg-6 col-sm-12 mt-3"><a class="btn btn-success" href="{{route('purchase.create')}}">Создать покупку</a></div>
                            <div class="col-lg-6 col-sm-12 mt-3"><span class="m-l-5">Создайте покупку и прикрепите ее к определенной категории.</span></div>

                            <div class="col-lg-6 col-sm-12 mt-3"><a class="btn btn-info" href="{{route('stats')}}">Статистика</a></div>
                            <div class="col-lg-6 col-sm-12 mt-3"><span class="m-l-5">Посмотрите статистику по каждой категории за выбранный месяц.</span></div>

                            <div class="col-lg-6 col-sm-12 mt-3"><a class="btn btn-dark" href="{{route('all')}}">Посмотреть все траты</a></div>
                            <div class="col-lg-6 col-sm-12 mt-3"><span class="m-l-5">Список всех трат в виде таблицы</span></div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
