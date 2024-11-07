@extends('welcome2')

@section('content')
<div class="container-fluid py-3">
    <div class="row">
        <div class="dropdown">
            <button class="btn bg-gradient-primary dropdown-toggle" type="button" id="dropdownMenuButton"
                data-bs-toggle="dropdown" aria-expanded="false">
                Pilih User
            </button>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                @foreach ($data as $datas)
                    <li><a class="dropdown-item user-selection" href="#" data-user-id="{{ $datas->id_user }}">{{ $datas->id_user }}</a></li>
                @endforeach
            </ul>
        </div>
    </div>
    <div>
        <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
            <li class="breadcrumb-item text-sm">Last Update</li>
            <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark"
                    href="javascript:;">{{ $waktu->time }}</a></li>
            <li class="breadcrumb-item text-sm text-dark active" aria-current="page">
                {{ $waktu->date }}</li>
        </ol>
    </div>

    {{-- Tempat untuk menampilkan data terkait user yang dipilih --}}
    <div id="user-data-container" class="mt-4">
        @include('partials.user_data', ['sensors' => $sensors, 'label' => $label, 'waterTemp' => $waterTemp, 'airTemp' => $airTemp, 'dataph' => $dataph, 'datahumidity' => $datahumidity, 'dataheatindex' => $dataheatindex, 'datatds' => $datatds])
    </div>
</div>
@endsection

@section('js')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function () {
        $('.user-selection').on('click', function (e) {
            e.preventDefault(); // Mencegah redirect default
            var userId = $(this).data('user-id'); // Ambil id_user dari data-user-id

            // Lakukan AJAX request ke server dengan id_user yang dipilih
            $.ajax({
                url: '/sql/' + userId, // Menggunakan route resource Laravel dengan prefix 'sql'
                method: 'GET',
                success: function (response) {
                    // Tampilkan data yang diterima di bagian tertentu
                    $('#user-data-container').html(response.html);
                },
                error: function (xhr, status, error) {
                    console.error('Error status:', status);
                    console.error('Error message:', error);
                    alert('Gagal mengambil data user.');
                }
            });
        });
    });
</script>
@endsection
