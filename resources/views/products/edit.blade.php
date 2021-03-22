@extends('layouts.app')


@section('title', 'Редактировать товар '.$product->name)


@section('content')
    <div class="card rounded-0 border-0">
        <div class="card-body p-4">
            <form method="post" action="{{action('ProductController@update', $id)}}">
                {{csrf_field()}}
                <input name="_method" type="hidden" value="PATCH">
                <div class="mb-3">
                    <label class="form-label" for="name">Название:</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{$product->name}}">
                </div>
                <div class="mb-3">
                    <label class="form-label" for="description">Описание:</label>
                    <input type="text" class="form-control" id="description" name="description" value="{{$product->description}}">
                </div>
                <div class="mb-3">
                    <label class="form-label" for="cost">Стоимость:</label>
                    <input type="text" class="form-control" id="cost" name="cost" value="{{$product->cost}}">
                </div>
                <div class="row">
                    <div class="form-group col-md-3 mt-3">
                        <button type="submit" class="btn btn-primary w-100">Сохранить</button>
                    </div>
                </div>
            </form>

            <div class="row">
                <div class="col-md-3 mt-2">
                    <form action="{{action('ProductController@destroy', $product['id'])}}" method="post">
                        {{csrf_field()}}
                        <input name="_method" type="hidden" value="DELETE">
                        <button class="btn btn-danger w-100" type="submit">Удалить</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
