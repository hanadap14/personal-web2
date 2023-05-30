@extends('templateadmin')

@section('title')
    Portfolio
@endsection

@section('heading-button')
    <a href="{{ url('admin/portfolio/') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
        back</a>
@endsection

@section('content')
    <div class="row">
        <div class="col-12 col-lg-6">
            <div class="card p-4">
                <div class="card-body">
                    <form action="{{ url('admin/portfolio') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('POST')
                        <div class="mb-3">
                            <label for="photo" class="form-label">Photo</label>
                            <input class="form-control" type="file" id="photo" name="photo"
                                accept="image/png,image/gif,image/jpeg,image/jpg" required>
                        </div>
                        <div class="mb-2">
                            <label for="title">Title</label>
                            <input type="text" name="title" id="title" class="form-control" required>
                        </div>
                        <div class="mb-2">
                            <label for="category">Category</label>
                            <select class="category" aria-label="Default select example" class="form-select" name="category" id="category">
                                <option selected>Select category</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-2">
                            <label for="year">Year</label>
                            <input type="number" name="year" id="year" class="form-control" required>
                        </div>
                        <button type="submit" class="btn btn-success">Add</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
