<!-- display only if user is logged in -->
@auth
<!-- form -->
    <form
        method="POST"
        action="/posts/{{ $post->slug}}/comment"
        class="border border-gray-200 p-6 rounded-xl"
    >
        @csrf

        <header class="flex items-center">
            <img
                src="https://i.pravatar.cc/60?u={{ auth() -> id()}}"
                alt="Lary avatar"
                width="40"
                height="40"
                class="rounded-full"
            >

            <h2 class="ml-4">Want to participate?</h2>
        </header>


        <div class="mt-6">
            <textarea
                name="body"
                id="body"
                cols="30"
                rows="5"
                class="w-full text-sm focus:outline-none focus:ring"
                placeholder="Something to say?"
            ></textarea>
        </div>

        <div class="flex justify-end mt-5">
            <x-form.button>Submit</x-form.button>
        </div>
    </form>
@else

    <p>
        <a href="/login" class="text-blue-500 font-semibold">Log in to leave a comment.</a>
    </p>

@endauth
