@extends('admin.rooms.base')
@section('action-content')
    <!-- Main content -->
    <section class="content">
        <div class="box">
            <div class="box-header">
                <div class="row">
                    <div class="col-sm-8">
                        <h3 class="box-title">{{__('About')}}</h3>
                    </div>
                    <div class="col-sm-4">
                        <a class="btn btn-primary" href="{{ route('about-management.create') }}">{{ __('Add') }} {{ __('About') }}</a>
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

                                    <th>{{ __('Name') }}</th>
                                    <th>{{ __('Description') }}</th>
                                    <th>{{ __('Actions') }}</th>

                                </tr>
                                </thead>
                                <tbody>
                                @foreach($abouts as $about)
                                    <tr role="row" class="odd post-{{$about->id}}">
                                        <input type="hidden" value="{{$about->id}}" />
                                        <td>
                                            {{$about->name}}<br>

                                        </td>

                                        <td>
                                            {{$about->description}}<br>

                                        </td>
                                        <td>
                                            <a href="{{ route('about-management.edit',$about->id) }}"  class="edit_question" data-id="{{$about->id}}">
                                                <i class="material-icons" data-toggle="tooltip" title="{{__('global.edit')}}">&#xE254;</i>
                                            </a>
                                            <a class="delete_post pointer" data-id="{{$about->id}}">
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
{{--                    <div class="row">--}}
{{--                        <div class="col-sm-7 right">--}}
{{--                            <div class="dataTables_paginate paging_simple_numbers" id="example2_paginate">--}}
{{--                                {{ $posts->links() }}--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
            <!-- /.box-body -->
        </div>
        <div id="deletePostModal" class="modal fade">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form>
                        <div class="modal-header">
                            {{--<h4 class="modal-title">Delete Employee</h4>--}}
                            {{--<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>--}}
                        </div>
                        <div class="modal-body">
                            <p>{{ __('Are you sure you want to delete these post?') }}</p>
                            <p class="text-warning"><small>{{ __('This action cannot be undone.') }}</small></p>
                        </div>
                        <div class="modal-footer">
                            <input type="button" class="btn btn-default" data-dismiss="modal" value="{{__('Cancel')}}">
                            <button type="button" class="btn btn-danger deletePost" value="" >{{__('Delete')}}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
    <script>

        $(document).ready(function () {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('.delete_post').on('click', function(){
                id = $ (this).data('id');
                $('#deletePostModal').modal('show');
            });
            $('.deletePost').on('click', function(e) {
                e.preventDefault();
                $.ajax({
                    url: "about-management/destroy/"+id,
                    method: 'DELETE',
                    data: {
                        id:id
                    },
                    success: function(response){
                        // console.log(response.data);
                        $('#deletePostModal').modal('hide');
                        $('.post-'+id).remove();
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
