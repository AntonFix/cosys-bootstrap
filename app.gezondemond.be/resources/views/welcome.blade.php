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

                        <a href="{{ route('debug.index') }}" class="btn btn-primary btn-lg">Debugs</a>
                        <a href="{{ route('appointment.index') }}" class="btn btn-primary btn-lg">Appointments</a>
                        <a href="{{ route('register') }}" class="btn btn-primary btn-lg">Persons</a>
                        <a href="{{ route('register') }}" class="btn btn-primary btn-lg">Addresses</a>
                        <a href="{{ route('register') }}" class="btn btn-primary btn-lg">Calendar</a>
                        <a href="{{ route('register') }}" class="btn btn-primary btn-lg">Archive</a>
                        <a href="{{ route('register') }}" class="btn btn-primary btn-lg">Report</a>

                        <hr>

                        <h3>JSON group</h3>

                        <a href="/json/debugs.json" class="btn btn-outline-secondary">Debugs in JSON</a>

                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection

