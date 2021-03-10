@extends('layouts.app')

@section('title', 'Главная страница')

@section('content')

<div class="row">
  <div class="col-12 mt-4">
    <form id="main-form">
        <div class="form-group">
            <label for="selectMonth" class="form-label">Month</label>
            <select class="form-control" id="selectMonth">
                @foreach  ($months as $month)
                    <option>{{$month}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group mt-2">
            <label for="selectDay" class="form-label">Day</label>
            <select class="form-control" id="selectDay">
                @for ($i = 1; $i<=31; $i++)
                    <option>{{$i}}</option>
                @endfor
            </select>
        </div>
        <button type="submit" class="btn btn-primary mt-2">Показать</button>
    </form>
  </div>
</div>

@endsection
