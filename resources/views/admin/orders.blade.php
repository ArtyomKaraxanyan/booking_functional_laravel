@extends('admin.rooms.base')
@section('action-content')
    <!-- Main content -->
    <section class="content">
        <div class="box">
            <div class="box-header">
                <div class="row">
                    <div class="col-sm-8">
                        <h3 class="box-title">{{__('Orders')}}</h3>
                    </div>
                    <div class="col-sm-4">
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
                                    <th>{{ __('user_name') }}</th>
                                    <th>{{ __('user_email') }}</th>
                                    <th>{{ __('user_phone') }}</th>
                                    <th>{{ __('product_name') }}</th>
                                    <th>{{ __('product_code') }}</th>
                                    <th>{{ __('product_price') }}</th>
                                    <th>{{ __('count') }}</th>
                                    <th>{{ __('total_price') }}</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($orders as $order)
                                    <tr role="row" class="odd product-{{$order->id}}">
                                        <input type="hidden" value="{{$order->id}}" />
                                        <td width="20%">
                                            {{$order->user_name}}<br>
                                        </td>
                                        <td width="20%">
                                            {{$order->user_email}}<br>
                                        </td>
                                        <td>
                                            {{$order->user_phone}}
                                        </td>
                                        <td>
                                            {{$order->product_name}}
                                        </td>
                                        <td>
                                            {{$order->product_code}}
                                        </td>
                                        <td>
                                            {{$order->product_price}}
                                        </td>
                                        
                                        <td>
                                            {{$order->count}}
                                        </td>
                                        <td>
                                            {{$order->total_price}}
                                        </td>
                                       
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-7 right">
                        
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
                            <p>{{ __('Are you sure you want to delete these product?') }}</p>
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
    
    </script>
@endsection
