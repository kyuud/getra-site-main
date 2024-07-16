<!-- resources/views/upload.blade.php -->
<form action="{{ route('process.upload') }}" method="post" enctype="multipart/form-data">
    @csrf
    <input type="file" name="excel_file" accept=".xlsx">
    <button type="submit">Enviar</button>
</form>
