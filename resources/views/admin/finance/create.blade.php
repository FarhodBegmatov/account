@extends('admin.layouts.app')

@section('header')
    @include('admin.includes.header')
@endsection

@section('sidebar')
    @include('admin.includes.sidebar')
@endsection

@section('content-wrapper')

    @section('box-title')
        Форма для добавления доходы/расходы
    @endsection

<!-- form start -->
    <form method="POST" action="{{ route('admin.finance.index') }}" enctype="multipart/form-data">
        @csrf
        @method('POST')
        <div class="box-body">
            <div class="form-group">
                <label for="tip_id">Тип</label>
                <select class="form-control select2" style="width: 100%;" id="tip_id"
                        name="tip_id">
                    <option >Выберите тип</option>
                    @foreach($tips as $tip)
                        <option @if(old('tip_id') == $tip->id) selected @endif
                        value="{{$tip->id}}">{{$tip->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label>Категория</label>
                <select class="form-control select2" style="width: 100%;" id="validationCustom03"
                        name="category_id">
                    <option >Выберите категория</option>
                    @foreach($categories as $category)
                        <option @if(old('category_id') == $category->id) selected @endif
                                value="{{$category->id}}">{{$category->category_name}}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="date">Дата</label>
                <input type="date" class="form-control" id="date"
                       name="date" value="{{ old('date') }}">
            </div>
            <div class="form-group">
                <label for="summa">Сумма</label>
                <input type="text" class="form-control" id="summa"
                       value="{{ old('summa') }}" name="summa">
            </div>
            <div class="form-group">
                <label for="comment">Комментарий</label>
                <textarea class="form-control" id="comment" name="comment">{{ old('comment') }}</textarea>
            </div>
        </div>

        <!-- /.box-body -->
        <div class="box-footer">
            <button type="submit" class="btn btn-sm btn-primary">Добавить товар</button>
        </div>
    </form>
@endsection

@section('main-footer')
    @include('admin.includes.main-footer')
@endsection


