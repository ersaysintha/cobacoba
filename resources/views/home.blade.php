@extends('layouts.app')

@section('content')
<div class="">
    <!-- -------- START HEADER 2 w/ waves and typed text ------- -->
    <header class="position-relative">
        <div class="page-header min-vh-100" style="background-image: url(https://i0.wp.com/calmatters.org/wp-content/uploads/2022/06/033023-Hollister-Hospital-LV_10-CM.jpg?fit=1200%2C800&ssl=1);">
            <span class="mask bg-gradient-info"></span>
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 text-left">
                        <h1 class="text-white">Pharmacie: Aplikasi Konusltasi Kesehatan Online.</h1>
                        <p class="lead text-white text-left pe-5 mt-4">
                            "Kesehatan Anda Prioritas Kami. Konsultasikan Kepada Dokter Ahli Tanpa Harus Keluar Rumah!"
                        </p>
                        <br />
                        <div class="buttons">
                            <a type="button" href="{{route('user.doctors.index')}}" class="btn btn-lg btn-white">Schedule Appointment Sekarang</a>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- -------- END HEADER 2 w/ waves and typed text ------- -->
    <!-- Section with four info areas left & one card right with image and waves -->
    <section class="py-7">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="row justify-content-start">
                        <div class="col-md-6">
                            <div class="info mb-6">
                                <i class="ni ni-album-2 h3 text-info"></i>
                                <h5>Fully integrated</h5>
                                <p>Ter Integrasi Dengan Sistem Yang Aman</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="info mb-6">
                                <i class="ni ni-atom h3 text-info"></i>
                                <h5>Pembayaran Mudah</h5>
                                <p>Dari Rumah pun anda bisa membayar dengan mudah</p>
                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-start">
                        <div class="col-md-6">
                            <div class="info">
                                <i class="ni ni-watch-time h3 text-info"></i>
                                <h5>Waktu Yang Fleksibel</h5>
                                <p>Fleksibilitas Waktu yang dipilih Bervariasi</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="info">
                                <i class="ni ni-collection h3 text-info"></i>
                                <h5>Konsultasi Dari Rumah</h5>
                                <p>Tidak Perlu Repot , anda bisa melakukan semuanya dari rumah</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 ms-auto mt-lg-0 mt-4">
                    <div class="card shadow">
                        <div class="card-header p-0 position-relative z-index-1">
                            <img src="data:image/jpeg;base64,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   " alt="img-blur-shadow" class="img-fluid w-100 border-radius-lg border-radius-bottom-start-0 border-radius-bottom-end-0">
                        </div>
                        <div class="card-body">
                            <a href="javascript:;">
                                <h5 class="mt-3">
                                    Semuanya Menjadi Lebih Mudah
                                </h5>
                            </a>
                            <p>
                                Aplikasi konsultasi kedokteran online adalah platform yang memungkinkan pasien untuk terhubung dengan dokter secara virtual, sehingga dapat melakukan konsultasi kesehatan tanpa harus keluar rumah. Aplikasi ini juga menyediakan fitur untuk memesan appointment, mengupload bukti pembayaran, dan memantau status appointment secara online.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- END Section with four info areas left & one card right with image and waves -->
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
        </div>
    </div>
    <section class="py-lg-7 bg-light">
        <div class="container">
            <div class="row">
                <div class="col-md-6 mx-auto text-center mb-5">
                    <h2>Terjangkau , Tak Perlu Membayar Mahal</h2>
                  </div>
            </div>
            <div class="row">
                <div class="card">
                    <div class="row">
                        <div class="col-lg-8">
                            <div class="card-body">
                                <h3 class="text-info">Pembayaran Mudah</h3>
                                <p>
                                   Kamu dapat dengan mudah melakukan pembayaran dari rumah dan juga semua terjangkau
                                </p>
                                <div class="row mt-5 mb-2">
                                    <div class="col-lg-3 col-12">
                                        <h6 class="text-dark tet-uppercase">What&#39;s included</h6>
                                    </div>
                                    <div class="col-6">
                                        <hr class="horizontal dark">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-12 ps-0">
                                        <div class="d-flex align-items-center p-2">
                                            <i class="fas fa-check text-dark"></i>
                                            <div>
                                                <span class="ps-2">Waktu Yang Fleksibel</span>
                                            </div>
                                        </div>
                                        <div class="d-flex align-items-center p-2">
                                            <i class="fas fa-check text-dark"></i>
                                            <div>
                                                <span class="ps-2">Bisa Memilih Dokter Sendiri</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-12 ps-sm-2 ps-0">
                                        <div class="d-flex align-items-center p-2">
                                            <i class="fas fa-check text-dark"></i>
                                            <div>
                                                <span class="ps-2">Dapat Mendapatkan Resep Langsung setelah konsultasi</span>
                                            </div>
                                        </div>
                                        <div class="d-flex align-items-center p-2">
                                            <i class="fas fa-check text-dark"></i>
                                            <div>
                                                <span class="ps-2">Support team full assist</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 my-auto">
                            <div class="card-body text-center">
                                <h6 class="mt-sm-4 mt-0 mb-0">Harga Hanya Mulai Dari </h6>
                                <h1 class="mt-0">
                                    <small>Rp</small>50.000
                                </h1>
                                <a type="button" href="{{route('user.doctors.index')}}" class="btn bg-gradient-info btn-lg mt-2">Mulai Membuat Appointment</a>
                                <p class="text-sm">Booking Segera Jadwalnya !</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section class="py-4">
        <div class="container">
            <div class="row my-5">
                <div class="col-md-6 mx-auto text-center">
                    <h2>Frequently Asked Questions</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-md-10 mx-auto">
                    <div class="accordion" id="accordionRental">
                        <div class="accordion-item mb-3">
                            <h5 class="accordion-header" id="headingOne">
                                <button class="accordion-button border-bottom font-weight-bold" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    Bagaimana cara melakukan appointment dengan dokter melalui aplikasi ini?

                                    <i class="collapse-rotate fas fa-chevron-down text-xs text-primary pt-1 position-absolute end-0 me-3"></i>
                                </button>
                            </h5>
                            <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionRental">
                                <div class="accordion-body text-sm opacity-8">
                                    Anda dapat melakukan appointment dengan dokter melalui fitur "Jadwalkan Appointment" pada aplikasi ini, kemudian memilih dokter dan jadwal yang tersedia.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item mb-3">
                            <h5 class="accordion-header" id="headingTwo">
                                <button class="accordion-button border-bottom font-weight-bold" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                    Apakah biaya appointment dengan dokter sudah termasuk obat-obatan?
                                    <i class="collapse-rotate fas fa-chevron-down text-xs text-primary pt-1 position-absolute end-0 me-3"></i>
                                </button>
                            </h5>
                            <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionRental">
                                <div class="accordion-body text-sm opacity-8">
                                    Biaya appointment dengan dokter tidak termasuk obat-obatan, namun Anda dapat menerima resep obat dari dokter dan membelinya melalui aplikasi ini.       </div>
                            </div>
                        </div>
                        <div class="accordion-item mb-3">
                            <h5 class="accordion-header" id="headingThree">
                                <button class="accordion-button border-bottom font-weight-bold" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                    Apakah obat-obatan bisa langsung dipesan dan diantarkan ke rumah?
                                    <i class="collapse-rotate fas fa-chevron-down text-xs text-primary pt-1 position-absolute end-0 me-3"></i>
                                </button>
                            </h5>
                            <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionRental">
                                <div class="accordion-body text-sm opacity-8">
                                    Saat ini, pengguna hanya dapat memesan obat-obatan melalui aplikasi dan mengambilnya di apotek yang bekerjasama dengan kami. </div>
                            </div>
                        </div>
                        <div class="accordion-item mb-3">
                            <h5 class="accordion-header" id="headingFour">
                                <button class="accordion-button border-bottom font-weight-bold" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                    Bagaimana cara membayar biaya appointment dan obat-obatan melalui aplikasi?

                                    <i class="collapse-rotate fas fa-chevron-down text-xs text-primary pt-1 position-absolute end-0 me-3"></i>
                                </button>
                            </h5>
                            <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#accordionRental">
                                <div class="accordion-body text-sm opacity-8">
                                    Anda dapat membayar biaya appointment dan obat-obatan melalui aplikasi dengan menggunakan kartu kredit atau transfer bank.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>



    <!-- Mandatory init script -->
    <script>
        if (document.getElementById("typed")) {
            var typed = new Typed("#typed", {
                stringsElement: "#typed-strings",
                typeSpeed: 70,
                backSpeed: 50,
                backDelay: 200,
                startDelay: 500,
                loop: true
            });
        }
    </script>
</div>

<!-- -------- START FOOTER 5 w/ DARK BACKGROUND ------- -->
<footer class="footer py-5 my-9 bg-gradient-dark position-relative overflow-hidden">
    <div class="container position-relative z-index-1">
        <div class="row">
            <div class="col-lg-4 me-auto mb-lg-0 mb-4 text-lg-start text-center">
                <h6 class="text-white font-weight-bolder text-uppercase mb-lg-4 mb-3">Pharmacie</h6>
                <ul class="nav flex-row ms-n3 align-items-center mb-4 mt-sm-0">
                    <li class="nav-item">
                        <a class="nav-link text-white opacity-8" href="https://www.creative-tim.com" target="_blank">
                            Home
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white opacity-8" href="https://www.creative-tim.com/presentation" target="_blank">
                            About
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link text-white opacity-8" href="https://www.creative-tim.com/blog" target="_blank">
                            Blog
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white opacity-8" href="https://www.creative-tim.com" target="_blank">
                            Services
                        </a>
                    </li>
                </ul>
                <p class="text-sm text-white opacity-8 mb-0">
                    Copyright © <script>document.write(new Date().getFullYear())</script> Now UI by Creative Tim.
                </p>
            </div>
            <div class="col-lg-6 ms-auto text-lg-end text-center">
                <p class="mb-5 text-lg text-white font-weight-bold">
                    The reward for getting on the stage is fame. The price of fame is you can’t get off the stage.
                </p>
                <a href="javascript:;" target="_blank" class="text-white me-xl-4 me-4 opacity-5">
                    <span class="fab fa-dribbble"></span>
                </a>
                <a href="javascript:;" target="_blank" class="text-white me-xl-4 me-4 opacity-5">
                    <span class="fab fa-twitter"></span>
                </a>
                <a href="javascript:;" target="_blank" class="text-white me-xl-4 me-4 opacity-5">
                    <span class="fab fa-pinterest"></span>
                </a>
                <a href="javascript:;" target="_blank" class="text-white opacity-5">
                    <span class="fab fa-github"></span>
                </a>
            </div>
        </div>
    </div>
</footer>
<!-- -------- END FOOTER 5 w/ DARK BACKGROUND ------- -->
@endsection
