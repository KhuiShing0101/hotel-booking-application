@extends("layouts.master")
@section("title", "Hotel Booking::Show Room")
@section("content")
    <!-- page content -->
    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>Hotel Room Listing</h3>
                </div>
            </div>

            <div class="row" style="display: block;">
                <div class="col-md-12 col-sm-12  ">
                    <div class="x_panel">
                        <div class="x_content">
                            <div class="table-responsive">
                                <table class="table table-striped jambo_table bulk_action">
                                    <thead>
                                        <tr class="headings">
                                            <th>
                                                <input type="checkbox" id="check-all" class="flat">
                                            </th>
                                            <th class="column-title">Id </th>
                                            <th class="column-title">Name </th>
                                            <th class="column-title">Type </th>
                                            <th class="column-title">Occupancy </th>
                                            <th class="column-title">Bed </th>
                                            <th class="column-title">Size </th>
                                            <th class="column-title">View </th>
                                            <th class="column-title">Price </th>
                                            <th class="column-title">Extra Bed Price </th>
                                            <th class="column-title">Action </th>
                                            <th class="bulk-actions" colspan="12">
                                            <a class="antoo" style="color:#fff; font-weight:500;"> ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data as $room)
                                            <tr class="even pointer">
                                                <td class="a-center ">
                                                    <input type="checkbox" class="flat" name="table_records">
                                                </td>
                                                <td class=" ">{{ $room->id }}</td>
                                                <td class=" ">{{ $room->name }}</td>
                                                <td class=" ">{{ $room->type }}</td>
                                                <td class=" ">{{ $room->occupancy }}</td>
                                                <td class=" ">
                                                    @if ($room->getBed() != null)
                                                        {{ $room->getBed->name }}
                                                    @endif
                                                </td>
                                                <td class=" ">{{ $room->size }}</td>
                                                <td class=" ">
                                                    @if ($room->getView() != null)
                                                        {{ $room->getView->name }}
                                                    @endif
                                                </td>
                                                <td class=" ">{{ $room->price_per_day }}</td>
                                                <td class=" ">{{ $room->extra_bed_price_per_day }}</td>
                                                <td class=" ">
                                                    <a href="" class="btn btn-info btn-sm">
                                                        <i class="fa fa-pencil"></i> Edit
                                                    </a>
                                                    <a href="{{ url('/backend/room/image/manage/' . $room->id) }}" class="btn btn-secondary btn-sm">
                                                        <i class="fa fa-photo"></i> Edit Photo
                                                    </a>
                                                    <a href="" class="btn btn-danger btn-sm">
                                                        <i class="fa fa-trash"></i> Delete
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                {!! $data->links() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /page content -->
@endsection

