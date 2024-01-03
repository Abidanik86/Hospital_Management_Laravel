
@extends('admin.admin')
@if(session('Header_Upload'))
    <script>
        alert('{{ session('Header_Upload') }}');
    </script>
@endif
@if(session('delete_baner'))
    <script>
        alert('{{ session('delete_baner') }}');
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
      font-size: 20px;
      
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
    body 
  {
      font-family: Arial, sans-serif;
      margin: 0;
      justify-content: center;
      align-items: center;
      height: 100vh;
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
  .form-group 
  {
      margin-bottom: 20px;
  }
  input[type="text"],input[type="num"]
  {
      color: rgb(0, 0, 0); /* Change 'blue' to the desired color */
  }
  .no-data-message {
        text-align: center;
        margin-top: 200px;
        padding: 20px;
       
        background-color: #e6e6e6; /* Light red background color */
        color: #eb0000; /* Dark red text color */
        border: 1px solid #f5c6cb; /* Border color */
        border-radius: 5px; /* Rounded corners */
    }
    .no-data-message p{
        
        font-size:30px;
    }
    </style>
    
@section('content')
<div class="container">
   <br>
   <br>
  
    <button id="showFormButton" class="btn btn-primary">Add Header Form</button>
  
    <script>
        document.getElementById('showFormButton').addEventListener('click', function() {
            var form = document.getElementById('hiddenForm');
            var buttonText = document.getElementById('showFormButton');
            if (form.style.display === 'none' || form.style.display === '') {
                form.style.display = 'block';
                buttonText.textContent = 'Hide Form';
            } else {
                form.style.display = 'none';
                buttonText.textContent = 'Add Header Form';
            }
        });
    </script>
   
    <form id="hiddenForm" action="{{route('upload.header')}}" method="post" class="form-container" enctype="multipart/form-data" style="display: none;">
        @csrf
        @method('post')
        <h1 class="header">ADD HEADER DETAILS</h1>
        <br> 
        <div class="form-group">
            <label >WebSite Tiltle:</label>
            <input type="text"   name="web_title" placeholder="Write Website Title">
        </div> 
        <div class="form-group">
            <label >WebSite Phone:</label>
            <input type="text"   name="phone" placeholder="Write Website Phone Number">
        </div> 
        <div class="form-group">
            <label >WebSite Email:</label>
            <input type="text"   name="email" placeholder="Write Website Email ">
        </div>
        <div class="form-group">
            <label >WebSite Facebook Link:</label>
            <input type="text"   name="facebook" placeholder="Write Facebook Link">
        </div> 
        <div class="form-group">
            <label >WebSite Twitter Link:</label>
            <input type="text"   name="twitter" placeholder="Write Twitter Link">
        </div> 
        <div class="form-group">
            <label >WebSite Instagram Link:</label>
            <input type="text"   name="instagram" placeholder="Write InstaGram  Link">
        </div>          
        <div class="form-group">
            <label >Logo:</label>
            <input type="file"  name="image" required>
        </div>
        
        <div class="form-group">
            <button class="btn btn-primary" type="submit">Upload</button>                      
        </div>          
</form>
    @if(count($data) > 0)
        <table id="customers">                 
            <tr>
              <th>ID</th> 
              <th>Website Title</th>
              <th>Website Phone</th>
              <th>Website Email</th>
              <th>Website Facebook</th> 
              <th>Website Twitter</th> 
              <th>Website Insta</th>        
              <th>Logo Image</th>
              <th>Edit</th>
              <th>Delete</th>
            </tr>
                  
            @foreach ($data as $data )         
            <tr>         
              <td>{{ $data->id }}</td>
              <td>{{ $data->web_title}}</td>
              <td>{{ $data->phone}}</td>
              <td>{{ $data->email}}</td>
              <td>{{ Str::limit($data->facebook, 10) }}</td>
              <td>{{ Str::limit($data->twitter, 10) }}</td>
              <td>{{ Str::limit($data->instagram, 10) }}</td>

              <td ><img style="width:200px; height: 70px;  object-fit: cover; " src="/headerimage/{{$data->image}}" alt="Image"></td>       
              <td><a class="btn btn-primary" href="">Edit</a></td>    
              <td><a class="btn btn-danger" href="" onclick="return confirm('Are you sure you want to delete this item?')">Delete</a></td>
            </tr>
            @endforeach     
          </table>
         @else
         <div class="no-data-message">
            <p>Opps! No data available.</p>
            <p>Click Add Header Form To Upload Header Data</p>
        </div>      
      @endif
        </div>
@endsection