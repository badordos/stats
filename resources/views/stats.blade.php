@extends('layouts.app')

@section('content')

    @if (session('message'))
        <div class="alert alert-warning" role="alert">
            {{ session('message') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    <nav class="mb-3">
        <ul class="pagination justify-content-center">
            <li class="page-item">
                <a class="page-link" href="{{route('stats', $date->copy()->subMonths(1)->format('d-m-Y'))}}"
                   aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                </a>
            </li>
            <li class="page-item disabled"><a class="page-link disabled" href="#">{{$date->format('m.Y')}}</a></li>
            <li class="page-item">
                <a class="page-link" href="{{route('stats', $date->copy()->addMonths(1)->format('d-m-Y'))}}"
                   aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                </a>
            </li>
        </ul>
    </nav>

    <div class="row">
        <div class="col-xl-3 col-md-6">
            <div class="card bg-c-green text-white">
                <div class="card-block">
                    <div class="row align-items-center">
                        <div class="col">
                            <p class="m-b-5">Лимит</p>
                            <h4 class="m-b-0">{{$limit}}</h4>
                        </div>
                        <div class="col col-auto text-right">
                            <i class="far fa-list-alt"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6">
            <div class="card bg-c-blue text-white">
                <div class="card-block">
                    <div class="row align-items-center">
                        <div class="col">
                            <p class="m-b-5">Траты</p>
                            <h4 class="m-b-0">{{$purchases_sum}}</h4>
                        </div>
                        <div class="col col-auto text-right">
                            <i class="fas fa-funnel-dollar"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6">
            <div class="card bg-c-yellow text-white">
                <div class="card-block">
                    <div class="row align-items-center">
                        <div class="col">
                            <p class="m-b-5">Процент</p>
                            <h4 class="m-b-0">{{round($purchases_sum / $limit *100, -1)}}</h4>
                        </div>
                        <div class="col col-auto text-right">
                            <i class="fas fa-percent"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6">
            <div class="card bg-c-pink text-white">
                <div class="card-block">
                    <div class="row align-items-center">
                        <div class="col">
                            <p class="m-b-5">Остаток</p>
                            <h4 class="m-b-0">{{$limit - $purchases_sum}}</h4>
                        </div>
                        <div class="col col-auto text-right">
                            <i class="far fa-calendar-plus"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @foreach($categories as $category)
            <div class="col-12">
                <div class="card quater-card">
                    <div class="card-block">
                        <a href="{{route('category.show', ['category' => $category, 'date'=> $date->format('d-m-Y')])}}"><h3 class="m-b-20">{{$category->title}}</h3></a>
                        <h4>Траты = {{$purchasesSum = $category->purchasesSum($purchases)}}</h4>
                        <h4 class="text-muted">Лимит = {{$category->limit}}</h4>
                        <h5 class="m-t-30">{{$percent = $purchasesSum / $category->limit * 100}}%</h5>
                        <p class="text-muted"><span class="f-right">{{$percent}}%</span></p>
                        <div class="progress">
                            <div
                                class="progress-bar {{$class = $percent>100 ? 'bg-simple-c-pink' : 'bg-simple-c-green'}}"
                                style="width: {{$width= $percent>100 ? 100 : round($percent,-1) }}%"></div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

@endsection
