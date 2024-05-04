@extends('layouts.master')
@section('content')
    @include('partials.header')

    <div class="colorlib-blog">
        <div class="container">
            <div class="row">
                <div class="col-md-8">

                    @foreach ($posts as $post)
                        <div class="block-21 d-flex animate-box">
                            <a href="{{ route('show.post', ['slug' => $post->slug]) }}" class="blog-img"
                                style="background-image: url('{{ $post->image ? '/storage/'.$post->image->path : '' }}');"></a>
                            <div class="text">
                                <h3 class="heading"><a href="#">{{ $post->title }}</a></h3>
                                <p>{{ $post->excerpt }}</p>
                                <div class="meta">
                                    <div><a href="#"><span
                                                class="icon-calendar"></span>{{ $post->created_at->diffForHumans() }}</a>
                                    </div>
                                    <div><a href="#"><span class="icon-user2"></span>{{ $post->author->name }}</a>
                                    </div>
                                    <div><a href="#"><span class="icon-chat"></span> {{ $post->comments_count }}</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    {{ $posts->links() }}
                </div>

                <!-- SIDEBAR: start -->
                <div class="col-md-4 animate-box">
                    <div class="sidebar">
						

						{{-- categories --}}
						<x-categories :categories="$categories"/>
						{{-- end categories --}}

						{{-- recent posts --}}
						<x-recent-posts :recentposts="$recentPosts"/>
						{{-- end recent posts --}}
						{{-- tags --}}
						<x-tags :tags="$tags" />
						{{-- end tags --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('partials.footer')
@endsection
