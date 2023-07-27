@extends('layouts.admin')
@section('admin')
    <div class="container-fluid">
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">{{ $title }}</h6>
            </div>
            <form class="form p-5" action="{{ route('package.update', $package->id) }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label class="form-label">Tên gói cước</label>
                    <input type="text" name="name" value="{{ $package->name }}" class="form-control"
                        placeholder="Tên gói cước">
                </div>
                <div class="mb-3">
                    <label class="form-label">Giá</label>
                    <input type="text" name="price" value="{{ $package->price }}" class="form-control"
                        placeholder="Giá">
                </div>
                <div class="mb-3">
                    <label class="form-label">Mô tả</label>
                    <input type="text" name="describe" value="{{ $package->describe }}" class="form-control"
                        placeholder="Mô tả">
                </div>
                <div class="mb-3">
                    <label class="form-label">Cấp độ</label>
                    <select name="lever_package_id" class="form-control">
                        <option disabled value="">....Chọn cấp độ....</option>
                        @foreach ($lever as $item)
                            <option {{ $item->id == $package->lever_package_id ? 'selected' : '' }}
                                value="{{ $item->id }}">
                                {{ $item->name }}</option>
                        @endforeach
                    </select>
                </div>
                <button class="btn btn-primary" type="submit">Sửa gói cước</button>
            </form>
        </div>

    </div>
@endsection
