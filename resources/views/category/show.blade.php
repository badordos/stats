@extends('layouts.app')

@section('content')

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <nav class="mb-3">
        <ul class="pagination justify-content-center">
            <li class="page-item">
                <a class="page-link"
                   href="{{route('category.show', ['category' => $category, 'date'=> $date->copy()->subMonths(1)->format('d-m-Y')])}}"
                   aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                </a>
            </li>
            <li class="page-item disabled"><a class="page-link disabled" href="#">{{$date->format('m.Y')}}</a></li>
            <li class="page-item">
                <a class="page-link"
                   href="{{route('category.show', ['category' => $category, 'date'=> $date->copy()->addMonths(1)->format('d-m-Y')])}}"
                   aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                </a>
            </li>
        </ul>
    </nav>

    <div class="col-12">
        <div class="card latest-update-card">
            <div class="card-header">
                <h4>{{$category->title}}</h4>
                <div class="card-header-right">
                    <ul class="list-unstyled card-option">
                        <li><i class="fa fa fa-wrench open-card-option"></i></li>
                        <li><i class="fa fa-window-maximize full-card"></i></li>
                        <li><i class="fa fa-trash close-card"></i></li>
                    </ul>
                </div>
            </div>
            <div class="card-block">
                @foreach($purchases as $purchase)
                    <div class="latest-update-box">
                        <div class="row p-t-20 p-b-30">
                            <div class="col-auto text-right update-meta">
                                <p class="text-muted m-b-0 d-inline">{{$purchase->created_at->format('d.m.Y')}}</p>
                                @if($purchase->cost < 1000)
                                    <i style="padding-left: 10px" class="fas fa-money-bill bg-info update-icon"></i>
                                @elseif($purchase->cost >= 1000 && $purchase->cost < 3000)
                                    <i style="padding-left: 10px" class="fas fa-money-bill bg-warning update-icon"></i>
                                @else
                                    <i style="padding-left: 10px" class="fas fa-money-bill bg-danger update-icon"></i>
                                @endif
                            </div>
                            <div class="col">
                                <h6>Цена: {{$purchase->cost}}</h6>
                                <p class="text-muted m-b-0">{{$purchase->title}}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

@endsection
