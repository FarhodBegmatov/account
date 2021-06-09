@extends('admin.layouts.app')

@section('title')
    Категория
@endsection

@section('header')
    @include('admin.includes.header')
@endsection

@section('sidebar')
    @include('admin.includes.sidebar')
@endsection

@section('content-wrapper')

    @section('box-title')
        Категории расходов/доходов
    @endsection

    <form method="GET" action="{{ route('admin.search') }}" enctype="multipart/form-data">
        <input class="form-control me-2" style="margin: 8px auto;" type="search" id="s"
               name="s" placeholder="Поиск" aria-label="Search">
        <button class="btn btn-sm btn-primary" type="submit">Поиск</button>
    </form>

    @if(count($categories))
        <div class="box-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>№</th>
                        <th>Тип</th>
                        <th>Названия категории</th>
                        <th>Число добавления</th>
                        <th>Число изменения</th>
                        <th>
                            <a href="{{ route('admin.categories.create') }}">
                                <button class="btn btn-sm btn-success" type="submit">Добавить</button>
                            </a>
                        </th>
                    </tr>
                </thead>
                <tbody>
                @foreach($categories as $category)
                    <tr>
                        <td>{{ $category->id }}</td>
                        <td>{{ $category->tip->name }}</td>
                        <td>{{ $category->category_name }}</td>
                        <td>{{ $category->created_at }}</td>
                        <td>{{ $category->updated_at }}</td>
                        <td>
                            <a href="{{ route('admin.categories.edit', $category->id) }}">
                                <button class="btn btn-sm btn-primary fa fa-pencil" style=" margin-right: 3px;" type="submit"></button>
                            </a>
                            <form action="{{ route('admin.categories.destroy', $category) }}" method="POST"  style="display: contents;">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger fa fa-trash" type="submit" onclick="return confirm('Do you want to delete{{ $category->category_name }}?')"></button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            {{ $categories->appends(['s' => request()->s])->links() }}
        </div><!-- /.box-body -->
    @else
        <div class="alert alert-info" style="margin: 120px auto;">
            <p>Запись не найдено</p>
        </div>
    @endif

@endsection

@section('main-footer')
    @include('admin.includes.main-footer')
@endsection








