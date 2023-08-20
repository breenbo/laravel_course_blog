<x-layout>
    <section class="px-6 py-8">
        <main class="max-w-xl mx-auto mt-10 bg-blue-50 border border-blue-100 p-6 rounded-xl shadow-sm">
            <h1 class="text-center text-xl font-bold">Log In</h1>


            <form action="/sessions" method="POST">

                @csrf

                <div class="mb-6">
                    <label for="username" class="block mb-2 uppercase font-bold text-xs text-gray-700">
                        Email
                    </label>

                    <input
                        id="email"
                        type="email"
                        name="email"
                        class="border border-gray-200 p-2 w-full rounded-lg"
                        required
                        value="{{ old('email') }}"
                    />
                    @error('email')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-6">
                    <label for="password" class="block mb-2 uppercase font-bold text-xs text-gray-700">
                        password
                    </label>

                    <input
                        id="password"
                        type="password"
                        name="password"
                        class="border border-gray-200 p-2 w-full rounded-lg"
                        required
                    />
                    @error('password')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-6">
                    <button type="submit" class="bg-blue-400 text-white rounded py-2 px-4 hover:bg-blue-500">Log In</button>
                </div>
            </form>


        </main>
    </section>
</x-layout>
