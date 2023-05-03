<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/' , [\App\Http\Controllers\LandingController::class , 'index'])->name('landing');

Auth::routes();


Route::prefix('admin')->middleware('admin')->group(function (){
    Route::resource('doctors', \App\Http\Controllers\DoctorController::class);
    Route::get('/schedule/search', [\App\Http\Controllers\ScheduleController::class, 'search'])->name('schedule.search');
    Route::resource('schedule', \App\Http\Controllers\ScheduleController::class);
    Route::resource('medicines', \App\Http\Controllers\MedicineController::class);

    // Route untuk menampilkan halaman acc appointment
    Route::get('/appointments', [\App\Http\Controllers\AppointmentController::class, 'indexAdmin'])->name('admin.appointments.index');

    // Route untuk meng-acc appointment


    Route::post('/appointments/{id}/acc', [\App\Http\Controllers\AppointmentController::class, 'acc'])->name('admin.appointments.acc');

    Route::get('/appointments/payment/accept' , [\App\Http\Controllers\AppointmentController::class , 'paymentAcc'])->name('admin.appointments.payment.acc');
    Route::get('/appointments/payment/bpjs' , [\App\Http\Controllers\AppointmentController::class , 'paymentBpjs'])->name('admin.appointments.payment.bpjs');
    Route::post('/appointments/payment/accc/{id}' , [\App\Http\Controllers\AppointmentController::class , 'accPayment'])->name('admin.appointments.payment.accept');

    Route::get('/appointments/all/schedule' , [\App\Http\Controllers\AppointmentController::class , 'adminSchedule'])->name('admin.appointment.schedule');
    Route::get('/appointment/scheduledReciptRegular' , [\App\Http\Controllers\AppointmentController::class , 'scheduledReciptRegular'])->name('admin.appointment.schedule.recipt.regular');
    Route::get('/appointment/scheduledReciptBpjs' , [\App\Http\Controllers\AppointmentController::class , 'scheduleReciptBpjs'])->name('admin.appointment.schedule.recipt.Bpjs');

    Route::get('/appointments/done/regular/{id}' , [\App\Http\Controllers\AppointmentController::class , 'doneRegular'])->name('admin.doneRegular');
    Route::get('/appointments/done/bpjs/{id}' , [\App\Http\Controllers\AppointmentController::class , 'doneBPJS'])->name('admin.doneBpjs');

    Route::get('/appointment/med/{id}' , [\App\Http\Controllers\AppointmentMedicineController::class , 'index'])->name('admin.appointment.medicine');
    Route::get('/appointment/medBpjs/{id}' , [\App\Http\Controllers\AppointmentMedicineController::class , 'indexBpjs'])->name('admin.appointment.medicine.bpjs');

    Route::post('/appointment/medAdd/' , [\App\Http\Controllers\AppointmentMedicineController::class , 'add'])->name('appointment.medicine.add');

    Route::get('/recipt/send/regular/{id}' , [\App\Http\Controllers\AppointmentMedicineController::class , 'reciptRegular'] )->name('send.regular');
    Route::get('/recipt/send/bpjs/{id}' , [\App\Http\Controllers\AppointmentMedicineController::class , 'reciptBpjs'] )->name('send.bpjs');

    Route::get('/dashboard' , [\App\Http\Controllers\AdminController::class , 'index'])->name('admin.dashboard');

});

Route::middleware('auth')->group(function () {
    Route::resource('doctors', App\Http\Controllers\DoctorUserController::class)->names([
        'index' => 'user.doctors.index',
        'create' => 'user.doctors.create',
        'store' => 'user.doctors.store',
        'show' => 'user.doctors.show',
        'edit' => 'user.doctors.edit',
        'update' => 'user.doctors.update',
        'destroy' => 'user.doctors.destroy'
    ]);

    Route::get('/schedule/search', [\App\Http\Controllers\DoctorUserController::class, 'search'])->name('schedule.schedule.search');
    Route::post('/appointments/schedule', [\App\Http\Controllers\AppointmentController::class, 'scheduleAppointment'])->name('schedule.appointment');
    Route::get('/appointments', [\App\Http\Controllers\AppointmentController::class, 'index'])->name('appointment.index');
    Route::get('/payments' , [\App\Http\Controllers\AppointmentController::class , 'payment'])->name('appointment.payment');
    Route::post('/appointment/{appointment_id}/upload', [\App\Http\Controllers\AppointmentController::class, 'upload'])->name('appointment.upload');
    Route::post('/appointment/{appointment_id}/bpjs', [\App\Http\Controllers\AppointmentController::class, 'bpjs'])->name('appointment.bpjs.claim');


    Route::get('/appointment/scheduled' , [\App\Http\Controllers\AppointmentController::class , 'scheduled'])->name('appointment.scheduled');
    Route::get('/appointment/recipt' , [\App\Http\Controllers\AppointmentMedicineController::class , 'userReciptRegular'])->name('recipt.regular');
    Route::get('/appointment/reciptBPJS' , [\App\Http\Controllers\AppointmentMedicineController::class , 'userReciptBpjs'])->name('recipt.bpjs');

    Route::get('/appointment/reciptIndexRegular/{id}' , [\App\Http\Controllers\AppointmentMedicineController::class , 'userReciptIndexRegular'])->name('recipt.regular.index');
    Route::get('/appointment/reciptIndexBpjs/{id}' , [\App\Http\Controllers\AppointmentMedicineController::class , 'userReciptIndexBpjs'])->name('recipt.bpjs.index');

    Route::get('/appointment/doneReciptRegular/{id}' , [\App\Http\Controllers\AppointmentMedicineController::class , 'doneReciptRegular'])->name('done.recipt.regular');
    Route::get('/appointment/doneReciptBpjs/{id}' , [\App\Http\Controllers\AppointmentMedicineController::class , 'doneReciptBpjs'])->name('done.recipt.bpjs');
    Route::get('/shop/medicine' , [\App\Http\Controllers\LandingController::class , 'medicine'])->name('landing.medicine');
    Route::post('/shop/medicineSearch' , [\App\Http\Controllers\LandingController::class , 'searchMed'])->name('landing.medicine.search');

});
