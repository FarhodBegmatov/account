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

@section('box-title')
    Контроль пользователей
@endsection

<form method="GET" action="#" enctype="multipart/form-data">
    <input class="form-control me-2" style="margin: 8px auto;" type="search" id="u"
           name="u" placeholder="Поиск" aria-label="Search">
    <button class="btn btn-sm btn-primary" type="submit">Поиск</button>
</form>

@if(count($users))
    <div class="card-body">
        <table class="table table-striped">
            <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Role</th>
                <th scope="col">Actions</th>
            </tr>
            </thead>
            @foreach($users as $user)
                <tbody>
                <tr>
                    <th>{{ $user->id }}</th>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ implode(', ', $user->roles()->get()->pluck('name')->toArray()) }}</td>
                    <td>
                        @can('manage-users')
                            <a href="{{ route('admin.users.edit', $user->id) }}" style="display: contents">
                                <button type="submit" class="btn btn-sm btn-primary float-left">Edit</button>
                            </a>
                            <form method="POST" action="{{ route('admin.users.destroy', $user) }}"
                                  class="float-left contents ml-1"  style="display: contents">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger"
                                        onclick="return confirm('Вы правда хотите удалить {{ $user->name }}?')">
                                    Delete
                                </button>
                            </form>
                        @endcan
                    </td>
                </tr>
                </tbody>
            @endforeach
        </table>
        {{--            {{ $users->appends(['u' => request()->u])->links() }}--}}
    </div>
@else
    <div class="alert alert-info" style="margin: 120px auto;">
        <p>Запись не найдено</p>
    </div>
@endif
@endsection

@section('main-footer')
    @include('admin.includes.main-footer')
@endsection

