@extends('layouts.admin')
@section('admin')
    <div class="container-fluid">
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">{{ $title }}</h6>
            </div>
            <form class="form p-3" action="{{ route('admin.update', $admin->id) }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label class="form-label">Tên nhân viên</label>
                    <input type="text" name="name" value="{{ $admn->name }}" class="form-control"
                        placeholder="Tên ứng viên">
                </div>
                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input type="text" name="email" value="{{ $admn->email }}" class="form-control"
                        placeholder="Email">
                </div>
                <div class="mb-3">
                    <label class="form-label">Mật khẩu</label>
                    <input type="text" name="password" class="form-control" placeholder="Email">
                </div>
                <div class="mb-3">
                    <label class="form-label">Cấp bậc</label>
                    <select name="role" id="" class="form-control">
                        <option {{ $admin->role == 1 ? 'selected' : '' }} value="1">Admin</option>
                        <option {{ $admin->role == 2 ? 'selected' : '' }} value="2">System Admin</option>
                    </select>
                </div>
                <button class="btn btn-primary" type="submit">Thực hiện</button>
            </form>
        </div>

    </div>
@endsection
