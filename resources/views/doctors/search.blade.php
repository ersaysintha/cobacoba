@extends('admin.temp')

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
                            @foreach ($doctor->schedules()->whereDate('date_time', $date)->get() as $schedule)
                                <tr>
                                    <td>{{ \Carbon\Carbon::parse($schedule->date_time)->format('d/m/Y') }}</td>
                                    <td>{{ \Carbon\Carbon::parse($schedule->date_time)->format('H:i') }}</td>
                                    <td>
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



    <!-- Modal untuk menambahkan jadwal booking -->
    <div class="modal fade" id="addScheduleModal" tabindex="-1" aria-labelledby="addScheduleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addScheduleModalLabel">Tambah Jadwal Booking</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('schedule.store') }}" method="POST">
                        @csrf
                        <div class="form-group mb-3">
                            <label for="doctor_id">Dokter</label>
                            <select class="form-control" id="doctor_id" name="doctor_id" required>
                                <option value="">Pilih dokter</option>
                                @foreach($doctors as $doctor)
                                    <option value="{{ $doctor->id }}">{{ $doctor->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group mb-3">
                            <label for="datetime">Tanggal dan Jam</label>
                            <input type="datetime-local" class="form-control" id="datetime" name="datetime" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>



@endsection

@push('script')
    <script>
        const dataTableSearch = new simpleDatatables.DataTable("#table-sche", {
        });
    </script>
@endpush
