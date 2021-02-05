@extends('layouts.app')
@section('content')
    @include('layouts.partials.front-breadcrumb', ['breadcrumb_title' => $metaTitle])

    <!--================ Team section start =================-->
    <section class="team-area area-padding">
        <div class="container">
            <div class="area-heading row">
                <div class="col-md-5 col-xl-4">
                    <h3>Medcare<br>
                        Experience Doctors</h3>
                </div>
                <div class="col-md-7 col-xl-8">
                    <p>Land meat winged called subdue without very light in all years sea appear midst forth image him third there set. Land meat winged called subdue without very light in all years sea appear</p>
                </div>
            </div>

            <div class="row">
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="card card-team">
                        <img class="card-img rounded-0" src="dcare/img/team/1.jpg" alt="">
                        <div class="card-team__body text-center">
                            <h3>Dr Adam Brain</h3>
                            <p>Neurologist</p>
                            <div class="team-footer d-flex justify-content-between">
                                <a class="dn_btn" ><i class="ti-mobile"></i>+94 788 967 235</a>
                                <ul class="card-team__social">
                                    <li><a href="#"><i class="ti-facebook"></i></a></li>
                                    <li><a href="#"><i class="ti-twitter-alt"></i></a></li>
                                    <li><a href="#"><i class="ti-instagram"></i></a></li>
                                    <li><a href="#"><i class="ti-skype"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-md-6 col-lg-4">
                    <div class="card card-team">
                        <img class="card-img rounded-0" src="dcare/img/team/2.jpg" alt="">
                        <div class="card-team__body text-center">
                            <h3>Dr Blian Judge</h3>
                            <p>Cardiologist</p>
                            <div class="team-footer d-flex justify-content-between">
                                <a class="dn_btn" ><i class="ti-mobile"></i>+94 567 209 672</a>
                                <ul class="card-team__social">
                                    <li><a href="#"><i class="ti-facebook"></i></a></li>
                                    <li><a href="#"><i class="ti-twitter-alt"></i></a></li>
                                    <li><a href="#"><i class="ti-instagram"></i></a></li>
                                    <li><a href="#"><i class="ti-skype"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-md-6 col-lg-4">
                    <div class="card card-team">
                        <img class="card-img rounded-0" src="dcare/img/team/3.jpg" alt="">
                        <div class="card-team__body text-center">
                            <h3>Dr Ronald Beg</h3>
                            <p>Physiologist</p>
                            <div class="team-footer d-flex justify-content-between">
                                <a class="dn_btn" ><i class="ti-mobile"></i>+94 651 957 033</a>
                                <ul class="card-team__social">
                                    <li><a href="#"><i class="ti-facebook"></i></a></li>
                                    <li><a href="#"><i class="ti-twitter-alt"></i></a></li>
                                    <li><a href="#"><i class="ti-instagram"></i></a></li>
                                    <li><a href="#"><i class="ti-skype"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================ Team section end =================-->



    <!-- ================ Hotline Area Starts ================= -->
    <section class="hotline-area text-center area-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2>Emergency hotline</h2>
                    <span>(+94) – 472 240 488</span>
                    <p class="pt-3">We provide 24/7 customer support. Please feel free to contact us <br>for emergency case.</p>
                </div>
            </div>
        </div>
    </section>
    <!-- ================ Hotline Area End ================= -->

@endsection