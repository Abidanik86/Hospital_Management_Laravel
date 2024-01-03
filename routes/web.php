<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Homecontroller;
use App\Http\Controllers\Admincontroller;

Route::get('/',[Homecontroller::class,'index']);

Route::get('/redirect' , [Homecontroller::class,'redirect'])->name('redirect');

Route::get('/About',[Homecontroller::class,'about'])->name('about');

Route::post('/Make_Appointment',[Homecontroller::class,'make_appointment'])->name('make.appointment');

Route::get('/View_Appointment/{id}',[Homecontroller::class,'view_appointment'])->name('view.appointment');

Route::get('/Cancel_Appointment/{id}',[Homecontroller::class,'cancel_appointment'])->name('cancel.appointment');

Route::get('/Delete_Appointment/{id}',[Homecontroller::class,'delete_appointment'])->name('delete.appointment');

Route::get('/Blog_News',[Homecontroller::class,'blog_news'])->name('blog.news');

Route::get('/Blog_View/{id}',[Homecontroller::class,'blog_details'])->name('blog.details');

Route::get('/Doctors',[Homecontroller::class,'doctor'])->name('all.doctor');



Route::get('/Header',[Admincontroller::class,'header'])->name('header');

Route::get('/Logout',[Admincontroller::class,'admin_logout'])->name('logout.admin');

Route::post('/Add_Header_Information',[Admincontroller::class,'upload_header'])->name('upload.header');

Route::get('/Font',[Admincontroller::class,'font_section'])->name('font.section');

Route::post('/Upload_fonter',[Admincontroller::class,'upload_fonter'])->name('upload.fonter');

Route::get('/Doctor_Section',[Admincontroller::class,'doctor_section'])->name('doctor.section');

Route::post('/Upload_Doctor',[Admincontroller::class,'upload_doctor'])->name('upload.doctor');

Route::get('/All_Appointment',[Admincontroller::class,'admin_appointment'])->name('admin.appointment');

Route::get('/Approved/{id}',[Admincontroller::class,'approve'])->name('approve');

Route::get('/About_Section',[Admincontroller::class,'about_section'])->name('about.section');

Route::post('/Upload_About',[Admincontroller::class,'upload_about'])->name('upload.about');

Route::get('/News_Admin',[Admincontroller::class,'news'])->name('admin.news');

Route::post('/News_Upload',[Admincontroller::class,'news_upload'])->name('upload.news');

Route::get('/Footer_Baner',[Admincontroller::class,'fbaner'])->name('footerbaner');

Route::post('/Baner_Upload',[Admincontroller::class,'baners_upload'])->name('upload_baner');


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
