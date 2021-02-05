@extends('layouts.app')
@section('content')
    @include('layouts.partials.front-breadcrumb', ['breadcrumb_title' => $metaTitle])

    <!--================About  Area =================-->
    <section class="about-area">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-10 offset-md-1 col-lg-6 offset-lg-6 offset-xl-7 col-xl-5">
                    <div class="about-content">
                        <h4>What we offer at Arogya</h4>
                        <h6>Arogya Hospital prides itself in strictly adhering to international levels of patient care and safety. Medical care is complimented with a personalised customer service.</h6>
                        <p>Offering international standards in healthcare, Arogya Hospital is a flagship entity of the Arogya Group. With its luxurious advanced medical facilities, this 14 storey multi-specialty general hospital is a one-stop medical centre that offers diagnostic, therapeutic and intensive care facilities. Arogya Hospital is proud of its highly-qualified and experienced consultant specialists who are experts in a diverse range of medical to surgical divisions.</p>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================About Area End =================-->



    <!--================ appointment Area Starts =================-->
    <!--
    <section class="appointment-area area-padding-top">
        <div class="container">

            <div class="appointment-inner">
                <div class="row">
                    <div class="col-sm-12 col-lg-5 offset-lg-1">
                        <h3>Have Some Questions?</h3>
                        <div class="accordion" id="accordionExample">

                            <div class="card">
                                <div class="card-header" id="headingOne">
                                    <h5 class="mb-0">
                                        <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                            God male gathering them it female which green cattle?
                                        </button>

                                    </h5>
                                </div>

                                <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                                    <div class="card-body">
                                        Great day without sixth a lesser beginning. Their thing abundantly air moving saw fruitful lesser god. Sea abundantly blessed life set. Land. Lights divided man in deep in open upon.
                                    </div>
                                </div>
                            </div>

                            <div class="card">
                                <div class="card-header" id="headingTwo">
                                    <h5 class="mb-0">
                                        <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                            Moving creepeth moved upon man grass two days?
                                        </button>
                                    </h5>
                                </div>
                                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                                    <div class="card-body">
                                        Great day without sixth a lesser beginning. Their thing abundantly air moving saw fruitful lesser god. Sea abundantly blessed life set. Land. Lights divided man in deep in open upon.
                                    </div>
                                </div>
                            </div>

                            <div class="card">
                                <div class="card-header" id="headingThree">
                                    <h5 class="mb-0">
                                        <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                            God male gathering them it female which green cattle?
                                        </button>
                                    </h5>
                                </div>
                                <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                                    <div class="card-body">
                                        Great day without sixth a lesser beginning. Their thing abundantly air moving saw fruitful lesser god. Sea abundantly blessed life set. Land. Lights divided man in deep in open upon.
                                    </div>
                                </div>
                            </div>

                            <div class="card">
                                <div class="card-header" id="headingFour">
                                    <h5 class="mb-0">
                                        <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                            Saw isn't likeness beginning yielding land days she?
                                        </button>
                                    </h5>
                                </div>
                                <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordionExample">
                                    <div class="card-body">
                                        Great day without sixth a lesser beginning. Their thing abundantly air moving saw fruitful lesser god. Sea abundantly blessed life set. Land. Lights divided man in deep in open upon.
                                    </div>
                                </div>
                            </div>

                            <div class="card">
                                <div class="card-header" id="headingFive">
                                    <h5 class="mb-0">
                                        <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                                            Saw isn't likeness beginning yielding land days she?
                                        </button>
                                    </h5>
                                </div>
                                <div id="collapseFive" class="collapse" aria-labelledby="headingFive" data-parent="#accordionExample">
                                    <div class="card-body">
                                        Great day without sixth a lesser beginning. Their thing abundantly air moving saw fruitful lesser god. Sea abundantly blessed life set. Land. Lights divided man in deep in open upon.
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="col-lg-5">
                        <div class="appointment-form">
                            <h3>Make an Appointment</h3>
                            <form action="#">
                                <div class="form-group">
                                    <label>Full Name</label>
                                    <input type="text" placeholder="Your Name" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Your Name'" required>
                                </div>
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="email" placeholder="Your Email" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Your Email'" required>
                                </div>
                                <div class="form-group">
                                    <label>Message</label>
                                    <textarea name="message" cols="20" rows="7"  placeholder="Message" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Message'" required></textarea>
                                </div>
                                <a href="#" class="main_btn">Make an Appointment</a>
                            </form>
                        </div>
                    </div>
                </div>

            </div>


        </div>
    </section>
    -->
    <!--================ appointment Area End =================-->


    <!-- ================ testimonial section start ================= -->
    <section class="testimonial">
        <div class="container">
            <div class="testi_slider owl-carousel owl-theme">
                <div class="item">
                    <div class="testi_item">
                        <div class="testimonial_image">
                            <img src="dcare/img/elements/tes1.jpg" alt="">
                        </div>
                        <div class="testi_item_content">
                            <p>
                                “ Saw kind fruitful itself in man. All in life good wherein beginning their he air That, the saw very years created for seed have without. Can't him fowl his can not ready for game”
                            </p>
                            <h4>- Dr. Suzanne Holroyd -</h4>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="testi_item">
                        <div class="testimonial_image">
                            <img src="dcare/img/elements/tes1.jpg" alt="">
                        </div>
                        <div class="testi_item_content">
                            <p>
                                “ Saw kind fruitful itself in man. All in life good wherein beginning their he air That, the saw very years created for seed have without. Can't him fowl his can not ready for game”
                            </p>
                            <h4>- Dr. Suzanne Holroyd -</h4>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="testi_item">
                        <div class="testimonial_image">
                            <img src="dcare/img/elements/tes1.jpg" alt="">
                        </div>
                        <div class="testi_item_content">
                            <p>
                                “ Saw kind fruitful itself in man. All in life good wherein beginning their he air That, the saw very years created for seed have without. Can't him fowl his can not ready for game”
                            </p>
                            <h4>- Dr. Suzanne Holroyd -</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ================ testimonial section end ================= -->

@endsection