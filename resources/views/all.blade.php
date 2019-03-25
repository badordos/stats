@extends('layouts.app')

@section('css')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.18/datatables.min.css"/>
@endsection

@section('content')

    @if (session('message'))
        <div class="alert alert-warning" role="alert">
            {{ session('message') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    <table id="all" class="table table-striped">
        <thead class="thead-dark">
        <tr>
            <th scope="col">Название</th>
            <th scope="col">Цена</th>
            <th scope="col">Категория</th>
            <th scope="col">Дата</th>
            <th scope="col">Действия</th>
        </tr>
        </thead>
        <tbody>
        @foreach($purchases as $purchase)
            <tr>
                <th>{{$purchase->title}}</th>
                <td>{{$purchase->cost}}</td>
                <td>{{$purchase->category->title}}</td>
                <td>{{$purchase->created_at->format('d.m.Y')}}</td>
                <td class="float-right">
                    <a href="{{route('purchase.edit', $purchase)}}" class="badge badge-light">Редактировать</a>
                    <a href="{{route('purchase.delete', $purchase)}}" class="badge badge-danger">Удалить</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

@endsection

@section('js')
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.18/datatables.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $('#all').DataTable();
        });
    </script>
@endsection
