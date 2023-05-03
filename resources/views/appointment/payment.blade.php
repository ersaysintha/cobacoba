@extends('temp')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">

                <div class="card p-3">
                    <div class="card-header">My Appointments</div>

                    <div class="card-body">
                        <table class="table" id="table-pay">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Date and Time</th>
                                <th>Doctor</th>
                                <th>Status</th>
                                <th>Action</th>

                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($appointments as $appointment)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ \Carbon\Carbon::parse($appointment->date_time)->format('d/m/Y H:i') }}</td>
                                    <td>{{ $appointment->doctor->name }}</td>
                                    <td>{{ ucfirst($appointment->status) }}</td>
                                    <td><button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#uploadPaymentModal{{ $appointment->id }}">
                                            Upload Pembayaran
                                        </button>
                                        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#claimBpjsModal{{ $appointment->id }}">
                                           Klaim BPJS
                                        </button></td>
                                </tr>
                            @endforeach

                            @foreach ($appointments as $appointment)
                                <div class="modal fade" id="uploadPaymentModal{{ $appointment->id }}" tabindex="-1" aria-labelledby="paymentModal{{ $appointment->id }}Label" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="paymentModal{{ $appointment->id }}Label">Upload Payment Proof</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="{{ route('appointment.upload' , [$appointment->id]) }}" method="POST" enctype="multipart/form-data">
                                                    @csrf
                                                    <h5>Silahlan Transfer ke BCA 120319238 An bambang pamungkas</h5>
                                                    <div class="form-group mb-3">
                                                        <label for="payment_proof">Payment Proof</label>
                                                        <input type="file" name="payment_proof" id="payment_proof" class="form-control-file">
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-primary">Upload</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <!-- Modal for BPJS Claim -->
                                <div class="modal fade" id="claimBpjsModal{{ $appointment->id }}" tabindex="-1" aria-labelledby="claimBpjsModal{{ $appointment->id }}Label" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="claimBpjsModal{{ $appointment->id }}Label">Isi Nomor BPJS</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <form method="POST" action="{{ route('appointment.bpjs.claim', $appointment->id) }}">
                                                @csrf
                                                <div class="modal-body">
                                                    <div class="form-group">
                                                        <label for="bpjs_no" class="col-form-label">Nomor BPJS:</label>
                                                        <input type="text" class="form-control" id="bpjs_no" name="bpjs_no">
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-primary">Submit</button>
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
