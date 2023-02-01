@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">

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
                        <h1 class="mt-2">Edit Debug item</h1>
                    </div>

                    <div class="card-body">

                        <form action="{{ route('debug.update', $debug->id) }}" method="POST"
                              enctype="multipart/form-data">

                            @csrf
                            @method('PUT')

                            <div class="row mb-3">
                                <label for="nameString" class="col-sm-2 col-form-label">nameString *</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="nameString"
                                           name="nameString"
                                           value="{{ $debug->nameString }}">
                                    @error('nameString')
                                    <div class="alert alert-danger mt-2 mb-0">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>


                            <div class="row mb-3">
                                <label for="nameChar" class="col-sm-2 col-form-label">nameChar</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="nameChar"
                                           name="nameChar"
                                           value="{{ $debug->nameChar }}">
                                    @error('nameChar')
                                    <div class="alert alert-danger mt-2 mb-0">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="integer" class="col-sm-2 col-form-label">integer</label>
                                <div class="col-sm-10">
                                    <input type="number" class="form-control" id="integer"
                                           name="integer"
                                           value="{{ $debug->integer }}">
                                    @error('integer')
                                    <div class="alert alert-danger mt-2 mb-0">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="decimal" class="col-sm-2 col-form-label">decimal</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="decimal"
                                           name="decimal"
                                           value="{{ $debug->decimal }}">
                                    @error('decimal')
                                    <div class="alert alert-danger mt-2 mb-0">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="date" class="col-sm-2 col-form-label">date</label>
                                <div class="col-sm-10">
                                    <input type="date" class="form-control" id="date"
                                           name="date"
                                           value="{{ $debug->date }}">
                                    @error('date')
                                    <div class="alert alert-danger mt-2 mb-0">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="dateTime" class="col-sm-2 col-form-label">dateTime</label>
                                <div class="col-sm-10">
                                    <input type="datetime-local" class="form-control" id="dateTime"
                                           name="dateTime"
                                           value="{{ $debug->dateTime }}">
                                    @error('dateTime')
                                    <div class="alert alert-danger mt-2 mb-0">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="enum" class="col-sm-2 col-form-label">enum</label>
                                <div class="col-sm-10">
                                    {{-- <select class="form-select" aria-label="enum" name="enum">
                                         @foreach ($debug->enum as $oneItemEnum)
                                             <option value="{{ $oneItemEnum }}" @selected(old('oneItemEnum') ==
                                             $oneItemEnum)>
                                             {{ $oneItemEnum }}
                                             </option>
                                         @endforeach
                                         <option selected>Open this select menu</option>
                                         <option value="1">One</option>
                                         <option value="2">Two</option>
                                         <option value="3">Three</option>
                                     </select>--}}
                                    <input type="text" class="form-control" id="enum"
                                           name="enum"
                                           value="{{ $debug->enum }}">
                                    @error('enum')
                                    <div class="alert alert-danger mt-2 mb-0">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="uuidColumn" class="col-sm-2 col-form-label">uuidColumn</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="uuidColumn"
                                           name="uuidColumn"
                                           value="{{ $debug->uuidColumn }}">
                                    @error('uuidColumn')
                                    <div class="alert alert-danger mt-2 mb-0">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="uploadedFile" class="col-sm-2 col-form-label">uploadedFile</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="uploadedFile"
                                           name="uploadedFile"
                                           value="{{ $debug->uploadedFile }}">
                                    <input type="hidden" name="copyUploadedImage" value="{{ $debug->uploadedFile }}"/>
                                    @error('uploadedFile')
                                    <div class="alert alert-danger mt-2 mb-0">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="text-center">

                                <a href="{{ route('debug.index') }}"
                                   class="btn btn-outline-primary">
                                    <i class="fa-solid fa-arrow-left-long mr-2"></i>
                                    Go back
                                </a>

                                <button type="submit"
                                        class="btn btn-success">
                                    <i class="fa-solid fa-pen-to-square mr-2"></i>
                                    Update
                                </button>
                            </div>

                        </form>

                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection

