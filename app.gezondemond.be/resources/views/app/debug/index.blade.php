@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">

                <div id="vue-app"></div>

                @if($message = Session::get('success'))

                    <div class="alert alert-success">
                        {{ $message }}
                    </div>

                @endif

                <div class="card">

                    {{--<div class="card-header">
                        <div class="row">
                            <div class="col col-md-6"><b>Student Data</b></div>
                            <div class="col col-md-6">
                                <a href="{{ route('app.debug.create') }}" class="btn btn-success btn-sm float-end">Add</a>
                            </div>
                        </div>
                    </div>--}}

                    <div class="card-header">
                        <h1 class="mt-2">Index Debug items</h1>
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
                                        <td>{{ $row->dateTime }}</td>
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

<script>
    import DebugTable from "../../../js/components/DebugTable";
    export default {
        components: {DebugTable}
    }
</script>
