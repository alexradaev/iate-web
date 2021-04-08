@extends('layouts.app')


@section('title', 'Товар '.$product->name)

@section('content')
    <div class="card rounded-0 border-0">
        <div class="card-body p-3">
            @if (Auth::user() !== null)
                <div class="row">
                    <div class="col-md-3">[<a href="{{action('ProductController@edit', $id)}}">Редактировать</a>]</div>
                </div>
            @endif
            <div class="row mb-2">
                <div class="col col-md-2">Название:</div>
                <div class="col col-md-10">{{$product->name}}</div>
            </div>
            <div class="row mb-2">
                <div class="col col-md-2">Описание:</div>
                <div class="col col-md-10">{!! $product->description !!}</div>
            </div>
            <div class="row mb-4">
                <div class="col col-md-2">Стоимость:</div>
                <div class="col col-md-10">{{$product->cost}}</div>
            </div>
            <div class="row">
                <div class="col col-md-2">
                    <a href="{{action('ProductController@index')}}" class="btn btn-primary w-100">К списку</a>
                </div>
            </div>
        </div>
    </div>

@endsection
