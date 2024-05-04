@extends('Admin.layouts.app')

@section('style')
    <link href="{{ asset('dashboard/assets/plugins/select2/css/select2.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('dashboard/assets/plugins/input-tags/css/tagsinput.css') }}" rel="stylesheet" />
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
                            <li class="breadcrumb-item active" aria-current="page">Edit Post</li>
                        </ol>
                    </nav>
                </div>
                <div class="ms-auto">
                    <div class="btn-group">
                        <button type="button" class="btn btn-primary">Settings</button>
                        <button type="button" class="btn btn-primary split-bg-primary dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown">	<span class="visually-hidden">Toggle Dropdown</span>
                        </button>
                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-lg-end">	<a class="dropdown-item" href="javascript:;">Action</a>
                            <a class="dropdown-item" href="javascript:;">Another action</a>
                            <a class="dropdown-item" href="javascript:;">Something else here</a>
                            <div class="dropdown-divider"></div>	<a class="dropdown-item" href="javascript:;">Separated link</a>
                        </div>
                    </div>
                </div>
            </div>
            <!--end breadcrumb-->

            <div class="card">
                <div class="card-body p-4">
                    <h5 class="card-title">Edit Post</h5>
                    <hr />
                    <div class="form-body mt-4">
                        <form method="POST" action="{{ route('admin.post.update',$post) }}" enctype="multipart/form-data">
                            @method('PUT')
                            @csrf
                            <div class="row">
                                <div class="col-lg-12 col-md-12">
                                    <div class="border border-3 p-4 rounded">
                                        <div class="mb-3">
                                            <label for="inputProductTitle" class="form-label">Post Title</label>
                                            <input type="text" class="form-control" id="inputProductTitle"
                                                placeholder="Enter post title" name="title" value="{{ old('title',$post->title) }}">
                                                @error('title')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label for="inputProductDescription" class="form-label">Post Excerpt</label>
                                            <textarea class="form-control" id="inputProductDescription" rows="3" name="excerpt">
                                                {{ old('excerpt',$post->excerpt) }}
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
                                                                    <option {{ $post->category_id == $value ? 'selected' : '' }} value="{{ $value }}">{{ $key }}
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
                                            <label class="form-label">Edit Tags</label>
                                            <input type="text" class="form-control" name="tags" data-role="tagsinput" value="{{ $tags }}">
                                        </div>
                                        <div class="mb-3">
                                            <label for="inputProductDescription" class="form-label">Post Content</label>
                                            <textarea class="form-control post_content" id="inputProductDescription" name="body" rows="7">
                                                {{ old('body',$post->body) }}
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
                                        <div class="mb-3 img-card">
                                           <div class="card" style="width:200px">
                                            <img src="{{ $post->image ? asset('storage/'.$post->image->path) : '' }}" class="img-responsive">
                                           </div>
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
    <script src="{{ asset('dashboard/assets/plugins/select2/js/select2.min.js') }}"></script>
    <script src="{{ asset('dashboard/assets/plugins/input-tags/js/tagsinput.js') }}"></script>
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
            $('.multiple-select').select2({
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


        tinymce.init({
            selector: '.post_content',
            plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount checklist mediaembed casechange export formatpainter pageembed linkchecker a11ychecker tinymcespellchecker permanentpen powerpaste advtable advcode editimage advtemplate ai mentions tinycomments tableofcontents footnotes mergetags autocorrect typography inlinecss markdown',
            toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table mergetags | addcomment showcomments | spellcheckdialog a11ycheck typography | align lineheight | checklist numlist bullist indent outdent | emoticons charmap | removeformat',
            toolbar_mode : "floating",
            automatic_uploads: true,
            image_title: true,
            tinycomments_mode: 'embedded',
            tinycomments_author: 'Author name',
            mergetags_list: [{
                    value: 'First.Name',
                    title: 'First Name'
                },
                {
                    value: 'Email',
                    title: 'Email'
                },
            ],
            ai_request: (request, respondWith) => respondWith.string(() => Promise.reject(
                "See docs to implement AI Assistant")),
            images_upload_handler: function(blobinfo, success, failure) {
                let formData = new FormData();
                let _token = $('input[name=_token]').val();

                let xhr = new XMLHttpRequest();
                xhr.open("post", "{{ route('admin.upload_tinymce_image') }}");
                xhr.onload = () => {
                    if(xhr.status != 200) {
                        failure("HTTP error" + xhr.status)
                        return;
                    }

                    let json = JSON.parse(xhr.responseText)
                    if(!json || typeof json.location != "string"){
                        failure("invalid json request" + xhr.responseText)
                        return;
                    }
                    success(json.location);
                }
                formData.append("_token", _token);
                formData.append("file", blobinfo.blob(), blobinfo.filename());
                xhr.send(formData);
            }

          
        });

      
    </script>
@endsection
