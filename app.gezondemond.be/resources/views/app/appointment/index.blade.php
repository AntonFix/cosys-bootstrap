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
                        <h1 class="mt-2">Afsprakenlijst</h1>
                    </div>

                    <div class="card-header">
                        <h3 class="mt-2">Zoekfilter</h3>

                        <form method="get" action="{{ route('filterAppointments') }}">

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

                                <div class="col-md-2">

                                    <label for="app_code_id" class="form-label">Code</label>
                                    <select class="form-control form-select"
                                            name="app_code_id"
                                            aria-label="app_code_id">
                                        <option disabled selected value="">Kies een item...</option>
                                        @foreach ($appointmentCodes as $appointmentCode)
                                            <option value="{{ $appointmentCode->id }}">
                                                {{ $appointmentCode->title }} ({{ $appointmentCode->details }})
                                            </option>
                                        @endforeach
                                    </select>

                                </div>

                                <div class="col-md-2">

                                    <label for="app_status_id" class="form-label">Statuut</label>
                                    <select class="form-control form-select"
                                            name="app_status_id">
                                        <option disabled selected value="">Kies een item...</option>
                                        @foreach ($appointmentStatuses as $appointmentStatus)
                                            <option value="{{ $appointmentStatus->id }}">
                                                {{ $appointmentStatus->title }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-md-2">
                                    <label for="start_date" class="form-label">Start datum (vanaf)</label>

                                    <input type="date"
                                           class="form-control"
                                           name="start_date"
                                           id="start_date">
                                </div>

                                <div class="col-md-2">
                                    <label for="to_date" class="form-label">tot</label>

                                    <input type="date"
                                           class="form-control"
                                           name="to_date"
                                           id="to_date">
                                </div>

                                <div class="col-md-2">
                                    <label for="start_time" class="form-label">Starttijd</label>
                                    <input type="text"
                                           class="form-control"
                                           name="start_time"
                                           id="start_time">
                                </div>

                                <div class="col-md-2">
                                    <label for="start_time" class="form-label">Eindtijd</label>
                                    <input type="text"
                                           class="form-control"
                                           name="end_time"
                                           id="end_time">
                                </div>

                            </div>


                            <div class="row mb-3">

                                <div class="col-md-6 offset-md-6">

                                    <label for="assigned_with_user_id"
                                           class="form-label">Toegewezen aan medewerker</label>
                                    <select class="form-control form-select"
                                            name="assigned_with_user_id">
                                        <option disabled selected value="">Kies een item...</option>
                                        @foreach ($users as $user)
                                            <option value="{{ $user->id }}">
                                                {{ $user->name }}
                                            </option>
                                        @endforeach
                                    </select>

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

                        <a href="{{ route('appointment.create') }}" class="btn btn-outline-primary mb-3 float-end">
                            <i class="fa-regular fa-square-plus mr-2"></i>
                            Voeg een nieuwe afspraak toe
                        </a>

                        <table class="table table-bordered table-hover">
                            <tr>
                                <th>Titel</th>
                                <th>Startdatum</th>
                                <th>Starttijd</th>
                                <th>Eindtijd</th>
                                <th>Code</th>
                                <th>Statuut</th>
                                <th>Contactpersoon</th>
                                <th>Toegewezen aan</th>
                                <th>Action</th>
                            </tr>

                            @if(count($appointments) > 0)

                                @foreach($appointments as $row)

                                    <tr class="align-middle">
                                        <td class="appointment-title"><a
                                                href="/appointment/{{ $row->id }}">{{ $row->title }}</a></td>
                                        <td width="110"
                                            class="text-center">{{ date('d-m-Y', strtotime($row->start_date)) }}</td>
                                        <td>{{ date('H:i', strtotime($row->start_time)) }}</td>
                                        <td>
                                            @if($row->end_time)
                                                {{ date('H:i', strtotime($row->end_time)) }}
                                            @else
                                            @endif
                                        </td>
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
                                            In behandeling
                                            --}}
                                            <td style="background-color: #94e74c">{{ $row->appStatus->title }}</td>
                                        @else
                                            <td>{{ $row->appStatus->title }}</td>
                                        @endif
                                        <td>
                                            <a href="{{ route('person.show', $row->assignedWithPerson->id) }}">
                                                {{ $row->assignedWithPerson->forename }} {{ $row->assignedWithPerson->name }}
                                            </a>
                                        </td>
                                        <td>{{ $row->assignedWithUser->name }}</td>

                                        <td width="120" class="text-center">

                                            <form method="POST"
                                                  action="{{ route('appointment.destroy', $row->id) }}">

                                                <div class="btn-group" role="group"
                                                     aria-label="Actions">

                                                    <a href="{{ route('appointment.show', $row->id) }}"
                                                       class="btn btn-sm btn-primary">
                                                        <i class="fa-solid fa-list-check mr-2"></i>
                                                        Details
                                                    </a>

                                                    <a href="{{ route('appointment.edit', $row->id) }}"
                                                       class="btn btn-sm btn-success">
                                                        <i class="fa-solid fa-pen-to-square mr-2"></i>
                                                    </a>

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

                        {{--{!! $appointments->links() !!}--}}


                    </div>

                </div>
            </div>
        </div>
    </div>

@endsection


