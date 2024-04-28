@extends('Admin.layouts.app')
@section('style')
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
    <!--start page wrapper -->
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
                            <li class="breadcrumb-item active" aria-current="page">Comments</li>
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
                <div class="card-body">
                    <div class="d-lg-flex align-items-center mb-4 gap-3">
                        <div class="position-relative">
                            <input type="text" class="form-control ps-5 radius-30" placeholder="Search Post"> <span
                                class="position-absolute top-50 product-show translate-middle-y"><i
                                    class="bx bx-search"></i></span>
                        </div>
                        <div class="ms-auto"><a href="{{ route('admin.comment.create') }}"
                                class="btn btn-primary radius-30 mt-2 mt-lg-0"><i class="bx bxs-plus-square"></i>Add New
                                Comments</a></div>
                    </div>
                    <div class="table-responsive">
                        <table class="table mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th>#CID</th>
                                    <th>Comment</th>
                                    <th>Creator</th>
                                    <th>View Comment</th>
                                    <th>Created At</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($comments as $comment)
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div>
                                                    <input class="form-check-input me-3" type="checkbox" value=""
                                                        aria-label="...">
                                                </div>
                                                <div class="ms-2">
                                                    <h6 class="mb-0 font-14">#{{ $comment->id }}</h6>
                                                </div>
                                            </div>
                                        </td>
                                        <td>{{ Str::limit($comment->textComment,40) }}</td>
                                        <td>{{ $comment->user->name }}</td>
                                        <td><a href="{{ route('show.post',$comment->post->slug."#".$comment->id) }}" target="_blank" class="btn btn-primary btn-sm radius-30 px-4">View
                                            Comment</a></td>
                                        
                                        <td>{{ $comment->created_at->diffForHumans() }}</td>
                                
                                      <td>
                                            <div class="d-flex order-actions">
                                                <a href="{{ route('admin.comment.edit', $comment) }}" class=""><i
                                                        class='bx bxs-edit'></i></a>
                                                <a href="#"
                                                    onclick="event.preventDefault(); document.querySelector('#delete_form_{{ $comment->id }}').submit()"
                                                    class="ms-3"><i class='bx bxs-trash'></i></a>
                                                <form action="{{ route('admin.comment.delete', $comment) }}" method="POST"
                                                    id="delete_form_{{ $comment->id }}">
                                                    @csrf
                                                    @method('DELETE')
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $comments->links() }}
                    </div>
                </div>
            </div>


        </div>
    </div>
    <!--end page wrapper -->
@endsection

@section('script')
    <script>
        setTimeout(() => {
            $(".messages").fadeOut();
        }, 5000);
    </script>
@endsection
