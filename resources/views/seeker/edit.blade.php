@extends('layouts.admin')
@section('admin')
    <div class="container-fluid">
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">{{ $title }}</h6>
            </div>
            <form class="form p-5" action="{{ route('seeker.update', $user->id) }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label class="form-label">Tên ứng viên</label>
                    <input type="text" name="name" value="{{ $user->name }}" class="form-control"
                        placeholder="Tên ứng viên">
                </div>
                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input type="text" name="email" value="{{ $user->email }}" class="form-control"
                        placeholder="Email">
                </div>
                <button class="btn btn-primary" type="submit">Thay đổi</button>
            </form>
        </div>

    </div>
@endsection
