<!DOCTYPE html>

<title>My Blog</title>
<head>
<style>
    body {
        max-width: 600px;
        margin: auto;
        font-family: Arial, Helvetica, sans-serif;
    }

    p {
        line-height: 1.5;
    }

    article + article {
        margin-top: 2em;
        border-top: 1px solid #ccc;
        padding-top: 2em;
    }


</style>
</head>

<body>
@foreach ($posts as $post)
    <article>
        <h1>
            <a href="/posts/{{ $post->slug }}">
                {{ $post->title }}
            </a>
        </h1>
        <p>By
            <span>
                <a href="/authors/{{ $post->author->username}}">{{ $post->author->name }}</a>
            </span>
            in
            <span>
                <a href="/categories/{{ $post->category->slug}}">{{ $post->category->name}}</a>
            </span>
        </p>
        <p>
            {{ $post->excerpt }}
        </p>
    </article>
@endforeach
</body>
