@extends('admin.rooms.base')
@section('action-content')
    <!-- Main content -->
    <section class="content">
        <div class="box">
            <div class="box-header">
                <div class="row">
                    <div class="col-sm-8">
                        <h3 class="box-title">{{__('Hotels')}}</h3>
                    </div>
                    <div class="col-sm-4">
                        <a class="btn btn-primary" href="{{ route('hotels-management.create') }}">{{ __('Add') }} {{ __('Hotels') }}</a>
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
                                    <th>{{ __('Name') }}</th>
                                    <th>{{ __('Description') }}</th>
                                    <th>{{ __('Address') }}</th>
                                    <th>{{ __('Actions') }}</th>

                                </tr>
                                </thead>
                                <tbody>
                                @foreach($hotels as $hotel)
                                    <tr role="row" class="odd category-{{$hotel->id}}">
                                        <input type="hidden" value="{{$hotel->id}}" />
                                        <td width="10%">
                                            <img src="{{asset($hotel->image_path)}}" style="width: 120px; height: 120px">
                                        </td>
                                        <td width="20%">
                                            {{$hotel->name}}
                                            <br>

                                        </td>
                                        <td width="60%">
                                            {{$hotel->description}}<br>

                                        </td>
                                        <td width="20%">
                                            {{$hotel->address}}<br>

                                        </td>
                                        <td width="10%">
                                            <a href="{{ route('hotels-management.edit',$hotel->id) }}"  class="edit_question" data-id="{{$hotel->id}}">
                                                <i class="material-icons" data-toggle="tooltip" title="{{__('global.edit')}}">&#xE254;</i>
                                            </a>
                                            <a class="delete_category pointer" data-id="{{$hotel->id}}">
                                                <i class="material-icons" data-toggle="tooltip" title="{{__('Delete')}}" >
                                                    &#xE872;
                                                </i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-7 right">
                            <div class="dataTables_paginate paging_simple_numbers" id="example2_paginate">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.box-body -->
        </div>
        <div id="deleteCategoryModal" class="modal fade">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form>
                        <div class="modal-header">
                        </div>
                        <div class="modal-body">
                            <p>{{ __('Are you sure you want to delete these Hotel?') }}</p>
                            <p class="text-warning"><small>{{ __('This action cannot be undone.') }}</small></p>
                        </div>
                        <div class="modal-footer">
                            <input type="button" class="btn btn-default" data-dismiss="modal" value="{{__('Cancel')}}">
                            <button type="button" class="btn btn-danger deleteCategory" value="" >{{__('Delete')}}</button>
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

            $('.delete_category').on('click', function(){
                id = $ (this).data('id');
                $('#deleteCategoryModal').modal('show');
            });
            $('.deleteCategory').on('click', function(e) {
                e.preventDefault();
                $.ajax({
                    url: "hotels-management/destroy/"+id,
                    method: 'DELETE',
                    data: {
                        id:id
                    },
                    success: function(response){
                        // console.log(response.data);
                        $('#deleteCategoryModal').modal('hide');
                        $('.category-'+id).remove()
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
