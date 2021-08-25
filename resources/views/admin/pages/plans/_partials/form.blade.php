<div class="form-group">
    <label>Nome:</label>
    <input type="text" name="name" placeholder="Nome:" class="form-control" value="{{ $plan->name ?? '' }}">
</div>
<div class="form-group">
    <label>Preço:</label>
    <input type="text" name="price" placeholder="Preço:" class="form-control" value="{{ $plan->price ?? '' }}">
</div>
<div class="form-group">
    <label>Descrição:</label>
    <input type="text" name="description" placeholder="Descrição:" class="form-control"
        value="{{ $plan->description ?? '' }}">
</div>
<div class="form-group">
    <button type="submit" class="btn btn-dark">Enviar</button>
</div>