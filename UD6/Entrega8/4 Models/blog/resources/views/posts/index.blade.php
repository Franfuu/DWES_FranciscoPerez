<!DOCTYPE html>
<html>
<head>
    <title>All Blog Posts</title>
</head>
<body>
    <h1>Blog Posts</h1>

    @forelse ($posts as $post)
        <div style="margin-bottom: 20px;">
            <h2>{{ $post->title }}</h2>
            <p>{{ $post->body }}</p>
            <hr>
        </div>
    @empty
        <p>No posts found nigger.</p>
    @endforelse
</body>
</html>