@extends('layouts.master')
@section('head')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection
@section('content')
    @include('partials.header')

    <div class="colorlib-contact">
        <div class="container">
            <div class="row row-pb-md">
                <div class="col-md-12 animate-box">
                    <h2>Contact Information</h2>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="contact-info-wrap-flex">
                                <div class="con-info">
                                    <p><span><i class="icon-location-2"></i></span> 198 West 21th Street, <br> Suite 721 New
                                        York NY 10016</p>
                                </div>
                                <div class="con-info">
                                    <p><span><i class="icon-phone3"></i></span> <a href="tel://1234567920">+ 1235 2355
                                            98</a></p>
                                </div>
                                <div class="con-info">
                                    <p><span><i class="icon-paperplane"></i></span> <a
                                            href="mailto:info@yoursite.com">info@yoursite.com</a></p>
                                </div>
                                <div class="con-info">
                                    <p><span><i class="icon-globe"></i></span> <a href="#">yourwebsite.com</a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <h2>Message Us</h2>
                </div>
                <div class="col-md-6">
                        
                        <x-alert :status="'success'" />
                   
                   
                        <x-alert :status="'error'" />
               
                    <form action="{{ route('store.contact') }}" method="POST" id="contactForm">
                        @csrf
                        <div class="row form-group">
                            <div class="col-md-6">
                                <!-- <label for="fname">First Name</label> -->
                                <input type="text" id="fname" name="firstName" value="{{ old('fristName') }}"
                                    class="form-control" placeholder="Your firstname">
                                    <small class="text-danger error-text firstName-error"></small>
                            </div>
                            <div class="col-md-6">
                                <!-- <label for="lname">Last Name</label> -->
                                <input type="text" id="lname" name="lastName" value="{{ old('lastName') }}"
                                    class="form-control" placeholder="Your lastname">
                                    <small class="text-danger error-text lastName-error"></small>
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col-md-12">
                                <!-- <label for="email">Email</label> -->
                                <input type="text" id="email" name="email" value="{{ old('email') }}"
                                    class="form-control" placeholder="Your email address">
                                    <small class="text-danger error-text email-error"></small>
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col-md-12">
                                <!-- <label for="subject">Subject</label> -->
                                <input type="text" id="subject" name="subject" value="{{ old('subject') }}"
                                    class="form-control" placeholder="Your subject of this message">
                                    <small class="text-danger error-text subject-error"></small>
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col-md-12">
                                <!-- <label for="message">Message</label> -->
                                <textarea name="message" id="message" value="{{ old('message') }}" cols="30" rows="10" class="form-control"
                                    placeholder="Say something about us"></textarea>
                                    <small class="text-danger error-text message-error"></small>
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="submit" value="Send Message" class="btn btn-primary " id="submit">
                        </div>
                    </form>
                </div>
                <div class="col-md-6">
                    <div id="map" class="colorlib-map"></div>
                </div>
            </div>
        </div>
    </div>
    @include('partials.footer')
@endsection
@section('js')
    <script>
            $('div.alert').css('display','none');
            var form = '#contactForm';
            $(form).on('submit', function(event) {
         
                event.preventDefault();
                var url = $(this).attr('data-action');
                $.ajax({
                    url: url,
                    method: 'POST',
                    data: new FormData(this),
                    dataType: 'JSON',
                    contentType: false,
                    cache: false,
                    processData: false,
                    success: function(data) {
                       if(data.status == 0) {
                        $.each(data.errors , function (key,value) {
                            console.log(value[0]);
                            $('small.' + key + '-error').text(value[0]);
                        })
                       }else if(data.status == 1) {
                        $('div.alert.alert-success').css('display','block');
                        setTimeout(() => {
                            $('div.alert.alert-success').fadeOut();
                        }, 5000);
                        $('#contactForm')[0].reset();
                        $('div.alert-success>span').html(data.success)
                       }else if(data.status == 2) {
                        $('div.alert.alert-danger').css('display','block');
                        setTimeout(() => {
                            $('div.alert.alert-danger').fadeOut();
                        }, 5000);
                        $('#contactForm')[0].reset();
                        $('div.alert-success>span').html(data.error);
                       }
                    },
                 
                });
            });

        
    </script>
@endsection
