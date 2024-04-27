@extends('layouts.master')
@section('content')
    @include('partials.header')

    <div class="colorlib-blog">
        <div class="container">
            <div class="row">

                @foreach ($categories as $category)
                    <div class="col-md-3">
                        <div class="block-21 category-box animate-box">
                            <div class="text">
                                <h3 class="heading"><a href="{{ route('category.show',$category) }}">{{ Str::limit($category->name, 10) }}</a></h3>
                                <a href="{{ route('category.show',$category) }}"><span class="icon-user2"></span>{{ $category->user->name }}</a>
                                <div class="meta">
                                    <div><a href="#"><span
                                                class="icon-calendar"></span>{{ $category->created_at->diffForHumans() }}</a>
                                    </div>
                                    <div><a href="#"><span class="icon-newspaper"></span>{{ $category->posts_count }}</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach


                <!-- SIDEBAR: start -->

            </div>
        </div>
    </div>
    @include('partials.footer')
@endsection
@section('css')
    <style>
        .block-21,
        .text {
            width: 100% !important;
            min-height: 200px;
        }
    </style>
@endsection
