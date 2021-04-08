@extends('layouts.app')


@section('title', 'Редактировать пользователя '.$user->name)

@section('content')
   <div class="card rounded-0 border-0">
     <div class="card-body p-4">
      <form method="post" action="{{action('UserController@update', $id)}}">
        {{csrf_field()}}
		<input name="_method" type="hidden" value="PATCH">
          <div class="form-group mt-1 mb-3 col-md-12">
            <label class="form-label" for="name">Логин</label>
            <input type="text" class="form-control" name="name" id="name" value="{{$user->name}}">
          </div>
            <div class="form-group my-2 col-md-12">
              <label class="form-label" for="email">E-Mail</label>
			  <input type="email" class="form-control" name="email" id="email" value="{{$user->email}}">
			  @if ($errors->has('email'))
                <span class="help-block">
                  <strong>{{ $errors->first('email') }}</strong>
                </span>
              @endif
            </div>
            <div class="form-group my-3 col-md-12">
              <label class="form-label" for="role">Роль</label>
                <select class="form-control" name="role" id="role">
                    <option value="admin" @if ($user->hasRole('admin'))selected="selected"@endif>Администратор</option>
					<option value="moderator" @if ($user->hasRole('moderator'))selected="selected"@endif>Модератор</option>
                </select>
            </div>
        <div class="row">
          <div class="form-group mt-2 col-md-4">
            <button type="submit" class="btn btn-success">Сохранить</button>
          </div>
        </div>
      </form>
     </div>
   </div>
@endsection
