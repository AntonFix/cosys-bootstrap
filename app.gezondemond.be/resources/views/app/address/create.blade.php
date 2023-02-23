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
                            Voeg een nieuwe adres toe
                        </h1>
                    </div>

                    <div class="card-body">


                        <form action="{{ Route('address.store') }}" method="POST"
                              enctype="multipart/form-data">

                            @csrf

                            <input type="hidden"
                                   name="is_active"
                                   value="1">

                            <div class="row">

                                <div class="col-md-6 mb-3">
                                    <label for="title">Organisatienaam</label>
                                    <div class="input-group">
                                        <span class="input-group-text" id="name">
                                            <i class="fa-regular fa-building"></i>
                                        </span>
                                        <input type="text" class="form-control"
                                               name="name"
                                               aria-label="name"
                                               aria-describedby="name"
                                               value="{{ old('name') }}">
                                        @error('name')
                                        <div class="alert alert-danger mt-2 mb-0">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6 mb-3">

                                    <i class="fa-solid fa-list mr-2"></i>
                                    <label for="dictionaryGeos">Regio</label>

                                    <select class="form-control form-select"
                                            name="dictionary_geos_id">
                                        <option disabled selected value="">Kies een item...</option>
                                        @foreach ($dictionaryGeos as $dictionaryGeo)
                                            <option value="{{ $dictionaryGeo->id }}">
                                                {{ $dictionaryGeo->postcode }} {{ $dictionaryGeo->gemeente }}@if($dictionaryGeo->deelgemeente)
                                                    , {{ $dictionaryGeo->deelgemeente }}
                                                @endif
                                                @if($dictionaryGeo->provincie)
                                                    ({{ $dictionaryGeo->provincie }})
                                                @endif
                                            </option>
                                        @endforeach
                                    </select>

                                    @error('dictionaryGeos')
                                    <div class="alert alert-danger mt-2 mb-0">{{ $message }}</div>
                                    @enderror

                                </div>

                                <div class="col-md-4 mb-3">
                                    <label for="street">Straat</label>
                                    <div class="input-group">
                                        <span class="input-group-text" id="street">
                                            <i class="fa-solid fa-map-location"></i>
                                        </span>
                                        <input type="text" class="form-control"
                                               name="street"
                                               aria-label="street"
                                               aria-describedby="street"
                                               value="{{ old('street') }}">
                                        @error('street')
                                        <div class="alert alert-danger mt-2 mb-0">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-2 mb-3">
                                    <label for="street">Nummer + bus</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control"
                                               name="number"
                                               aria-label="number"
                                               aria-describedby="number"
                                               value="{{ old('number') }}">
                                        @error('number')
                                        <div class="alert alert-danger mt-2 mb-0">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="opening_times">Openingsuren</label>
                                    <div class="input-group">
                                        <span class="input-group-text" id="opening_times">
                                            <i class="fa-regular fa-clock"></i>
                                        </span>
                                        <input type="text" class="form-control"
                                               name="opening_times"
                                               aria-label="opening_times"
                                               aria-describedby="opening_times"
                                               value="{{ old('opening_times') }}">
                                        @error('opening_times')
                                        <div class="alert alert-danger mt-2 mb-0">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <hr>

                                <div class="col-md-6 mb-3">
                                    <label for="phone_1">Telefoon 1</label>
                                    <div class="input-group">
                                        <span class="input-group-text" id="phone_1">
                                            <i class="fa-solid fa-phone"></i>
                                        </span>
                                        <input type="text" class="form-control"
                                               name="phone_1"
                                               aria-label="phone_1"
                                               aria-describedby="phone_1"
                                               value="{{ old('phone_1') }}">
                                        @error('phone_1')
                                        <div class="alert alert-danger mt-2 mb-0">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="phone_1_notices">Telefoon 1 (opmerkingen)</label>
                                    <div class="input-group">
                                        <span class="input-group-text" id="phone_1_notices">
                                            <i class="fa-regular fa-note-sticky"></i>
                                        </span>
                                        <input type="text" class="form-control"
                                               name="phone_1_notices"
                                               aria-label="phone_1_notices"
                                               aria-describedby="phone_1_notices"
                                               value="{{ old('phone_1_notices') }}">
                                        @error('phone_1_notices')
                                        <div class="alert alert-danger mt-2 mb-0">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="email_1">E-mailadres 1</label>
                                    <div class="input-group">
                                        <span class="input-group-text" id="email_1">
                                            <i class="fa-solid fa-at"></i>
                                        </span>
                                        <input type="email" class="form-control"
                                               name="email_1"
                                               aria-label="email_1"
                                               aria-describedby="email_1"
                                               value="{{ old('email_1') }}">
                                        @error('email_1')
                                        <div class="alert alert-danger mt-2 mb-0">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="email_1_notices">E-mailadres 1 (opmerkingen)</label>
                                    <div class="input-group">
                                        <span class="input-group-text" id="email_1_notices">
                                            <i class="fa-regular fa-envelope-open"></i>
                                        </span>
                                        <input type="text" class="form-control"
                                               name="email_1_notices"
                                               aria-label="email_1_notices"
                                               aria-describedby="email_1_notices"
                                               value="{{ old('email_1_notices') }}">
                                        @error('email_1_notices')
                                        <div class="alert alert-danger mt-2 mb-0">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="website">Website</label>
                                    <div class="input-group">
                                        <span class="input-group-text" id="website">
                                            <i class="fa-solid fa-globe"></i>
                                        </span>
                                        <input type="text" class="form-control"
                                               name="website"
                                               aria-label="website"
                                               aria-describedby="website"
                                               value="{{ old('website') }}">
                                        @error('website')
                                        <div class="alert alert-danger mt-2 mb-0">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <hr>

                                <h2>Extra gegevens</h2>

                                <div class="col-md-4 mb-3">
                                    <a class="btn btn-primary" data-bs-toggle="collapse" href="#extraInfo"
                                       role="button" aria-expanded="false" aria-controls="extraInfo">
                                        Klik hier om alles te zien
                                    </a>
                                </div>

                                <div class="col-md-12"></div>

                                <div class="collapse" id="extraInfo">
                                    <div class="col-md-12">
                                        <div class="row">

                                            <div class="col-md-6 mb-3">
                                                <label for="phone_2">Telefoon 2</label>
                                                <div class="input-group">
                                                    <span class="input-group-text" id="phone_2">
                                                        <i class="fa-solid fa-phone"></i>
                                                    </span>
                                                    <input type="text" class="form-control"
                                                           name="phone_2"
                                                           aria-label="phone_2"
                                                           aria-describedby="phone_2"
                                                           value="{{ old('phone_2') }}">
                                                    @error('phone_2')
                                                    <div class="alert alert-danger mt-2 mb-0">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-md-6 mb-3">
                                                <label for="phone_2_notices">Telefoon 2 (opmerkingen)</label>
                                                <div class="input-group">
                                                    <span class="input-group-text" id="phone_2_notices">
                                                        <i class="fa-regular fa-note-sticky"></i>
                                                    </span>
                                                    <input type="text" class="form-control"
                                                           name="phone_2_notices"
                                                           aria-label="phone_2_notices"
                                                           aria-describedby="phone_2_notices"
                                                           value="{{ old('phone_2_notices') }}">
                                                    @error('phone_2_notices')
                                                    <div class="alert alert-danger mt-2 mb-0">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-md-6 mb-3">
                                                <label for="phone_3">Telefoon 3</label>
                                                <div class="input-group">
                                                    <span class="input-group-text" id="phone_3">
                                                        <i class="fa-solid fa-phone"></i>
                                                    </span>
                                                    <input type="text" class="form-control"
                                                           name="phone_3"
                                                           aria-label="phone_3"
                                                           aria-describedby="phone_3"
                                                           value="{{ old('phone_3') }}">
                                                    @error('phone_3')
                                                    <div class="alert alert-danger mt-2 mb-0">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-md-6 mb-3">
                                                <label for="phone_3_notices">Telefoon 3 (opmerkingen)</label>
                                                <div class="input-group">
                                                    <span class="input-group-text" id="phone_3_notices">
                                                        <i class="fa-regular fa-note-sticky"></i>
                                                    </span>
                                                    <input type="text" class="form-control"
                                                           name="phone_3_notices"
                                                           aria-label="phone_3_notices"
                                                           aria-describedby="phone_3_notices"
                                                           value="{{ old('phone_3_notices') }}">
                                                    @error('phone_3_notices')
                                                    <div class="alert alert-danger mt-2 mb-0">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>


                                            <div class="col-md-6 mb-3">
                                                <label for="email_2">E-mailadres 2</label>
                                                <div class="input-group">
                                                    <span class="input-group-text" id="email_2">
                                                        <i class="fa-solid fa-at"></i>
                                                    </span>
                                                    <input type="email" class="form-control"
                                                           name="email_2"
                                                           aria-label="email_2"
                                                           aria-describedby="email_2"
                                                           value="{{ old('email_2') }}">
                                                    @error('email_2')
                                                    <div class="alert alert-danger mt-2 mb-0">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-md-6 mb-3">
                                                <label for="email_2_notices">E-mailadres 2 (opmerkingen)</label>
                                                <div class="input-group">
                                                    <span class="input-group-text" id="email_2_notices">
                                                        <i class="fa-regular fa-envelope-open"></i>
                                                    </span>
                                                    <input type="text" class="form-control"
                                                           name="email_2_notices"
                                                           aria-label="email_2_notices"
                                                           aria-describedby="email_2_notices"
                                                           value="{{ old('email_2_notices') }}">
                                                    @error('email_2_notices')
                                                    <div class="alert alert-danger mt-2 mb-0">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>


                                            <div class="col-md-6 mb-3">
                                                <label for="email_3">E-mailadres 3</label>
                                                <div class="input-group">
                                                    <span class="input-group-text" id="email_3">
                                                        <i class="fa-solid fa-at"></i>
                                                    </span>
                                                    <input type="email" class="form-control"
                                                           name="email_3"
                                                           aria-label="email_3"
                                                           aria-describedby="email_3"
                                                           value="{{ old('email_3') }}">
                                                    @error('email_3')
                                                    <div class="alert alert-danger mt-2 mb-0">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-md-6 mb-3">
                                                <label for="email_3_notices">E-mailadres 3 (opmerkingen)</label>
                                                <div class="input-group">
                                                    <span class="input-group-text" id="email_3_notices">
                                                        <i class="fa-regular fa-envelope-open"></i>
                                                    </span>
                                                    <input type="text" class="form-control"
                                                           name="email_3_notices"
                                                           aria-label="email_3_notices"
                                                           aria-describedby="email_3_notices"
                                                           value="{{ old('email_3_notices') }}">
                                                    @error('email_3_notices')
                                                    <div class="alert alert-danger mt-2 mb-0">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>


                                            <div class="col-md-12">
                                                <h2>Financiele gegevens</h2>
                                            </div>

                                            <div class="col-md-6 mb-3">
                                                <label for="fin_naam_bank">Naambank</label>
                                                <div class="input-group">
                                                    <span class="input-group-text" id="fin_naam_bank">
                                                        <i class="fa-solid fa-building-columns"></i>
                                                    </span>
                                                    <input type="text" class="form-control"
                                                           name="fin_naam_bank"
                                                           aria-label="fin_naam_bank"
                                                           aria-describedby="fin_naam_bank"
                                                           value="{{ old('fin_naam_bank') }}">
                                                    @error('fin_naam_bank')
                                                    <div class="alert alert-danger mt-2 mb-0">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-md-6 mb-3">
                                                <label for="fin_naam_persoon_of_organisatie">Naam persoon of
                                                    organisatie</label>
                                                <div class="input-group">
                                                    <span class="input-group-text" id="fin_naam_persoon_of_organisatie">
                                                        <i class="fa-solid fa-id-badge"></i>
                                                    </span>
                                                    <input type="text" class="form-control"
                                                           name="fin_naam_persoon_of_organisatie"
                                                           aria-label="fin_naam_persoon_of_organisatie"
                                                           aria-describedby="fin_naam_persoon_of_organisatie"
                                                           value="{{ old('fin_naam_persoon_of_organisatie') }}">
                                                    @error('fin_naam_persoon_of_organisatie')
                                                    <div class="alert alert-danger mt-2 mb-0">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-md-6 mb-3">
                                                <label for="fin_iban_code">IBAN code</label>
                                                <div class="input-group">
                                                    <span class="input-group-text" id="fin_iban_code">
                                                        <i class="fa-solid fa-rectangle-list"></i>
                                                    </span>
                                                    <input type="text" class="form-control"
                                                           name="fin_iban_code"
                                                           aria-label="fin_iban_code"
                                                           aria-describedby="fin_iban_code"
                                                           value="{{ old('fin_iban_code') }}">
                                                    @error('fin_iban_code')
                                                    <div class="alert alert-danger mt-2 mb-0">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-md-6 mb-3">
                                                <label for="fin_bin_code">BIN code</label>
                                                <div class="input-group">
                                                    <span class="input-group-text" id="fin_bin_code">
                                                        <i class="fa-solid fa-rectangle-list"></i>
                                                    </span>
                                                    <input type="text" class="form-control"
                                                           name="fin_bin_code"
                                                           aria-label="fin_bin_code"
                                                           aria-describedby="fin_bin_code"
                                                           value="{{ old('fin_bin_code') }}">
                                                    @error('fin_bin_code')
                                                    <div class="alert alert-danger mt-2 mb-0">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-md-6 mb-3">
                                                <label for="fin_bicc_code">BICC code</label>
                                                <div class="input-group">
                                                    <span class="input-group-text" id="fin_bicc_code">
                                                        <i class="fa-solid fa-rectangle-list"></i>
                                                    </span>
                                                    <input type="text" class="form-control"
                                                           name="fin_bicc_code"
                                                           aria-label="fin_bicc_code"
                                                           aria-describedby="fin_bicc_code"
                                                           value="{{ old('fin_bicc_code') }}">
                                                    @error('fin_bicc_code')
                                                    <div class="alert alert-danger mt-2 mb-0">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-md-6 mb-3">
                                                <label for="fin_btw_nummer">BTW nummer</label>
                                                <div class="input-group">
                                                    <span class="input-group-text" id="fin_btw_nummer">
                                                        <i class="fa-solid fa-rectangle-list"></i>
                                                    </span>
                                                    <input type="text" class="form-control"
                                                           name="fin_btw_nummer"
                                                           aria-label="fin_btw_nummer"
                                                           aria-describedby="fin_btw_nummer"
                                                           value="{{ old('fin_btw_nummer') }}">
                                                    @error('fin_btw_nummer')
                                                    <div class="alert alert-danger mt-2 mb-0">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-md-6 mb-3">
                                                <label for="fin_ondernemingsnummer">Ondernemingsnummer</label>
                                                <div class="input-group">
                                                    <span class="input-group-text" id="fin_ondernemingsnummer">
                                                        <i class="fa-solid fa-rectangle-list"></i>
                                                    </span>
                                                    <input type="text" class="form-control"
                                                           name="fin_ondernemingsnummer"
                                                           aria-label="fin_ondernemingsnummer"
                                                           aria-describedby="fin_ondernemingsnummer"
                                                           value="{{ old('fin_ondernemingsnummer') }}">
                                                    @error('fin_ondernemingsnummer')
                                                    <div class="alert alert-danger mt-2 mb-0">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-md-6 mb-3">
                                                <label for="fin_opmerkingen">Financiele opmerkingen</label>
                                                <div class="input-group">
                                                    <span class="input-group-text" id="fin_opmerkingen">
                                                        <i class="fa-regular fa-note-sticky"></i>
                                                    </span>
                                                    <input type="text" class="form-control"
                                                           name="fin_opmerkingen"
                                                           aria-label="fin_opmerkingen"
                                                           aria-describedby="fin_opmerkingen"
                                                           value="{{ old('fin_opmerkingen') }}">
                                                    @error('fin_opmerkingen')
                                                    <div class="alert alert-danger mt-2 mb-0">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>


                                <div class="col-md-6 mb-3">
                                    <label for="created_by_user_id">Aangemaaakt door</label>
                                    <div class="input-group">
                                        <span class="input-group-text" id="created_by_user_id">
                                            <i class="fa-solid fa-user-pen"></i>
                                        </span>
                                        <input type="text" class="form-control form-control-sm rounded-end"
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

                                <a href="{{ route('address.index') }}"
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

