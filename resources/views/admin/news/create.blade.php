<x-admin-layout>
    <x-slot name="title">
        Create News
    </x-slot>
    <div class="main">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <form action="{{ route('news.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                          <label for="title" class="form-label">Title</label>
                          <input type="text" class="form-control" id="title" name="title">
                          <x-validation-message name="title" />
                        </div>
                        <div class="mb-3">
                            <label for="contents" class="form-label">Contents</label>
                            <textarea class="form-control" id="contents" rows="10" name="contents"></textarea>
                            <x-validation-message name="contents" />
                        </div>
                        <div class="mb-3">
                            <label for="pic" class="form-label">News Pic</label>
                            <input class="form-control" type="file" id="pic" name="pic">
                            <x-validation-message name="pic" />
                        </div>
                        <button type="submit" class="btn btn-primary float-end">Submit</button>
                      </form>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>