<!DOCTYPE html>
<html>
<head>
    <title>Posts</title>
</head>
<body>
@foreach($posts as $post)
    <div>
        <h2>{{ $post->title }}</h2>
        <h2>{{ $post->description }}</h2>
        <h2>{{ $post->content }}</h2>
    </div>
    <hr>
@endforeach
</body>
</html>
