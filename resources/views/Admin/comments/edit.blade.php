@extends('Admin.layouts.app')

@section('style')
<link href="{{ asset('dashboard/assets/plugins/select2/css/select2.min.css') }}" rel="stylesheet" />
<link href="{{ asset('dashboard/assets/plugins/select2/css/select2-bootstrap4.css') }}" rel="stylesheet" />
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
                    <h5 class="card-title">Edit Comment</h5>
                    <hr />
                    <div class="form-body mt-4">
                        <form method="POST" action="{{ route('admin.comment.update',$comment) }}" >
                            @csrf
                            @method('PATCH')
                            <div class="row">
                                <div class="col-lg-10 col-md-10">
                                    <div class="border border-3 p-4 rounded">

                                        <div class="mb-3">
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="border p-3 rounded">
                                                        <div class="mb-3">
                                                            <label class="form-label">Related Post</label>

                                                            <select class="single-select" name="post_id"> 
                                                                @foreach ($posts as $key => $value)
                                                                    <option {{$value == $comment->post_id ? "selected" : "" }} value="{{ $value }}">{{ $key }}
                                                                    </option>
                                                                @endforeach

                                                            </select>
                                                            @error('post_id')
                                                                <small class="text-danger">{{ $message }}</small>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label for="inputProductDescription" class="form-label">Post Comment</label>
                                            <textarea class="form-control post_content" id="inputProductDescription" name="textComment" rows="3">
                                                {{ old('textComment',$comment->textComment) }}
                                            </textarea>
                                            @error('textComment')
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

<script src="{{ asset('dashboard/assets/plugins/select2/js/select2.min.js') }}"></script>

    <script>
        $(document).ready(function() {

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
