@props(['comment'])

<article class="flex space-x-4 bg-gray-100 border border-gray-200 p-6 rounded-xl">
    <div class="flex-shrink-0">
        <img
            src="https://i.pravatar.cc/60?u={{ $comment->id }}"
            width="60"
            height="60"
            class="rounded-full"
            alt=""
        />
    </div>

    <div>
        <header>
            <h3 class="font-bold">
                {{ $comment->author->name }}
            </h3>
            <p class="text-xs">
                commented <time>{{ $comment->created_at->diffForHumans() }}</time>
            </p>
        </header>

        <p class="mt-4">{{ $comment->body }} </p>
    </div>
</article>
