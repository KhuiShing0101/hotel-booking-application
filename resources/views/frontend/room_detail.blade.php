@extends('layouts.frontend_master')

@section('title', 'Hotel Booking :: Room Detail Page')

@section('content')

    <section class="ftco-section">
    <div class="container">
        <div class="row">
        <div class="col-lg-8">
            <div class="row">
                {{-- {{dd($rooms)}} --}}
                <div class="col-md-12 ftco-animate">
                    <div class="single-slider owl-carousel">
                        @if ($rooms->getRoomGalleriesByRoom() != null)
                            @foreach ($rooms->getRoomGalleriesByRoom as $gallery)
                                <div class="item">
                                    <div class="room-img" style="background-image: url('{{ getFullImagePath($rooms->id, $gallery->image_name) }}')"></div>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>


                <div class="col-md-12 room-single mt-4 mb-5 ftco-animate">
                    <h2 class="mb-4">{{$rooms->name}} <span>({{$rooms->type}})</span></h2>
                    <p> ({{$rooms->description}}) </p>
                    <div class="d-md-flex mt-5 mb-5">
                        <ul class="list">
                            <li><span>Occupancy:</span> {{$rooms->occupancy}} </li>
                            <li><span>Size:</span>{{$rooms->size}} </li>
                        </ul>
                        <ul class="list ml-md-5">
                            <li><span>View:</span>{{$rooms->getView->name}}</li>
                            <li><span>Bed:</span>{{$rooms->getBed->name}}</li>
                        </ul>
                    </div>
                    <p>({{$rooms->detail}})</p>
                </div>
            </div>
        </div> <!-- .col-md-8 -->
        <div class="col-lg-4 sidebar ftco-animate pl-md-5">
            <div class="sidebar-box ftco-animate">
            <div class="categories">
                <h3>Special Features</h3>

                    @if ($rooms->getRoomSpecialFeatureNameByRoomId() != null)
                        @foreach ($rooms->getRoomSpecialFeatureNameByRoomId as $specialFeatures )
                            @if ($specialFeatures->getSpecialFeatureNameBySpecialFeatureId() !=null)
                                <li><a href="javascript:void(0)">{{$specialFeatures->getSpecialFeatureNameBySpecialFeatureId->name}}</li>
                            @endif
                        @endforeach
                    @endif

            </div>
            </div>

            <div style="height: 50px;"></div>

            <div class="sidebar-box ftco-animate">
                <div class="categories">
                    <h3>Amenities</h3>

                    @if ($rooms->getRoomAmenityNameByAmenityId() != null)
                        @foreach ( $rooms->getRoomAmenityNameByAmenityId as $amenity )
                            @if ($specialFeatures->getSpecialFeatureNameBySpecialFeatureId() !=null)
                                <li><a href="javascript:void(0)">{{$amenity->getRoomAmenityNameByAmenityId->name}}</a></li>
                            @endif
                        @endforeach
                    @endif

                </div>
            </div>

        </div>
        <a href="{{url('')}}" class="btn btn-success">Make Reservation example</a>
        </div>
    </div>
    </section>

@endsection
