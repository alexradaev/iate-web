@extends('layouts.app')


@section('title', "Список товаров")

@section('content')
    <div class="card rounded-0 border-0">
        <div class="card-body p-4">
            <div class="d-none d-md-flex row my-2 pb-1 border-dark border-bottom">
                <div class="col-md-1">ID</div>
                <div class="col-md-2">Название</div>
                <div class="col-md-2 col-xl-3">Описание</div>
                <div class="col-md-2">Стоимость</div>
                <div class="col-md-5 col-xl-4 text-center">Действия</div>
            </div>
        @foreach($products as $product)
          <div class="row py-1 border-bottom align-items-center">
            <div class="col-2 col-md-1">{{$product['id']}}</div>
              <div class="col-4 col-md-2"><a href="{{action('ProductController@show', $product['id'])}}">{{$product['name']}}</a></div>
            <div class="col-4 col-md-2 col-xl-3">{{$product['description']}}</div>
            <div class="col-2 col-md-2">{{$product['cost']}}</div>
            <div class="col-6 mt-1 mt-md-0 col-md-3 col-xl-2">
              <a href="{{action('ProductController@edit', $product['id'])}}" class="btn btn-secondary w-100">Редактировать</a>
            </div>
            <div class="col-6 mt-0 mt-md-0 col-md-2">
              <form class="w-100" action="{{action('ProductController@destroy', $product['id'])}}" method="post">
                {{csrf_field()}}
                <input name="_method" type="hidden" value="DELETE">
                <button class="btn btn-danger w-100" type="submit">Удалить</button>
              </form>
            </div>
          </div>
        @endforeach
        <div class="row mt-3">
          <div class="col col-md-3 col-lg-2">
            <a href="{{action('ProductController@create')}}" class="btn btn-primary w-100">Добавить</a>
          </div>
        </div>
      </div>
     </div>


@endsection
