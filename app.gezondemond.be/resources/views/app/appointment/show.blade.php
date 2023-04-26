@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 offset-md-1">
                <div class="card">

                    <div class="card-header">
                        <h1 class="mt-2">Details appointment item</h1>
                    </div>

                    <div class="card-body">

                        <h2>{{ $appointment->title }}</h2>

                        <form method="POST"
                              action="{{ route('appointment.destroy', $appointment->id) }}">

                            <div class="row">

                                <div class="col-md-6 mb-3">
                                    <label for="app_code">Code</label>
                                    <div class="input-group">
                                        <span class="input-group-text" id="appCode">
                                            <i class="fa-solid fa-list"></i>
                                        </span>
                                        <input type="text" class="form-control" aria-label="appCode"
                                               aria-describedby="appCode"
                                               value="{{ $appointment->appCode->title }} ({{ $appointment->appCode->details }})"
                                               disabled>
                                    </div>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="app_code">Statuut</label>

                                @if($appointment->appStatus->id == 4)
                                    <!--Is uitgevoerd-->
                                        <div class="input-group color-finished">
                                            <span class="input-group-text" id="appStatus">
                                                <i class="fa-solid fa-list"></i>
                                            </span>
                                            <input type="text" class="form-control" aria-label="appStatus"
                                                   aria-describedby="appStatus"
                                                   value="{{ $appointment->appStatus->title }}"
                                                   disabled>
                                        </div>
                                @elseif($appointment->appStatus->id == 3)
                                    <!--Dringend-->
                                        <div class="input-group color-urgent">
                                            <span class="input-group-text" id="appStatus">
                                                <i class="fa-solid fa-list"></i>
                                            </span>
                                            <input type="text" class="form-control" aria-label="appStatus"
                                                   aria-describedby="appStatus"
                                                   value="{{ $appointment->appStatus->title }}"
                                                   disabled>
                                        </div>
                                @elseif($appointment->appStatus->id == 2)
                                    <!--Gepland-->
                                        <div class="input-group color-planned">
                                            <span class="input-group-text" id="appStatus">
                                                <i class="fa-solid fa-list"></i>
                                            </span>
                                            <input type="text" class="form-control" aria-label="appStatus"
                                                   aria-describedby="appStatus"
                                                   value="{{ $appointment->appStatus->title }}"
                                                   disabled>
                                        </div>
                                    @else
                                        <div class="input-group">
                                            <span class="input-group-text" id="appStatus">
                                                <i class="fa-solid fa-list"></i>
                                            </span>
                                            <input type="text" class="form-control" aria-label="appStatus"
                                                   aria-describedby="appStatus"
                                                   value="{{ $appointment->appStatus->title }}"
                                                   disabled>
                                        </div>
                                    @endif

                                </div>

                                <hr>

                                <div class="col-md-6 mb-3">
                                    <label for="person">Contactpersoon</label>
                                    <div class="input-group">
                                        <span class="input-group-text" id="person">
                                            <i class="fa-solid fa-id-card"></i>
                                        </span>
                                        <input type="text" class="form-control" aria-label="person"
                                               aria-describedby="person"
                                               value="{{ $appointment->assignedWithPerson->forename }} {{ $appointment->assignedWithPerson->name }}"
                                               disabled>

                                        <button class="btn btn-secondary rounded-end" type="button" id="person"
                                                data-bs-toggle="modal" data-bs-target="#showPerson"><i
                                                class="fa-regular fa-eye"></i></button>

                                        <div class="modal fade" id="showPerson" tabindex="-1"
                                             aria-labelledby="showPersonLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h1 class="modal-title fs-5" id="showPersonLabel">Details
                                                            van contactpersoon</h1>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                                aria-label="Sluiten"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <h2>
                                                            <a href="/person/{{ $appointment->assignedWithPerson->id }}">
                                                                {{ $appointment->assignedWithPerson->forename }} {{ $appointment->assignedWithPerson->name }}
                                                            </a>

                                                        </h2>

                                                        @if($appointment->assignedWithPerson->is_active == 1)
                                                            <span class="badge bg-success small mb-2">Aktief</span>
                                                        @elseif ($appointment->assignedWithPerson->is_active == 0)
                                                            <span class="badge bg-danger small mb-2">Niet aktief!</span>
                                                        @endif

                                                        @if($appointment->assignedWithPerson->active_from)
                                                            <ul class="list-unstyled">
                                                                <li>
                                                                    <i class="fa-regular fa-calendar-check pr-2"></i>
                                                                    Actief vanaf
                                                                    {{ Carbon\Carbon::parse($appointment->assignedWithPerson->active_from)->locale('nl')->timezone('Europe/Brussels')->format('D' . ', ' .'m/d/Y') }}
                                                                </li>
                                                            </ul>
                                                        @endif
                                                        @if($appointment->assignedWithPerson->inactive_from)
                                                            <ul class="list-unstyled">
                                                                <li>
                                                                    <i class="fa-regular fa-calendar-xmark pr-2"></i>
                                                                    Inactief vanaf
                                                                    {{ Carbon\Carbon::parse($appointment->assignedWithPerson->inactive_from)->locale('nl')->timezone('Europe/Brussels')->format('D' . ', ' .'m/d/Y') }}
                                                                </li>
                                                            </ul>
                                                        @endif

                                                        @if($appointment->assignedWithPerson->coordinator)
                                                            <span
                                                                class="badge mb-3 text-bg-primary p-2">Coordinator</span>
                                                        @endif
                                                        @if($appointment->assignedWithPerson->oral_coach)
                                                            <span class="badge mb-3 text-bg-info p-2">Oral coach</span>
                                                        @endif
                                                        @if($appointment->assignedWithPerson->volunteer)
                                                            <span
                                                                class="badge mb-3 text-bg-success p-2">Vrijwilliger</span>
                                                        @endif

                                                        @if($appointment->assignedWithPerson->details)
                                                            <hr>
                                                            <p>{{ $appointment->assignedWithPerson->details }}</p>
                                                            <hr>
                                                        @endif

                                                        @if($appointment->assignedWithPerson->function)
                                                            <p>{{ $appointment->assignedWithPerson->function }}</p>
                                                            <hr>
                                                        @endif

                                                        <h3>Сontacten</h3>
                                                        <ul class="list-unstyled">
                                                            @if($appointment->assignedWithPerson->phone)
                                                                <li>
                                                                    <i class="fa-solid fa-phone-volume pr-2"></i>
                                                                    <a href="tel:{{ $appointment->assignedWithPerson->phone }}">
                                                                        {{ $appointment->assignedWithPerson->phone }}
                                                                    </a>
                                                                </li>
                                                            @endif
                                                            @if($appointment->assignedWithPerson->email)
                                                                <li>
                                                                    <i class="fa-solid fa-at pr-2"></i>
                                                                    <a href="mailto:{{ $appointment->assignedWithPerson->email }}?subject={{ $appointment->title }}">
                                                                        {{ $appointment->assignedWithPerson->email }}
                                                                    </a>
                                                                </li>
                                                            @endif

                                                        </ul>

                                                        @if(count($appointment->assignedWithPersonAddresses) > 0)
                                                            <h3>Werkt in</h3>
                                                            <ul class="list-unstyled">
                                                                @foreach ($appointment->assignedWithPersonAddresses as $address)
                                                                    <li><i class="fa-regular fa-building mr-2"></i>
                                                                        <a href="/address/{{ $address->id }}">
                                                                            {{ $address->name }}
                                                                        </a>
                                                                    </li>
                                                                @endforeach
                                                            </ul>
                                                        @endif

                                                        @if(count($appointment->assignedWithPersonSpokenLanguages) > 0)
                                                            <h3>Spreektalen</h3>
                                                            <ul>
                                                                @foreach ($appointment->assignedWithPersonSpokenLanguages as $language)
                                                                    <li>
                                                                        {{ $language->name }}
                                                                        ({{ $language->local_name }})
                                                                    </li>
                                                                @endforeach
                                                            </ul>
                                                        @endif


                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                                data-bs-dismiss="modal">Sluiten
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="assignedWithUser">Toegewezen aan medewerker</label>
                                    <div class="input-group">
                                        <span class="input-group-text" id="assignedWithUser">
                                            <i class="fa-solid fa-user-plus"></i>
                                        </span>
                                        <input type="text" class="form-control" aria-label="assignedWithUser"
                                               aria-describedby="assignedWithUser"
                                               value="{{ $appointment->assignedWithUser->name }}"
                                               disabled>
                                    </div>
                                </div>


                                <div class="col-md-6 mb-3">
                                    <label for="dateTime">Startdatum en tijd</label>
                                    <div class="input-group">
                                        <span class="input-group-text" id="dateTime">
                                            <i class="fa-regular fa-calendar-days"></i>
                                        </span>
                                        <input type="text" class="form-control" aria-label="dateTime"
                                               aria-describedby="dateTime"
                                               value="{{ Carbon\Carbon::parse($appointment->start_date)->locale('nl')->timezone('Europe/Brussels')->format('D' . ', ' .'m/d/Y') }} om {{ $appointment->start_time }}"
                                               disabled>
                                    </div>
                                </div>

                                @if($appointment->end_time)
                                    <div class="col-md-6 mb-3">
                                        <label for="dateTime">Eindtijd</label>
                                        <div class="input-group">
                                        <span class="input-group-text" id="dateTime">
                                            <i class="fa-solid fa-circle-stop"></i>
                                        </span>
                                            <input type="text" class="form-control" aria-label="dateTime"
                                                   aria-describedby="dateTime"
                                                   value="{{ $appointment->end_time }}"
                                                   disabled>
                                        </div>
                                    </div>
                                @endif

                                <hr>

                                <div class="col-md-12 mb-3">
                                    <label for="details">Details</label>
                                    <textarea class="form-control" id="details"
                                              rows="10"
                                              disabled>{{ $appointment->details }}</textarea>
                                </div>


                                @if($appointment->attachment)
                                    <div class="col-md-12 mb-3">
                                        <a href="{{ URL::asset('storage/uploads/'.$appointment->attachment) }}"
                                           class="btn btn-info"
                                           title=""><i class="fa fa-download"></i> {{ $appointment->attachment }}
                                        </a>
                                    </div>
                                @endif

                                <hr>

                                <div class="col-md-6 mb-3">
                                    <label for="created_at">Datum en tijd aanmaken</label>
                                    <div class="input-group">
                                        <span class="input-group-text" id="assignedWithUser">
                                            <i class="fa-regular fa-calendar-plus"></i>
                                        </span>
                                        <input type="text" class="form-control form-control-sm" aria-label="created_at"
                                               aria-describedby="created_at"
                                               value="{{ Carbon\Carbon::parse($appointment->created_at)->locale('nl')->timezone('Europe/Brussels')->format('D' . ', ' .'m/d/Y') }} om {{ Carbon\Carbon::parse($appointment->created_at)->locale('nl')->timezone('Europe/Brussels')->format('H:i') }}"
                                               disabled>
                                    </div>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="updated_at">Gewijzigd</label>
                                    <div class="input-group">
                                        <span class="input-group-text" id="updated_at">
                                            <i class="fa-solid fa-pen"></i>
                                        </span>
                                        <input type="text" class="form-control form-control-sm" aria-label="updated_at"
                                               aria-describedby="updated_at"
                                               value="{{ Carbon\Carbon::parse($appointment->created_at)->locale('nl')->timezone('Europe/Brussels')->format('D' . ', ' .'m/d/Y') }} om {{ Carbon\Carbon::parse($appointment->updated_at)->locale('nl')->timezone('Europe/Brussels')->format('H:i') }}"
                                               disabled>
                                    </div>
                                </div>


                                <div class="col-md-6 mb-3">
                                    <label for="assignedWithUser">Aangemaaakt door</label>
                                    <div class="input-group">
                                        <span class="input-group-text" id="createdByUser">
                                            <i class="fa-solid fa-user-pen"></i>
                                        </span>
                                        <input type="text" class="form-control form-control-sm"
                                               aria-label="createdByUser"
                                               aria-describedby="createdByUser"
                                               value="{{ $appointment->createdByUser->name }}"
                                               disabled>
                                    </div>
                                </div>

                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <a href="{{ route('appointment.index') }}"
                                       class="btn btn-outline-primary">
                                        <i class="fa-solid fa-arrow-left-long mr-2"></i>
                                        Terug
                                    </a>

                                    <a href="{{ route('appointment.copy', $appointment->id) }}"
                                       class="btn btn-light border">
                                        <i class="fa-regular fa-copy mr-2"></i>
                                        Een kopie maken
                                    </a>

                                    <a href="{{ route('appointment.edit', $appointment->id) }}"
                                       class="btn btn-outline-success">
                                        <i class="fa-solid fa-pen-to-square mr-2"></i>
                                        Bewerken
                                    </a>

                                </div>

                                <div class="col-md-6">
                                    <a href="{{ route('appointment.inProgress', $appointment->id) }}"
                                       class="btn btn-primary">
                                        <i class="fa-solid fa-gears mr-2"></i>
                                        In behandeling
                                    </a>

                                    <a href="{{ route('appointment.isCarriedOut', $appointment->id) }}"
                                       class="btn btn-success">
                                        <i class="fa-regular fa-circle-check mr-2"></i>
                                        Is uitgevoerd
                                    </a>

                                    @csrf
                                    @method('DELETE')
                                    <button
                                        type="submit"
                                        class="btn btn-outline-danger float-end">
                                        <i class="fa-regular fa-trash-can mr-2"></i>
                                        <!--Delete-->
                                    </button>

                                </div>
                            </div>

                        </form>

                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection

