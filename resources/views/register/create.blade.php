<x-layout>
    <section class="px-6 py-8">
        <main class="max-w-xl mx-auto mt-10 bg-blue-50 border border-blue-100 p-6 rounded-xl shadow-sm">
            <h1 class="text-center text-xl font-bold">Register</h1>
            <!-- send a request (form data) to the /register route -->
            <form action="/register" method="POST">

                @csrf


                    <!-- input and label for name and email -->
                <div class="mb-6">
                    <label for="name" class="block mb-2 uppercase font-bold text-xs text-gray-700">
                        Name
                    </label>

                    <input
                        id="name"
                        type="text"
                        name="name"
                        class="border border-gray-200 p-2 w-full rounded-lg"
                        required
                        value="{{ old('name') }}"
                    />

                    @error('name')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-6">
                    <label for="username" class="block mb-2 uppercase font-bold text-xs text-gray-700">
                        Username
                    </label>

                    <input
                        id="username"
                        type="text"
                        name="username"
                        class="border border-gray-200 p-2 w-full rounded-lg"
                        required
                        value="{{ old('username') }}"
                    />
                    @error('username')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                    <!-- input and label for name and email -->
                <div class="mb-6">
                    <label for="email" class="block mb-2 uppercase font-bold text-xs text-gray-700">
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
                    <button type="submit" class="bg-blue-400 text-white rounded py-2 px-4 hover:bg-blue-500">Submit</button>
                </div>
            </form>
        </main>
    </section>
</x-layout>
