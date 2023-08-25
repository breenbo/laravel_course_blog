<x-layout>
    <section class="px-6 py-8">
        <main class="max-w-xl mx-auto mt-10">
            <x-panel>
                <h1 class="text-center text-xl font-bold">Register</h1>
                <!-- send a request (form data) to the /register route -->
                <form action="/register" method="POST">

                    @csrf

                    <x-form.input name="name" />
                    <x-form.input name="username" />
                    <x-form.input name="email" type="email" />
                    <x-form.input name="password" type="password" autocomplete="new-password" />

                    <div class="flex justify-end">
                        <x-form.button>Sign Up</x-form.button>
                    </div>
                </form>
            </x-panel>
        </main>
    </section>
</x-layout>
