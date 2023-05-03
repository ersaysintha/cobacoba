<!-- View untuk meng-acc request appointment -->
@extends('admin.temp')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">List of Appointments Request</div>

                    <div class="card-body">
                        <table class="table" id="table-app">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Patient Name</th>
                                <th>Date and Time</th>
                                <th>Doctor</th>
                                <th>Fee</th>
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
                                        <button class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#acceptModal{{ $appointment->id }}">
                                            Accept
                                        </button>
                                    </td>
                                </tr>

                                <!-- Modal untuk meng-acc appointment -->
                                <div class="modal fade" id="acceptModal{{ $appointment->id }}" tabindex="-1" role="dialog" aria-labelledby="acceptModal{{ $appointment->id }}Label" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <form action="{{ route('admin.appointments.acc', $appointment->id) }}" method="POST">
                                                @csrf
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="acceptModal{{ $appointment->id }}Label">Accept Appointment</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="form-group">
                                                        <label for="fee">Fee</label>
                                                        <input type="number" class="form-control" id="fee" name="fee" value="{{ old('fee') }}" required>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                                    <button type="submit" class="btn btn-success">Accept</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Modal -->
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

