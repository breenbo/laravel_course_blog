<x-layout>
    <section class="px-6 py-8">
        <main class="max-w-xl mx-auto mt-10">
            <x-panel>
                <h1 class="text-center text-xl font-bold">Log In</h1>
                <form action="/sessions" method="POST">

                    @csrf

                    <x-form.input name="email" type="email" autocomplete="username"/>
                    <x-form.input name="password" type="password" autocomplete="current-password"/>

                    <div class="flex justify-end">
                        <x-form.button>Log In</x-form.button>
                    </div>
                </form>
            </x-panel>
        </main>
    </section>
</x-layout>
