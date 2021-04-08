@extends('layouts.app')

@section('title', 'Создать пользователя')

@section('content')

<div class="card rounded-0 border-0">
    <div class="card-body p-4">
        <form class="form-horizontal" method="POST" action="{{ route('register') }}">
            {{ csrf_field() }}
            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}  row">
                <label for="name" class="col-md-4 col-form-label">Логин</label>
                <div class="col-md-8">
                    <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>
                      @if ($errors->has('name'))
                        <span class="help-block">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                      @endif
                </div>
            </div>
            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}  row">
                <label for="email" class="col-md-4 col-form-label">E-Mail</label>
                <div class="col-md-8">
                    <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>
                      @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                      @endif
                </div>
            </div>
            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}  row">
                <label for="password" class="col-md-4 col-form-label">Пароль</label>
                <div class="col-md-8">
                    <input id="password" type="password" class="form-control" name="password" required>
                      @if ($errors->has('password'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                      @endif
                </div>
            </div>
            <div class="form-group row">
                <label for="password-confirm" class="col-md-4 col-form-label">Повторить пароль</label>
                <div class="col-md-8">
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                </div>
            </div>
            <div class="form-group row">
                <label for="role" class="col-md-4 col-form-label">Роль</label>
                <div class="col-md-8">
                    <select class="form-control" name="role" id="role">
                        <option value="admin">Админ</option>
                        <option value="editor">Редактор</option>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-md-8">
                    <button type="submit" class="btn btn-primary">
                        Зарегестрировать
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>

@endsection
