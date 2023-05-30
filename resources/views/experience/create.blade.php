@extends('templateadmin')

@section('title')
    Experience
@endsection

@section('heading-button')
<a href="{{ url('admin/experience/') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
    back</a>    
@endsection

@section('content')
<div class="row">
    <div class="col-12 col-lg-6">
        <div class="card p-4">
            <div class="card-body">
                <form action="{{ url('admin/experience') }}" method="post">
                    @csrf
                    @method('POST')
                    <div class="mb-2">
                        <label for="title">Title</label>
                        <input type="text" name="title" id="title" class="form-control" required>
                    </div>
                    <div class="mb-2">
                        <label for="place">Place</label>
                        <input type="text" name="place" id="place" class="form-control" required>
                    </div>
                    <div class="mb-2">
                        <label for="start">Start</label>
                        <input type="date" name="start" id="start" class="form-control" required>
                    </div>
                    <div class="mb-2">
                        <label for="end">End</label>
                        <input type="date" name="end" id="end" class="form-control">
                    </div>
                    <button type="submit" class="btn btn-success">Add</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection