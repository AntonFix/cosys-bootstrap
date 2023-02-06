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
                                <div class="col-md-6">
                                    <label for="title" class="form-label">title</label>
                                    <input type="text"
                                           class="form-control"
                                           name="title"
                                           id="title"
                                           value="{{ Request::get('title') }}">
                                </div>
                                <div class="col-md-6">
                                    <label for="start_date" class="form-label">start_date</label>
                                    <input type="text"
                                           class="form-control"
                                           name="start_date"
                                           id="start_date"
                                           value="{{ Request::get('start_date') }}">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="start_time" class="form-label">start_time</label>
                                    <input type="text"
                                           class="form-control"
                                           name="start_time"
                                           id="start_time"
                                           value="{{ Request::get('start_time') }}">
                                </div>
                                <div class="col-md-6">
                                    <label for="app_code_id" class="form-label">app_code_id</label>
                                    <input type="text"
                                           class="form-control"
                                           name="app_code_id"
                                           id="app_code_id"
                                           value="{{ Request::get('app_code_id') }}">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="app_status_id" class="form-label">app_status_id</label>
                                    <input type="text"
                                           class="form-control"
                                           name="app_status_id"
                                           id="app_status_id"
                                           value="{{ Request::get('app_status_id') }}">
                                </div>
                                <div class="col-md-6">
                                    <label for="assigned_with_user_id"
                                           class="form-label">assigned_with_user_id</label>
                                    <input type="text"
                                           class="form-control"
                                           name="assigned_with_user_id"
                                           id="assigned_with_user_id"
                                           value="{{ Request::get('assigned_with_user_id') }}">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="assigned_with_person_id"
                                           class="form-label">assigned_with_person_id</label>
                                    <input type="text"
                                           class="form-control"
                                           name="assigned_with_person_id"
                                           id="assigned_with_person_id"
                                           value="{{ Request::get('assigned_with_person_id') }}">
                                </div>

                            </div>

                            <button class="btn btn-outline-secondary mb-3 float-end"><i
                                    class="fa-solid fa-magnifying-glass-plus mr-2"></i>
                                Search
                            </button>

                        </form>

                    </div>

                    <div class="card-body">

                        <table class="table table-bordered table-hover">
                            <tr>
                                <th>title</th>
                                <th>start_date</th>
                                <th>start_time</th>
                                <th>app_code_id</th>
                                <th>app_status_id</th>
                                <th>assigned_with_person_id</th>
                                <th>assigned_with_user_id</th>
                                <th>Action</th>

                            </tr>

                            @if(count($serp) > 0)

                                @foreach($serp as $result)

                                    <tr>
                                        <td>{{ $result->title }}</td>
                                        <td width="110"
                                            class="text-center">{{ date('d-m-Y', strtotime($result->start_date)) }}</td>
                                        <td>{{ date('H:i', strtotime($result->start_time)) }}</td>
                                        <td>{{ $result->app_code_id }}</td>
                                        <td>{{ $result->app_status_id }}</td>
                                        <td>{{ $result->assigned_with_person_id }}</td>
                                        <td>{{ $result->assigned_with_user_id }}</td>
                                        <td width="220" class="text-center">

                                            <form method="POST"
                                                  action="{{ route('appointment.destroy', $result->id) }}">

                                                <div class="btn-group" role="group"
                                                     aria-label="Actions">

                                                    <a href="{{ route('appointment.show', $result->id) }}"
                                                       class="btn btn-sm btn-primary">
                                                        <i class="fa-solid fa-list-check mr-2"></i>
                                                        Details
                                                    </a>

                                                    <a href="{{ route('appointment.edit', $result->id) }}"
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
