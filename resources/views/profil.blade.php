@extends('welcome2')

@section('content')
<div class="row mt-4">
    <div class="col-lg">
        <div class="card z-index-2">
            <div class="card-header pb-0">
                <h6>User</h6>
                <a href="user/create" class="btn btn-primary btn-icon-split">
                  <span class="icon text-white-50">
                      <i class="fas fa-plus"></i>
                  </span>
                  <span class="text">Tambah Data</span>
              </a>
                <div class="card">
                    <div class="table-responsive">
                      <table class="table align-items-center mb-0">
                        <thead>
                          <tr>
                            <th class=" text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">no</th>
                            <th class=" text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">nama</th>
                            <th class=" text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">nama alat</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">level</th>
                            <th class=" text-secondary opacity-7">aksi</th>
                          </tr>
                        </thead>
                        <tbody>
                         
                          @php $no = 1; 
                        @endphp
                        @foreach($sensor as $sensors)
                        <tr>
                            <td style=" text-align: center text-uppercase text-secondary text-xxs font-weight-bolder">{{ $no++ }}</td>
                            <td style=" text-align: center text-uppercase text-secondary text-xxs font-weight-bolder">{{ $sensors->name }}</td>
                            <td style=" text-align: center text-uppercase text-secondary text-xxs font-weight-bolder">{{ $sensors->id_user }}</td>
                            <td style="text-align: center text-uppercase text-secondary text-xxs font-weight-bolder">
                              @if ($sensors->level == 1)
                                  admin</i>
                              @else
                                  user</i>
                              @endif
                          </td>
                            <td style="text-align: center;">
                                <form action="{{ route('user.destroy', $sensors->id) }}" method="post">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}
                                    <div class="btn-group">
                                        
                                        <button class="btn btn-danger btn-sm btn-circle" type="submit" onclick="return confirm('Yakin ingin menghapus data?')" data-toggle="tooltip" title="Hapus"><span class="fas fa-trash"></span></button>
                                    </div>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                  
                        </tbody>
                      </table>
                    </div>
                  </div>
        </div>
    </div>
</div>
@endsection

@section('js')
@endsection