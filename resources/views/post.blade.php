@extends('layouts.master')
@section('content')
    @include('partials.header')

    <div class="colorlib-classes">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="row row-pb-lg">
                        <div class="col-md-12 animate-box">
                            <div class="classes class-single">
                                <div class="classes-img"
                                    style="background-image: url({{ asset('storage/' . $post->image->path) }});">
                                </div>
                                <div class="desc desc2">
<<<<<<< HEAD
                                    <h3>{{ $post->title }}</h3>
                                        {{ $post->body }}
=======
                                    <h3><a href="#">{{ $post->title }}</a></h3>
                                    <p>When she reached the first hills of the Italic Mountains, she had a last view back on
                                        the skyline of her hometown Bookmarksgrove, the headline of Alphabet Village and the
                                        subline of her own road, the Line Lane. Pityful a rethoric question ran over her
                                        cheek, then she continued her way.</p>
                                    <p>The Big Oxmox advised her not to do so, because there were thousands of bad Commas,
                                        wild Question Marks and devious Semikoli, but the Little Blind Text didn’t listen.
                                        She packed her seven versalia, put her initial into the belt and made herself on the
                                        way.</p>
                                    <blockquote>
                                        The Big Oxmox advised her not to do so, because there were thousands of bad Commas,
                                        wild Question Marks and devious Semikoli, but the Little Blind Text didn’t listen.
                                        She packed her seven versalia, put her initial into the belt and made herself on the
                                        way.
                                    </blockquote>
                                    <h3>Some Features</h3>
                                    <p>The Big Oxmox advised her not to do so, because there were thousands of bad Commas,
                                        wild Question Marks and devious Semikoli, but the Little Blind Text didn’t listen.
                                        She packed her seven versalia, put her initial into the belt and made herself on the
                                        way.</p>

                                    <p>On her way she met a copy. The copy warned the Little Blind Text, that where it came
                                        from it would have been rewritten a thousand times and everything that was left from
                                        its origin would be the word "and" and the Little Blind Text should turn around and
                                        return to its own, safe country. But nothing the copy said could convince her and so
                                        it didn’t take long until a few insidious Copy Writers ambushed her, made her drunk
                                        with Longe and Parole and dragged her into their agency, where they abused her for
                                        their.</p>
>>>>>>> sayed
                                    <p><a href="#" class="btn btn-primary btn-outline btn-lg">Live Preview</a> or <a
                                            href="#" class="btn btn-primary btn-lg">Download File</a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row row-pb-lg animate-box">
                        <div class="col-md-12">
                            <h2 class="colorlib-heading-2">Comments {{ count($post->comments) }}</h2>

                            @foreach ($post->comments as $comment)
                            <div class="review" id="{{ $post->id }}">
                                <div class="user-img" style="background-image: url({{$comment->user->image ? asset('storage/'.$comment->user->image->path) : asset('storage/images/profile.png') }})"></div>
                                <div class="desc">
                                    <h4>
                                        <span class="text-left">{{ $comment->user->name }}</span>
                                        <span class="text-right">{{ $comment->created_at->diffForHumans() }}</span>
                                    </h4>
                                    <p>{{ $comment->textComment }}</p>
                                    <p class="star">
                                        <span class="text-left"><a href="#" class="reply"><i class="icon-reply"></i></a></span>
                                    </p>
                                </div>
                            </div>
                            @endforeach
                        

                        </div>
                    </div>

                    <div class="row animate-box">
                        <div class="col-md-12">
                            <h2 class="colorlib-heading-2" >Say something</h2>

                            @if (session()->has('success'))
                            <x-alert :status="'success'" :message="session()->get('success')" />
                            @endif
                            @if (session()->has('error'))
                            <x-alert :status="'error'" :message="session()->get('error')" />
                            @endif

                            <form action="{{ route('add.comment') }}" method="POST" >
                                @csrf

                                <input type="hidden" name="id" value="{{ $post->id }}">

                                <div class="row form-group">
                                    <div class="col-md-12">
                                        <!-- <label for="message">Message</label> -->
                                        <textarea name="textComment" id="message" cols="30" rows="10" class="form-control"
                                            placeholder="Say something about us"></textarea>
                                    </div>
                                </div>
                                @error('textComment')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                                <div class="form-group">
                                    <input type="submit" value="Post Comment" class="btn btn-primary">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- SIDEBAR: start -->
                <div class="col-md-4 animate-box">
                    <div class="sidebar">


                        {{-- categories --}}
                        <x-categories :categories="$categories" />
                        {{-- end categories --}}

                        {{-- recent posts --}}
                        <x-recent-posts :recentposts="$recentPosts" />
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
