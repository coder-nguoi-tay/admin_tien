@extends('layouts.admin')
@section('admin')
    <div class="container-fluid">
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">{{ $title }}</h6>
            </div>
            <form class="form p-5" action="{{ route('employer.update', $employer->id) }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label class="form-label">Tên nhà tuyển dụng</label>
                    <input type="text" name="name" value="{{ $employer->name }}" class="form-control"
                        placeholder="Tên nhà tuyển dụng">
                </div>
                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input type="text" name="email" value="{{ $employer->getUser->email }}" class="form-control"
                        placeholder="Tên nhà tuyển dụng">
                </div>
                <div class="mb-3">
                    <label class="form-label">Tên công ty</label>
                    <input type="text" name="namecompany" value="{{ $employer->namecompany }}" class="form-control"
                        placeholder="Tên nhà tuyển dụng">
                </div>
                <div class="mb-3">
                    <label class="form-label">Số điện thoại</label>
                    <input type="text" name="phone" value="{{ $employer->phone }}" class="form-control"
                        placeholder="Số điện thoại">
                </div>
                <div class="mb-3">
                    <label class="form-label">Địa chỉ</label>
                    <input type="text" name="address" value="{{ $employer->address }}" class="form-control"
                        placeholder="Địa chỉ">
                </div>

                <button class="btn btn-primary" type="submit">Thay đổi</button>
            </form>
        </div>

    </div>
@endsection
