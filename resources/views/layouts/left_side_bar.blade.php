<div class="col-md-3 left_col">
    <div class="left_col scroll-view">
        <div class="navbar nav_title" style="border: 0;">
        <a href="index.php" class="site_title"><i class="fa fa-building"></i> <span>Hotel Booking</span></a>
        </div>

        <div class="clearfix"></div>

        <!-- menu profile quick info -->
        <div class="profile clearfix">
        <div class="profile_pic">
            <img src="{{ URL::asset("assets/images/img.jpg") }}" alt="profile image" class="img-circle profile_img">
        </div>
        <div class="profile_info">
            <span>Welcome,</span>
            <h2 class="text-capitalize">
                Admin
            </h2>
        </div>
        </div>
        <!-- /menu profile quick info -->

        <br />

        <!-- sidebar menu -->
        <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
            <div class="menu_section">
                <ul class="nav side-menu">
                    <li><a><i class="fa fa-building-o"></i> Hotel View <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="{{ route("viewCreate") }}">Create</a></li>
                            <li><a href="{{ route('viewListing') }}">Listing</a></li>
                        </ul>
                    </li>

                    <li><a><i class="fa fa-bed"></i> Hotel Bed <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="{{ route("bedCreate") }}">Create</a></li>
                            <li><a href="{{ route('bedListing') }}">Listing</a></li>
                        </ul>
                    </li>

                    <li><a><i class="fa fa-bicycle"></i> Special Features <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="{{ route("specialFeatureCreate") }}">Create</a></li>
                            <li><a href="{{ route('specialFeatureListing') }}">Listing</a></li>
                        </ul>
                    </li>

                    <li><a><i class="fa fa-spoon"></i> Amenities <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="{{ route('amenitiesCreate') }}">Create</a></li>
                            {{-- <li><a href="{{ route('show_room_amenities') }}">Listing</a></li> --}}
                        </ul>
                    </li>

                    <li><a><i class="fa fa-building"></i> Room <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="{{ route('roomCreate') }}">Create</a></li>
                            <li><a href="{{ route('roomListing') }}">Listing</a></li>
                        </ul>
                    </li>

                    <li><a href="show_reservations.php"><i class="fa fa-ticket"></i> Reservations</a></li>
                </ul>
            </div>
        </div>
        <!-- /sidebar menu -->

    </div>
</div>
