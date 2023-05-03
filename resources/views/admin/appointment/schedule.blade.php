<!-- View untuk meng-acc request appointment -->
@extends('admin.temp')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">List of Appointments Request</div>

                    <div class="card-body">
                        <table class="table" id="table-pay">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Patient Name</th>
                                <th>Date and Time</th>
                                <th>Doctor</th>
                                <th>Fee</th>
                                <th>No. BPJS</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($appointments as $appointment)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $appointment->patient->name }}</td>
                                    <td>{{ $appointment->date_time }}</td>
                                    <td>{{ $appointment->doctor->name }}</td>
                                    <td>{{ $appointment->fee }}</td>
                                    <td>
                                        {{ $appointment->claim_bpjs }}
                                    </td>
                                    <td>

                                        @if($appointment->claim_bpjs == null)
                                        <a type="button" class="btn btn-success" href="{{route('admin.doneRegular' , ['id'=>$appointment->id])}}">
                                            Done
                                        </a>
                                        @else
                                            <a type="button" class="btn btn-success" href="{{route('admin.doneBpjs' , ['id'=>$appointment->id])}}">
                                                Done Bpjs
                                            </a>
                                        @endif
                                    </td>
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
        const dataTableSearch = new simpleDatatables.DataTable("#table-pay", {
        });
    </script>
@endpush