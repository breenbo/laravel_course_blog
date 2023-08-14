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


</style>
</head>

<body>
    <article>
        <h1>
            {{ $post-> title}}
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

        <p>{{ $post-> body }}</p>
    </article>


    <a href="/">Back</a>
</body>
