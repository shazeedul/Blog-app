@extends('layouts.website')
@section('content') 

<section class="h-100 gradient-custom-2">
    <div class="container py-5 h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col col-lg-10 col-xl-12 col-md-12">
          <div class="card">
            <div class="rounded-top text-white d-flex flex-row" style="background-color: #000; height:200px;">
              <div class="ms-4 ml-3 mt-5 d-flex flex-column" style="width: 150px;">
                @if (Auth::user()->image)
                  <img src="{{ asset('storage/'.Auth::user()->image) }}"
                  alt="Generic placeholder image" class="img-fluid img-thumbnail mt-4 mb-2"
                  style="width: 150px; z-index: 1">
                @else
                  <img src="{{ asset('/assets/website/images/profile-avatar.png') }}"
                  alt="Generic placeholder image" class="img-fluid img-thumbnail mt-4 mb-2"
                  style="width: 150px; z-index: 1">
                @endif
                
                <button type="button" class="btn btn-outline-dark" data-mdb-ripple-color="dark"
                  style="z-index: 1;">
                  Edit profile
                </button>
              </div>
              <div class="ms-4 ml-2" style="margin-top: 130px;">
                <h5 class="text-white">{{ $profile->fname.' '.$profile->lname }}</h5>
                <p>{{ $profile->email }}</p>
              </div>
              <div class="ms-4 mr-3 mt-3 d-flex flex-column ml-auto">
                <a class="btn btn-outline-light" href="{{ route('logout') }}">Logout</a>
              </div>
            </div>
            <div class="p-4 text-black" style="background-color: #f8f9fa;">
              <div class="d-flex justify-content-end text-center py-1">
                <div>
                  <p class="mb-1 h5">253</p>
                  <p class="small text-muted mb-0">Posts</p>
                </div>
                <div class="px-3">
                  <p class="mb-1 h5">1026</p>
                  <p class="small text-muted mb-0">Followers</p>
                </div>
                <div>
                  <p class="mb-1 h5">478</p>
                  <p class="small text-muted mb-0">Following</p>
                </div>
              </div>
            </div>
            <div class="card-body p-4 text-black">
              <div class="mb-5">
                <p class="lead fw-normal mb-1">About</p>
                <div class="p-4" style="background-color: #f8f9fa;">
                  <p class="font-italic mb-1">Web Developer</p>
                  <p class="font-italic mb-1">Lives in New York</p>
                  <p class="font-italic mb-0">Photographer</p>
                </div>
              </div>
              <div class="d-flex justify-content-between align-items-center mb-4">
                <p class="lead fw-normal mb-0">Recent Posts</p>
                <p class="mb-0"><a href="#!" class="text-muted">Show all</a></p>
              </div>
              <div class="row g-2">
                <div class="col mb-2">
                  <img src="https://mdbcdn.b-cdn.net/img/Photos/Lightbox/Original/img%20(112).webp"
                    alt="image 1" class="w-100 rounded-3">
                </div>
                <div class="col mb-2">
                  <img src="https://mdbcdn.b-cdn.net/img/Photos/Lightbox/Original/img%20(107).webp"
                    alt="image 1" class="w-100 rounded-3">
                </div>
              </div>
              <div class="row g-2">
                <div class="col">
                  <img src="https://mdbcdn.b-cdn.net/img/Photos/Lightbox/Original/img%20(108).webp"
                    alt="image 1" class="w-100 rounded-3">
                </div>
                <div class="col">
                  <img src="https://mdbcdn.b-cdn.net/img/Photos/Lightbox/Original/img%20(114).webp"
                    alt="image 1" class="w-100 rounded-3">
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection