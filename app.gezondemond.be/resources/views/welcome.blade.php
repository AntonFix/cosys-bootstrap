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

                        <h3>Alle diensten</h3>

                        <a href="{{ route('appointment.index') }}" class="btn btn-primary">
                            <i class="fa-solid fa-list-ul mr-2"></i>
                            Afspraken
                        </a>
                        <a href="{{ route('calendar.index') }}" class="btn btn-primary">
                            <i class="fa-solid fa-calendar-days mr-2"></i>
                            Agenda
                        </a>
                        <a href="{{ route('person.index') }}" class="btn btn-primary">
                            <i class="fa-regular fa-id-badge mr-2"></i>
                            Personen
                        </a>
                        <a href="{{ route('address.index') }}" class="btn btn-primary">
                            <i class="fa-regular fa-building mr-2"></i>
                            Adressen
                        </a>
                        <a href="{{ route('archive.index') }}" class="btn btn-primary">
                            <i class="fa-solid fa-box-archive mr-2"></i>
                            Archief
                        </a>
                        <a href="{{ route('report.index') }}" class="btn btn-primary">
                            <i class="fa-solid fa-chart-line mr-2"></i>
                            Rapporten
                        </a>
                    <!--                        <a href="{{ route('debug.index') }}" class="btn btn-primary">Debugs</a>-->

                        <!--                        <hr>

                                                <h3>JSON group</h3>

                                                <a href="/json/debugs.json" class="btn btn-outline-secondary">Debugs in JSON</a>-->

                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection

