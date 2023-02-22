@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">

                <!--                <div id="vue-app"></div>

                                <router-link/>-->

                @if($message = Session::get('success'))

                    <div class="alert alert-success">
                        {{ $message }}
                    </div>

                @endif

                <div class="card">


                    <div class="card-header">
                        <h1 class="mt-2">Personenlijst</h1>
                    </div>

                    <div class="card-header">
                        <h3 class="mt-2">Zoekfilter</h3>

                        <form method="get" action="{{ route('filterPersons') }}">

                            <div class="row mb-3">
                                <div class="col-md-12">
                                    <label for="title" class="form-label">Zoekterm in de titel</label>
                                    <input type="text"
                                           class="form-control"
                                           name="title"
                                           id="title">
                                </div>
                            </div>

                            <div class="row mb-3">

                                <div class="col-md-3">
                                    <label for="start_date" class="form-label">Start datum</label>

                                    <input type="date"
                                           class="form-control"
                                           name="start_date"
                                           id="start_date">
                                </div>

                                <div class="col-md-3">
                                    <label for="start_time" class="form-label">Start tijd</label>
                                    <input type="text"
                                           class="form-control"
                                           name="start_time"
                                           id="start_time">
                                </div>

                            </div>


                            <div class="row mb-3 float-end">

                                <div class="col-md-12">
                                    <a class="btn btn-outline-secondary d-inline-block"
                                       href="{{ Route('filterAppointments') }}"
                                       type="reset">
                                        <i class="fa-solid fa-eraser mr-2"></i>
                                        Reset filter
                                    </a>
                                    <button class="btn btn-secondary d-inline-block"><i
                                            class="fa-solid fa-magnifying-glass-plus mr-2"></i>
                                        Zoek
                                    </button>
                                </div>


                            </div>

                        </form>

                    </div>

                    <div class="card-body">
                        {{--debug.blade.php--}}

                        <a href="{{ route('person.create') }}" class="btn btn-outline-primary mb-3 float-end">
                            <i class="fa-regular fa-square-plus mr-2"></i>
                            Add
                        </a>

                        <table class="table table-bordered table-hover">
                            <tr>
                                <th>Voornaam en naam</th>
                                <th>Geslacht</th>
                                <th>Organisatienaam</th>
                                <th>Telefoon</th>
                                <th>Vrijwilliger</th>
                                <th>Oral coach</th>
                                <th>Coördinator</th>
                                <th>Actief sinds</th>
                                <th>Action</th>
                            </tr>

                            @if(count($persons) > 0)

                                @foreach($persons as $row)

                                    <tr class="align-middle">
                                        <td class="person-title"><a
                                                href="/person/{{ $row->id }}">{{ $row->forename }} {{ $row->name }}</a>
                                        </td>
                                        <td>
                                            {{ $row->sex }}
                                        </td>
                                        <td>
                                            @if(count($row->personAddresses) > 0)
                                                <ul class="list-unstyled mb-0">
                                                    @foreach($row->personAddresses as $address)
                                                        <li>
                                                            <a href="/address/{{ $address->id }}">{{ $address->name }}</a>
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            @endif
                                        </td>
                                        <td>
                                            @if($row->phone)
                                                <a href="tel:{{ str_replace(' ', '', $row->phone) }}">{{ $row->phone }}</a>
                                            @endif
                                        </td>
                                        @if($row->volunteer == 1)
                                            <td style="background-color:#8bc34a;color:#fff;">Vrijwilliger</td>
                                        @else
                                            <td>Neen</td>
                                        @endif

                                        @if($row->oral_coach == 1)
                                            <td width="90" style="background-color:#3f51b5;color:#fff;">Oral coach</td>
                                        @else
                                            <td>Neen</td>
                                        @endif

                                        @if($row->coordinator == 1)
                                            <td style="background-color:#ff9800;color:#fff;">Coördinator</td>
                                        @else
                                            <td>Neen</td>
                                        @endif

                                        <td width="110"
                                            class="text-center">{{ date('d-m-Y', strtotime($row->active_from)) }}
                                        </td>

                                        <td width="150" class="text-center">

                                            <form method="POST"
                                                  action="{{ route('person.destroy', $row->id) }}">

                                                <div class="btn-group" role="group"
                                                     aria-label="Actions">

                                                    <a href="{{ route('person.show', $row->id) }}"
                                                       class="btn btn-sm btn-primary">
                                                        <i class="fa-solid fa-list-check mr-2"></i>
                                                        Details
                                                    </a>

                                                    <a href="{{ route('person.edit', $row->id) }}"
                                                       class="btn btn-sm btn-success">
                                                        <i class="fa-solid fa-pen-to-square mr-2"></i>
                                                    </a>

                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm">
                                                        <i class="fa-regular fa-trash-can mr-2"></i>
                                                    </button>
                                                </div>
                                            </form>

                                        </td>
                                    </tr>

                                @endforeach

                            @else
                                <tr>
                                    <td colspan="10" class="text-center">No Data Found</td>
                                </tr>
                            @endif

                        </table>

                        {{--{!! $persons->links() !!}--}}


                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection


