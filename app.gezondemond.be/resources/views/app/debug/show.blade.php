@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">

                    <div class="card-header">
                        <h1 class="mt-2">Details Debug item</h1>
                    </div>

                    <div class="card-body">

                        <form method="POST"
                              action="{{ route('debug.destroy', $debug->id) }}">

                            <div class="row mb-3">
                                <label for="nameString" class="col-sm-2 col-form-label">nameString</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="nameString"
                                           value="{{ $debug->nameString }}" disabled>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="nameChar" class="col-sm-2 col-form-label">nameChar</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="nameChar"
                                           value="{{ $debug->nameChar }}" disabled>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="integer" class="col-sm-2 col-form-label">integer</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="integer"
                                           value="{{ $debug->integer }}" disabled>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="decimal" class="col-sm-2 col-form-label">decimal</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="decimal"
                                           value="{{ $debug->decimal }}" disabled>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="date" class="col-sm-2 col-form-label">date</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="date"
                                           value="{{ $debug->date }}" disabled>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="dateTime" class="col-sm-2 col-form-label">dateTime</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="dateTime"
                                           value="{{ $debug->dateTime }}" disabled>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="enum" class="col-sm-2 col-form-label">enum</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="enum"
                                           value="{{ $debug->enum }}" disabled>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="uuidColumn" class="col-sm-2 col-form-label">uuidColumn</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="uuidColumn"
                                           value="{{ $debug->uuidColumn }}" disabled>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="uploadedFile" class="col-sm-2 col-form-label">uploadedFile</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="uploadedFile"
                                           value="{{ $debug->uploadedFile }}" disabled>
                                </div>
                            </div>

                            <div class="text-center">
                                <a href="{{ route('debug.index') }}"
                                   class="btn btn-outline-primary">
                                    <i class="fa-solid fa-arrow-left-long mr-2"></i>
                                    Go back
                                </a>

                                <a href="{{ route('debug.edit', $debug->id) }}"
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

