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
                                <th>Email</th>
                                <th>Cấp bậc</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($admin as $key => $item)
                                <tr class="text-center">
                                    <td>#{{ $key + 1 }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->email }}</td>
                                    {{-- bg-success --}}
                                    <td>
                                        @if ($item->role == 1)
                                            <button class="badge text-center"
                                                style="border: 1px solid #b1b7c1;font-size: 12px;padding: 5px 10px;"
                                                data-toggle="modal"
                                                data-target="#exampleModal{{ $item->id }}">Admin</button>
                                        @else
                                            <button class="badge text-center"
                                                style="border: 1px solid #b1b7c1;font-size: 12px;padding: 5px 10px;"
                                                data-toggle="modal" data-target="#exampleModal{{ $item->id }}">System
                                                Admin</button>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('admin.edit', $item->id) }}">
                                            <i class="fas fa-edit"></i>
                                        </a>|
                                        <a href="{{ route('admin.destroy', $item) }}"><i class="fas fa-trash-alt"></i>
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
