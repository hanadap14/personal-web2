@extends('templateadmin')

@section('title')
    Portfolio
@endsection

@section('heading-button')
    <a href="{{ url('admin/portfolio/create') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
            class="fas fa-plus fa-sm text-white-50"></i> Add portfolio</a>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Portfolio</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered dataTable" id="dataTable" width="100%" cellspacing="0"
                            role="grid" aria-describedby="dataTable_info" style="width: 100%;">
                            <thead>
                                <tr role="row">
                                    <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                        colspan="1">
                                        Photo
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                        colspan="1">
                                        Title
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                        colspan="1">
                                        Category
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                        colspan="1">
                                        Year
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                        colspan="1">
                                        Create At
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                        colspan="1">
                                        Update At
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                        colspan="1">
                                        Action
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($portfolios as $key => $port)
                                    <tr class="odd">
                                        <td><img src="{{ url('assets/portfolio/' . $port->photo) }}" alt=""
                                                width="150px"></td>
                                        <td>{{ $port->title }}</td>
                                        <td>{{ $port->category->name }}</td>
                                        <td>{{ $port->year }}</td>
                                        <td>{{ $port->created_at }}</td>
                                        <td>{{ $port->updated_at }}</td>
                                        <td>
                                            <a href="{{ url('admin/portfolio/' . $port->id . '/edit') }}"
                                                class="btn btn-warning mb-2"><i class="fas fa fa-pen"></i></a>
                                            <form action="{{ url('admin/portfolio/' . $port->id) }}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger mb-2"
                                                    onclick="return confirm('Are you sure want to delete {{ $port->title }}')"><i
                                                        class="fas fa fa-trash"></i></button>
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
