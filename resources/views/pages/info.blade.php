@extends('layouts.app')

@section('title', 'Информация')

@section('content')


    {{ $name  }}

    <ul>
    @for ($i = 0; $i<10; $i++)
            <li> {{$i}} </li>
    @endfor
    </ul>

@endsection
