@extends('admin.layouts.app')

@section('title')
    Панель пользователей
@endsection

@section('header')
    @include('admin.includes.header')
@endsection

@section('sidebar')
    @include('admin.includes.sidebar')
@endsection

@section('content-wrapper')

    <div class="col-6">
        <div class="box">
            @section('box-title')
                Изменить пользователя
            @endsection

            <form action="{{ route('admin.users.update', $user) }}"
                  method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="box-body">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                               name="name" value="{{ $user->name }}" required autofocus>
                        @error('name')
                        <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                               name="email" value="{{ $user->email }}" required autocomplete="email" autofocus>
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="roles">Roles</label>
                        @foreach($roles as $role)
                            <div class="form-check">
                                <input type="checkbox" name="roles[]" value="{{ $role->id }}"
                                       @if($user->roles->pluck('id')->contains($role->id)) checked @endif>
                                <label>{{ $role->name }}</label>
                            </div>
                        @endforeach
                        <button type="submit" class="btn btn-sm btn-primary">Изменить</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection

@section('main-footer')
    @include('admin.includes.main-footer')
@endsection


