@extends('admin.layouts.app')
    @section('content')
        <div class="card">
            <div class="card-header">
                <div class="h3">
                    {{ $page }}
                    <a href="{{ route('admin.products.create')}}" type="button" class="btn btn-outline-info btn-secondary btn-sm float-right">
                        <em class="far fa-plus p-1"> </em> Add New Product
                    </a>
                </div>
            </div>
            <div class="card-body">
                <table class="datatable-init nowrap table table-bordered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Prodcut Name</th>
                            <th>Image</th>
                            <th>Price</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $i=>$product)
                            <tr>
                                <td>{{ ++$i }}</td>
                                <td>{{ $product->product_name }}</td>
                                <td>
                                    <img src="{{ asset($product->image) }}" width="100px" height="50px">
                                </td>
                                <td>
                                   @if ($product->discount_price == true)
                                        <span>{{ number_format($product->discount_price, 2) }}</span> <del>{{ number_format($product->price,2) }}</del>
                                   @else
                                        {{ $product->price }}
                                   @endif
                                </td>
                                <td>
                                    <form action="{{ route('admin.products.destroy', $product->id) }}" method="POST">
                                        <a href="{{ route('admin.products.edit', $product->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endsection
