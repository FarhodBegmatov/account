@extends('admin.layouts.app')

@section('header')
    @include('admin.includes.header')
@endsection

@section('sidebar')
    @include('admin.includes.sidebar')
@endsection

@section('content-wrapper')

    @section('box-title')
        Форма для изменения доходы/расходы
    @endsection

    <!-- form start -->
    <form method="POST" action="{{ route('admin.finance.update', $finance) }}"
          enctype="multipart/form-data">
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
                <label for="category_id">Категория</label>
                <select class="form-control select2" style="width: 100%;"
                        id="category_id" name="category_id">
                    @foreach($categories as $category)
                        <option @if(old('category_id') == $category->id) selected @endif
                        value="{{$category->id}}">{{$category->category_name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="date">Дата</label>
                <input type="date" class="form-control" id="date"
                       name="date" value="{{ $finance->date }}">
            </div>
            <div class="form-group">
                <label for="summa">Сумма</label>
                <input type="text" class="form-control" id="summa"
                       value="{{ $finance->summa }}" name="summa">
            </div>
            <div class="form-group">
                <label for="comment">Комментарий</label>
                <textarea class="form-control" id="comment" name="comment">{{ $finance->comment }}</textarea>
            </div>
            <div class="box-footer">
                <button type="submit" class="btn btn-sm btn-primary">Изменить</button>
            </div>
        </div>
    </form>
@endsection

@section('main-footer')
    @include('admin.includes.main-footer')
@endsection



