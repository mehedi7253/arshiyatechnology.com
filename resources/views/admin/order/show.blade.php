@extends('admin.layouts.app')
    @section('content')
        <div class="card">
            <div class="card-header">
                <div class="h3">
                    {{ $page }}
                </div>
            </div>
            <div class="card-body">
                <div class="">
                    <label>Customer Name: {{ $order->first_name. ' ' .$order->last_name }}</label><br/>
                    <label>Customer Email: {{ $order->email }}</label><br/>
                    <label>Customer Phone: {{ $order->phone }}</label><br/>
                    <label>Customer Address: {{ $order->address }}</label><br/>
                </div>
                <hr/>
                <p>Order Details</p>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Product Name</th>
                                <th>Quantity</th>
                                <th>Price</th>
                            </tr>
                        </thead>
                        <tbody>
                            {{-- {{  $order->orderDetails }} --}}
                            @foreach ($order->orderDetails as $i=>$item)
                                <tr>
                                    <td>{{ ++$i }}</td>
                                    <td>{{ $item->product_name }}</td>
                                    <td>{{ $item->quantity }}</td>
                                    <td>{{ number_format($item->quantity * $item->price,2) }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="2" class="text-left"></td>
                                <td colspan="1" class="text-left">Total</td>
                                <td colspan="1"">{{ number_format($order->total,2) }}</td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
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
