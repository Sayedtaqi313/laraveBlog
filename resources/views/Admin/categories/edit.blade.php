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
                            <li class="breadcrumb-item active" aria-current="page">Categories</li>
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
                    <h5 class="card-title">Edit Category</h5>
                    <hr />
                    <div class="form-body mt-4">
                        <form method="POST" action="{{ route('admin.categories.update',$category->id) }}" >
                            @csrf
                            @method("PUT")
                            <div class="row">
                                <div class="col-lg-10 col-md-10">
                                    <div class="border border-3 p-4 rounded">
                                        <div class="mb-3">
                                            <label for="inputProductTitle" class="form-label">Category Name</label>
                                            <input type="text" class="form-control" id="inputProductTitle"
                                                placeholder="Enter Category name" name="name" value="{{ old('name',$category->name) }}">
                                                @error('name')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                        </div>
                                        <div class="mb-3">
                                            <button class="btn btn-primary">Update</button>
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
