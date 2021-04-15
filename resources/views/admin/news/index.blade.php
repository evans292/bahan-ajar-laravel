<x-admin-layout>
    <x-slot name="title">
        News
    </x-slot>
    <div class="main">
        <div class="container">
            <div class="text-end">
                <a href="{{ route('news.create') }}" class="btn btn-primary mb-3">Add news</a>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <table class="table table-light">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Title</th>
                                <th>Contents</th>
                                <th>Uploader</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($news as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->title }}</td>
                                    <td>{{ Str::limit($item->contents, 30)  }}</td>
                                    <td>{{ $item->user->name }}</td>
                                    <td>
                                        <a href="{{ route('news.show', $item->id) }}" class="btn btn-info">Show</a>
                                        <a href="{{ route('news.edit', $item->id) }}" class="btn btn-warning">Edit</a>
                                        <form action="{{ route('news.delete', $item->id) }}" method="POST" class="d-inline-block">
                                            @csrf
                                            @method('delete')
                                           <button type="submit" onclick="return confirm('are you sure?')" class="btn btn-danger" style="margin-top: 0px;">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>    
                    </table>

                    {{ $news->links() }}
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>