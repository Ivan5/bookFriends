<x-layouts.app>
    <x-slot name="header">
        Sign up
    </x-slot>

    <form action="/register" method="POST" class="mt-4 space-y-4">
        @csrf

        <div class="space-y-1">
            <label for="name" class="block">Your name</label>
            <input type="text" name="name" id="name" placeholder="Mabel" class="rounded block w-full">
        </div>

        <div class="space-y-1">
            <label for="name" class="block">Your email</label>
            <input type="email" name="email" id="email" placeholder="user@email.com" class="rounded block w-full">
        </div>

        <div class="space-y-1">
            <label for="password" class="block">Password</label>
            <input type="password" name="password" id="password" class="rounded block w-full">
        </div>

        <button type="submit" class="bg-slate-200 px-3 py-2 rounded">Create account</button>
    </form>
</x-layouts.app>