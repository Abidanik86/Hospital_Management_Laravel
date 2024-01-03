<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Appointment;
use App\Models\Doctor;
use App\Models\Fbaner;
use App\Models\Font;
use App\Models\Fonter;
use App\Models\Header;
use App\Models\News;
use \Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class Homecontroller extends Controller
{
    public function index(){

        if(Auth::id()){
            return redirect('redirect');
        }else{
            $header = Header::all(); 
            $fonter = Fonter::all(); 
            $doctor = Doctor::all();
            $doctors = Doctor::all();
            $about = About::all();
            $news = News::paginate(6);
            $baner = Fbaner::all();
            return view('user.home',compact('header','fonter','doctor','doctors','about','news','baner'));
        }
    }
    
    public function redirect(){
        $usertype = Auth::user()->usertype;
        if($usertype =='1'){
            return view('admin.home');
        }else{  
            $header = Header::all();  
            $fonter = Fonter::all();   
            $doctor = Doctor::all(); 
            $doctors = Doctor::all();
            $about = About::all();
            $news = News::paginate(6);
            $baner = Fbaner::all();
            return view('user.home',compact('header','fonter','doctor','doctors','about','news','baner'));
        }
    } 
    
    public function about(){
        return view('user.about');
    }
    public function make_appointment(Request $request){
        if(Auth::id()){
            $data = new Appointment;

            $data->name = $request->name;
            $data->email = $request->email;
            $data->date = $request->date;
            $data->doctor = $request->doctor;
            $data->phone = $request->phone;
            $data->messege = $request->messege;
            $data->status = 'In Progress';
                $data->user_id = Auth::user()->id;
            $data->save();
            return redirect()->back()->with('Make_Appointment', 'Appoinment Created Successfully');
        }else{
            return redirect()->route('login');
        }  
    }

    public function view_appointment($id){

      $count = Appointment::where('user_id' , $id)->count();
        if ($count > 0){
        if(Auth::id()){
            $user_id = Auth::user()->id;
            $header = Header::all();    
            $data = Appointment::where('user_id', $user_id)->get();
            return view('user.user_appointment',compact('header','data','user_id'));
        }
      }else {
        // Redirect or show a message if the cart is empty
        return redirect()->route('redirect')->with('noappointment', 'No Appointment Found!'); // Adjust the route name as needed
    }

    }
    public function cancel_appointment($id){
        $appointment = Appointment::find($id);
        if ($appointment && Auth::id()) {
            // Assuming you have a 'status' column in your appointments table
            $appointment->status = 'canceled';
            $appointment->save();
            return redirect()->back()->with('cancel_appointment', 'Appointment Canceled Successfully');
        } else {
            return redirect()->back()->with('cant_cancel_appointment', 'Appointment Cannot be Canceled. Try Again!');
        }
    }
    public function Delete_appointment($id){
        if(Auth::id()){
            $data = Appointment::find($id);
            $data->delete();
            return redirect()->back()->with('Delete_appointment', 'Appoinment Deleted Successfully');
        }else{
            return redirect()->back()->with('Cant_Appointment', 'Appoinment Cannot Deleted. Try Again!');

        }
    }

    public function blog_news(){
        
            $header = Header::all();  
            $fonter = Fonter::all();   
            $doctor = Doctor::all(); 
            $doctors = Doctor::all();
            $about = About::all();
            $news = News::paginate(10);
            $baner = Fbaner::all();
            return view('user.blog',compact('header','fonter','doctor','doctors','about','news','baner'));
        
    }
    public function blog_details(Request $request, $id){
            $header = Header::all();  
            $fonter = Fonter::all();   
            $doctor = Doctor::all(); 
            $doctors = Doctor::all();
            $about = About::all();
            $blog = News::find($id);
            $baner = Fbaner::all();
            return view('user.blog_details',compact('header','fonter','doctor','doctors','about','blog','baner'));
    }

    public function doctor(){
        $header = Header::all(); 
        $doctors = Doctor::all();
        $doctor = Doctor::paginate(15);
        $fonter = Fonter::all();
        $baner = Fbaner::all();
        return view('user.doctor',compact('doctors','doctor','header','fonter','baner'));
    }

   
}
