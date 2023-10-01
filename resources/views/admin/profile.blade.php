@extends('layout.app')
@section('content')
<style>
    .img-container{
        right:-200px;
        position: relative;
        width: 50%;
    }
    .img-profile{
        border-radius:50%; 
        opacity: 1;
        display: block;
        width: 140px;
        height: 140px;
        transition: 0.5 ease;
        
        backface-visibility: hidden;
    }
    .middle{
        transition: 0.5s ease;
        opacity: 0;
        position: absolute;
        top: 50%;
        left: 50%;
        
        transform: translate(-50%, -50%);
        -ms-transform: translate(-50%,-50%);
        text-align: center;
        
    }
    .img-container:hover .img-profile{
        opacity: 0.3;
        
    }
    .img-container:hover .middle{
        opacity: 1;
    }
    .img-file{
        
        position: absolute;
        top: 50%;
        left: 50%;
    }
    .text{
        padding: 16px 32px;
    }
</style>
<header class="bg-white shadow-sm px-4 py-3 z-index-20">
    <h1>Profile Settings</h1>
</header>
<section class="table">
    <div class="container-fluid">
        <div class="card mb-0">
            <div class="card-body">
                <div class="row">
                    <div class="d-flex justify-content-center img-container">
                        @if (!$profile)
                        <form action="{{ route('profilepost') }}" method="post" id="profile-form" enctype="multipart/form-data" class="photo-profile">
                            @csrf
                            <input type="hidden" name="users_id" value="{{ auth()->user()->id }}">
                            <input type="file" name="photo" id="file" class="img-file" id="img-file" onchange="previewImage()"> {{-- onchange --}}
                            
                            <img src="{{ asset('img/rabu.jpg') }}" alt="llala" class="img-profile">
                            <div class="middle" id="middle"> {{-- onchange --}}
                                <div class="text"><i class="fa-solid fa-camera"></i></div>
                            </div>
                            <button type="submit">Submit Post</button>
                        </form> 
                        @else
                        <form action="{{ route('profileupdate',$profile->users_id) }}" method="post" id="profile-form" enctype="multipart/form-data" class="photo-profile">
                            @csrf
                            @method('put')
                            <input type="hidden" name="users_id" value="{{ auth()->user()->id }}">
                            <input type="file" name="photo" id="file" class="img-file" id="img-file" onchange="previewImage()"> {{-- onchange --}}
                            <input type="hidden" name="oldImage" value="{{ $profile->photo }}">
                            <img src="{{ asset('storage/'.$profile->photo)}}" alt="llala" class="img-profile">
                            <div class="middle" id="middle"> {{-- onchange --}}
                                <div class="text"><i class="fa-solid fa-camera"></i></div>
                            </div>
                            <button type="submit">Submit Edit</button>
                        </form>
                        @endif
                        
                        
                    </div>
                </div>
                
                    <div class="row">
                        <form action="{{ route('userupdate',auth()->user()->username) }}" method="post" id="user-update-form">
                            @csrf
                            @method('put')
                        <div class="col">
                            <label for="" class="form-label">First Name</label>
                            <input type="text" name="" id="" class="form-control" value="{{ auth()->user()->first_name }}">
                            <label for="" class="form-label">Last Name</label>
                            <input type="text" name="" id="" class="form-control" value="{{ auth()->user()->last_name }}">
                            <label for="" class="form-label">Username</label>
                            <input type="text" name="" id="" class="form-control" value="{{ auth()->user()->username }}">
                            <label for="" class="form-label">Phone</label>
                            <input type="text" name="" id="" class="form-control" value="{{ auth()->user()->phone }}">
                        </div>
                    
                   
                        <div class="col">
                            <label for="" class="form-label">Email</label>
                            <input type="text" name="" id="" class="form-control" value="{{ auth()->user()->email }}">
                            <label for="" class="form-label">NIK</label>
                            <input type="text" name="" id="" class="form-control" value="{{ auth()->user()->nik }}">
                            <label for="" class="form-label">Address</label>
                            <input type="text" name="" id="" class="form-control" value="{{ auth()->user()->address }}">
                        </div>
                        
                    </div>
                    <br>
                    <button type="submit" id="submit-btn" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
        
    </div>
</section>
<script>
    var middle = document.querySelector('#middle')
    var imgFile = document.querySelector('#img-container')

    middle.addEventListener("click",()=>{
        imgFile.click();
    })
    imgFile.onchange = (e)=>{
        e.target.files[0];
    }
    
    
</script>
@endsection
@push('js_scripts')
    <script>
        function previewImage(){
    var imgFile = document.querySelector("#img-file")
    var imgProfile = document.querySelector(".img-profile")

    const reader = new FileReader();

    reader.readAsDataURL(imgFile.files[0])

    reader.onload = function(readEvent){
        imgProfile.src = readEvent.target.result;
    }
}
    </script>
@endpush