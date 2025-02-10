<form action="{{ route('pdf.upload') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <input type="file" name="pdf" required>
    <button type="submit">Upload PDF</button>
</form>

{{-- php artisan storage:link --}}