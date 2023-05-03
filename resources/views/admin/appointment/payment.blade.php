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
                                <th>Lihat Bukti Transfer</th>
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
                                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#paymentModal{{ $appointment->id }}">
                                            View Payment
                                        </button>
                                    </td>
                                    <td>
                                        <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#noWaModal{{ $appointment->id }}">
                                            Accept
                                        </button>
                                    </td>
                                </tr>

                                <!-- Payment Modal -->
                                <div class="modal fade" id="paymentModal{{ $appointment->id }}" tabindex="-1" aria-labelledby="paymentModal{{ $appointment->id }}Label" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="paymentModal{{ $appointment->id }}Label">Payment Proof</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <img class="img-fluid" src="{{ asset('payment_proofs/' . $appointment->bukti_pembayaran) }}" alt="Payment Proof">
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="modal fade" id="noWaModal{{ $appointment->id }}" tabindex="-1" role="dialog" aria-labelledby="noWaModal{{ $appointment->id }}Label" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="noWaModal{{ $appointment->id }}Label">Input Nomor WhatsApp</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <form method="POST" action="{{ route('admin.appointments.payment.accept', ['id'=>$appointment->id]) }}">
                                                @csrf
                                                <div class="modal-body">
                                                    <div class="form-group">
                                                        <label for="no_wa">Nomor WhatsApp:</label>
                                                        <input type="text" name="no_wa" class="form-control" id="no_wa" placeholder="Masukkan nomor WhatsApp" required>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-primary">Simpan</button>
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
    </div>
@endsection


@push('script')
    <script>
        const dataTableSearch = new simpleDatatables.DataTable("#table-pay", {
        });
    </script>
@endpush
