@extends('admin.temp')

@section('content')

  <div class="container">
      <div class="row">
          <div class="col-lg-12">
              <div class="row">
                  <div class="col-lg-4 col-md-6 col-12">
                      <div class="card  mb-4">
                          <div class="card-body p-3">
                              <div class="row">
                                  <div class="col-8">
                                      <div class="numbers">
                                          <p class="text-sm mb-0 text-uppercase font-weight-bold">Jumlah Dokter : </p>
                                          <h5 class="font-weight-bolder">
                                              {{$doctor}} Orang
                                          </h5>
                                      </div>
                                  </div>
                                  <div class="col-4 text-end">
                                      <div class="icon icon-shape bg-gradient-primary shadow-primary text-center rounded-circle">
                                          <i class="ni ni-single-02 text-lg opacity-10" aria-hidden="true"></i>
                                      </div>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
                  <div class="col-lg-4 col-md-6 col-12">
                      <div class="card  mb-4">
                          <div class="card-body p-3">
                              <div class="row">
                                  <div class="col-8">
                                      <div class="numbers">
                                          <p class="text-sm mb-0 text-uppercase font-weight-bold">Jumlah Jenis Obat : </p>
                                          <h5 class="font-weight-bolder">
                                              {{$obat}} jenis Obat
                                          </h5>
                                      </div>
                                  </div>
                                  <div class="col-4 text-end">
                                      <div class="icon icon-shape bg-gradient-secondary shadow-primary text-center rounded-circle">
                                          <i class="ni ni-collection text-lg opacity-10" aria-hidden="true"></i>
                                      </div>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
                  <div class="col-lg-4 col-md-6 col-12">
                      <div class="card  mb-4">
                          <div class="card-body p-3">
                              <div class="row">
                                  <div class="col-8">
                                      <div class="numbers">
                                          <p class="text-sm mb-0 text-uppercase font-weight-bold">Jumlah Appointment : </p>
                                          <h5 class="font-weight-bolder">
                                              {{$appointment}} Apppointment
                                          </h5>
                                      </div>
                                  </div>
                                  <div class="col-4 text-end">
                                      <div class="icon icon-shape bg-gradient-success shadow-primary text-center rounded-circle">
                                          <i class="ni ni-calendar-grid-58 text-lg opacity-10" aria-hidden="true"></i>
                                      </div>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>

              <div class="row">
                  <div class="col-lg-4 col-md-6 col-12">
                      <div class="card  mb-4">
                          <div class="card-body p-3">
                              <div class="row">
                                  <div class="col-8">
                                      <div class="numbers">
                                          <p class="text-sm mb-0 text-uppercase font-weight-bold">Jumlah Schedule Dokter : </p>
                                          <h5 class="font-weight-bolder">
                                              {{$schedule}} jadwal
                                          </h5>
                                      </div>
                                  </div>
                                  <div class="col-4 text-end">
                                      <div class="icon icon-shape bg-gradient-warning shadow-primary text-center rounded-circle">
                                          <i class="ni ni-check-bold text-lg opacity-10" aria-hidden="true"></i>
                                      </div>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
                  <div class="col-lg-4 col-md-6 col-12">
                      <div class="card  mb-4">
                          <div class="card-body p-3">
                              <div class="row">
                                  <div class="col-8">
                                      <div class="numbers">
                                          <p class="text-sm mb-0 text-uppercase font-weight-bold">Appointment Regular :  </p>
                                          <h5 class="font-weight-bolder">
                                              {{$regular}} Appointment
                                          </h5>
                                      </div>
                                  </div>
                                  <div class="col-4 text-end">
                                      <div class="icon icon-shape bg-gradient-danger shadow-primary text-center rounded-circle">
                                          <i class="ni ni-diamond text-lg opacity-10" aria-hidden="true"></i>
                                      </div>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
                  <div class="col-lg-4 col-md-6 col-12">
                      <div class="card  mb-4">
                          <div class="card-body p-3">
                              <div class="row">
                                  <div class="col-8">
                                      <div class="numbers">
                                          <p class="text-sm mb-0 text-uppercase font-weight-bold">Appointment BPJS : </p>
                                          <h5 class="font-weight-bolder">
                                              {{$bpjs}} Apppointment
                                          </h5>
                                      </div>
                                  </div>
                                  <div class="col-4 text-end">
                                      <div class="icon icon-shape bg-gradient-primary shadow-primary text-center rounded-circle">
                                          <i class="ni ni-satisfied text-lg opacity-10" aria-hidden="true"></i>
                                      </div>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>  </div>


    <div class="container">
        <div class="card p-3">
            <div class="row">
                <div class="col-md-12">
                    <canvas id="doctorChart"></canvas>
                </div>

            </div>

        </div>
    </div>


@endsection


@push('script')
    <script>
        const data = {
            labels: {!! json_encode($doctorData) !!},
            datasets: [{
                label: 'Jumlah Schedule',
                data: {!! json_encode($scheduleData) !!},
                backgroundColor: 'rgba(54, 162, 235, 0.2)',
                borderColor: 'rgba(54, 162, 235, 1)',
                borderWidth: 1
            }]
        };
        const config = {
            type: 'bar',
            data: data,
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            },
        };
        var myChart = new Chart(
            document.getElementById('doctorChart'),
            config
        );
    </script>
@endpush
