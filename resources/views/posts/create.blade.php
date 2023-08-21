<x-layout>
    <section class="px-6 py-8 max-w-xl mx-auto border px-4 rounded-xl mt-10">
        <h1 class="text-xl font-semibold mb-10">Create a post</h1>
        <form
            method="POST"
            action="/admin/posts"
        >
            @csrf


                <div class="mb-6">
                    <label for="title" class="block mb-2 uppercase font-bold text-xs text-gray-700">
                        Title
                    </label>

                    <input
                        id="title"
                        type="text"
                        name="title"
                        class="border border-gray-200 p-2 w-full rounded-lg"
                        required
                        value="{{ old('title') }}"
                    />
                    @error('title')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>


                <div class="mb-6">
                    <label for="slug" class="block mb-2 uppercase font-bold text-xs text-gray-700">
                        slug
                    </label>

                    <input
                        id="slug"
                        type="text"
                        name="slug"
                        class="border border-gray-200 p-2 w-full rounded-lg"
                        required
                        value="{{ old('slug') }}"
                    />
                    @error('slug')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-6">
                    <label for="excerpt" class="block mb-2 uppercase font-bold text-xs text-gray-700">
                        excerpt
                    </label>

                    <textarea
                        name="excerpt"
                        id="excerpt"
                        cols="30"
                        rows="3"
                        class="border w-full text-sm focus:outline-none focus:ring"
                    >{{ old('excerpt') }}</textarea>
                    @error('excerpt')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>


                <div class="mb-6">
                    <label for="body" class="block mb-2 uppercase font-bold text-xs text-gray-700">
                        body
                    </label>

                    <textarea
                        name="body"
                        id="body"
                        cols="30"
                        rows="5"
                        class="border w-full text-sm focus:outline-none focus:ring"
                    >{{ old('body') }}</textarea>
                    @error('body')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>


                <div class="mb-6">
                    <label for="category_id" class="block mb-2 uppercase font-bold text-xs text-gray-700">
                        category
                    </label>

                <select
                    name="category_id"
                    id="category_id"

                >


                    @foreach (\App\Models\Category::all() as $category)
                        <option
                            value="{{ $category->id }}"
                            {{ old('category_id') == $category->id ? 'selected' : '' }}
                        >
                            {{ ucwords($category->name) }}
                        </option>
                    @endforeach


                </select>
                    @error('category_id')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>


                <div class="flex justify-end mt-5">
                    <button
                        type="submit"
                        class="bg-blue-500 text-white uppercase font-semibold text-xs py-2 px-10 rounded-2xl hover:bg-blue-600"
                    >
                    Publish
                    </button>

                </div>
        </form>
    </section>
</x-layout>
