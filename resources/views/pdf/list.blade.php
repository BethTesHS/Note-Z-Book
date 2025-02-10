<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PDF List</title>
</head>
<body>
    <h1>Uploaded PDFs</h1>
    <ul>
        @foreach($files as $file)
            <li>
                <a href="{{ route('pdf.view', ['filename' => basename($file)]) }}">
                    {{ basename($file) }}
                </a>
                <br>
                <iframe src="{{ asset('storage/' . $file) }}" width="300" height="400"></iframe>
            </li>
        @endforeach
    </ul>
</body>
</html>
