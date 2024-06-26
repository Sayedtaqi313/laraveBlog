@extends('Admin.layouts.app')

@section('style')
    <link rel="stylesheet" href="{{ asset('dashboard/assets/plugins/Drag-And-Drop/dist/imageuploadify.min.css') }}">
    <link href="{{ asset('dashboard/assets/plugins/select2/css/select2.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('dashboard/assets/plugins/select2/css/select2-bootstrap4.css') }}" rel="stylesheet" />
    <link href="{{ asset('dashboard/assets/plugins/input-tags/css/tagsinput.css') }}" rel="stylesheet" />
    <style>
        .messages {
            position: fixed;
            left: 70%;
            border-radius: 5px;
            z-index: 100 !important;
            max-width: 30%;
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

            <!--end breadcrumb-->

            <div class="card">
                <div class="card-body p-4">
                    <h5 class="card-title">Add New Post</h5>
                    <hr />
                    <div class="form-body mt-4">
                        <form method="POST" action="{{ route('admin.post.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-lg-10 col-md-10">
                                    <div class="border border-3 p-4 rounded">
                                        <div class="mb-3">
                                            <label for="inputProductTitle" class="form-label">Post Title</label>
                                            <input type="text" class="form-control" id="inputProductTitle" placeholder="Enter post title" name="title" value="{{ old('title') }}">
                                                @error('title')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label for="inputProductDescription" class="form-label">Post Excerpt</label>
                                            <textarea class="form-control" id="inputProductDescription" rows="3" name="excerpt">
                                                {{ old('excerpt') }}
                                            </textarea>

                                            @error('excerpt')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror

                                        </div>
                                        <div class="mb-3">

                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="border p-3 rounded">
                                                        <div class="mb-3">
                                                            <label class="form-label">Post Category</label>

                                                            <select class="single-select" name="category_id"> 
                                                                @foreach ($categories as $key => $value)
                                                                    <option value="{{ $value }}">{{ $key }}
                                                                    </option>
                                                                @endforeach

                                                            </select>
                                                            @error('category_id')
                                                                <small class="text-danger">{{ $message }}</small>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>


                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Add Tags</label>
                                            <input type="text" class="form-control" name="tags" data-role="tagsinput">
                                        </div>
                                        <div class="mb-3">
                                            <label for="inputProductDescription" class="form-label">Post Content</label>
                                            <textarea class="form-control post_content" id="inputProductDescription" name="body" rows="3">
                                                {{ old('body') }}
                                            </textarea>
                                            @error('body')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label for="inputProductDescription" class="form-label">Post Thumbnail</label>
                                            <input id="image-uploadify" type="file" accept="image/*" name="thumbnail">
                                            @error('thumbnail')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
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
    <script src="{{ asset('dashboard/assets/plugins/select2/js/select2.min.js') }}"></script>
    <script src="{{ asset('dashboard/assets/plugins/input-tags/js/tagsinput.js') }}"></script>
    <script src="{{ asset('dashboard/assets/plugins/select2/js/select2.min.js') }}"></script>

    <script src="{{ asset('dashboard/assets/plugins/Drag-And-Drop/dist/imageuploadify.min.js') }}"></script>
    <script>
        $(document).ready(function() {

            // $('#image-uploadify').imageuploadify();


            $('.single-select').select2({
                theme: 'bootstrap4',
                width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' :
                    'style',
                placeholder: $(this).data('placeholder'),
                allowClear: Boolean($(this).data('allow-clear')),
            });
      

            setTimeout(() => {
                $(".messages").fadeOut();
            }, 5000);

        })
      

    </script>
@endsection
