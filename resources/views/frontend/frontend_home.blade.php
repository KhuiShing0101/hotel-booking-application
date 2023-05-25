@extends('layouts.frontend_master')

@section('title', 'Hotel Booking :: Home Page')

@section('content')


        <section class="ftco-booking ftco-section ftco-no-pt ftco-no-pb">
            <div class="container">
                <div class="row no-gutters">
                    <div class="col-lg-12">
                    </div>
                </div>
            </div>
        </section>

        {{-- Welcome to Harbor Lights Hotel --}}
        <section class="ftco-section">
            <div class="container">
                <div class="row justify-content-center mb-5 pb-3">
                    <div class="col-md-7 heading-section text-center ftco-animate">
                        <span class="subheading">Welcome to Harbor Lights Hotel</span>
                        <h2 class="mb-4">You'll Never Want To Leave</h2>
                    </div>
                </div>
                <div class="row d-flex">
                    <div class="col-md pr-md-1 d-flex align-self-stretch ftco-animate">
                        <div class="media block-6 services py-4 d-block text-center">
                            <div class="d-flex justify-content-center">
                                <div class="icon d-flex align-items-center justify-content-center">
                                    <span class="flaticon-reception-bell"></span>
                                </div>
                            </div>
                            <div class="media-body">
                                <h3 class="heading mb-3">Friendly Service</h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-md px-md-1 d-flex align-self-stretch ftco-animate">
                        <div class="media block-6 services active py-4 d-block text-center">
                            <div class="d-flex justify-content-center">
                                <div class="icon d-flex align-items-center justify-content-center">
                                    <span class="flaticon-serving-dish"></span>
                                </div>
                            </div>
                            <div class="media-body">
                                <h3 class="heading mb-3">Get Breakfast</h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-md px-md-1 d-flex align-sel Searchf-stretch ftco-animate">
                        <div class="media block-6 services py-4 d-block text-center">
                            <div class="d-flex justify-content-center">
                                <div class="icon d-flex align-items-center justify-content-center">
                                    <span class="flaticon-car"></span>
                                </div>
                            </div>
                            <div class="media-body">
                                <h3 class="heading mb-3">Transfer Services</h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-md px-md-1 d-flex align-self-stretch ftco-animate">
                        <div class="media block-6 services py-4 d-block text-center">
                            <div class="d-flex justify-content-center">
                                <div class="icon d-flex align-items-center justify-content-center">
                                    <span class="flaticon-spa"></span>
                                </div>
                            </div>
                            <div class="media-body">
                                <h3 class="heading mb-3">Suits &amp; SPA</h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-md pl-md-1 d-flex align-self-stretch ftco-animate">
                        <div class="media block-6 services py-4 d-block text-center">
                            <div class="d-flex justify-content-center">
                                <div class="icon d-flex align-items-center justify-content-center">
                                    <span class="ion-ios-bed"></span>
                                </div>
                            </div>
                            <div class="media-body">
                                <h3 class="heading mb-3">Cozy Rooms</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        {{-- Welcome to Harbor Lights Hotel --}}

        {{-- About Harbor Lights Hotel --}}
        <section class="ftco-section ftco-wrap-about ftco-no-pt ftco-no-pb">
            <div class="container">
                <div class="row no-gutters">
                    <div class="col-md-7 order-md-last d-flex">
                        <div class="img img-1 mr-md-2 ftco-animate"
                            style="background-image:url({{ asset('assets/images/about-1.jpg') }});"></div>
                        <div class="img img-2 ml-md-2 ftco-animate"
                            style="background-image:url({{ asset('assets/images/about-2.jpg') }});"></div>
                    </div>
                    <div class="col-md-5 wrap-about pb-md-3 ftco-animate pr-md-5 pb-md-5 pt-md-4">
                        <div class="heading-section mb-4 my-5 my-md-0">
                            <span class="subheading">About Harbor Lights Hotel</span>
                            <h2 class="mb-4">Harbor Lights Hotel the Most Recommended Hotel All Over the World</h2>
                        </div>
                        <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live
                            the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large
                            language ocean.</p>
                        <p><a href="#" class="btn btn-secondary rounded">Reserve Your Room Now</a></p>
                    </div>
                </div>
            </div>
        </section>
        {{-- End About Harbor Lights Hotel --}}

        {{-- Testimony --}}
        <section class="testimony-section">
            <div class="container">
                <div class="row no-gutters ftco-animate justify-content-center">
                    <div class="col-md-5 d-flex">
                        <div class="testimony-img aside-stretch-2"
                            style="background-image:url({{ asset('assets/images/testimony-img.jpg') }});"></div>
                    </div>
                    <div class="col-md-7 py-5 pl-md-5">
                        <div class="py-md-5">
                            <div class="heading-section ftco-animate mb-4">
                                <span class="subheading">Testimony</span>
                                <h2 class="mb-0">Happy Customer</h2>
                            </div>
                            <div class="carousel-testimony owl-carousel ftco-animate">
                                <div class="item">
                                    <div class="testimony-wrap pb-4">
                                        <div class="text">
                                            <p class="mb-4">A small river named Duden flows by their place and supplies it with
                                                the necessary regelialia. It is a paradisematic country, in which roasted parts
                                                of sentences fly into your mouth.</p>
                                        </div>
                                        <div class="d-flex">
                                            <div class="user-img"

                                                style="background-image:url({{ asset('assets/images/person_1.jpg') }});">
                                            </div>
                                            <div class="pos ml-3">
                                                <p class="name">Gerald Hodson</p>
                                                <span class="position">Businessman</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="testimony-wrap pb-4">
                                        <div class="text">
                                            <p class="mb-4">A small river named Duden flows by their place and supplies it with
                                                the necessary regelialia. It is a paradisematic country, in which roasted parts
                                                of sentences fly into your mouth.</p>
                                        </div>
                                        <div class="d-flex">
                                            <div class="user-img"
                                                style="background-image:url({{ asset('assets/images/person_2.jpg') }})">
                                            </div>
                                            <div class="pos ml-3">
                                                <p class="name">Gerald Hodson</p>
                                                <span class="position">Businessman</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="testimony-wrap pb-4">
                                        <div class="text">
                                            <p class="mb-4">A small river named Duden flows by their place and supplies it with
                                                the necessary regelialia. It is a paradisematic country, in which roasted parts
                                                of sentences fly into your mouth.</p>
                                        </div>
                                        <div class="d-flex">
                                            <div class="user-img"
                                                style="background-image: url({{ asset('assets/images/person_3.jpg') }})">
                                            </div>
                                            <div class="pos ml-3">
                                                <p class="name">Gerald Hodson</p>
                                                <span class="position">Businessman</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="testimony-wrap pb-4">
                                        <div class="text">
                                            <p class="mb-4">A small river named Duden flows by their place and supplies it with
                                                the necessary regelialia. It is a paradisematic country, in which roasted parts
                                                of sentences fly into your mouth.</p>
                                        </div>
                                        <div class="d-flex">
                                            <div class="user-img"
                                                style="background-image: url({{ asset('assets/images/person_4.jpg') }})">
                                            </div>
                                            <div class="pos ml-3">
                                                <p class="name">Gerald Hodson</p>
                                                <span class="position">Businessman</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        {{-- End Testimony --}}

         <!-- ROOM SECTION  -->
            <section class="ftco-section ftco-no-pb ftco-room">
                <div class="container-fluid px-0">
                    <div class="row no-gutters justify-content-center mb-5 pb-3">
                <div class="col-md-7 heading-section text-center ftco-animate">
                    <span class="subheading">Hotel Booking</span>
                    <h2 class="mb-4">Our Rooms</h2>
                </div>
                </div>
                <div class="row no-gutters">
                    @php
                        $count = 0;
                        $class = '';
                        $arrow_class= '';
                    @endphp

                    {{-- @foreach($rooms as $room )

                        @php
                            $count++;
                                if($count <= 2)
                                {
                                    $class = "img";
                                    $arrow_class= "left-arrow";
                                }

                                elseif( $count > 2 && $count<5 )
                                {
                                    $class = "img order-md-last ";
                                    $arrow_class= 'right-arrow';
                                }

                                else
                                {
                                    $class = "img";
                                    $arrow_class= "left-arrow";
                                }
                        @endphp
                            <div class="col-lg-6">
                                <div class="room-wrap d-md-flex ftco-animate">
                                    <a href="{{url('/room/detail')}}/{{$room->id}}" class="{{$class}}" style="background-image: url({{ getFullThumbnailPath($room->id, $room->thumbnail)  }});"></a>
                                    <div class="half {{ $arrow_class }} d-flex align-items-center">
                                        <div class="text p-4 text-center">
                                            <p class="star mb-0"><span class="ion-ios-star"></span><span class="ion-ios-star"></span><span class="ion-ios-star"></span><span class="ion-ios-star"></span><span class="ion-ios-star"></span></p>
                                            <p class="mb-0"><span class="price mr-1">{{$room->price_per_day}}</span> <span class="per">per night</span></p>
                                            <h3 class="mb-3"><a href="{{url('/room/detail')}}/{{$room->id}}">{{$room->name}}</a></h3>
                                            <p class="pt-1"><a href="{{url('/room/detail')}}/{{$room->id}}" class="btn-custom px-3 py-2 rounded">View Detail<span class="icon-long-arrow-right"></span></a></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    @endforeach --}}
                </div>

                </div>
            </section>
        <!-- END ROOM SECTION -->

        {{-- Read Blog --}}
        <section class="ftco-section">
            <div class="container">
                <div class="row justify-content-center mb-5 pb-3">
                    <div class="col-md-7 heading-section text-center ftco-animate">
                        <span class="subheading">Read Blog</span>
                        <h2>Recent Blog</h2>
                    </div>
                </div>
                <div class="row d-flex">
                    <div class="col-md-4 d-flex ftco-animate">
                        <div class="blog-entry align-self-stretch">
                            <a href="blog-single.html" class="block-20 rounded"
                                style="background-image:url({{ asset('assets/images/image_1.jpg') }});">
                            </a>
                            <div class="text mt-3 text-center">
                                <div class="meta mb-2">
                                    <div><a href="#">Oct. 30, 2019</a></div>
                                    <div><a href="#">Admin</a></div>
                                    <div><a href="#" class="meta-chat"><span class="icon-chat"></span> 3</a></div>
                                </div>
                                <h3 class="heading"><a href="#">Even the all-powerful Pointing has no control about the blind
                                        texts</a></h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 d-flex ftco-animate">
                        <div class="blog-entry align-self-stretch">
                            <a href="blog-single.html" class="block-20 rounded"
                                style="background-image: url({{ asset('assets/images/image_2.jpg') }});">
                            </a>
                            <div class="text mt-3 text-center">
                                <div class="meta mb-2">
                                    <div><a href="#">Oct. 30, 2019</a></div>
                                    <div><a href="#">Admin</a></div>
                                    <div><a href="#" class="meta-chat"><span class="icon-chat"></span> 3</a></div>
                                </div>
                                <h3 class="heading"><a href="#">Even the all-powerful Pointing has no control about the blind
                                        texts</a></h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 d-flex ftco-animate">
                        <div class="blog-entry align-self-stretch">
                            <a href="blog-single.html" class="block-20 rounded"
                                style="background-image: url({{ asset('assets/images/image_3.jpg') }});">
                            </a>
                            <div class="text mt-3 text-center">
                                <div class="meta mb-2">
                                    <div><a href="#">Oct. 30, 2019</a></div>
                                    <div><a href="#">Admin</a></div>
                                    <div><a href="#" class="meta-chat"><span class="icon-chat"></span> 3</a></div>
                                </div>
                                <h3 class="heading"><a href="#">Even the all-powerful Pointing has no control about the blind
                                        texts</a></h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        {{-- End Read Blog --}}

        {{-- Home Content --}}
        <section class="instagram">
            <div class="container-fluid">
                <div class="row no-gutters justify-content-center pb-5">
                    <div class="col-md-7 text-center heading-section ftco-animate">
                        <span class="subheading">Photos</span>
                        <h2><span>Instagram</span></h2>
                    </div>
                </div>
                <div class="row no-gutters">
                    <div class="col-sm-12 col-md ftco-animate">
                        <a href="<assets/images/insta-1.jpg" class="insta-img image-popup"

                            style="background-image: url({{ asset('assets/images/insta-1.jpg') }});">
                            <div class="icon d-flex justify-content-center">
                                <span class="icon-instagram align-self-center"></span>
                            </div>
                        </a>
                    </div>
                    <div class="col-sm-12 col-md ftco-animate">
                        <a href="<assets/images/insta-2.jpg" class="insta-img image-popup"
                            style="background-image:url({{ asset('assets/images/insta-2.jpg') }});">
                            <div class="icon d-flex justify-content-center">
                                <span class="icon-instagram align-self-center"></span>
                            </div>
                        </a>
                    </div>
                    <div class="col-sm-12 col-md ftco-animate">
                        <a href="<assets/images/insta-3.jpg" class="insta-img image-popup"
                            style="background-image: url({{ asset('assets/images/insta-3.jpg') }});">
                            <div class="icon d-flex justify-content-center">
                                <span class="icon-instagram align-self-center"></span>
                            </div>
                        </a>
                    </div>
                    <div class="col-sm-12 col-md ftco-animate">
                        <a href="<assets/images/insta-4.jpg" class="insta-img image-popup"
                            style="background-image: url({{ asset('assets/images/insta-4.jpg') }});">
                            <div class="icon d-flex justify-content-center">
                                <span class="icon-instagram align-self-center"></span>
                            </div>
                        </a>
                    </div>
                    <div class="col-sm-12 col-md ftco-animate">
                        <a href="<assets/images/insta-5.jpg" class="insta-img image-popup"
                            style="background-image: url({{ asset('assets/images/insta-5.jpg') }});">
                            <div class="icon d-flex justify-content-center">
                                <span class="icon-instagram align-self-center"></span>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </section>
        {{-- End Home Content --}}

        <script>
            $(document).ready(function()
            {
                $.ajax({
                          ype: "POST",
                          url: "/api/rooms",
                         data: ();
                     dataType:  "json",
                    success: function(response)
                    {
                        const data = response data
                        console.log(data)
                    },
                    error:  function(error)
                    {
                        console.log(error, 'error')
                    }
                })
            })
        </script>


@endsection
