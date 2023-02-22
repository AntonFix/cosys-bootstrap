@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 offset-md-1">

                @if ($errors->any())
                    <div class="alert alert-danger pt-4">
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
                        <h1 class="mt-2">Huidige persoon aanpassen</h1>
                    </div>

                    <div class="card-body">


                        <form action="{{ Route('person.update', $person->id) }}" method="POST"
                              enctype="multipart/form-data">

                            @csrf
                            @method('PUT')

                            <input type="hidden"
                                   name="is_active"
                                   value="{{ $person->is_active }}">

                            <input type="hidden"
                                   name="created_by_user_id"
                                   value="{{ $currentUser->id }}">

                            <div class="row">

                                <div class="col-md-3 mb-3">
                                    <label for="forename">Voornaam</label>
                                    <div class="input-group">
                                        <span class="input-group-text" id="forename">
                                            <i class="fa-regular fa-user"></i>
                                        </span>
                                        <input type="text" class="form-control" aria-label="forename"
                                               aria-describedby="forename"
                                               name="forename"
                                               value="{{ $person->forename }}">
                                        @error('forename')
                                        <div class="alert alert-danger mt-2 mb-0">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-3 mb-3">
                                    <label for="name">Naam</label>
                                    <input type="text" class="form-control" aria-label="name"
                                           aria-describedby="name"
                                           name="name"
                                           value="{{ $person->name }}">
                                    @error('name')
                                    <div class="alert alert-danger mt-2 mb-0">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="birthday">Geboortedatum</label>
                                    <div class="input-group">
                                        <span class="input-group-text" id="birthday">
                                            <i class="fa-solid fa-calendar-day"></i>
                                        </span>
                                        <input type="date" class="form-control" aria-label="birthday"
                                               aria-describedby="birthday"
                                               name="birthday"
                                               value="{{ $person->birthday }}">
                                        @error('birthday')
                                        <div class="alert alert-danger mt-2 mb-0">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6 mb-3">

                                    <i class="fa-regular fa-user mr-2"></i>
                                    <label for="sex">Geslacht</label>
                                    <select class="form-control form-select"
                                            name="sex">

                                        <option disabled value="">Kies een item...</option>

                                        <option value="M" @if(old('type', $person->sex) === 'M')
                                        selected @endif>M
                                        </option>

                                        <option value="V" @if(old('type', $person->sex) === 'V')
                                        selected @endif>V
                                        </option>

                                        <option value="X" @if(old('type', $person->sex) === 'X')
                                        selected @endif>X
                                        </option>

                                    </select>

                                    @error('sex')
                                    <div class="alert alert-danger mt-2 mb-0">{{ $message }}</div>
                                    @enderror

                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="function">Functie</label>
                                    <div class="input-group">
                                        <span class="input-group-text" id="function">
                                            <i class="fa-regular fa-id-badge"></i>
                                        </span>
                                        <input type="text" class="form-control" aria-label="function"
                                               aria-describedby="function"
                                               name="function"
                                               value="{{ $person->function }}">
                                        @error('function')
                                        <div class="alert alert-danger mt-2 mb-0">{{ $message }}</div>
                                        @enderror
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
                                               name="details"
                                               value="{{ $person->details }}">
                                        @error('details')
                                        <div class="alert alert-danger mt-2 mb-0">{{ $message }}</div>
                                        @enderror
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
                                               name="presence"
                                               value="{{ $person->presence }}">
                                        @error('presence')
                                        <div class="alert alert-danger mt-2 mb-0">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6 mb-3">

                                    <label for="phone">Telefoon/GSM</label>
                                    <div class="input-group">
                                        <span class="input-group-text" id="phone">
                                            <i class="fa-solid fa-phone"></i>
                                        </span>
                                        <input type="text" class="form-control" aria-label="phone"
                                               aria-describedby="phone"
                                               name="phone"
                                               value="{{ $person->phone }}">
                                        @error('phone')
                                        <div class="alert alert-danger mt-2 mb-0">{{ $message }}</div>
                                        @enderror
                                    </div>

                                </div>


                                <div class="col-md-6 mb-3">

                                    <label for="phone">E-mailadres</label>
                                    <div class="input-group">
                                        <span class="input-group-text" id="email">
                                            <i class="fa-solid fa-at"></i>
                                        </span>
                                        <input type="text" class="form-control" aria-label="email"
                                               aria-describedby="email"
                                               name="email"
                                               value="{{ $person->email }}">
                                        @error('email')
                                        <div class="alert alert-danger mt-2 mb-0">{{ $message }}</div>
                                        @enderror
                                    </div>

                                </div>

                                <div class="col-md-6 mb-3">

                                    <div>Extra</div>

                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox"
                                               name="volunteer"
                                               value="1"
                                               id="volunteer"
                                               @if(old('volunteer', $person->volunteer) === 1) checked @endif>
                                        <label class="form-check-label" for="volunteer">
                                            Vrijwilliger
                                        </label>
                                        @error('volunteer')
                                        <div class="alert alert-danger mt-2 mb-0">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox"
                                               name="oral_coach"
                                               value="1"
                                               id="oral_coach"
                                               @if(old('oral_coach', $person->oral_coach) === 1) checked @endif>
                                        <label class="form-check-label" for="oral_coach">
                                            Oral coach
                                        </label>
                                        @error('oral_coach')
                                        <div class="alert alert-danger mt-2 mb-0">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox"
                                               name="coordinator"
                                               value="1"
                                               id="coordinator"
                                               @if(old('coordinator', $person->coordinator) === 1) checked @endif>
                                        <label class="form-check-label" for="coordinator">
                                            Coordinator
                                        </label>
                                        @error('coordinator')
                                        <div class="alert alert-danger mt-2 mb-0">{{ $message }}</div>
                                        @enderror
                                    </div>

                                </div>


                                <hr>

                                @if(count($addresses) > 0)
                                    <div class="col-md-6 mb-3">
                                        <h3>Werkt in</h3>

                                        <select class="form-control form-select"
                                                multiple
                                                size="6"
                                                name="person_address[]">

                                            @if(count($currentAddresses)>0)

                                                <option disabled value="">De huidige organisaties:</option>

                                                @foreach ($currentAddresses as $currentAddress)
                                                    <option
                                                        value="{{ $currentAddress->id }}"
                                                        @if(old('currentAddress', $currentAddress->id) === $currentAddress->id)
                                                        selected @endif>{{ $currentAddress->name }}</option>
                                                @endforeach

                                            @endif

                                            <option disabled value="">Kies een nieuwe item...</option>
                                            <option value="0"> - Geen organisatie -</option>

                                            @foreach ($addresses as $address)
                                                <option value="{{ $address->id }}">
                                                    {{ $address->name }}
                                                </option>
                                            @endforeach

                                        </select>

                                        @error('address')
                                        <div class="alert alert-danger mt-2 mb-0">{{ $message }}</div>
                                        @enderror

                                    </div>
                                @endif

                                @if(count($languages) > 0)
                                    <div class="col-md-6 mb-3">
                                        <h3>Spreektalen</h3>

                                        <select class="form-control form-select"
                                                multiple
                                                size="5"
                                                name="person_language[]">

                                            @if(count($currentLanguages)>0)

                                                <option disabled value="">De huidige spreektalen:</option>

                                                @foreach ($currentLanguages as $currentLanguage)
                                                    <option
                                                        value="{{ $currentLanguage->id }}"
                                                        @if(old('currentLanguage', $currentLanguage->id) === $currentLanguage->id)
                                                        selected @endif>{{ $currentLanguage->name }}</option>
                                                @endforeach

                                            @endif

                                            <option disabled value="">Kies een item...</option>
                                            <option value="0"> - Geen organisatie -</option>

                                            @foreach ($languages as $language)
                                                <option value="{{ $language->id }}">
                                                    {{ $language->name }} ({{ $language->local_name }})
                                                </option>
                                            @endforeach

                                        </select>

                                        @error('language')
                                        <div class="alert alert-danger mt-2 mb-0">{{ $message }}</div>
                                        @enderror

                                    </div>
                                @endif

                                <hr>

                                <div class="col-md-6 mb-3">
                                    <label for="active_from">Actief sinds</label>
                                    <div class="input-group">
                                        <span class="input-group-text" id="active_from">
                                            <i class="fa-regular fa-calendar-check"></i>
                                        </span>
                                        <input type="date" class="form-control form-control-sm"
                                               aria-label="active_from"
                                               aria-describedby="active_from"
                                               name="active_from"
                                               value="{{ $person->active_from }}">
                                        @error('active_from')
                                        <div class="alert alert-danger mt-2 mb-0">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                            </div>

                            <div class="text-center">

                                <a href="{{ Route('person.index') }}"
                                   class="btn btn-outline-primary">
                                    <i class="fa-solid fa-arrow-left-long mr-2"></i>
                                    Terug
                                </a>

                                <button type="submit"
                                        class="btn btn-success">
                                    <i class="fa-solid fa-floppy-disk mr-2"></i>
                                    Opslaan
                                </button>

                            </div>

                        </form>

                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
