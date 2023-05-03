@extends('admin.temp')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>List of Doctors</h4>
                </div>
                <div class="card-body">

                    <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#addDoctorModal">
                        Add Doctor
                    </button>



                    <table class="table table-bordered" id="table-doctor">
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
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editDoctorModal{{ $doctor->id }}">Edit</button>
                                    <form action="{{ route('doctors.destroy', $doctor->id) }}" method="POST" style="display: inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>



                            <div class="modal fade" id="editDoctorModal{{ $doctor->id }}" tabindex="-1" aria-labelledby="editDoctorModalLabel{{ $doctor->id }}" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <form action="{{ route('doctors.update', $doctor->id) }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="editDoctorModalLabel{{ $doctor->id }}">Edit Doctor</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="mb-3">
                                                    <label for="name" class="form-label">Name</label>
                                                    <input type="text" class="form-control" name="name" id="name" value="{{ $doctor->name }}">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="speciality" class="form-label">Speciality</label>
                                                    <input type="text" class="form-control" name="speciality" id="speciality" value="{{ $doctor->speciality }}">
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary">Save changes</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>


    <div class="modal fade" id="addDoctorModal" tabindex="-1" aria-labelledby="addDoctorModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form id="addDoctorForm" method="POST">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addDoctorModalLabel">Add Doctor</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control" name="name" id="name">
                        </div>
                        <div class="mb-3">
                            <label for="speciality" class="form-label">Speciality</label>
                            <input type="text" class="form-control" name="speciality" id="speciality">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Add Doctor</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection


@push('script')
    <script>
        const dataTableSearch = new simpleDatatables.DataTable("#table-doctor", {
        });
    </script>
@endpush
