@extends('admin.layouts.app')

@section('title')
    Доходы
@endsection

@section('header')
    @include('admin.includes.header')
@endsection

@section('sidebar')
    @include('admin.includes.sidebar')
@endsection

@section('content-wrapper')

    @section('box-title')
        Доходы
    @endsection

    <form method="GET" action="{{ route('admin.search_income') }}">
        <input class="form-control me-2" style="margin: 8px auto;" type="search" id="i"
               name="i" placeholder="Поиск" aria-label="Search">
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
                    </tr>
                    </tbody>
                @endforeach
            </table>
        </div>
        {{ $finances->appends(['i' => request()->i])->links() }}
    @else
        <div class="alert alert-info" style="margin: 120px auto;">
            <p>Запись не найдено</p>
        </div>
    @endif

@endsection

@section('main-footer')
    @include('admin.includes.main-footer')
@endsection








