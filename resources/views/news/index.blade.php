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
                                <th>Nội dung</th>
                                <th>Hình ảnh</th>
                                <th>Ngành nghề</th>
                                <th>Trạng thái</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($news as $item)
                                <tr>
                                    <td class="text-center">{{ $item->title }}</td>
                                    <td class="text-center"><img src="{{ asset($item->new_image) }}" width="200"
                                            alt=""></td>
                                    <td class="text-center">{{ $item->majors->name }}</td>
                                    <td class="text-center"><span
                                            class="badge text-center {{ $item->status == 1 ? 'bg-secondary text-white' : 'bg-success text-white' }}">{{ $item->status == 1 ? 'Đang tắt' : 'Đang bật' }}</span>
                                    </td>
                                    <td class="text-center">
                                        <a href="{{ route('news.edit', $item->id) }}"><i class="fas fa-edit"></i></a>|
                                        <a href="{{ route('news.destroy', $item->id) }}"><i
                                                class="fas fa-trash-alt"></i></a>
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
