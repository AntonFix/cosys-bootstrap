@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">

                @if($message = Session::get('success'))

                    <div class="alert alert-success">
                        {{ $message }}
                    </div>

                @endif

                <div class="card">


                    <div class="card-header">
                        <h1 class="mt-2">Adressenlijst</h1>
                    </div>

                    <div class="card-header">
                        <h3 class="mt-2">Zoekfilter</h3>

                        <form method="get" action="{{ route('filterAddresses') }}">

                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="address_name" class="form-label">Zoekterm in de organisatienaam</label>
                                    <input type="text"
                                           class="form-control"
                                           name="address_name"
                                           id="address_name">
                                </div>

                                <div class="col-md-3">
                                    <label for="postcode" class="form-label">Postcode</label>
                                    <input type="text"
                                           class="form-control"
                                           name="postcode"
                                           id="postcode"
                                           value="{{ Request::get('postcode') }}">
                                </div>

                            </div>


                            <div class="row mb-3 float-end">

                                <div class="col-md-12">
                                    <a class="btn btn-outline-secondary d-inline-block"
                                       href="{{ Route('filterAppointments') }}"
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
                        {{--debug.blade.php--}}

                        <a href="{{ Route('address.create') }}" class="btn btn-outline-primary mb-3 float-end">
                            <i class="fa-regular fa-square-plus mr-2"></i>
                            Add
                        </a>

                        <table class="table table-bordered table-hover">
                            <tr>
                                <th>Organisatienaam</th>
                                <th>Postcode</th>
                                <th>Gemeente</th>
                                <th>Deelgemeente</th>
                                <th>Regio</th>
                                <th>Openingsuren</th>
                                <th>Telefoon 1</th>
                                <th>Action</th>
                            </tr>

                            @if(count($addresses) > 0)

                                @foreach($addresses as $row)

                                    <tr class="align-middle">

                                        <td class="address-title"><a
                                                href="/address/{{ $row->id }}">{{ $row->name }}</a>
                                        </td>

                                        <td>
                                            {{ $row->region->postcode }}
                                        </td>

                                        <td>
                                            {{ $row->region->gemeente }}
                                        </td>
                                        <td>
                                            {{ $row->region->deelgemeente }}
                                        </td>

                                        <td width="150">
                                            {{ $row->region->provincie }}
                                        </td>

                                        <td>
                                            {{ $row->opening_times }}
                                        </td>

                                        <td width="150">
                                            <a href="tel:{{ str_replace(' ', '', $row->phone_1) }}">{{ $row->phone_1 }}</a>
                                        </td>

                                        <td width="150" class="text-center">

                                            <form method="POST"
                                                  action="{{ route('address.destroy', $row->id) }}">

                                                <div class="btn-group" role="group"
                                                     aria-label="Actions">

                                                    <a href="{{ route('address.show', $row->id) }}"
                                                       class="btn btn-sm btn-primary">
                                                        <i class="fa-solid fa-list-check mr-2"></i>
                                                        Details
                                                    </a>

                                                    <a href="{{ route('address.edit', $row->id) }}"
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

                        {{--{!! $persons->links() !!}--}}


                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection


