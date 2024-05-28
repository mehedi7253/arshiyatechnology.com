@extends('admin.layouts.app')
    @section('content')
        <div class="card">
            <div class="card-header">
                <h4><b>Mail Setting</b></h4>
                <a href="{{ route('admin.email-setting.test-mail') }}" class="btn btn-sm btn-primary fs-5"><i class="bx fs-5 bx-mail-send"></i> Test Mail</a>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.email-setting.update') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="row  align-items-center p-3">
                            <div class="col-md-6">
                                <div class="form-group mb-2">
                                    <label class="form-label">Mail Driver</label>
                                    <input class="form-control @error('mail_driver') is-invalid @enderror" type="text"
                                        name="mail_driver" placeholder="" value="{{ $emailConfig->mail_driver }}">
                                    @error('mail_driver')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-2">
                                    <label class="form-label">Mail Host</label>
                                    <input class="form-control @error('mail_host') is-invalid @enderror" type="text" name="mail_host" placeholder="" value="{{ $emailConfig->mail_host }}">
                                    @error('mail_host')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-2">
                                    <label class="form-label">Mail Port</label>
                                    <input class="form-control @error('mail_port') is-invalid @enderror" type="text" name="mail_port" placeholder="" value="{{ $emailConfig->mail_port }}">
                                    @error('mail_port')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-2">
                                    <label class="form-label">Mail UserName</label>
                                    <input class="form-control @error('mail_username') is-invalid @enderror" type="text" name="mail_username" placeholder="" value="{{ $emailConfig->mail_username }}">
                                    @error('mail_username')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-2">
                                    <label class="form-label">Mail Password</label>
                                    <input class="form-control @error('mail_password') is-invalid @enderror" type="text" name="mail_password" placeholder="" value="{{ $emailConfig->mail_password }}">
                                    @error('mail_password')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-2">
                                    <label class="form-label">Mail Encryption</label>
                                    <input class="form-control @error('mail_encryption') is-invalid @enderror" type="text" name="mail_encryption" placeholder="" value="{{ $emailConfig->mail_encryption }}">
                                    @error('mail_encryption')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-2">
                                    <label class="form-label">Mail From Address</label>
                                    <input class="form-control @error('mail_from_address') is-invalid @enderror" type="text" name="mail_from_address" placeholder="" value="{{ $emailConfig->mail_from_address }}">
                                    @error('mail_from_address')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-2">
                                    <label class="form-label">Mail From Name</label>
                                    <input class="form-control @error('mail_from_name') is-invalid @enderror" type="text"  name="mail_from_name" placeholder="" value="{{ $emailConfig->mail_from_name }}">
                                    @error('mail_from_name')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-2">
                                    <label class="form-label">Mail Mailer</label>
                                    <input class="form-control @error('mail_mailer') is-invalid @enderror" type="text"  name="mail_mailer" placeholder="" value="{{ $emailConfig->mail_mailer }}">
                                    @error('mail_mailer')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer p-3">
                        <button type="submit" class="btn btn-primary"><i class="bx bx-save w-2"></i> Update</button>
                    </div>
                </form>
            </div>
        </div>
    @endsection
