@props(['book'])

<div class="bg-slate-100 p-6 rounded flex justify-between items-center">
    <div>
        <h2 class="font-bold text-lg text-slate-800">{{ $book->title }}</h2>
    </div>
    <div>
        {{$book->author}}
    </div>
</div>

@isset($links)
    <div>
        {{ $links }}
    </div>
@endisset