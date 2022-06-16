@extends('admin.rooms.base')
@section('action-content')
    <!-- Main content -->
    <section class="content">
        <div class="box">
            <div class="box-header">
                <div class="row">
                    <div class="col-sm-8">
                        <h3 class="box-title">{{__('Rooms')}}</h3>
                    </div>
                    <div class="col-sm-4">
                        <a class="btn btn-primary" href="{{ route('rooms-management.create') }}">{{ __('Add') }} {{ __('Room') }}</a>
                    </div>
                </div>
            </div>

            <!-- /.box-header -->
            <div class="box-body">
                @include('admin.partials.flash-message')
                <div class="messages"></div>
                <div class="row">
                    <div class="col-sm-6"></div>
                    <div class="col-sm-6"></div>
                </div>
                <div id="example2_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
                    <div class="row">
                        <div class="col-sm-12">
                            <table id="example2" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info">
                                <thead>
                                <tr role="row">
                                    <th>{{ __('Image') }}</th>

                                    <th>{{ __('Description') }}</th>
                                    <th>{{ __('Price') }}</th>
                                    <th>{{ __('type') }}</th>
                                    <th>{{ __('Hotel') }}</th>
                                    <th>{{ __('Actions') }}</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($rooms as $room)
                                    <tr role="row" class="odd product-{{$room->id}}">
                                        <input type="hidden" value="{{$room->id}}" />
                                        <td width="10%">
                                            <img src="{{asset($room->image_path)}}" style="width: 120px; height: 120px">
                                        </td>
                                        {{--<td width="20%">--}}
                                            {{--{{$room->name}}<br>--}}
                                        {{--</td>--}}
                                        <td width="20%">
                                            {{$room->description}}<br>
                                        </td>
                                        <td>
                                            {{$room->price}}
                                        </td>
                                        <td>
                                            {{$room->type}}
                                        </td>
                                        <td>
                                            @foreach($hotels as $hotel)
                                                @if($room->hotel_id==$hotel->id)
                                            {{$hotel->name}}
                                                @endif
                                                @endforeach
                                        </td>
                                        <th>
                                            <a href="{{route('rooms-management.edit', $room->id)}}" title="{{__('View')}}">
                                                <i class="material-icons" id="add_answer">
                                                    &#xE254;
                                                </i>
                                            </a>
                                            <a class="delete_product pointer" data-id="{{$room->id}}">
                                                <i class="material-icons" data-toggle="tooltip" title="{{__('Delete')}}" >
                                                    &#xE872;
                                                </i>
                                            </a>
                                        </th>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-7 right">
                            <div class="dataTables_paginate paging_simple_numbers" id="example2_paginate">
{{--                                {{ $rooms->links() }}--}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.box-body -->
        </div>
        <div id="deleteProductModal" class="modal fade">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form>
                        <div class="modal-header">
                            {{--<h4 class="modal-title">Delete Employee</h4>--}}
                            {{--<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>--}}
                        </div>
                        <div class="modal-body">
                            <p>{{ __('Are you sure you want to delete these Room?') }}</p>
                            <p class="text-warning"><small>{{ __('This action cannot be undone.') }}</small></p>
                        </div>
                        <div class="modal-footer">
                            <input type="button" class="btn btn-default" data-dismiss="modal" value="{{__('Cancel')}}">
                            <button type="button" class="btn btn-danger deleteProduct" value="" >{{__('Delete')}}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- /.content -->
    </div>
    <script>
        $(document).ready(function () {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('.delete_product').on('click', function(){
                id = $ (this).data('id');
                $('#deleteProductModal').modal('show');
            });
            $('.deleteProduct').on('click', function(e) {
                e.preventDefault();
                $.ajax({
                    url: "rooms-management/destroy/"+id,
                    method: 'DELETE',
                    data: {
                        id:id
                    },
                    success: function(response){
                        // console.log(response.data);
                        $('#deleteProductModal').modal('hide');
                        $('.product-'+id).remove()
                        var successHtml = '<div class="alert alert-danger">'+
                            '<button type="button" class="close" data-dismiss="alert">&times;</button>'+
                            '<strong><i class="glyphicon glyphicon-ok-sign push-5-r"></i></strong> '+ response.message +
                            '</div>';
                        $('.messages').html(successHtml);
                    }});

            })
        })
    </script>
@endsection
