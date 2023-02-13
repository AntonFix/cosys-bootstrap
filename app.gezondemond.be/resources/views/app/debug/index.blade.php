@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">

                <!--                <div id="vue-app"></div>

                                <router-link/>-->

                @if($message = Session::get('success'))

                    <div class="alert alert-success">
                        {{ $message }}
                    </div>

                @endif

                <div class="card">

                    <div class="card-header">
                        <h1 class="mt-2">Search filter</h1>

                        <form method="get" action="{{ route('filterDebugs') }}">

                            <div class="row mb-3">
                                <label for="nameString" class="col-sm-2 col-form-label">nameString</label>
                                <div class="col-sm-10">
                                    <input type="text"
                                           class="form-control"
                                           name="nameString"
                                           id="nameString">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="date" class="col-sm-2 col-form-label">date</label>
                                <div class="col-sm-10">
                                    <input type="text"
                                           class="form-control"
                                           name="date"
                                           id="date">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="dateTime" class="col-sm-2 col-form-label">dateTime</label>
                                <div class="col-sm-10">
                                    <input type="text"
                                           class="form-control"
                                           name="dateTime"
                                           id="dateTime">
                                </div>
                            </div>
                            <button class="btn btn-outline-secondary mb-3 float-end"><i class="fa-solid fa-magnifying-glass-plus mr-2"></i>
                                Search
                            </button>
                        </form>
                    </div>

                    <div class="card-header">
                        <h2 class="mt-2">Index Debug items</h2>
                    </div>

                    <div class="card-body">
                        {{--debug.blade.php--}}

                        <a href="{{ route('debug.create') }}" class="btn btn-outline-primary mb-3 float-end">
                            <i class="fa-regular fa-square-plus mr-2"></i>
                            Add
                        </a>

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

                            @if(count($debugs) > 0)

                                @foreach($debugs as $row)

                                    <tr>
                                        <td><img src="{{ $row->uploadedFile }}" width="75"></td>
                                        <td>{{ $row->nameString }}</td>
                                        <td>{{ $row->nameChar }}</td>
                                        <td>{{ $row->integer }}</td>
                                        <td>{{ $row->decimal }}</td>
                                        <td>{{ $row->date }}</td>
                                        <td>{{ date('d-m-Y' . ' ' . 'H:i', strtotime($row->dateTime)) }}</td>
                                        <td>{{ $row->enum }}</td>
                                        <td>{{ $row->uuidColumn }}</td>
                                        <td width="220" class="text-center">

                                            <form method="POST"
                                                  action="{{ route('debug.destroy', $row->id) }}">

                                                <div class="btn-group" role="group"
                                                     aria-label="Actions">

                                                    <a href="{{ route('debug.show', $row->id) }}"
                                                       class="btn btn-sm btn-primary">
                                                        <i class="fa-solid fa-list-check mr-2"></i>
                                                        Details
                                                    </a>

                                                    <a href="{{ route('debug.edit', $row->id) }}"
                                                       class="btn btn-sm btn-success">
                                                        <i class="fa-solid fa-pen-to-square mr-2"></i>
                                                    </a>

                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm">
                                                        <i class="fa-regular fa-trash-can mr-2"></i>
                                                    </button>
                                                </div>
                                            </form>

                                        </td>
                                    </tr>

                                @endforeach

                            @else
                                <tr>
                                    <td colspan="5" class="text-center">No Data Found</td>
                                </tr>
                            @endif

                        </table>

                        {{--{!! $debugs->links() !!}--}}


                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
