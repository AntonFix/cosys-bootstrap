@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 offset-md-1">
                <div class="card">

                    <div class="card-header">
                        <h1 class="mt-2">Details van persoon</h1>
                    </div>

                    <div class="card-body">

                        <h2>{{ $person->forename }} {{ $person->name }}</h2>

                        <form method="POST"
                              action="{{ Route('person.destroy', $person->id) }}">

                            <div class="row">

                                <div class="col-md-6 mb-3">
                                    <label for="birthday">Geboortedatum</label>
                                    <div class="input-group">
                                        <span class="input-group-text" id="birthday">
                                            <i class="fa-solid fa-calendar-day"></i>
                                        </span>
                                        <input type="text" class="form-control" aria-label="birthday"
                                               aria-describedby="birthday"
                                               value="{{ Carbon\Carbon::parse($person->birthday)->locale('nl')->timezone('Europe/Brussels')->format('D' . ', ' .'m/d/Y') }}"
                                               disabled>
                                    </div>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="sex">Geslacht</label>
                                    <div class="input-group">
                                        <span class="input-group-text" id="sex">
                                            <i class="fa-regular fa-user"></i>
                                        </span>
                                        <input type="text" class="form-control" aria-label="sex"
                                               aria-describedby="sex"
                                               value="{{ $person->sex }}"
                                               disabled>
                                    </div>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="function">Functie</label>
                                    <div class="input-group">
                                        <span class="input-group-text" id="function">
                                            <i class="fa-regular fa-id-badge"></i>
                                        </span>
                                        <input type="text" class="form-control" aria-label="function"
                                               aria-describedby="function"
                                               value="{{ $person->function }}"
                                               disabled>
                                    </div>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="details">Details</label>
                                    <div class="input-group">
                                        <span class="input-group-text" id="details">
                                            <i class="fa-regular fa-file-lines"></i>
                                        </span>
                                        <input type="text" class="form-control" aria-label="details"
                                               aria-describedby="details"
                                               value="{{ $person->details }}"
                                               disabled>
                                    </div>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="presence">Aanwezigheid</label>
                                    <div class="input-group">
                                        <span class="input-group-text" id="presence">
                                            <i class="fa-solid fa-user-check"></i>
                                        </span>
                                        <input type="text" class="form-control" aria-label="presence"
                                               aria-describedby="presence"
                                               value="{{ $person->presence }}"
                                               disabled>
                                    </div>
                                </div>

                                <div class="col-md-2">
                                    <div>Telefoon/GSM</div>
                                    <i class="fa-solid fa-phone mr-3 mt-2"></i>
                                    <a href="tel:{{ str_replace(' ', '', $person->phone) }}">{{ $person->phone }}</a>
                                </div>


                                <div class="col-md-4">
                                    <div>E-mailadres</div>
                                    <i class="fa-solid fa-at mr-3 mt-2"></i>
                                    <a href="mailto:{{ $person->email }}">{{ $person->email }}</a>
                                </div>

                                <div class="col-md-6 mb-3">

                                    <div>Extra</div>

                                    @if($person->volunteer)
                                        <div class="d-inline">
                                            <span class="badge p-2 mt-1"
                                                  style="font-size:0.85rem;background-color:#8bc34a;color:#fff;">Vrijwilliger</span>
                                        </div>
                                    @endif
                                    @if($person->oral_coach)
                                        <div class="d-inline">
                                            <span class="badge p-2 mt-1"
                                                  style="font-size:0.85rem;background-color:#3f51b5;color:#fff;">Oral coach</span>
                                        </div>
                                    @endif
                                    @if($person->coordinator)
                                        <div class="d-inline">
                                            <span class="badge p-2 mt-1"
                                                  style="font-size:0.85rem;background-color:#ff9800;color:#fff;">Coordinator</span>
                                        </div>
                                    @endif

                                </div>


                                <hr>

                                @if(count($person->personAddresses) > 0)
                                    <div class="col-md-6 mb-3">
                                        <h3>Werkt in</h3>
                                        <ul class="list-unstyled">
                                            @foreach ($person->personAddresses as $address)
                                                <li><i class="fa-regular fa-building mr-2"></i>
                                                    <a href="/address/{{ $address->id }}">
                                                        {{ $address->name }}
                                                    </a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif

                                @if(count($person->spokenLanguages) > 0)
                                    <div class="col-md-6 mb-3">
                                        <h3>Spreektalen</h3>
                                        <ul class="list-unstyled">
                                            @foreach ($person->spokenLanguages as $language)
                                                <li><i class="fa-solid fa-language mr-2"></i></i>
                                                    {{ $language->name }} ({{ $language->local_name }})
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif

                                <hr>

                                <div class="col-md-6 mb-3">
                                    <label for="active_from">Actief sinds</label>
                                    <div class="input-group">
                                        <span class="input-group-text" id="active_from">
                                            <i class="fa-regular fa-calendar-check"></i>
                                        </span>
                                        <input type="text" class="form-control form-control-sm" aria-label="active_from"
                                               aria-describedby="active_from"
                                               value="{{ Carbon\Carbon::parse($person->active_from)->locale('nl')->timezone('Europe/Brussels')->format('D' . ', ' .'m/d/Y') }}"
                                               disabled>
                                    </div>
                                </div>


                                <div class="col-md-6 mb-3">
                                    <label for="created_at">Datum en tijd aanmaken</label>
                                    <div class="input-group">
                                        <span class="input-group-text" id="assignedWithUser">
                                            <i class="fa-regular fa-calendar-plus"></i>
                                        </span>
                                        <input type="text" class="form-control form-control-sm" aria-label="created_at"
                                               aria-describedby="created_at"
                                               value="{{ Carbon\Carbon::parse($person->created_at)->locale('nl')->timezone('Europe/Brussels')->format('D' . ', ' .'m/d/Y') }} om {{ Carbon\Carbon::parse($person->created_at)->locale('nl')->timezone('Europe/Brussels')->format('H:i') }}"
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
                                               value="{{ $person->createdByUser->name }}"
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
                                               value="{{ Carbon\Carbon::parse($person->created_at)->locale('nl')->timezone('Europe/Brussels')->format('D' . ', ' .'m/d/Y') }} om {{ Carbon\Carbon::parse($person->updated_at)->locale('nl')->timezone('Europe/Brussels')->format('H:i') }}"
                                               disabled>
                                    </div>
                                </div>


                            </div>

                            <div class="text-center">
                                <a href="{{ Route('person.index') }}"
                                   class="btn btn-outline-primary">
                                    <i class="fa-solid fa-arrow-left-long mr-2"></i>
                                    Terug
                                </a>

                                <a href="{{ Route('person.edit', $person->id) }}"
                                   class="btn btn-outline-success">
                                    <i class="fa-solid fa-pen-to-square mr-2"></i>
                                    Edit
                                </a>

                                @csrf
                                @method('DELETE')
                                <button
                                    type="submit"
                                    class="btn btn-outline-danger">
                                    <i class="fa-regular fa-trash-can mr-2"></i>
                                    Delete
                                </button>

                            </div>

                        </form>

                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection

