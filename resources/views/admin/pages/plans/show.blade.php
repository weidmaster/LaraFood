@extends('adminlte::page')

@section('title', "Detalhes do plano {$plan->name}")

@section('content_header')
<h1>Detalhes do plano <strong>{{ $plan->name }}</strong></h1>
@stop

@section('content')
<div class="card">
    <div class="card-body">
        <ul>
            <li>
                <strong>Nome: </strong> {{ $plan->name }}
            </li>
            <li>
                <strong>URL: </strong> {{ $plan->url }}
            </li>
            <li>
                <strong>Preço: </strong> R$ {{ number_format($plan->price, 2, ',', '.') }}
            </li>
            <li>
                <strong>Descrição: </strong> {{ $plan->description }}
            </li>
        </ul>
    </div>
</div>
@endsection