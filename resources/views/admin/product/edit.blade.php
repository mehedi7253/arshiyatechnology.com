@extends('admin.layouts.app')
    @section('content')
        <div class="card">
            <div class="card-header">
                <div class="h3">
                    {{ $page }}
                    <a href="{{ route('admin.products.index')}}" type="button" class="btn btn-outline-info btn-secondary btn-sm float-right">
                        <em class="far fa-plus p-1"> </em> Manage Product
                    </a>
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.products.update', $product->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="form-group col-md-12">
                            <label>Product Name <sup class="text-danger font-weight-bold">*</sup></label>
                            <input type="text" name="product_name" placeholder="Enter product name" class="form-control @error('product_name') is-invalid @enderror" value="{{ $product->product_name }}">
                            @error('product_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group col-md-12">
                            <label for="category_id">Category<span class="text-danger">*</span></label>
                            <select class="form-control select2 @error('category_id') is-invalid @enderror" name="category_id[]" multiple="multiple" id="category_id" data-placeholder="Choose ...">
                                @foreach ($categories as $mainCategory)
                                    <optgroup label="{{ $mainCategory->category_name }}">
                                        @foreach ($mainCategory->childCategories as $childCategory)
                                            <option value="{{ $childCategory->id }}">
                                                {{ $childCategory->category_name }}
                                            </option>
                                        @endforeach
                                    </optgroup>
                                @endforeach
                            </select>
                            @error('category_id')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label>Price <sup class="text-danger font-weight-bold">*</sup></label>
                            <input type="text" name="price" placeholder="Enter price" class="form-control @error('price') is-invalid @enderror" value="{{ $product->price }}">
                            @error('price')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label>Discount Price </label>
                            <input type="text" name="discount_price" placeholder="Enter discount price" class="form-control @error('discount_price') is-invalid @enderror" value="{{ $product->discount_price }}">
                            @error('discount_price')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label>Image <sup class="text-danger font-weight-bold">*</sup></label>
                            <input type="file" name="image" class="form-control @error('image') is-invalid @enderror">
                            @error('image')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label>Sub Image </label>
                            <input type="file" name="sub_image[]" multiple class="form-control @error('sub_image') is-invalid @enderror">
                            @error('sub_image')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label>Status <sup class="text-danger font-weight-bold">*</sup></label>
                            <select name="status" class="form-control @error('status') is-invalid @enderror">
                                <option value="active" selected>Active</option>
                                <option value="inactive">In-Active</option>
                            </select>
                            @error('status')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label>Pack Size</label>
                            <input type="text" name="others" class="form-control @error('others') is-invalid @enderror" value="{{ $product->others }}">
                            @error('others')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group col-md-12">
                            <label>Short Description </label>
                            <textarea name="short_description" id="short_description" class="form-control @error('short_description') is-invalid @enderror">{{ $product->short_description }}</textarea>
                            @error('short_description')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group col-md-12">
                            <label>Description </label>
                            <textarea name="long_description" id="long_description" class="form-control @error('long_description') is-invalid @enderror">{{ $product->long_description }}</textarea>
                            @error('long_description')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <input type="submit" class="btn btn-info" value="Update">
                        </div>

                    </div>
                </form>
            </div>
        </div>
    @endsection

    @push('scripts')
        <script>
            $(".select2").select2();
             $(document).ready(function() {
                $('#short_description').summernote({
                    placeholder: 'Enter Short Description',
                    tabsize: 2,
                    height: 200
                });
            });
            $(document).ready(function() {
                $('#long_description').summernote({
                    placeholder: 'Enter Long Description',
                    tabsize: 2,
                    height: 300
                });
            });
        </script>
    @endpush
