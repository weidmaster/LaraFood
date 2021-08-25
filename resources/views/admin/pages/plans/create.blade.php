@extends('adminlte::page')

@section('title', 'Cadastrar Novo Plano')

@section('content_header')
<h1>Cadastrar Novo Plano</h1>
@stop

@section('content')
<div class="card">
    <div class="card-body">
        <form action="{{ route('plans.store') }}" class="form" method="POST">
            @csrf
            <div class="form-group">
                <label>Nome:</label>
                <input type="text" name="name" placeholder="Nome:" class="form-control">
            </div>
            <div class="form-group">
                <label>Preço:</label>
                <input type="text" name="price" placeholder="Preço:" class="form-control">
            </div>
            <div class="form-group">
                <label>Descrição:</label>
                <input type="text" name="description" placeholder="Descrição:" class="form-control">
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-dark">Enviar</button>
            </div>
        </form>
    </div>
</div>
@endsection
