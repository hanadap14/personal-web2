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
                <form action="{{ url('admin/portfolio/'.$port->id.'/change') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="photo" class="form-label">Photo</label>
                        <input class="form-control" type="file" id="photo" name="photo" accept="image/png,image/gif,image/jpeg,image/jpg" required>
                    </div>
                    <button type="submit" class="btn btn-success">Update</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection