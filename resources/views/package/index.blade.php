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
                                <th>Name</th>
                                <th>Mô tả</th>
                                <th>Giá</th>
                                <th>Hiệu lực</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($package as $key => $item)
                                <tr class="text-center">
                                    <td>#{{ $key + 1 }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->describe }}</td>
                                    <td>{{ $item->price }}</td>
                                    <td>{{ $item->timeofer->name }}</td>
                                    <td>
                                        <a href="{{ route('package.edit', $item->id) }}">
                                            <i class="fas fa-edit"></i>
                                        </a>|
                                        <a href="{{ route('package.destroy', $item) }}"><i class="fas fa-trash-alt"></i>
                                        </a>
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
