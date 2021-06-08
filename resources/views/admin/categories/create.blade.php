@extends('admin.layouts.app')

@section('header')
    @include('admin.includes.header')
@endsection

@section('sidebar')
    @include('admin.includes.sidebar')
@endsection

@section('content-wrapper')
    @section('box-title')
        Форма для добавления категория
    @endsection
    <!-- form start -->
    <form class="needs-validation" novalidate action="{{ route('admin.categories.index') }}"
          method="POST" enctype="multipart/form-data">
        @csrf
        @method('POST')
        <div class="box-body">
            <div class="form-group">
                <label for="tip_id">Тип</label>
                <select class="form-control select2" style="width: 100%;" id="tip_id" name="tip_id">
                    <option>Выберите тип</option>
                    @foreach($tips as $tip)
                        <option @if(old('tip_id') == $tip->id) selected @endif
                        value="{{$tip->id}}">{{$tip->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="category_name">Названия категория</label>
                <input type="text" class="form-control" id="category_name" name="category_name"
                       placeholder="Введите названия категория" value="{{ old('category_name') }}">
            </div>
            <div class="footer">
                <button type="submit" class="btn btn-sm btn-primary">Добавить категория</button>
            </div>
        </div>
        <!-- /.box-body -->

    </form>

@endsection

@section('main-footer')
    @include('admin.includes.main-footer')
@endsection

