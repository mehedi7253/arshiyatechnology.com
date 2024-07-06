@extends('admin.layouts.app')
    @section('content')
        <div class="card">
            <div class="card-header">
                <div class="h3">
                    {{ $page }}
                </div>
            </div>
            <div class="card-body">
                <table class="datatable-init nowrap table table-bordered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Customer Name</th>
                            <th>Customer Phone</th>
                            <th>Amount</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($orders as $i=>$order)
                            <tr>
                                <td>{{ ++$i }}</td>
                                <td>{{ $order->first_name }} {{ $order->last_name }}</td>
                                <td>{{ $order->phone }}</td>
                                <td>{{ $order->total }}</td>
                                <td>
                                    <div class="btn-group">
                                        @if($order->status == 'pending')
                                        <button type="button" class="btn btn-sm btn-outline-warning dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            Pending
                                        </button>
                                        @elseif($order->status == 'inprogress')
                                        <button type="button" class="btn btn-sm btn-outline-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            Processing
                                        </button>
                                        @elseif($order->status == 'complete')
                                        <button type="button" class="btn btn-sm btn-outline-success dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            Delivered
                                        </button>
                                        @elseif($order->status == 'canceled')
                                        <button type="button" class="btn btn-sm btn-outline-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            Canceled
                                        </button>
                                        @endif

                                        <div class="dropdown-menu">
                                        <a class="dropdown-item" href="{{route('admin.order.status',['id'=>$order->id, 'status' => 'inprogress'])}}">
                                            In Progress
                                        </a>
                                        <a class="dropdown-item" href="{{route('admin.order.status',['id'=>$order->id, 'status' => 'complete'])}}">
                                            Delivered
                                        </a>
                                        <a class="dropdown-item" href="{{route('admin.order.status',['id'=>$order->id, 'status' => 'canceled'])}}">
                                            Canceled
                                        </a>
                                    </div>
                                </td>
                                <td>
                                    <a href="{{route('admin.order.details', $order->id)}}" class="btn btn-sm btn-outline-info">view</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endsection


    @section('script')
    <script>
        $(document).ready(function() {
            $('#description').summernote({
                placeholder: 'Enter Description',
                tabsize: 2,
                height: 200
            });
        });
    </script>

    @endsection
