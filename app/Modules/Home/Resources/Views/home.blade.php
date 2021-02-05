@extends('layouts.app')
@section('content')
    <!--================Home Banner Area =================-->

    <section class="banner-area d-flex align-items-center">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-lg-6 col-xl-5">
                    <h1>Making Health<br>
                        Care Better Together</h1>
                    <p>Also you dry creeping beast multiply fourth abundantly our itsel signs bring our. Won form living. Whose dry you seasons divide given gathering great in whose you'll greater let livein form beast  sinthete
                        better together these place absolute right.</p>
                    <a href="{{ route('appointments.create') }}" class="main_btn">Make an Appointment</a>
                    <a href="{{route('departments')}}" class="main_btn_light">View Department</a>
                </div>
            </div>
        </div>
    </section>

    <!--================End Home Banner Area =================-->


    <!--================ Feature section start =================-->
    <section class="feature-section">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="card card-feature text-center text-lg-left">

                        <h3 class="card-feature__title"><span class="card-feature__icon">
                                <i class="ti-layers"></i>
                            </span>Primary Care</h3>
                        <p class="card-feature__subtitle">Arogya is renowned for offering Sri Lanka's most empathetic, technologically-driven and cutting-edge health care service. </p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card card-feature text-center text-lg-left">

                        <h3 class="card-feature__title"><span class="card-feature__icon">
                                <i class="ti-heart-broken"></i>
                            </span>Emergency Cases</h3>
                        <p class="card-feature__subtitle">An Emergency Department (ED), also known as Accident & Emergency (A&E) or Emergency Treatment Unit (ETU)</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card card-feature text-center text-lg-left">

                        <h3 class="card-feature__title"><span class="card-feature__icon">
                                <i class="ti-headphone-alt"></i>
                            </span>Online Appointment</h3>
                        <p class="card-feature__subtitle">eChannelling enables you to channel Doctors from Arogya hospital. Book confirmed Doctor Appointments online. </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================ Feature section end =================-->

    <!--================ Service section start =================-->

    <div class="service-area area-padding-top">
        <div class="container">
            <div class="area-heading row">
                <div class="col-md-5 col-xl-4">
                    <h3>Awesome<br>
                        Health Service</h3>
                </div>
                <div class="col-md-7 col-xl-8">
                    <p>Land meat winged called subdue without very light in all years sea appear midst forth image him third there set. Land meat winged called subdue without very light in all years sea appear</p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 col-lg-4">
                    <div class="card-service text-center text-lg-left mb-4 mb-lg-0">
                        <span class="card-service__icon">
                            <i class="flaticon-brain"></i>
                        </span>
                        <h3 class="card-service__title">Neuro Centre</h3>
                        <p class="card-service__subtitle">Taking care of the brain and spine, and understanding their complexities are the mandate of Arogya Hospitals’ new Neuro Center.</p>
                        <a class="card-service__link" href="{{route('departments')}}">Learn More</a>
                    </div>
                </div>

                <div class="col-md-6 col-lg-4">
                    <div class="card-service text-center text-lg-left mb-4 mb-lg-0">
                        <span class="card-service__icon">
                            <i class="flaticon-tooth"></i>
                        </span>
                        <h3 class="card-service__title">Dental Care</h3>
                        <p class="card-service__subtitle">Dental phobia, or the fear of receiving dental care is a common fear for most people. Often it is a direct result of a bad experience with a dentist.</p>
                        <a class="card-service__link" href="{{route('departments')}}">Learn More</a>
                    </div>
                </div>

                <div class="col-md-6 col-lg-4">
                    <div class="card-service text-center text-lg-left mb-4 mb-lg-0">
                        <span class="card-service__icon">
                            <i class="flaticon-face"></i>
                        </span>
                        <h3 class="card-service__title">General Surgeries</h3>
                        <p class="card-service__subtitle">The news that you have to undergo surgery is always a little unnerving – unless you can be confident that you are in safe hands.</p>
                        <a class="card-service__link" href="{{route('departments')}}">Learn More</a>
                    </div>
                </div>


            </div>
        </div>
    </div>
    <!--================ Service section end =================-->


    <!-- ================ Hotline Area Starts ================= -->
    <section class="hotline-area text-center area-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2>Emergency Hotline</h2>
                    <span>(+94) – 472 240 488</span>
                    <p class="pt-3">We provide 24/7 customer support. Please feel free to contact us <br>for emergency case.</p>
                </div>
            </div>
        </div>
    </section>
    <!-- ================ Hotline Area End ================= -->
@endsection