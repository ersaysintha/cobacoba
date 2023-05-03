@extends('temp')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">


                <div class="card p-3">
                    <form action="{{ route('schedule.schedule.search') }}" method="GET" class="d-flex">
                        <input type="date" name="date" class="form-control" required>
                        <button type="submit" class="btn btn-primary ml-2">Search</button>
                    </form>


                    <div class="card-header">List of Doctors</div>


                    <div class="card-body">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Speciality</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($doctors as $doctor)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $doctor->name }}</td>
                                    <td>{{ $doctor->speciality }}</td>
                                    <td>
                                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#scheduleModal{{ $doctor->id }}">
                                            View Schedule
                                        </button>
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

    @foreach ($doctors as $doctor)
        <div class="modal fade" id="scheduleModal{{ $doctor->id }}" tabindex="-1" aria-labelledby="scheduleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="scheduleModalLabel">{{ $doctor->name }}'s Schedule</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <table class="table" id="table-sche">
                            <thead>
                            <tr>
                                <th>Date</th>
                                <th>Time</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($doctor->schedules as $schedule)
                                <tr>
                                    <td>{{ \Carbon\Carbon::parse($schedule->date_time)->format('d/m/Y') }}</td>
                                    <td>{{ \Carbon\Carbon::parse($schedule->date_time)->format('H:i') }} </td>
                                    <td>

                                                <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#aw{{ $schedule->id }}">
                                                    Jadwalkan Appointment
                                                </button>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

    @foreach($doctors as $doctor)
        @foreach($doctor->schedules as $schedule)
            <!-- Appointment Modal -->
            <div class="modal fade" id="aw{{ $schedule->id }}" tabindex="-1" role="dialog" aria-labelledby="scheduleModal{{ $schedule->id }}Label" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="scheduleModal{{ $schedule->id }}Label">Jadwalkan Appointment</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form method="POST" action="{{ route('schedule.appointment') }}">
                            @csrf
                            <input type="hidden" name="schedule_id" value="{{ $schedule->id }}">
                            <div class="modal-body">
                                <div class="mb-3">
                                    <label for="date_time" class="form-label">Date and Time</label>
                                    <input type="text" class="form-control" id="date_time" name="date_time" value="{{ \Carbon\Carbon::make($schedule->date_time)->format('Y-m-d H:i') }}" readonly>
                                </div>
                                <div class="mb-3">
                                    <label for="doctor" class="form-label">Doctor</label>
                                    <input type="text" class="form-control" id="doctor" name="doctor" value="{{ $schedule->doctor->name }}" readonly>
                                </div>
                                <div class="mb-3">
                                    <label for="fee" class="form-label">Fee</label>
                                    <input type="text" class="form-control" id="fee" name="fee" value="{{ $schedule->fee }}" readonly>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Jadwalkan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        @endforeach
    @endforeach



@endsection

@push('script')
    <script>
        const dataTableSearch = new simpleDatatables.DataTable("#table-sche", {
        });
    </script>
@endpush
