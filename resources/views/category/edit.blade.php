@extends('templateadmin')

@section('title')
    Category
@endsection

@section('heading-button')
    <a href="{{ url('admin/category/') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
        back</a>
@endsection

@section('content')
    <div class="row">
        <div class="col-12 col-lg-6">
            <div class="card p-4">
                <div class="card-body">
                    <form action="{{ url('admin/category/' . $category->id) }}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="mb-2">
                            <label for="name">Name</label>
                            <input type="text" name="name" id="name" class="form-control" required
                                value="{{ $category->name }}">
                        </div>
                        <button type="submit" class="btn btn-success">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
