@extends('layouts.app')


@section('content')

    <div class="container">

        <div class="row">

            <div class="col-md-12">

                @foreach ($persons as $person)
                    <p>Persoon: {{ $person->name }}
                        / {{--@foreach ($person->spokenLanguages as $lng){{ $lng->name }}@endforeach--}}</p>
                @endforeach

            </div>

        </div>

    </div>
@endsection
