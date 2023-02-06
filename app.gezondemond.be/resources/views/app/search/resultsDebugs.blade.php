@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">

                <div class="card">

                    <div class="card-header">
                        <h1 class="mt-2">Search results</h1>

                        <form method="get" action="{{ route('filterAppointments') }}">

                            <div class="row mb-3">
                                <label for="nameString" class="col-sm-2 col-form-label">nameString</label>
                                <div class="col-sm-10">
                                    <input type="text"
                                           class="form-control"
                                           name="nameString"
                                           id="nameString"
                                           value="{{ Request::get('nameString') }}">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="date" class="col-sm-2 col-form-label">date</label>
                                <div class="col-sm-10">
                                    <input type="text"
                                           class="form-control"
                                           name="date"
                                           id="date"
                                           value="{{ Request::get('date') }}">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="dateTime" class="col-sm-2 col-form-label">dateTime</label>
                                <div class="col-sm-10">
                                    <input type="text"
                                           class="form-control"
                                           name="dateTime"
                                           id="dateTime"
                                           value="{{ Request::get('dateTime') }}">
                                </div>
                            </div>
                            <button class="btn btn-outline-secondary mb-3 float-end"><i class="fa-solid fa-magnifying-glass-plus mr-2"></i>
                                Search
                            </button>
                        </form>

                    </div>

                    <div class="card-body">

                        <table class="table table-bordered table-hover">
                            <tr>
                                <th>uploadedFile</th>
                                <th>nameString</th>
                                <th>nameChar</th>
                                <th>integer</th>
                                <th>decimal</th>
                                <th>date</th>
                                <th>dateTime</th>
                                <th>enum</th>
                                <th>uuidColumn</th>
                                <th>Action</th>
                            </tr>

                            @if(count($serp) > 0)

                                @foreach($serp as $result)

                                    <tr>
                                        <td><img src="{{ $result->uploadedFile }}" width="75"></td>
                                        <td>{{ $result->nameString }}</td>
                                        <td>{{ $result->nameChar }}</td>
                                        <td>{{ $result->integer }}</td>
                                        <td>{{ $result->decimal }}</td>
                                        <td>{{ $result->date }}</td>
                                        <td>{{ date('d-m-Y' . ' ' . 'H:i', strtotime($result->dateTime)) }}</td>
                                        <td>{{ $result->enum }}</td>
                                        <td>{{ $result->uuidColumn }}</td>
                                        <td width="220" class="text-center">

                                            <form method="POST"
                                                  action="{{ route('debug.destroy', $result->id) }}">

                                                <div class="btn-group" role="group"
                                                     aria-label="Actions">

                                                    <a href="{{ route('debug.show', $result->id) }}"
                                                       class="btn btn-sm btn-primary">
                                                        <i class="fa-solid fa-list-check mr-2"></i>
                                                        Details
                                                    </a>

                                                    <a href="{{ route('debug.edit', $result->id) }}"
                                                       class="btn btn-sm btn-success">
                                                        <i class="fa-solid fa-pen-to-square mr-2"></i>
                                                        Edit
                                                    </a>

                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm">
                                                        <i class="fa-regular fa-trash-can mr-2"></i>
                                                        Delete
                                                    </button>
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
