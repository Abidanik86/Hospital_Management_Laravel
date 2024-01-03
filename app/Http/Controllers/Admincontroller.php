<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Doctor;
use App\Models\Fbaner;
use App\Models\Fonter;
use App\Models\Header;
use App\Models\Appointment;
use App\Models\News;
use Illuminate\Http\Request;
use \Illuminate\Support\Facades\Auth;
class Admincontroller extends Controller
{
    public function header(){
        $data = Header::all();
        return view('admin.header',compact('data'));
    }
    public function upload_header(Request $request){
        $data = new Header;

        $image = $request->file('image');
        $imagename = time() . '.' . $image->getClientOriginalExtension();
        $request->image->move('headerimage', $imagename);
        $data->image = $imagename;

        $data->web_title = $request->web_title;
        $data->phone = $request->phone;
        $data->email = $request->email;
        $data->facebook = $request->facebook;
        $data->twitter = $request->twitter;
        $data->instagram = $request->instagram;

        $data->save(); 
        return redirect()->back()->with('Header_Upload', 'Header Data Uploaded Successfully');
    }

    public function admin_logout(){
    Auth::logout();

    // You can perform additional tasks after logout if needed

    return redirect('/'); // Redirect to the desired page after logout
    }
   public function font_section(){
    $data = Fonter::all();
    return view('admin.font' , compact('data'));
   }
    
   public function upload_fonter(Request $request){
    $data = new Fonter;

    $image = $request->file('image');
    $imagename = time() . '.' . $image->getClientOriginalExtension();
    $request->image->move('fonterimage', $imagename);
    $data->image = $imagename;

    $data->sub_head = $request->sub_title;
    $data->down_head = $request->down_title;

    $data->save(); 
    return redirect()->back()->with('Fonter_Upload', 'Font Data Uploaded Successfully');
}
public function doctor_section(){
    $data = Doctor::all();
    return view('admin.doctor' , compact('data'));
}

public function upload_doctor(Request $request){
    $data = new Doctor;

    $image = $request->file('image');
    $imagename = time() . '.' . $image->getClientOriginalExtension();
    $request->image->move('doctorimage', $imagename);
    $data->image = $imagename;

    $data->name = $request->name;
    $data->type = $request->type;
    $data->phone = $request->phone;
    $data->whatsapp = $request->whatsapp;


    $data->save(); 
    return redirect()->back()->with('Doctor_Upload', 'Doctor Data Uploaded Successfully');
}

    public function admin_appointment(){
        $data = Appointment::all();

        return view('admin.appointment',compact('data'));

    }
    public function Approve($id){
        $appointment = Appointment::find($id);
        if ($appointment && Auth::id()) {
            // Assuming you have a 'status' column in your appointments table
            $appointment->status = 'Approved';
            $appointment->save();
            return redirect()->back()->with('Approve_appointment', 'Appointment Approved Successfully');
        } else {
            return redirect()->back()->with('cant_Approve_appointment', 'Appointment Cannot be Approved. Try Again!');
        }
    }
    public function about_section(){
        $data = About::all();

        return view('admin.about' ,compact('data'));
    }

    public function upload_about(Request $request){
        $data = new About;
    
        $image = $request->file('image');
        $imagename = time() . '.' . $image->getClientOriginalExtension();
        $request->image->move('aboutimage', $imagename);
        $data->image = $imagename;
    
        $data->title = $request->title;
        $data->para = $request->para;
    
        $data->save(); 
        return redirect()->back()->with('About_Upload', 'About Data Uploaded Successfully');
    }

    public function news(){
        $data = News::all();
        return view('admin.news' ,compact('data'));
    }

    public function news_upload(Request $request){
        $data = new News;
    
        $image = $request->file('image');
        $imagename = time() . '.' . $image->getClientOriginalExtension();
        $request->image->move('newsimage', $imagename);
        $data->image = $imagename;
    
        $data->user_id = $request->user_id;
        $data->date = $request->date;
        $data->news_title = $request->news_title;
        $data->para = $request->para;
        $data->category = $request->category;
       
        $data->save(); 
        return redirect()->back()->with('News_Upload', 'News Uploaded Successfully');
    }

    public function fbaner(){
        $baner = Fbaner::all();
        return view('admin.baner',compact('baner'));
    }
    public function baners_upload(Request $request){
        
        $data = new Fbaner;
     
        $image = $request->file('fimage');
        $imagename = time() . '.' . $image->getClientOriginalExtension();
        $request->fimage->move('banerimage', $imagename);
        $data->fimage = $imagename;

        $data->title = $request->title;
        $data->appstore = $request->appstore;
        $data->playstore = $request->playstore;
    
        // Save the data
        $data->save(); 
    
        return redirect()->back()->with('News_Upload', 'News Uploaded Successfully');
    }
    

}
