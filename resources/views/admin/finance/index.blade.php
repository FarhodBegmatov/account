@extends('admin.layouts.app')

@section('title')
    Админ панель
@endsection

@section('header')
    @include('admin.includes.header')
@endsection

@section('sidebar')
    @include('admin.includes.sidebar')
@endsection

@section('content-wrapper')

    @section('box-title')
        Домашняя бухгалтерия
    @endsection

    <form method="GET" action="{{ route('admin.search_content') }}">
        <input class="form-control me-2" style="margin: 8px auto;" type="search" id="p"
               name="p" placeholder="Поиск" aria-label="Search">
        <button class="btn btn-sm btn-primary" type="submit">Поиск</button>
    </form>
    @if(count($finances))
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Тип</th>
                        <th scope="col">Категория</th>
                        <th scope="col">Дата</th>
                        <th scope="col">Сумма</th>
                        <th scope="col">Итого</th>
                        <th scope="col">Комментарий</th>
                        @can('manage-users')
                            <th scope="col">
                                <a href="{{ route('admin.finance.create') }}" style="display: contents">
                                    <button type="submit" class="btn btn-sm btn-success float-left">
                                        Добавить
                                    </button>
                                </a>
                            </th>
                        @endcan
                    </tr>
                </thead>
                @foreach($finances as $finance)
                    <tbody>
                        <tr>
                            <th>{{ $finance->id }}</th>
                            <td>{{ $finance->tip->name }}</td>
                            <td>{{ $finance->category->category_name }}</td>
                            <td>{{ $finance->date }}</td>
                            <td>{{ number_format($finance->summa,2,"."," ") }}</td>
                            <td>{{ number_format($finance->summa,2,"."," ") }}</td>
                            <td>{{ $finance->comment }}</td>
                            <td>
                                @can('manage-users')
                                    <a href="{{ route('admin.finance.edit', $finance->id) }}" style="display: contents">
                                        <button type="submit" class="btn btn-sm btn-primary float-left fa fa-pencil"></button>
                                    </a>
                                    <form method="POST" action="{{ route('admin.finance.destroy', $finance->id) }}"
                                          enctype="multipart/form-data"
                                          class="float-left"  style="display: contents;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger fa fa-trash"
                                                onclick="return confirm('Do you want to delete?')"
                                                style="margin-left:3px;">
                                        </button>
                                    </form>
                                @endcan
                            </td>
                        </tr>
                    </tbody>
                @endforeach
            </table>
        </div>
        {{ $finances->appends(['p' => request()->p])->links() }}
    @else
        <div class="alert alert-info" style="margin: 120px auto;">
            <p>Запись не найдено</p>
        </div>
    @endif
@endsection

@section('main-footer')
    @include('admin.includes.main-footer')
@endsection


