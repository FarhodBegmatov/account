@extends('admin.layouts.app')

@section('header')
    @include('admin.includes.header')
@endsection

@section('sidebar')
    @include('admin.includes.sidebar')
@endsection

@section('content-wrapper')
    @section('box-title')
        Форма для изменения категория
    @endsection

    <!-- form start -->
    <form class="needs-validation" novalidate enctype="multipart/form-data"
          action="{{ route('admin.categories.update', $category) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="box-body">
            <div class="form-group">
                <label for="tip_id">Тип</label>
                <select class="form-control select2" style="width: 100%;" id="tip_id" name="tip_id">
                    @foreach($tips as $tip)
                        <option @if(old('tip_id') == $tip->id) selected @endif
                        value="{{$tip->id}}">{{$tip->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="category_name">Названия категория</label>
                <input type="text" class="form-control" id="category_name" name="category_name"
                       placeholder="Введите названия категория" value="{{ $category->category_name }}">
            </div>
            <div class="box-footer" style="display: contents">
                <button type="submit" class="btn btn-sm btn-primary">Изменить категория</button>
            </div>
        </div><!-- /.box-body -->
    </form>
@endsection

@section('main-footer')
    @include('admin.includes.main-footer')
@endsection
