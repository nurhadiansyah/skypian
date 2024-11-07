@extends('welcome2')

@section('content')
    <div class="row mt-4">
        <div class="col-lg">
            <div class="card z-index-2">
                <div class="card-header pb-0">
                    <h6>Tambah Akun </h6>
                </div>

                <div class="card-header p-0 mx-3 mt-3 position-relative z-index-1">
                    <form method="post" action="/user">
                        @csrf
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="name" class="form-control" id="name" name="name" placeholder="username">
                        </div>
                        {{-- <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="name@example.com">
                        </div> --}}
                        <div class="form-group">
                            <label for="password">Pasword</label>
                            <input type="password" class="form-control" id="password" name="password" >
                        </div>
                        <div class="form-group">
                            <label for="level">Role</label>
                            <div class="input-group col-md-8">
                                <div class="form-check-inline">
                                    <label class="form-check-label" style="padding: 6px 10px 0px 0px;">
                                        <input type="radio" id="level" name="level" class="form-check-input minimal" value="0"
                                            required> user
                                    </label>
                                    <label class="form-check-label">
                                        <input type="radio" id="level" name="level" class="form-check-input minimal" value="1"
                                            required> admin
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="id_user">Nama alat</label>
                            <select class="form-control" id="id_user" name="id_user">
                                <option style="text-transform: capitalize" value="Null"></option>
                                @foreach ($uniqueUsers as $user)
                                    <option style="text-transform: capitalize" value="{{ $user }}">
                                        {{ $user }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group" style="float: right">
                            <div class="row">
                                <label class="col-md-4 control-label" for="name"></label>
                                <div class="input-group col-md-8">
                                    <button type="submit" class="btn btn-primary"
                                        style="margin-right: 6px;">Simpan</button>
                                    <a href="{{ route('user.index') }}" class="btn btn-danger">Batal</a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @foreach ($sensor as $sensors)
    @endforeach
@endsection
