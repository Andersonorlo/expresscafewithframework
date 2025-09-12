@extends('layouts.app')

@section('content')

        <div class="form-container">
            <h2 class="form-title">Subir nuevo producto</h2>

            <form class="form-registro-formulario" method="POST" action="{{ route('productos.store') }}" enctype="multipart/form-data">
                @csrf
                <section class="form-inner">
                    <div class="form-group">
                        <label for="nombre">Nombre del producto</label>
                        <input type="text" name="nombre" id="nombre" required>
                    </div>

                    <div class="form-group">
                        <label for="descripcion">Descripción</label>
                        <textarea name="descripcion" id="descripcion" rows="3"></textarea>
                    </div>

                    <div class="form-group">
                        <label for="valor">Valor</label>
                        <input type="number" name="valor" id="valor">
                    </div>

                    <div class="form-group">
                        <label for="categoria_id">Categoría</label>
                        <select name="categoria_id" id="categoria_id" required>
                            @foreach($categorias as $categoria)
                                <option value="{{ $categoria->id }}">{{ $categoria->nombre }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="unidad_id">Unidad</label>
                        <select name="unidad_id" id="unidad_id" required>
                            @foreach($unidades as $unidad)
                                <option value="{{ $unidad->id }}">{{ $unidad->nombre }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="imagen">Imagen del producto</label>
                        <input type="file" name="imagen" id="imagen">
                    </div>

                    <div class="form-group">
                        <button type="submit">Guardar producto</button>
                    </div>
                </section>
            </form>
        </div>
    </main>

    <footer>Anderson Dev 2025</footer>
@endsection
