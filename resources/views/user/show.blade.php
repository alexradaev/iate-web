@extends('layouts.app')


@section('title', $user->name)

@section('content')
    <div class="card rounded-0 border-0">
        <div class="card-body p-4">
            <div class="row align-items-center">
                <div class="col-md-2">
                    {{$user->name}}
                </div>
                <div class="col-md-2">
                    {{$user->email}}
                </div>
                <div class="col-md-2">
                    @foreach($user['roles'] as $role)
                        {{$role['name']}}
                        @if (!$loop->last)<br>@endif
                    @endforeach
                </div>
                <div class="col-md-3">
                    <a href="{{action('UserController@edit', $user['id'])}}"
                       class="btn btn-primary w-100">Редактировать</a>
                </div>
                <div class="col-md-3">
                    <form action="{{action('UserController@destroy', $user['id'])}}" method="post">
                        {{csrf_field()}}
                        <input name="_method" type="hidden" value="DELETE">
                        <button class="btn btn-danger w-100" type="submit">Удалить</button>
                    </form>
                </div>
            </div>

            <div class="row mt-2">
                <div class="col col-md-2">
                    <a href="{{action('UserController@index')}}" class="btn btn-secondary w-100">К списку</a>
                </div>
            </div>
        </div>
    </div>


@endsection
