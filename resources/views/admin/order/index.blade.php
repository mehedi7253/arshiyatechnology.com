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
                                    @if ($order->status == 'pending')
                                        <span class="btn btn-danger btn-sm">Pending</span>
                                    @elseif ($order->status == 'processing')
                                        <span class="btn btn-info btn-sm">Processing</span>
                                    @else
                                        <span class="btn btn-success btn-sm">Complete</span>
                                    @endif
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
