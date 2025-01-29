@extends('admin.layouts.app')
    @section('content')
        <div class="card">
            <div class="card-header">
                <div class="h3">
                    {{ $page }}
                    <a href="{{ route('admin.menus.index')}}" type="button" class="btn btn-outline-info btn-secondary btn-sm float-right">
                        <em class="far fa-edit p-1"> </em> Manage Menu
                    </a>
                </div>
            </div>
            <div class="card-body">
                <form action="{{route('admin.menus.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="form-group col-md-4 col-sm-12">
                            <label class="form-label">Name <sup class="text-danger">*</sup></label>
                            <input name="name" type="text"
                                class="form-control @error('name') is-invalid @enderror" placeholder="Menu Name"
                                value="{{ old('name') }}">
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group col-md-4 col-sm-12">
                            <label class="form-label">Parent Menu </label>
                            <select id="parent_id" name="parent_id" class="form-control">
                                <option selected value="">Select Parent</option>
                                @foreach ($menus as $menu)
                                    <option value="{{ $menu->id }}"
                                        {{ old('parent_id') == $menu->id ? 'selected' : '' }}>
                                        {{ $menu->name }}</option>
                                @endforeach
                            </select>
                            @error('parent_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group col-md-4 col-sm-12">
                            <label class="form-label">Url <sup class="text-danger">*</sup></label>
                            <input name="url" type="text"
                                class="form-control @error('url') is-invalid @enderror" placeholder="Menu Url"
                                value="{{ old('url') }}">
                            @error('url')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        {{-- <div class="form-group col-md-4 col-sm-12">
                            <label class="form-label">Icon <sup class="text-danger">(fontawsome)</sup></label>
                            <input name="icon" type="text"
                                class="form-control @error('icon') is-invalid @enderror" placeholder="Menu Icon"
                                value="{{ old('icon') }}">
                            @error('icon')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div> --}}
                        <div class="mt-2 form-group col-md-4 col-sm-12">
                            <label class="form-label">Order</label>
                            <input name="order" type="number"
                                class="form-control @error('order') is-invalid @enderror" placeholder="Order"
                                value="{{ old('order') }}">
                            @error('order')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mt-2 form-group col-md-4 col-sm-12">
                            <label class="form-label">Open New Tab <sup class="text-danger">*</sup></label>
                            <select id="is_open_new_tab" name="is_open_new_tab" class="form-control">
                                <option selected value="1"
                                    {{ old('is_open_new_tab') == '1' ? 'selected' : '' }}>
                                    Active</option>
                                <option value="0" {{ old('is_open_new_tab') == '0' ? 'selected' : '' }}>
                                    Inactive
                                </option>
                            </select>
                        </div>
                        <div class="mt-2 form-group col-md-4 col-sm-12">
                            <label class="form-label">Status <sup class="text-danger">*</sup></label>
                            <select id="status" name="is_active" class="form-control">
                                <option selected value="1" {{ old('is_active') == '1' ? 'selected' : '' }}>
                                    Active</option>
                                <option value="0" {{ old('is_active') == '0' ? 'selected' : '' }}> Inactive
                                </option>
                            </select>
                        </div>

                        <div class="form-group col">
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    @endsection
