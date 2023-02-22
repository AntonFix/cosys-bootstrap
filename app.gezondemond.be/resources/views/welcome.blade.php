@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">

                    <div class="card-header">
                        <h1 class="mt-2">Dashboard</h1>
                    </div>

                    <div class="card-body text-center">

                        <h3>All services</h3>

                        <a href="{{ route('appointment.index') }}" class="btn btn-primary">Appointments</a>
                        <a href="{{ route('calendar.index') }}" class="btn btn-primary">Calendar</a>
                        <a href="{{ route('person.index') }}" class="btn btn-primary">Persons</a>
                        <a href="{{ route('address.index') }}" class="btn btn-primary">Addresses</a>
                        <a href="{{ route('archive.index') }}" class="btn btn-primary">Archive</a>
                        <a href="{{ route('report.index') }}" class="btn btn-primary">Reports</a>
                        <a href="{{ route('debug.index') }}" class="btn btn-primary">Debugs</a>

                        <hr>

                        <h3>JSON group</h3>

                        <a href="/json/debugs.json" class="btn btn-outline-secondary">Debugs in JSON</a>

                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection

