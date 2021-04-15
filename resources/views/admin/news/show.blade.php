<x-admin-layout>
    <x-slot name="title">
        Show News - {{ $news->title }}
    </x-slot>
    <div class="main">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <img src="{{ asset('storage') . '/' . $news->pic }}" alt="" srcset="" class="img-thumbnail w-full h-50">
                    <h1 class="mt-5 text-capitalize">{{ $news->title }}</h1>
                    <p><span>{{ $news->user->name }}</span> - {{ $news->created_at->diffForHumans() }}</p>
                    <p>{{ $news->contents }}</p>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>