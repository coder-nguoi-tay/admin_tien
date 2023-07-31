@extends('layouts.admin')
@section('admin')
    <div class="container-fluid">
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">{{ $title }}</h6>
            </div>
            <form class="form p-5" action="{{ route('news.update', $new->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label class="form-label">Tên Bài viết</label>
                    <input type="text" name="title" value="{{ $new->title }}" class="form-control"
                        placeholder="Tên bài viết">
                </div>
                <div class="mb-3">
                    <label class="form-label">Hình ảnh</label>
                    <input type="file" name="new_image" accept="image/*" class="form-control">
                </div>
                <div class="mb-3">
                    <label class="form-label">Mô tả</label>
                    <input type="text" name="describe" value="{{ $new->describe }}" class="form-control"
                        placeholder="Tên nhà tuyển dụng">
                </div>
                <div class="mb-3">
                    <label class="form-label">Ngành nghề</label>
                    <select name="majors_id" id="" class="form-control">
                        @foreach ($majors as $item)
                            <option {{ $new->majors_id == $item->id ? 'selected' : '' }} value="{{ $item->id }}">
                                {{ $item->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label class="form-label">Trạng thái</label>
                    <select name="status" id="" class="form-control">
                        <option value="0" {{ $new->status == 0 ? 'selected' : '' }}>Bật</option>
                        <option value="1" {{ $new->status == 1 ? 'selected' : '' }}>Tắt</option>
                    </select>
                </div>
                <button class="btn btn-primary" type="submit">Đăng bài</button>
            </form>
        </div>

    </div>
@endsection
