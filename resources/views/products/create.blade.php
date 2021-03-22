@extends('layouts.app')

@section('title', 'Создать товар')

@section('content')

<div class="row">
    <div class="col-12 mt-4">
        <form id="product-form" method="post" action="{{action('ProductController@store')}}">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="name" class="form-label">Название</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}">
            </div>
            <div class="form-group">
                <label for="description" class="form-label">Описание</label>
                <input type="text" class="form-control" id="description" name="description" value="{{ old('description') }}">
            </div>
            <div class="form-group">
                <label for="cost" class="form-label">Стоимость</label>
                <input type="text" class="form-control" id="cost" name="cost" value="{{ old('cost') }}">
            </div>
            <button type="submit" class="btn btn-primary mt-2">Создать</button>
        </form>
    </div>
</div>

@endsection
