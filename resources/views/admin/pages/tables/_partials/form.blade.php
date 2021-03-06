@include('admin.includes.alerts')

<div class="form-group">
    <label>Identificador da Mesa:</label>
    <input type="text" name="identify" placeholder="Identificador da Mesa:" class="form-control"
        value="{{ $table->identify ?? old('identify') }}">
</div>
<div class="form-group">
    <label>Descrição:</label>
    <textarea name="description" cols="30" rows="5"
        class="form-control">{{ $table->description ?? old('description') }}</textarea>
</div>
<div class="form-group">
    <button type="submit" class="btn btn-dark">Enviar</button>
</div>
