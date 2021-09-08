@include('admin.includes.alerts')

<div class="form-group">
    <label>* Título:</label>
    <input type="text" name="title" placeholder="Título:" class="form-control"
        value="{{ $product->title ?? old('title') }}">
</div>
<div class="form-group">
    <label>* Preço:</label>
    <input type="text" name="price" placeholder="Preço:" class="form-control"
        value="{{ $product->price ?? old('price') }}">
</div>
<div class="form-group">
    <label>* Imagem:</label>
    <input type="file" name="image" placeholder="Imagem:" class="form-control"
        value="{{ $product->image ?? old('image') }}">
</div>
<div class="form-group">
    <label>* Descrição:</label>
    <textarea name="description" cols="30" rows="5"
        class="form-control">{{ $product->description ?? old('description') }}</textarea>
</div>
<div class="form-group">
    <button type="submit" class="btn btn-dark">Enviar</button>
</div>
