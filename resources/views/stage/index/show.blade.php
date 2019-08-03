<html>
<head>
    <title>{{ $data->title }}</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
<div class="container">
    <h1>{{ $data->title }}</h1>
    <h5>{{ $data->published_at }}</h5>
    {!! nl2br(e($data->content_raw)) !!}
    <button class="btn btn-primary" onclick="history.go(-1)">Back</button>
</div>
</body>
</html>