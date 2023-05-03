@extends('temp')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">

                <div class="card p-3">
                    <div class="card-header">My Appointments</div>

                    <div class="card-body">
                        <table class="table" id="table-app">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Date and Time</th>
                                <th>Doctor</th>
                                <th>Status</th>

                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($appointments as $appointment)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ \Carbon\Carbon::parse($appointment->date_time)->format('d/m/Y H:i') }}</td>
                                    <td>{{ $appointment->doctor->name }}</td>
                                    <td>{{ ucfirst($appointment->status) }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection

@push('script')
    <script>
        const dataTableSearch = new simpleDatatables.DataTable("#table-app", {
        });
    </script>
@endpush

