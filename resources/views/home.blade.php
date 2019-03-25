@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">

                @if (session('message'))
                    <div class="alert alert-warning" role="alert">
                        {{ session('message') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif

                <div class="card">
                    <div class="card-header">Добро пожаловать!</div>

                    <div class="card-body">

                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">Действие</th>
                                <th scope="col">Описание</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <th scope="row"><a class="btn btn-primary" href="{{route('category.create')}}">Создать категорию</a></th>
                                <td><span class="m-l-5">Создайте категорию ваших покупок и установите лимит на нее.</span></td>
                            </tr>
                            <tr>
                                <th scope="row"><a class="btn btn-success" href="{{route('purchase.create')}}">Создать покупку</a></th>
                                <td><span class="m-l-5">Создайте покупку и прикрепите ее к определенной категории.</span></td>
                            </tr>
                            <tr>
                                <th scope="row"><a class="btn btn-info" href="{{route('stats')}}">Статистика</a></th>
                                <td><span class="m-l-5">Посмотрите статистику по каждой категории за выбранный месяц.</span></td>
                            </tr>
                            <tr>
                                <th scope="row"> <a class="btn btn-dark" href="{{route('all')}}">Посмотреть все траты</a></th>
                                <td><span class="m-l-5">Список всех трат в виде таблицы</span></td>
                            </tr>
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
