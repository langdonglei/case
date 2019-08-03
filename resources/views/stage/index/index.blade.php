<html>
<head>
    <title>{{ config('blog.title') }}</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
<div class="container">
    {!! $data->render() !!}
    <ul>
        @foreach ($data as $v)
            <li>
                <a href="{{ route('index.show', ['slug' => $v->slug]) }}">{{ $v->title }}</a>
                <em>({{ $v->published_at }})</em>
                <p>{{ str_limit($v->content_html) }}</p>
            </li>
        @endforeach
    </ul>
</div>
</body>
</html>