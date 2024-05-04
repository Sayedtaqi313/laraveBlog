@extends('Admin.layouts.app')

@section('style')
    <link href="{{ asset('dashboard/assets/plugins/select2/css/select2-bootstrap4.css') }}" rel="stylesheet" />
    <style>
        .messages{
            position: fixed;
            left:70%;
            border-radius: 5px;
            z-index: 100 !important;
            max-width:30%;
        }

        .img-card{
            display:flex !important;
            justify-content: center;
            align-content: center;
        }
    </style>
@endsection

@section('wrapper')
    @if (session()->has('success'))
    <div class="messages alert alert-success">
        <strong>Success </strong> <span>{{ session()->get('success') }}</span>
    </div> 
    @endif
    
    <div class="page-wrapper">
        <div class="page-content">
            <!--breadcrumb-->
            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                <div class="breadcrumb-title pe-3">Web Blog</div>
                <div class="ps-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 p-0">
                            <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">About</li>
                        </ol>
                    </nav>
                </div>
                <div class="ms-auto">
                    <div class="btn-group">
                        <button type="button" class="btn btn-primary">Settings</button>
                        <button type="button"
                            class="btn btn-primary split-bg-primary dropdown-toggle dropdown-toggle-split"
                            data-bs-toggle="dropdown"> <span class="visually-hidden">Toggle Dropdown</span>
                        </button>
                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-lg-end"> <a class="dropdown-item"
                                href="javascript:;">Action</a>
                            <a class="dropdown-item" href="javascript:;">Another action</a>
                            <a class="dropdown-item" href="javascript:;">Something else here</a>
                            <div class="dropdown-divider"></div> <a class="dropdown-item" href="javascript:;">Separated
                                link</a>
                        </div>
                    </div>
                </div>
            </div>
            <!--end breadcrumb-->

            <div class="card">
                <div class="card-body p-4">
                    <hr />
                    <div class="form-body mt-4">
                        <form method="POST" action="{{ route('admin.about.update',$about) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-lg-12 col-md-12">
                                    <div class="border border-3 p-4 rounded">
                                        <div class="mb-3">
                                            <label for="inputProductTitle" class="form-label">Who Are We</label>
                                            <textarea rows="5" class="form-control" id="inputProductTitle"
                                                 name="who_are_we">
                                                {{ old('who_are_we',$about->who_are_we) }}
                                            </textarea>
                                                @error('who_are_we')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                        </div>
                                    
                                        <div class="mb-3">
                                            <label for="inputProductTitle" class="form-label">Our Mission</label>
                                            <textarea rows="5" class="form-control" id="inputProductTitle"
                                                 name="our_mission">
                                                {{ old('our_mission',$about->our_mission) }}
                                            </textarea>
                                                @error('our_mission')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label for="inputProductTitle" class="form-label">Our Vision</label>
                                            <textarea rows="5" class="form-control" id="inputProductTitle"
                                                 name="our_vision">
                                                {{ old('our_vision',$about->our_vision) }}
                                            </textarea>
                                                @error('our_vision')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label for="inputProductTitle" class="form-label">Our Service</label>
                                            <textarea rows="5" class="form-control" id="inputProductTitle"
                                                 name="our_service">
                                                {{ old('our_service',$about->our_service) }}
                                            </textarea>
                                                @error('our_service')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label for="inputProductTitle" class="form-label">About Our Site</label>
                                            <textarea rows="5" class="form-control" id="inputProductTitle"
                                                 name="about_our_site">
                                                {{ old('about_our_site',$about->about_our_site) }}
                                            </textarea>
                                                @error('about_our_site')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                        </div>
                                        <div class="mb-3">
                                            <div class="mb-3">
                                                <label for="inputProductDescription" class="form-label">About First Image</label>
                                                <input id="image-uploadify" type="file" accept="image/*" name="imageOne">
                                                @error('imageOne')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                            <div class="mb-3 img-card">
                                               <div class="card" style="width:200px">
                                                <img src="{{ asset('storage/'.$about->imageOne) }}" class="img-responsive">
                                               </div>
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <div class="mb-3">
                                                <label for="inputProductDescription" class="form-label">About Second Image</label>
                                                <input id="image-uploadify" type="file" accept="image/*" name="imageTwo">
                                                @error('imageTwo')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                            <div class="mb-3 img-card">
                                               <div class="card" style="width:200px">
                                                <img src="{{ asset('storage/'.$about->imageTwo) }}" class="img-responsive">
                                               </div>
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <button class="btn btn-primary">Submit</button>
                                        </div>
                                    </div>
                                </div>
                               
                            </div><!--end row-->
                        </form>
                    </div>
                </div>
            </div>


        </div>
    </div>
    <!--end page wrapper -->
@endsection

@section('script')

    <script>
        $(document).ready(function() {
            setTimeout(() => {
                $(".messages").fadeOut();
            }, 5000);

        })
      
    </script>
@endsection
