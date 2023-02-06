@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">

                    <div class="card-header">
                        <h1 class="mt-2">Details appointment item</h1>
                    </div>

                    <div class="card-body">

                        <form method="POST"
                              action="{{ route('appointment.destroy', $appointment->id) }}">

                            <div class="row mb-3">
                                <label for="title" class="col-sm-2 col-form-label">title</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="title"
                                           value="{{ $appointment->title }}" disabled>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="details" class="col-sm-2 col-form-label">details</label>
                                <div class="col-sm-10">
                                    <textarea class="form-control" id="details"
                                              disabled>{{ $appointment->details }}</textarea>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="app_code_id" class="col-sm-2 col-form-label">app_code_id</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="app_code_id"
                                           value="{{ $appointment->app_code_id }}" disabled>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="app_status_id" class="col-sm-2 col-form-label">app_status_id</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="app_status_id"
                                           value="{{ $appointment->app_status_id }}" disabled>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="created_by_user_id"
                                       class="col-sm-2 col-form-label">created_by_user_id</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="created_by_user_id"
                                           value="{{ $appointment->created_by_user_id }}" disabled>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="assigned_with_user_id"
                                       class="col-sm-2 col-form-label">assigned_with_user_id</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="assigned_with_user_id"
                                           value="{{ $appointment->assigned_with_user_id }}" disabled>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="assigned_with_person_id" class="col-sm-2 col-form-label">assigned_with_person_id</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="assigned_with_person_id"
                                           value="{{ $appointment->assigned_with_person_id }}" disabled>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="start_date" class="col-sm-2 col-form-label">start_date</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="start_date"
                                           value="{{ $appointment->start_date }}" disabled>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="start_time" class="col-sm-2 col-form-label">start_time</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="start_time"
                                           value="{{ $appointment->start_time }}" disabled>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="end_date" class="col-sm-2 col-form-label">end_date</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="end_date"
                                           value="{{ $appointment->end_date }}" disabled>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="end_time" class="col-sm-2 col-form-label">end_time</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="end_time"
                                           value="{{ $appointment->end_time }}" disabled>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="attachment" class="col-sm-2 col-form-label">attachment</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="attachment"
                                           value="{{ $appointment->attachment }}" disabled>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="archived" class="col-sm-2 col-form-label">archived</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="archived"
                                           value="{{ $appointment->archived }}" disabled>
                                </div>
                            </div>

                            <div class="text-center">
                                <a href="{{ route('appointment.index') }}"
                                   class="btn btn-outline-primary">
                                    <i class="fa-solid fa-arrow-left-long mr-2"></i>
                                    Go back
                                </a>

                                <a href="{{ route('appointment.edit', $appointment->id) }}"
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

