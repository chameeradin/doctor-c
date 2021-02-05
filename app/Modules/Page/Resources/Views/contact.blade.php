@extends('layouts.app')
@section('content')
    @include('layouts.partials.front-breadcrumb', ['breadcrumb_title' => $metaTitle])

    <!-- ================ contact section start ================= -->
    <section class="contact-section area-padding">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2 class="contact-title">Get in Touch</h2>
                </div>
                <div class="col-lg-8">
                    <form class="form-contact contact_form" action="{{route('inquiry.store')}}" method="post" id="contactForm" novalidate="novalidate">
                        {{csrf_field()}}
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <textarea name="message" id="message" class="form-control w-100 tinymce" cols="30" rows="9" placeholder="Enter Message">{{old('message')}}</textarea>
                                    @if ($errors->has('message'))
                                        <span class="text-danger">
                                                      {{$errors->first('message')}}
                                                  </span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <input type="text" class="form-control" id="name" name="name" placeholder="Enter your name" value="{{old('name')}}">
                                    @if ($errors->has('name'))
                                        <span class="text-danger">
                                              {{$errors->first('name')}}
                                          </span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <input class="form-control" name="email" id="email" type="email" placeholder="Enter email address" value="{{old('email')}}">
                                    @if ($errors->has('email'))
                                        <span class="text-danger">
                                                        {{$errors->first('email')}}
                                         </span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <input class="form-control" name="subject" id="subject" type="text" placeholder="Enter Subject">
                                </div>
                            </div>
                        </div>
                        <div class="form-group mt-3">
                            <button type="submit" class="button button-contactForm">Send Message</button>
                        </div>
                    </form>


                </div>


            </div>
            <div class="row" style="padding-top:    5%">
                <div class="col-lg-6">
                    <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3967.7653966064818!2d80.79320506921464!3d6.026905759689259!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xfe38e982b0c4f476!2sArogya%20Hospital!5e0!3m2!1sen!2slk!4v1577370977970!5m2!1sen!2slk"
                            width="600" height="450" frameborder="0" style="border:0;" allowfullscreen="">
                    </iframe>
                </div>
                <div class="col-lg-6" style="padding-left: 10%; padding-top: 5%">
                    <div class="media contact-info">
                        <span class="contact-info__icon"><i class="ti-home"></i></span>
                        <div class="media-body">
                            <h3>Teak Land Rd, Tangalle.</h3>
                            <p>Sri Lanka</p>
                        </div>
                    </div>
                    <div class="media contact-info">
                        <span class="contact-info__icon"><i class="ti-tablet"></i></span>
                        <div class="media-body">
                            <h3><a href="tel:454545654">(+94) – 472 240 488</a></h3>
                            <p>Mon to Fri 6am to 11pm</p>
                        </div>
                    </div>
                    <div class="media contact-info">
                        <span class="contact-info__icon"><i class="ti-email"></i></span>
                        <div class="media-body">
                            <h3><a href="mailto:support@colorlib.com">support@arogya.com</a></h3>
                            <p>Send us your inquiry anytime!</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ================ contact section end ================= -->
@endsection