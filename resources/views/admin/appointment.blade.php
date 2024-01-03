
@extends('admin.admin')
@if(session('Approve_appointment'))
    <script>
        alert('{{ session('Approve_appointment') }}');
    </script>
@endif
@if(session('Delete_appointment'))
    <script>
        alert('{{ session('Delete_appointment') }}');
    </script>
@endif
<style>
    #customers {
      font-family: Arial, Helvetica, sans-serif;
      border-collapse: collapse;
      width: 90%;
      margin-top: 100px;
      margin-left: auto;
      margin-right: auto;
      height: 10%;
      background-color: #393c4b;
      
    } 
   
    
    #customers td, #customers th {
      border: 1px solid #ddd;
      padding: 12px;
      height: 40px;
      width: 20px;
      font-size: 15px;
      
    }

    #customers tr:hover {background-color: #9fa0689e;}
    
    #customers th {    
    
      text-align:center;
      background-color: #04AA6D;
      color: white;
    }
    head
    {
        text-align: center;
    }
   
  .header
  {
      font-size: 30px;
      font-weight: bold;
      text-align: center;
      color: #000000;
      }
  label
  {
      display: block;
      font-weight: bold;
      margin-bottom: 5px;
      color: #000;
  }
  input 
  {
      width: 100%;
      padding: 8px;
      border: 1px solid #ccc;
      border-radius: 5px;
      color: rgb(0, 0, 0); 
  } 
  input[type="text"],input[type="email"],input[type="password"] 
  {
      width: 100%;
      padding: 10px;
      font-size: 16px;
      border: 1px solid #ffffff;
      border-radius: 4px;   
  }
  input[type="submit"] 
  {
      background-color: #4caf50;
      color: #fff;
      padding-bottom: 50px;
      padding: 10px 20px;
      text-align: center;
      border: none;
      border-radius: 4px;
      cursor: pointer; 
  }
  .form-group button:hover 
  { 
      background-color: #00cc33;
  }
  .form-container 
  {
      max-width: 500px;
      margin: 0 auto;
      background-color: #83b0ce;
      padding: 20px;
      border-radius: 10px;
      box-shadow: 0 0 10px rgba(0,0,0,0.1);
      align: center;
  }
  .form-group button 
  {

      color: #fff;
      position: relative; 
      padding: 10px 20px;
      text-align: center;
      border: none;
      border-radius: 4px;
      cursor: pointer;
  }
    </style>
 @section('title', 'Appointment')  
@section('content')
<div class="container">
   <br>
   <br>
        <table id="customers">                 
            <tr>
              <th>ID</th> 
              <th>Name</th>
              <th>Email</th>
              <th>Date</th>
              <th>Phone</th>
              <th>Messege</th> 
              <th>Doctor Name</th> 
              <th>Status</th>        
              <th>User Id</th>          
              <th>Approve</th>
              <th>Cancel</th>
              <th>Delete</th>
            </tr>          
            @foreach ($data as $data )         
            <tr>         
              <td>{{ $data->id }}</td>
              <td>{{ $data->name}}</td>
              <td  style="max-height: 50px; overflow-y: auto;">{{ $data->email}}</td>
              <td>{{$data->date}}</td>
              <td>{{ $data->phone}}</td>
              <td style="max-height: 50px; overflow-y: auto;">{{ $data->messege }} </td>
              <td>{{$data->doctor}}</td>
              <td>{{ $data->status }}</td>
             <td>{{$data->user_id}}</td>  
             @if($data->status !== 'Approved')
              <td><a class="btn btn-success" href="{{route('approve' , $data->id)}}">Approve</a></td> 
              @else 
              <td><a class="btn btn-secondary" href="">Approved</a></td>  
              @endif
              @if($data->status !== 'canceled')
              <td><a class="btn btn-warning" href="{{route('cancel.appointment' , $data->id)}}" onclick="return confirm('Are you sure you want to Cancel this Appointment?')">Cancel</a></td>
              @else 
              <td><a class="btn btn-secondary" href="">Canceled</a></td>  
              @endif
              <td><a class="btn btn-Danger" href="{{route('delete.appointment' , $data->id)}}" onclick="return confirm('Are you sure you want to Delete this Appointment?')">Delete</a></td>
            </tr>
            @endforeach     
          </table>
        </div>
@endsection