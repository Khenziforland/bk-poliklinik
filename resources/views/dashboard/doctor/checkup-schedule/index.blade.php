@extends('layouts.main')

@section('content')
    <div class="col-xl-12 col-md-12 col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">
                    Tabel Data
                </h4>

                <div class="d-flex align-items-center">
                    <a href="/dokter/jadwal-periksa/create">
                        <button class="btn btn-gradient-primary">
                            <i class="bi bi-plus-square"></i>
                            Tambah Data
                        </button>
                    </a>
                </div>
            </div>

            <div class="card-body">
                <table class="table table-striped table-hover dt-responsive datatable">
                    <thead class="text-center">
                        <tr>
                            <th>
                                No
                            </th>

                            <th>
                                Nama Dokter
                            </th>

                            <th>
                                Hari
                            </th>

                            <th>
                                Jam Mulai
                            </th>

                            <th>
                                Jam Selesai
                            </th>

                            <th>
                                Status
                            </th>

                            <th>
                                Aksi
                            </th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
@endsection

@section('custom_js')
    <script>
        $('.datatable').DataTable({
            processing: true,
            serverSide: true,
            ordering: false,
            ajax: "{{ url('/dokter/jadwal-periksa/datatable') }}",
            columnDefs: [{
                targets: "_all",
                className: 'text-center',
            }],
            columns: [{
                    data: 'id',
                    render: function(data, type, row, meta) {
                        return meta.row + meta.settings._iDisplayStart + 1;
                    }
                },

                {
                    data: 'doctorNameCustom',
                    name: 'doctorNameCustom'
                },

                {
                    data: 'day',
                    name: 'day'
                },

                {
                    data: 'start_time',
                    name: 'start_time'
                },

                {
                    data: 'end_time',
                    name: 'end_time'
                },

                {
                    data: 'status',
                    name: 'status'
                },

                {
                    data: 'action',
                    name: 'action',
                    orderable: false,
                    searchable: false
                },
            ],
            language: {
                paginate: {
                    previous: 'Sebelumnya',
                    next: 'Selanjutnya'
                }
            },
        });
    </script>
@endsection
