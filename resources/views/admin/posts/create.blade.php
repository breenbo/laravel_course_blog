<x-layout>
    <x-setting heading="Publish a new post">
        <form
            method="POST"
            action="/admin/posts"
        >
            @csrf


            <x-form.input name="title" />
            <x-form.input name="slug" />
            <x-form.textarea name="excerpt" />
            <x-form.textarea name="body" />


            <x-form.field>
                <x-form.label name="category" />

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

                <x-form.error name="category" />
            </x-form.field>

            <div class="flex justify-end mt-5">
                <x-form.button>Publish</x-form.button>
            </div>
        </form>
    </x-setting>
</x-layout>
