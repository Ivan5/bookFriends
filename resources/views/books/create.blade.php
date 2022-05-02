<x-layouts.app>
    <x-slot name="header">
        Add a book
    </x-slot>

    <form action="/books" method="POST" class="mt-4 space-y-4">
        @csrf

        <div class="space-y-1">
            <label for="title" class="block">Title</label>
            <input type="text" name="title" id="title" placeholder="Title book" class="rounded block w-full">
            @error('title')
                <div class="text-red-500 text-sm">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="space-y-1">
            <label for="author" class="block">Author</label>
            <input type="text" name="author" id="author" placeholder="Germano G" class="rounded block w-full">

            @error('author')
                <div class="text-red-500 text-sm">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="space-y-1">
            <label for="status" class="block">Status</label>
            <select name="status" id="status" class="rounded block w-full">
                <option value="WANT_TO_READ">Want to read</option>
                <option value="READING">Reading</option>
                <option value="READ">Read</option>
            </select>

            @error('status')
                <div class="text-red-500 text-sm">
                    {{ $message }}
                </div>
            @enderror
        </div>


        <button type="submit" class="bg-slate-200 px-3 py-2 rounded">Create Book</button>
    </form>
</x-layouts.app>