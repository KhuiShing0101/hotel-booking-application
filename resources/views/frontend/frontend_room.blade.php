@extends('layouts.frontend_master')

@section('title', 'Hotel Booking :: Rooms Page')

@section('content')


    <section class="ftco-booking ftco-section ftco-no-pt ftco-no-pb">
        <div class="container">
            <div class="row no-gutters">
                <div class="col-lg-12">
                </div>
            </div>
        </div>
    </section>

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
                    $line  = 1;
                    $class = '';
                    $arrow_class= '';

                @endphp
                @foreach($rooms as $room )

                    @php
                        $count++;
                            if($count > 2)
                            {
                                $line++;
                                $count=1;
                                $class = "img";
                                $arrow_class= "left-arrow";
                            }
                            if ($line%2 == 0)
                            {
                                $class= "img order-md-last";
                                $arrow_class= "right-arrow";
                            }
                            else
                            {
                                $class= "img";
                                $arrow_class="left-arrow";
                            }
                    @endphp

                    <div class="col-lg-6">
                        <div class="room-wrap d-md-flex ftco-animate">
                            {{-- {{dd(getFullThumbnailPath($room->id, $room->thumbnail))}}; --}}
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
                @endforeach
            </div>

            </div>
        </section>
    <!-- END ROOM SECTION -->

@endsection
