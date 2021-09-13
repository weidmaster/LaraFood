@extends('adminlte::page')

@section('title', "Detalhes da empresa {$tenant->name}")

@section('content_header')
<h1>Detalhes da empresa <strong>{{ $tenant->name }}</strong></h1>
@stop

@section('content')
<div class="card">
    <div class="card-body">

        <img src="{{ url("storage/{$tenant->logo}") }}" alt="{{ $tenant->name }}" style="max-width:90px;">

        <ul>
            <li>
                <strong>Plano: </strong> {{ $tenant->plan->name }}
            </li>
            <li>
                <strong>Nome: </strong> {{ $tenant->name }}
            </li>
            <li>
                <strong>URL: </strong> {{ $tenant->url }}
            </li>
            <li>
                <strong>E-mail: </strong> {{ $tenant->email }}
            </li>
            <li>
                <strong>CNPJ: </strong> {{ $tenant->cnpj }}
            </li>
            <li>
                <strong>Ativo: </strong> {{ $tenant->active == 'Y' ? 'SIM' : 'NÃO' }}
            </li>
            <li>
                <strong>Descrição: </strong> {{ $tenant->description }}
            </li>
        </ul>

        <hr>
        <h3>Assinatura</h3>
        <ul>
            <li>
                <strong>Data da Assinatura: </strong> {{ $tenant->subscription }}
            </li>
            <li>
                <strong>Data de Expiração: </strong> {{ $tenant->expires_at }}
            </li>
            <li>
                <strong>Identificador: </strong> {{ $tenant->subscription_id }}
            </li>
            <li>
                <strong>Ativa: </strong> {{ $tenant->subscription_active ? 'SIM' : 'NÃO' }}
            </li>
            <li>
                <strong>Cancelada: </strong> {{ $tenant->subscription_suspended ? 'SIM' : 'NÃO' }}
            </li>
        </ul>

    </div>
</div>
@endsection
