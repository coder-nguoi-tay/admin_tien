@extends('layouts.admin')
@section('admin')
    <div class="container-fluid">
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">{{ $title }}</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr class="text-center">
                                <th>STT</th>
                                <th>Tên</th>
                                <th>phone</th>
                                <th>email</th>
                                <th>Địa chỉ</th>
                                <th>Tên công ty</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($employer as $key => $item)
                                <tr class="text-center">
                                    <td>#{{ $key + 1 }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->phone }}</td>
                                    <td>{{ $item->getUser->email }}</td>
                                    <td>{{ $item->address }}</td>
                                    <td>{{ $item->namecompany }}</td>
                                    <td><a href="{{ route('employer.edit', $item->id) }}"><i class="fas fa-edit"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
@endsection
