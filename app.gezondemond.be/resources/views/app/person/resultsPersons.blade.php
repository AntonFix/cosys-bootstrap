@extends('layouts.app')

@section('content')

    <div class="container">

        <div class="row">

            <div class="col-md-12">

                <div class="card">

                    <div class="card-header">
                        <h1 class="mt-2">Search results</h1>


                        <form method="get" action="{{ route('filterPersons') }}">

                            <div class="row mb-3">

                                <div class="col-md-3">
                                    <label for="forename" class="form-label">Voornaam</label>
                                    <input type="text"
                                           class="form-control"
                                           name="forename"
                                           id="forename"
                                           value="{{ Request::get('forename') }}">
                                </div>

                                <div class="col-md-3">
                                    <label for="name" class="form-label">Naam</label>
                                    <input type="text"
                                           class="form-control"
                                           name="name"
                                           id="name"
                                           value="{{ Request::get('name') }}">
                                </div>


                                <div class="col-md-3">
                                    <label for="personAddresses" class="form-label">Organisatienaam</label>
                                    <input type="text"
                                           class="form-control"
                                           name="personAddresses"
                                           id="personAddresses"
                                           value="{{ Request::get('addresses') }}">
                                </div>

                                <div class="col-md-3">

                                    <div class="form-check">
                                        @if(Request::get('volunteer') == 1)
                                            <input class="form-check-input"
                                                   type="checkbox" value="1"
                                                   id="volunteer"
                                                   name="volunteer"
                                                   checked>
                                            <label class="form-check-label" for="volunteer">
                                                Vrijwilliger
                                            </label>
                                        @else
                                            <input class="form-check-input"
                                                   type="checkbox" value="1"
                                                   id="volunteer"
                                                   name="volunteer">
                                            <label class="form-check-label" for="volunteer">
                                                Vrijwilliger
                                            </label>
                                        @endif
                                    </div>

                                    <div class="form-check">
                                        @if(Request::get('oral_coach') == 1)
                                            <input class="form-check-input"
                                                   type="checkbox" value="1"
                                                   id="oral_coach"
                                                   name="oral_coach"
                                                   checked>
                                            <label class="form-check-label" for="oral_coach">
                                                Oral coach
                                            </label>
                                        @else
                                            <input class="form-check-input"
                                                   type="checkbox" value="1"
                                                   id="oral_coach"
                                                   name="oral_coach">
                                            <label class="form-check-label" for="oral_coach">
                                                Oral coach
                                            </label>
                                        @endif
                                    </div>

                                    <div class="form-check">
                                        @if(Request::get('coordinator') == 1)
                                            <input class="form-check-input"
                                                   type="checkbox" value="1"
                                                   id="coordinator"
                                                   name="coordinator"
                                                   checked>
                                            <label class="form-check-label" for="coordinator">
                                                Coördinator
                                            </label>
                                        @else
                                            <input class="form-check-input"
                                                   type="checkbox" value="1"
                                                   id="coordinator"
                                                   name="coordinator">
                                            <label class="form-check-label" for="coordinator">
                                                Coördinator
                                            </label>
                                        @endif

                                    </div>

                                </div>

                            </div>

                            <div class="row mb-3">

                                <div class="col-md-3">
                                    <label for="start_date" class="form-label">Actief sinds</label>

                                    <input type="date"
                                           class="form-control"
                                           name="active_from"
                                           id="active_from"
                                           value="{{ Request::get('active_from') }}">
                                </div>

                                <div class="col-md-3">
                                    <label for="app_status_id" class="form-label">Spreektalen</label>
                                    <select class="form-control form-select"
                                            name="languageID">
                                        <option disabled selected value="">Kies een item...</option>
                                        @foreach ($languages as $language)
                                            <option value="{{ $language->id }}">
                                                {{ $language->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                            </div>


                            <div class="row mb-3 float-end">

                                <div class="col-md-12">
                                    <a class="btn btn-outline-secondary d-inline-block"
                                       href="{{ Route('filterPersons') }}"
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

                        <table class="table table-bordered table-hover">
                            <tr>
                                <th>Voornaam en naam</th>
                                <th>Geslacht</th>
                                <th>Organisatienaam</th>
                                <th>Telefoon</th>
                                <th>Vrijwilliger</th>
                                <th>Oral coach</th>
                                <th>Coördinator</th>
                                <th>Actief sinds</th>
                                <th>Spreektalen</th>
                                <th>Action</th>
                            </tr>

                            @if(count($serp) > 0)

                                @foreach($serp as $result)

                                    <tr class="align-middle">
                                        <td class="person-title"><a
                                                href="/person/{{ $result->id }}">{{ $result->forename }} {{ $result->name }}</a>
                                        </td>
                                        <td>
                                            {{ $result->sex }}
                                        </td>
                                        <td>
                                            @if(count($result->personAddresses) > 0)
                                                <ul class="list-unstyled mb-0">
                                                    @foreach($result->personAddresses as $address)
                                                        <li>
                                                            <a href="/address/{{ $address->id }}">{{ $address->name }}</a>
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            @endif
                                        </td>
                                        <td>
                                            @if($result->phone)
                                                <a href="tel:{{ str_replace(' ', '', $result->phone) }}">{{ $result->phone }}</a>
                                            @endif
                                        </td>
                                        @if($result->volunteer == 1)
                                            <td style="background-color:#8bc34a;color:#fff;">Vrijwilliger</td>
                                        @else
                                            <td>Neen</td>
                                        @endif

                                        @if($result->oral_coach == 1)
                                            <td width="90" style="background-color:#3f51b5;color:#fff;">Oral coach</td>
                                        @else
                                            <td>Neen</td>
                                        @endif

                                        @if($result->coordinator == 1)
                                            <td style="background-color:#ff9800;color:#fff;">Coördinator</td>
                                        @else
                                            <td>Neen</td>
                                        @endif

                                        <td width="110"
                                            class="text-center">{{ date('d-m-Y', strtotime($result->active_from)) }}
                                        </td>

                                        <td>
                                            @if(count($result->spokenLanguages) > 0)
                                                <ul class="list-unstyled mb-0">
                                                    @foreach($result->spokenLanguages as $language)
                                                        <li>
                                                            {{ $language->name }}
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            @endif
                                        </td>

                                        <td width="120" class="text-center">

                                            <form method="POST"
                                                  action="{{ route('person.destroy', $result->id) }}">

                                                <div class="btn-group" role="group"
                                                     aria-label="Actions">

                                                    <a href="{{ route('person.show', $result->id) }}"
                                                       class="btn btn-sm btn-primary">
                                                        <i class="fa-solid fa-list-check mr-2"></i>
                                                        Details
                                                    </a>

                                                    <a href="{{ route('person.edit', $result->id) }}"
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

                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
