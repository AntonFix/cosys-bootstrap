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
                            Details van adres
                        </h1>
                    </div>

                    <div class="card-body">


                        <form method="POST"
                              action="{{ route('address.destroy', $address->id) }}">

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
                                               value="{{ $address->name }}"
                                               disabled>
                                    </div>
                                </div>

                                <div class="col-md-4 mb-3">

                                    <i class="fa-solid fa-list mr-2"></i>
                                    <label for="dictionaryGeos">Regio</label>

                                    <input type="text" class="form-control"
                                           name="name"
                                           aria-label="name"
                                           aria-describedby="name"
                                           value="{{ $address->region->postcode }} {{ $address->region->gemeente }}@if($address->region->deelgemeente), {{ $address->region->deelgemeente }} @endif @if($address->region->provincie)({{ $address->region->provincie }})@endif"
                                           disabled>
                                </div>

                                <div class="col-md-2 mb-3">
                                    <i class="fa-solid fa-location-dot mr-2"></i>
                                    <label for="dictionaryGeos" class="mb-1">Google Maps</label>

                                    <a target="_blank"
                                       href="https://www.google.be/maps/place/{{ $address->street }} {{ $address->number }}, {{ $address->region->postcode }}">Bekijk
                                        map en route</a>

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
                                               value="{{ $address->street }}"
                                               disabled>
                                    </div>
                                </div>

                                <div class="col-md-2 mb-3">
                                    <label for="street">Nummer + bus</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control"
                                               name="number"
                                               aria-label="number"
                                               aria-describedby="number"
                                               value="{{ $address->number }}"
                                               disabled>
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
                                               value="{{ $address->opening_times }}"
                                               disabled>
                                    </div>
                                </div>

                                <hr>

                                <div class="col-md-6 mb-3">
                                    <label for="phone_1">Telefoon 1</label>
                                    <div class="input-group">
                                        <span class="input-group-text" id="phone_1">
                                            <i class="fa-solid fa-phone"></i>
                                        </span>
                                        <a href="tel:{{ $address->phone_1 }}" class="form-control"
                                           aria-label="phone_1"
                                           aria-describedby="phone_1"
                                           disabled>{{ $address->phone_1 }}</a>
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
                                               value="{{ $address->phone_1_notices }}"
                                               disabled>
                                    </div>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="email_1">E-mailadres 1</label>
                                    <div class="input-group">
                                        <span class="input-group-text" id="email_1">
                                            <i class="fa-solid fa-at"></i>
                                        </span>
                                        <a href="mailto:{{ $address->email_1 }}" class="form-control"
                                           aria-label="email_1"
                                           aria-describedby="email_1"
                                           disabled>{{ $address->email_1 }}</a>

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
                                               value="{{ $address->email_1_notices }}"
                                               disabled>
                                    </div>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="website">Website</label>
                                    <div class="input-group">
                                        <span class="input-group-text" id="website">
                                            <i class="fa-solid fa-globe"></i>
                                        </span>
                                        <a href="{{ $address->website }}" type="text" class="form-control"
                                           aria-label="website"
                                           aria-describedby="website">
                                            {{ $address->website }}
                                        </a>
                                    </div>
                                </div>

                                <div class="col-md-6 mb-3">

                                    @if(count($address->coupledPersons) > 0)
                                        <button type="button" class="btn btn-outline-secondary mt-4"
                                                data-bs-toggle="modal"
                                                data-bs-target="#personsListModal">
                                            Wie werkt hier
                                        </button>
                                    @endif

                                    <div class="modal fade" id="personsListModal" tabindex="-1"
                                         aria-labelledby="personsListModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="personsListModalLabel">Hier
                                                        werken</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    @if(count($address->coupledPersons) > 0)
                                                        <ul class="list-unstyled">
                                                            @foreach ($address->coupledPersons as $person)
                                                                <li>
                                                                    <i class="fa-regular fa-id-badge mr-2"></i> <a
                                                                        href="/person/{{ $person->id }}">{{ $person->forename }} {{ $person->name }}</a>
                                                                    /
                                                                    <i class="fa-solid fa-at mr-2"></i> <a
                                                                        href="mailto:{{ $person->email }}">{{ $person->email }}</a>
                                                                    /
                                                                    <i class="fa-solid fa-phone"></i> <a
                                                                        href="tel:{{ $person->phone }}">{{ $person->phone }}</a>
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

                                <div class="col-md-3 mb-3">
                                    <label for="active_from">Actief sinds</label>
                                    <div class="input-group">
                                        <span class="input-group-text" id="active_from">
                                            <i class="fa-regular fa-calendar-check"></i>
                                        </span>
                                        <input type="date" class="form-control"
                                               aria-label="active_from"
                                               aria-describedby="active_from"
                                               name="active_from"
                                               value="{{ $address->active_from }}"
                                               disabled>
                                        @error('active_from')
                                        <div class="alert alert-danger mt-2 mb-0">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-3 mb-3">
                                    <label for="not_active_from">Inactief sinds</label>
                                    <div class="input-group">
                                        <span class="input-group-text" id="not_active_from">
                                            <i class="fa-regular fa-calendar-check"></i>
                                        </span>
                                        <input type="date" class="form-control"
                                               aria-label="not_active_from"
                                               aria-describedby="not_active_from"
                                               name="not_active_from"
                                               value="{{ $address->not_active_from }}"
                                               disabled>
                                        @error('not_active_from')
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
                                                           value="{{ $address->phone_2 }}"
                                                           disabled>
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
                                                           value="{{ $address->phone_2_notices }}"
                                                           disabled>
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
                                                           value="{{ $address->phone_3 }}"
                                                           disabled>
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
                                                           value="{{ $address->phone_3 }}"
                                                           disabled>
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
                                                           value="{{ $address->email_2 }}"
                                                           disabled>
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
                                                           value="{{ $address->email_2_notices }}"
                                                           disabled>
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
                                                           value="{{ $address->email_3 }}"
                                                           disabled>
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
                                                           value="{{ $address->email_3_notices }}"
                                                           disabled>
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
                                                           value="{{ $address->fin_naam_bank }}"
                                                           disabled>
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
                                                           value="{{ $address->fin_naam_persoon_of_organisatie }}"
                                                           disabled>
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
                                                           value="{{ $address->fin_iban_code }}"
                                                           disabled>
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
                                                           value="{{ $address->fin_bin_code }}"
                                                           disabled>
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
                                                           value="{{ $address->fin_bicc_code }}"
                                                           disabled>
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
                                                           value="{{ $address->fin_btw_nummer }}"
                                                           disabled>
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
                                                           value="{{ $address->fin_ondernemingsnummer }}"
                                                           disabled>
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
                                                           value="{{ $address->fin_ondernemingsnummer }}"
                                                           disabled>
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
                                               value="{{ $address->createdByUser->name }}"
                                               disabled>


                                    </div>
                                </div>

                            </div>

                            <div class="text-center">
                                <a href="{{ route('address.index') }}"
                                   class="btn btn-outline-primary">
                                    <i class="fa-solid fa-arrow-left-long mr-2"></i>
                                    Terug
                                </a>

                                <a href="{{ route('address.edit', $address->id) }}"
                                   class="btn btn-outline-success">
                                    <i class="fa-solid fa-pen-to-square mr-2"></i>
                                    Bewerken
                                </a>

                                @csrf
                                @method('DELETE')
                                <button
                                    type="submit"
                                    class="btn btn-outline-danger">
                                    <i class="fa-regular fa-trash-can mr-2"></i>
                                    Verwijderen
                                </button>

                            </div>

                        </form>

                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection

