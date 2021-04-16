<x-guest-layout>
    <x-slot name="title">
        News
    </x-slot>
   
    <div class="big-box">
        @foreach ($news as $item)
        <div class="card">
                <img src="{{ asset('storage') . '/' . $item->pic }}" alt="" class="card-img">
                <div class="card-content">   
                    <h2>{{ $item->title }} - <span style="font-size: 14px;">{{ $item->created_at->diffForHumans() }}</span></h2>
                    <p>{{ Str::limit($item->contents, 500)  }} <span><a href="">read more</a></span></p>
                </div>
        </div>
        @endforeach
    </div>

</x-guest-layout>