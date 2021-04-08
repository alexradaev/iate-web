@extends('layouts.app')


@section('title', "Пользователи")

@section('content')
    <div class="card rounded-0 border-0">
        <div class="card-body p-4">
            <div class="row index-row">
                <div class="col-1">ID</div>
                <div class="col-2">Имя</div>
                <div class="col-3">email</div>
                <div class="col-2">Роли</div>
                <div class="col-4 text-center">Действия</div>
            </div>
            @foreach($users as $user)
                <div class="row my-2 align-items-center">
                    <div class="col-1">{{$user['id']}}</div>
                    <div class="col-2">
                        <a href="{{action('UserController@show', $user['id'])}}">{{$user['name']}}</a>
                    </div>
                    <div class="col-3">{{$user['email']}}</div>
                    <div class="col-2">
                        @foreach($user['roles'] as $role)
                            {{$role['name']}}
                            @if (!$loop->last)<br>@endif
                        @endforeach
                    </div>
                    <div class="col-5 col-md-2 ml-3 mr-auto ml-md-auto">
                        <a href="{{action('UserController@edit', $user['id'])}}" class="btn btn-primary w-100">Редактировать</a>
                    </div>
                    <div class="col-5 col-md-2 mr-3 ml-auto mr-md-auto">
                        <form action="{{action('UserController@destroy', $user['id'])}}" method="post">
                            {{csrf_field()}}
                            <input name="_method" type="hidden" value="DELETE">
                            <button class="btn btn-danger w-100" type="submit">Удалить</button>
                        </form>
                    </div>
                </div>
            @endforeach
            <div class="row mt-3">
                <div class="col-12 col-md-3">
                    <a href="{{ url('register') }}" class="btn btn-secondary">Добавить</a>
                </div>
            </div>
        </div>
    </div>


@endsection
