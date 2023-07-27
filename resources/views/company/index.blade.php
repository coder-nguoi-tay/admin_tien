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
                                <th>Giấy xác nhận</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($company as $key => $item)
                                <tr class="text-center">
                                    <td>#{{ $key + 1 }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td><img src="{{ $item->imagesAccuracy }}" width="200" alt=""></td>
                                    <td>

                                        @if ($item->status == 0)
                                            <button class="badge bg-secondary text-center"
                                                style="border: 1px solid #b1b7c1;font-size: 12px;padding: 5px 10px;"
                                                data-toggle="modal" data-target="#exampleModal{{ $item->id }}">Chưa
                                                xác thực</button>
                                            <!-- Modal -->
                                            <div class="modal fade" id="exampleModal{{ $item->id }}" tabindex="-1"
                                                role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">
                                                                {{ $item->name }}</h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="title">
                                                                <h6>Giấy phép kinh doanh</h6>
                                                            </div>
                                                            <div class="image-modal-confirm">
                                                                <img src="{{ env('IMAGE') . $item->imagesAccuracy }}"
                                                                    width="400" alt="">
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <a href="{{ route('company.changestatus', $item->id) }}"
                                                                class="btn btn-primary">Xác nhận</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @else
                                            <button class="badge bg-success text-center"
                                                style="border: 1px solid #b1b7c1;font-size: 12px;padding: 5px 10px;">Đã xác
                                                thực</button>
                                        @endif
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
