<div class="container">
    <h2>Crear Documento</h2>

    <!-- Formulario para crear un documento -->
    <form action="{{ route('documentos.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <!-- Campo para el título -->
        <div class="mb-3">
            <label for="titulo" class="form-label">Título</label>
            <input type="text" class="form-control @error('titulo') is-invalid @enderror" id="titulo" name="titulo" value="{{ old('titulo') }}">
            @error('titulo')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Campo para la descripción -->
        <div class="mb-3">
            <label for="descripcion" class="form-label">Descripción</label>
            <textarea class="form-control @error('descripcion') is-invalid @enderror" id="descripcion" name="descripcion" rows="3">{{ old('descripcion') }}</textarea>
            @error('descripcion')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Campo para el archivo doc1 -->
        <div class="mb-3">
            <label for="doc1" class="form-label">Documento 1</label>
            <input type="file" class="form-control @error('doc1') is-invalid @enderror" id="doc1" name="doc1" accept=".pdf,.doc,.docx,.xls,.xlsx,.ppt,.pptx">
            @error('doc1')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Campo para el archivo doc2 -->
        <div class="mb-3">
            <label for="doc2" class="form-label">Documento 2</label>
            <input type="file" class="form-control @error('doc2') is-invalid @enderror" id="doc2" name="doc2" accept=".pdf,.doc,.docx,.xls,.xlsx,.ppt,.pptx">
            @error('doc2')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Botón para enviar el formulario -->
        <button type="submit" class="btn btn-primary">Guardar Documento</button>
    </form>
</div>