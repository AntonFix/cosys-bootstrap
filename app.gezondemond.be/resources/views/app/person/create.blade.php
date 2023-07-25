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
                        <h1 class="mt-2">Voeg een nieuwe persoon toe</h1>
                    </div>

                    <div class="card-body">


                        <form action="{{ Route('person.store') }}" method="POST"
                              enctype="multipart/form-data">

                            @csrf

                            <input type="hidden"
                                   name="is_active"
                                   value="1">

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
                                               value="{{ old('forename') }}">

                                    </div>
                                    @error('forename')
                                    <div class="alert alert-danger mt-2 mb-0">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-3 mb-3">
                                    <label for="name">Naam</label>
                                    <input type="text" class="form-control" aria-label="name"
                                           aria-describedby="name"
                                           name="name"
                                           value="{{ old('name') }}">
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
                                               value="{{ old('birthday') }}">
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
                                        <option disabled selected value="">Kies een item...</option>
                                        <option value="M">M</option>
                                        <option value="V">V</option>
                                        <option value="X">X</option>
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
                                               value="{{ old('function') }}">
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
                                               value="{{ old('details') }}">
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
                                               value="{{ old('presence') }}">
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
                                               value="{{ old('phone') }}">
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
                                               value="{{ old('email') }}">
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
                                               id="volunteer">
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
                                               id="oral_coach">
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
                                               id="coordinator">
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

                                        <addresses-create>
                                        </addresses-create>

                                    <!--                                        <select class="form-control form-select"
                                                multiple
                                                size="6"
                                                name="person_address[]">
                                            <option disabled selected value="">Kies een item...</option>
                                            @foreach ($addresses as $address)
                                        <option value="{{ $address->id }}">
                                                    {{ $address->name }}
                                            </option>
@endforeach
                                        </select>-->

                                        @error('address')
                                        <div class="alert alert-danger mt-2 mb-0">{{ $message }}</div>
                                        @enderror

                                    </div>
                                @endif

                                @if(count($languages) > 0)
                                    <div class="col-md-6 mb-3">
                                        <h3>Spreektalen</h3>
                                        <!--             <select name="person_language[]" data-choice multiple class="spreektalen"></select>-->

                                        <spoken-languages-create>
                                        </spoken-languages-create>


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
                                               value="{{ old('active_from') }}">
                                        @error('active_from')
                                        <div class="alert alert-danger mt-2 mb-0">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6 mb-3">

                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label for="active_from">Bijlage 1</label>
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
                                            <label for="active_from">Bijlage 2</label>
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

                                        <div class="col-md-12 mb-3">
                                            <label for="active_from">Bijlage 3</label>
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

                                    </div>
                                </div>

                            </div>

                            <div class="text-center">

                                <a href="{{ Route('person.index') }}"
                                   class="btn btn-outline-primary mr-2">
                                    <i class="fa-solid fa-arrow-left-long mr-2"></i>
                                    Annuleren
                                </a>

                                <button type="submit"
                                        class="btn btn-success ml-2">
                                    <i class="fa-solid fa-floppy-disk mrl-2"></i>
                                    Aanmaken
                                </button>

                            </div>

                        </form>

                    </div>

                </div>
            </div>
        </div>
    </div>

@endsection

