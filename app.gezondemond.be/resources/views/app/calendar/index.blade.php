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
                        <h1 class="mt-2">Zoekfilter</h1>

                        <form method="get" action="{{ route('filterpersons') }}">

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


                            <div class="row mb-3">

                                <div class="col-md-4 offset-md-9">

                                    <div class="row  row-cols-lg-auto g-3 align-items-end">

                                        <div class="col-md-12">
                                            <button class="btn btn-outline-secondary d-inline-block"><i
                                                    class="fa-solid fa-magnifying-glass-plus mr-2"></i>
                                                Zoek
                                            </button>
                                        </div>

                                    </div>
                                </div>

                            </div>

                        </form>

                    </div>

                    <div class="card-header">
                        <h2 class="mt-2">Afsprakenlijst</h2>
                    </div>

                    <div class="card-body">
                        {{--debug.blade.php--}}

                        <a href="{{ route('person.create') }}" class="btn btn-outline-primary mb-3 float-end">
                            <i class="fa-regular fa-square-plus mr-2"></i>
                            Add
                        </a>

                        <table class="table table-bordered table-hover">
                            <tr>
                                <th>Titel</th>
                                <th>Start datum</th>
                                <th>Start tijd</th>
                                <th>Code</th>
                                <th>Statuut</th>
                                <th>Contactpersoon</th>
                                <th>Toegewezen aan</th>
                                <th>Action</th>
                            </tr>

                            @if(count($persons) > 0)

                                @foreach($persons as $row)

                                    <tr class="align-middle">
                                        <td class="person-title"><a href="/person/{{ $row->id }}">{{ $row->title }}</a></td>
                                        <td width="110"
                                            class="text-center">{{ date('d-m-Y', strtotime($row->start_date)) }}</td>
                                        <td>{{ date('H:i', strtotime($row->start_time)) }}</td>
                                        <td>
                                            {{ $row->appCode->title }}
                                        </td>
                                        @if($row->appStatus->id == 4)
                                            {{--
                                            Is uitgevoerd
                                            --}}
                                            <td style="background-color: #e9ecef">{{ $row->appStatus->title }}</td>
                                        @elseif($row->appStatus->id == 3)
                                            {{--
                                            Dringend
                                            --}}
                                            <td style="background-color: #fbc02d">{{ $row->appStatus->title }}</td>
                                        @elseif($row->appStatus->id == 2)
                                            {{--
                                            Dringend
                                            --}}
                                            <td style="background-color: #94e74c">{{ $row->appStatus->title }}</td>
                                        @else
                                            <td>{{ $row->appStatus->title }}</td>
                                        @endif
                                        <td>{{ $row->assignedWithPerson->forename }} {{ $row->assignedWithPerson->name }}</td>
                                        <td>{{ $row->assignedWithUser->name }}</td>

                                        <td width="220" class="text-center">

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


