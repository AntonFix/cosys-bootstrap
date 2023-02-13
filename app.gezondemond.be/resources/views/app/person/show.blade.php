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
                                    <label for="birthday">birthday</label>
                                    <div class="input-group">
                                        <span class="input-group-text" id="birthday">
                                            <i class="fa-solid fa-list"></i>
                                        </span>
                                        <input type="text" class="form-control" aria-label="birthday"
                                               aria-describedby="birthday"
                                               value="{{ $person->birthday }}"
                                               disabled>
                                    </div>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="sex">sex</label>
                                    <div class="input-group">
                                        <span class="input-group-text" id="sex">
                                            <i class="fa-solid fa-list"></i>
                                        </span>
                                        <input type="text" class="form-control" aria-label="sex"
                                               aria-describedby="sex"
                                               value="{{ $person->sex }}"
                                               disabled>
                                    </div>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="sex">function</label>
                                    <div class="input-group">
                                        <span class="input-group-text" id="function">
                                            <i class="fa-solid fa-list"></i>
                                        </span>
                                        <input type="text" class="form-control" aria-label="function"
                                               aria-describedby="function"
                                               value="{{ $person->function }}"
                                               disabled>
                                    </div>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="sex">details</label>
                                    <div class="input-group">
                                        <span class="input-group-text" id="details">
                                            <i class="fa-solid fa-list"></i>
                                        </span>
                                        <input type="text" class="form-control" aria-label="details"
                                               aria-describedby="details"
                                               value="{{ $person->details }}"
                                               disabled>
                                    </div>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="sex">phone</label>
                                    <div class="input-group">
                                        <span class="input-group-text" id="phone">
                                            <i class="fa-solid fa-list"></i>
                                        </span>
                                        <input type="text" class="form-control" aria-label="phone"
                                               aria-describedby="phone"
                                               value="{{ $person->phone }}"
                                               disabled>
                                    </div>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="sex">email</label>
                                    <div class="input-group">
                                        <span class="input-group-text" id="email">
                                            <i class="fa-solid fa-list"></i>
                                        </span>
                                        <input type="email" class="form-control" aria-label="email"
                                               aria-describedby="email"
                                               value="{{ $person->email }}"
                                               disabled>
                                    </div>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="presence">presence</label>
                                    <div class="input-group">
                                        <span class="input-group-text" id="presence">
                                            <i class="fa-solid fa-list"></i>
                                        </span>
                                        <input type="text" class="form-control" aria-label="presence"
                                               aria-describedby="presence"
                                               value="{{ $person->presence }}"
                                               disabled>
                                    </div>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="app_code">Statuut</label>

                                    @if($person->volunteer)
                                        <div class="input-group color-finished">
                                            <span class="input-group-text" id="volunteer">
                                                <i class="fa-solid fa-list"></i>
                                            </span>
                                            <input type="text" class="form-control" aria-label="volunteer"
                                                   aria-describedby="volunteer"
                                                   value="volunteer"
                                                   disabled>
                                        </div>
                                    @elseif($person->oral_coach)
                                        <div class="input-group color-urgent">
                                            <span class="input-group-text" id="oral_coach">
                                                <i class="fa-solid fa-list"></i>
                                            </span>
                                            <input type="text" class="form-control" aria-label="oral_coach"
                                                   aria-describedby="oral_coach"
                                                   value="oral_coach"
                                                   disabled>
                                        </div>
                                    @elseif($person->coordinator)
                                        <div class="input-group color-planned">
                                            <span class="input-group-text" id="coordinator">
                                                <i class="fa-solid fa-list"></i>
                                            </span>
                                            <input type="text" class="form-control" aria-label="coordinator"
                                                   aria-describedby="coordinator"
                                                   value="coordinator"
                                                   disabled>
                                        </div>
                                    @endif

                                </div>

                                <hr>

                                <div class="col-md-6 mb-3">
                                    @if(count($person->personAddresses) > 0)
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
                                    @endif
                                </div>

                                <div class="col-md-6 mb-3">
                                    @if(count($person->spokenLanguages) > 0)
                                        <h3>Spreektalen</h3>
                                        <ul class="list-unstyled">
                                            @foreach ($person->spokenLanguages as $language)
                                                <li><i class="fa-regular fa-building mr-2"></i>
                                                        {{ $language->name }} ({{ $language->local_name }})
                                                </li>
                                            @endforeach
                                        </ul>
                                    @endif
                                </div>


                                <div class="col-md-6 mb-3">
                                    <label for="active_from">active_from</label>
                                    <div class="input-group">
                                        <span class="input-group-text" id="active_from">
                                            <i class="fa-regular fa-calendar-plus"></i>
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

                            </div>

                            <div class="text-center">
                                <a href="{{ Route('person.index') }}"
                                   class="btn btn-outline-primary">
                                    <i class="fa-solid fa-arrow-left-long mr-2"></i>
                                    Go back
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

