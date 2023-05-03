<!-- View untuk meng-acc request appointment -->
@extends('admin.temp')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">List of Medicine Recipt</div>

                    <div class="card-body">

                        <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#addMedicine">
                            Add Medicine
                        </button>
                        <a type="button" class="btn btn-success mb-3" href="{{route('send.bpjs' , ['id'=>$appointment])}}">
                            Kirim Recipt BPJS
                        </a>

                        @if(session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif


                        <table class="table" id="table-pay">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Nama Obat</th>
                                <th>Jumlah</th>
                                <th>Harga</th>
                                <th>Total</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $total = 0 ?>
                            @foreach ($data as $x)

                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $x->medicine->name }}</td>
                                    <td>{{ $x->quantity }}</td>
                                    <td>Rp {{ $x->medicine->price }}</td>
                                    <td>Rp {{$x->medicine->price * $x->quantity}}</td>


                                    <td>

                                    </td>
                                </tr>

                                    <?php $total += ($x->medicine->price * $x->quantity)?>

                            @endforeach


                            </tbody>
                        </table>

                        <button class="btn btn-outline-danger w-100">Total : Rp {{$total}}</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="addMedicine" tabindex="-1" aria-labelledby="addMedicineModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addMedicineModalLabel">Add Medicine</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{ route('appointment.medicine.add') }}">
                        @csrf
                        <div class="form-group">
                            <label for="medicine">Medicine</label>
                            <select class="form-control" id="medicine" name="medicine_id" required>
                                <option value="">Select a medicine</option>
                                @foreach($medicines as $medicine)
                                    <option value="{{ $medicine->id }}">{{ $medicine->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="quantity">Quantity</label>
                            <input type="number" class="form-control" id="quantity" name="quantity" required>
                        </div>
                        <input type="hidden" name="appointment_id" value="{{$appointment}}">
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Add Medicine</button>
                        </div>
                    </form>
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
