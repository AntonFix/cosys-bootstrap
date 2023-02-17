@extends('layouts.app')

@section('content')

    <div class="container">

        <div class="row">

            <div class="col-md-12">

                <div class="card">

                    <div class="card-header">
                        <h1 class="mt-2">Search results</h1>

                        <form method="get" action="{{ route('filterAppointments') }}">

                            <div class="row mb-3">
                                <div class="col-md-12">
                                    <label for="title" class="form-label">Zoekterm in de titel</label>
                                    <input type="text"
                                           class="form-control"
                                           name="title"
                                           id="title"
                                           value="{{ Request::get('title') }}">
                                </div>
                            </div>

                            <div class="row mb-3">


                                <div class="col-md-3">
                                    <label for="app_code_id" class="form-label">Code</label>


                                    <select class="form-control form-select"
                                            name="app_code_id">

                                        @if(Request::get('app_code_id'))
                                            @foreach ($appointmentCodes as $appointmentCode)
                                                <option value="{{ $appointmentCode->id }}"
                                                        @if(Request::get('app_code_id') == $appointmentCode->id)
                                                        selected disabled
                                                    @endif>
                                                    {{ $appointmentCode->title }}
                                                </option>
                                            @endforeach
                                        @else
                                            <option disabled selected value="">Kies een item...</option>
                                            @foreach ($appointmentCodes as $appointmentCode)
                                                <option value="{{ $appointmentCode->id }}">
                                                    {{ $appointmentCode->title }}
                                                </option>
                                            @endforeach
                                        @endif


                                    </select>


                                </div>


                                <div class="col-md-3">
                                    <label for="app_status_id" class="form-label">Statuut</label>
                                    <select class="form-control form-select"
                                            name="app_status_id">


                                        @foreach ($appointmentStatuses as $appointmentStatus)
                                            <option value="{{ $appointmentStatus->id }}"
                                                    @if(Request::get('app_status_id') == $appointmentStatus->id)
                                                    selected disabled
                                                @endif>
                                                {{ $appointmentStatus->title }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>


                                <div class="col-md-3">
                                    <label for="start_date" class="form-label">Start datum</label>

                                    <input type="date"
                                           class="form-control"
                                           name="start_date"
                                           id="start_date"
                                           value="{{ Request::get('start_date') }}">
                                </div>

                                <div class="col-md-3">
                                    <label for="start_time" class="form-label">Start tijd</label>

                                    <input type="text"
                                           class="form-control"
                                           name="start_time"
                                           id="start_time"
                                           value="{{ Request::get('start_time') }}">
                                </div>

                            </div>


                            <div class="row mb-3">

                                <div class="col-md-6">

                                    <div class="row row-cols-lg-auto g-3 align-items-end">

                                        {{--
                                        <div class="col-md-12">

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
                                        --}}

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

                    <div class="card-body">

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

                            @if(count($serp) > 0)

                                @foreach($serp as $result)

                                    <tr>
                                        <td width=300"><a href="/appointment/{{ $result->id }}">{{ $result->title }}</a>
                                        </td>
                                        <td width="110"
                                            class="text-center">{{ date('d-m-Y', strtotime($result->start_date)) }}</td>
                                        <td>{{ date('H:i', strtotime($result->start_time)) }}</td>
                                        <td>{{ $result->appCode->title }}</td>
                                        <td>{{ $result->appStatus->title }}</td>
                                        <td>{{ $result->assignedWithPerson->forename }} {{ $result->assignedWithPerson->name }}</td>
                                        <td>{{ $result->assignedWithUser->name }}</td>
                                        <td width="220" class="text-center">

                                            <form method="POST"
                                                  action="{{ route('appointment.destroy', $result->id) }}">

                                                <div class="btn-group" role="group"
                                                     aria-label="Actions">

                                                    <a href="{{ route('appointment.show', $result->id) }}"
                                                       class="btn btn-sm btn-primary">
                                                        <i class="fa-solid fa-list-check mr-2"></i>
                                                        Details
                                                    </a>

                                                    <a href="{{ route('appointment.edit', $result->id) }}"
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
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
