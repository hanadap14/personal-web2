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
                <form action="{{ url('admin/experience/'.$exp->id) }}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="mb-2">
                        <label for="title">Title</label>
                        <input type="text" name="title" id="title" class="form-control" required value="{{ $exp->title }}">
                    </div>
                    <div class="mb-2">
                        <label for="place">Place</label>
                        <input type="text" name="place" id="place" class="form-control" required value="{{ $exp->place }}">
                    </div>
                    <div class="mb-2">
                        <label for="start">Start</label>
                        <input type="date" name="start" id="start" class="form-control" required value="{{ $exp->start }}">
                    </div>
                    <div class="mb-2">
                        <label for="end">End</label>
                        <input type="date" name="end" id="end" class="form-control" {{ $exp->end == null ? 'disabled' : 'required' }} value="{{ $exp->end }}">
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="stillhere" {{ $exp->end == null ? 'checked' : '' }}>
                        <label class="form-check-label" for="stillhere">
                            Still work in here
                        </label>
                    </div>
                    <button type="submit" class="mt-4 btn btn-success">Update</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('add-script')
<script>
    let end = $('#end').val()

    $('#stillhere').change(function(){
        console.log(end)
        if(this.checked) {
            $('#end').val('');
            $('#end').attr('required',false);
            $('#end').attr('disabled',true);
        } else {
            $('#end').val(end);
            $('#end').attr('required',true);
            $('#end').attr('disabled',false);
        }
    })
</script>
@endsection