@extends("layouts.master")
@section("title", "Hotel Booking::Show Special Feature")
@section("content")
    <!-- page content -->
    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>Show Bed Views</h3>
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
                                            <th class="column-title">Action </th>
                                            <th class="bulk-actions" colspan="7">
                                            <a class="antoo" style="color:#fff; font-weight:500;"> ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data as $key => $special_feature)
                                            <tr class="even pointer">
                                                <td class="a-center ">
                                                    <input type="checkbox" class="flat" name="table_records">
                                                </td>
                                                <td class=" ">{{ $special_feature->id }}</td>
                                                <td class=" ">{{ $special_feature->name }}</td>
                                                <td class=" ">
                                                    <a href="{{ url("/backend/special-feature/edit/$special_feature->id") }}" class="btn btn-info btn-sm">
                                                        <i class="fa fa-pencil"></i> Edit
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

         