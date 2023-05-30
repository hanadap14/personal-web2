@extends('templateadmin')

@section('title')
    Experience
@endsection

@section('heading-button')
<a href="{{ url('admin/experience/create') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
    class="fas fa-plus fa-sm text-white-50"></i> Add experience</a>    
@endsection

@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Experience</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered dataTable" id="dataTable" width="100%" cellspacing="0" role="grid" aria-describedby="dataTable_info" style="width: 100%;">
                        <thead>
                            <tr role="row">
                                <th class="sorting sorting_asc" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-sort="ascending" style="width: 57px;">
                                    Num
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1">
                                    Title
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1">
                                    Place
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1">
                                    Start
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1">
                                    End
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1">
                                    Create At
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1">
                                    Update At
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1">
                                    Action
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($experiences as $key => $exp)
                            <tr class="odd">
                                <td class="sorting_1">{{ $key+1 }}</td>
                                <td>{{ $exp->title }}</td>
                                <td>{{ $exp->place }}</td>
                                <td>{{ $exp->start }}</td>
                                <td>{{ $exp->end == null ? 'current' : $exp->end }}</td>
                                <td>{{ $exp->created_at }}</td>
                                <td>{{ $exp->updated_at }}</td>
                                <td>
                                    <a href="{{ url('admin/experience/'.$exp->id.'/edit') }}" class="btn btn-warning mb-2"><i class="fas fa fa-pen"></i></a>
                                    <form action="{{ url('admin/experience/'.$exp->id) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger mb-2" onclick="return confirm('Are you sure want to delete {{ $exp->title }}')"><i class="fas fa fa-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection