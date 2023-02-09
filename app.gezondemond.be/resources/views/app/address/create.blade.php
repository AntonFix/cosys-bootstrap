@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 offset-md-1">

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                @if(session('status'))
                    <div class="alert alert-success mb-1 mt-1">
                        {{ session('status') }}
                    </div>
                @endif

                <div class="card">

                    <div class="card-header">
                        <h1>
                            Create new appointment
                        </h1>
                    </div>

                    <div class="card-body">

                        <hr>


                        <hr>


                        <form action="{{ route('appointment.store') }}" method="POST"
                              enctype="multipart/form-data">

                            @csrf

                            <input type="hidden"
                                   name="archived"
                                   value="0">

                            <div class="row">

                                <div class="col-md-12 mb-3">
                                    <label for="title">Titel</label>
                                    <div class="input-group">
                                        <span class="input-group-text" id="title">
                                            <i class="fa-regular fa-pen-to-square"></i>
                                        </span>
                                        <input type="text" class="form-control"
                                               name="title"
                                               aria-label="title"
                                               aria-describedby="title"
                                               value="{{ old('title') }}">
                                        @error('title')
                                        <div class="alert alert-danger mt-2 mb-0">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6 mb-3">

                                    <i class="fa-solid fa-list mr-2"></i>
                                    <label for="app_code_id">Code</label>

                                    <select class="form-control"
                                            name="app_code_id">
                                        <option disabled selected value="">Kies een item...</option>
                                        @foreach ($appointmentCodes as $appointmentCode)
                                            <option value="{{ $appointmentCode->id }}">
                                                {{ $appointmentCode->title }} ({{ $appointmentCode->details }})
                                            </option>
                                        @endforeach
                                    </select>

                                    @error('app_code_id')
                                    <div class="alert alert-danger mt-2 mb-0">{{ $message }}</div>
                                    @enderror

                                </div>

                                <div class="col-md-6 mb-3">

                                    <i class="fa-solid fa-list mr-2"></i>
                                    <label for="app_status_id">Statuut</label>

                                    <select class="form-control"
                                            name="app_status_id">
                                        <option disabled selected value="">Kies een item...</option>
                                        @foreach ($appointmentStatuses as $appointmentStatus)
                                            <option value="{{ $appointmentStatus->id }}">
                                                {{ $appointmentStatus->title }}
                                            </option>
                                        @endforeach
                                    </select>

                                    @error('app_status_id')
                                    <div class="alert alert-danger mt-2 mb-0">{{ $message }}</div>
                                    @enderror

                                </div>

                                <div class="col-md-6 mb-3">

                                    <i class="fa-solid fa-id-card mr-2"></i>
                                    <label for="assigned_with_person_id">Contactpersoon</label>

                                    <select class="form-control"
                                            name="assigned_with_person_id">
                                        <option disabled selected value="">Kies een item...</option>
                                        @foreach ($persons as $person)
                                            <option value="{{ $person->id }}">
                                                {{ $person->forename }} {{ $person->name }}
                                            </option>
                                        @endforeach
                                    </select>

                                    @error('assigned_with_person_id')
                                    <div class="alert alert-danger mt-2 mb-0">{{ $message }}</div>
                                    @enderror

                                </div>

                                <div class="col-md-6 mb-3">
                                    <i class="fa-solid fa-user-plus"></i>
                                    <label for="assigned_with_user_id">Toegewezen aan medewerker</label>

                                    <select class="form-control"
                                            name="assigned_with_user_id">
                                        <option disabled selected value="">Kies een item...</option>
                                        @foreach ($users as $user)
                                            <option value="{{ $user->id }}">
                                                {{ $user->name }}
                                            </option>
                                        @endforeach
                                    </select>

                                    @error('assigned_with_user_id')
                                    <div class="alert alert-danger mt-2 mb-0">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="start_date">Datum</label>
                                    <div class="input-group">
                                        <span class="input-group-text" id="start_date">
                                            <i class="fa-solid fa-calendar-days"></i>
                                        </span>
                                        <input type="date" class="form-control"
                                               name="start_date"
                                               aria-label="start_date"
                                               aria-describedby="start_date"
                                               value="{{ old('start_date') }}">
                                        @error('start_date')
                                        <div class="alert alert-danger mt-2 mb-0">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="start_time">Tijd</label>
                                    <div class="input-group">
                                        <span class="input-group-text" id="start_time">
                                            <i class="fa-regular fa-clock"></i>
                                        </span>
                                        <input type="time" class="form-control"
                                               name="start_time"
                                               aria-label="start_time"
                                               aria-describedby="start_time"
                                               value="{{ old('start_time') }}">
                                        @error('start_time')
                                        <div class="alert alert-danger mt-2 mb-0">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-12 mb-3">
                                    <label for="details">Details</label>
                                    <textarea class="form-control"
                                              id="details"
                                              name="details"
                                              rows="10">{{ old('details') }}</textarea>
                                    @error('details')
                                    <div class="alert alert-danger mt-2 mb-0">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-12 mb-3">
                                    <div class="input-group">
                                        <span class="input-group-text" id="attachment">
                                            <i class="fa-solid fa-paperclip"></i>
                                        </span>
                                        <input type="file"
                                               class="form-control form-control-sm"
                                               name="attachment"
                                               aria-label="attachment"
                                               aria-describedby="attachment"
                                               value="{{ old('attachment') }}">
                                        @error('attachment')
                                        <div class="alert alert-danger mt-2 mb-0">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="created_by_user_id">Aangemaaakt door</label>
                                    <div class="input-group">
                                        <span class="input-group-text" id="created_by_user_id">
                                            <i class="fa-solid fa-user-pen"></i>
                                        </span>
                                        <input type="text" class="form-control form-control-sm"
                                               name=""
                                               aria-label="created_by_user_id"
                                               aria-describedby="created_by_user_id"
                                               value="{{ $currentUser->name }}"
                                               disabled>

                                        <input type="hidden"
                                               name="created_by_user_id"
                                               value="{{ $currentUser->id }}">

                                    </div>
                                </div>

                            </div>

                            <div class="text-center">

                                <a href="{{ route('appointment.index') }}"
                                   class="btn btn-outline-primary">
                                    <i class="fa-solid fa-arrow-left-long mr-2"></i>
                                    Go back
                                </a>

                                <button type="submit"
                                        class="btn btn-success">
                                    <i class="fa-solid fa-floppy-disk mr-2"></i>
                                    Save
                                </button>
                            </div>

                        </form>

                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection

