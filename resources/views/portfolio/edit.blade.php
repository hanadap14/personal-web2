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
                    <form action="{{ url('admin/portfolio/' . $port->id) }}" method="post">
                        @csrf
                        @method('PUT')
                        <img src="{{ url('assets/portfolio/' . $port->photo) }}" alt="" width="300px">
                        <a href="{{ url('admin/portfolio/' . $port->id) }}" class="btn btn-primary">Change image</a>
                        <div class="mb-2">
                            <label for="title">Title</label>
                            <input type="text" name="title" id="title" class="form-control" required
                                value="{{ $port->title }}">
                        </div>
                        <div class="mb-2">
                            <label for="category">Category</label>
                            <select class="category" aria-label="Default select example" class="form-select" name="category"
                                id="category">
                                @foreach ($categories as $category)
                                    @if ($category->id == $port->category_id)
                                        <option value="{{ $category->id }}" selected>{{ $category->name }}</option>
                                    @else
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-2">
                            <label for="year">Year</label>
                            <input type="number" name="year" id="year" class="form-control" required
                                value="{{ $port->year }}">
                        </div>
                        <button type="submit" class="btn btn-success">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
