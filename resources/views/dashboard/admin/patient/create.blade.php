@extends('layouts.main')

@section('content')
    <div class="col-xl-12 col-md-12 col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">
                    Tambah Data
                </h4>
            </div>

            <div class="card-body">
                <div class="mb-1">
                    <a href="/admin/pasien">
                        <button class="btn btn-gradient-secondary">
                            <i class="bi bi-arrow-left"></i>
                            Kembali
                        </button>
                    </a>
                </div>

                <form id="formSubmit" method="POST" action="/admin/pasien" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-1">
                        <label class="form-label" for="email">
                            Email
                        </label>

                        <input type="text" class="form-control" name="email" id="email" placeholder="Masukan Email"
                            autocomplete="off">
                    </div>

                    <div class="mb-1">
                        <label class="form-label" for="password">
                            Password
                        </label>

                        <input type="password" class="form-control" name="password" id="password"
                            placeholder="Masukan Password" autocomplete="off">
                    </div>

                    <div class="mb-1">
                        <label class="form-label" for="name">
                            Nama
                        </label>

                        <input type="text" class="form-control" name="name" id="name"
                            placeholder="Masukan Nama Pasien" autocomplete="off">
                    </div>

                    <div class="mb-1">
                        <label class="form-label" for="address">
                            Alamat
                        </label>

                        <textarea class="form-control" name="address" id="address" placeholder="Masukan Alamat" cols="30" rows="5"></textarea>
                    </div>

                    <div class="mb-1">
                        <label class="form-label" for="identityCardNumber">
                            Nomer KTP
                        </label>

                        <input type="text" class="form-control" name="identityCardNumber" id="identityCardNumber"
                            onkeypress="return inputNumber()" placeholder="Masukan Nama Pasien" autocomplete="off">
                    </div>

                    <div class="mb-1">
                        <label class="form-label" for="phoneNumber">
                            Nomor HP
                        </label>

                        <div class="input-group">
                            <span class="input-group-text">
                                62
                            </span>

                            <input type="text" class="form-control" name="phoneNumber" id="phoneNumber"
                                onkeypress="return inputNumber()"" placeholder="Masukan Nomor HP" autocomplete="off">
                        </div>
                    </div>

                    <hr>

                    <button type="submit" class="btn btn-gradient-primary w-100" id="btnSubmit">
                        <i class="bi bi-check2-circle"></i>
                        Simpan
                    </button>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('custom_js')
    <script>
        $('#formSubmit').submit(function(e) {
            let status = validate();
            let form = this;
            e.preventDefault();

            if (status) {
                confirmSubmit(form);
            }
        });

        function validate() {
            const name = $('#name');
            const address = $('#address');
            const identityCardNumber = $('#identityCardNumber');
            const phoneNumber = $('#phoneNumber');
            const medicalRecordNumber = $('#medicalRecordNumber');

            if (name.val() == '') {
                Swal.fire({
                    icon: "error",
                    text: "Nama pasien tidak boleh kosong !",
                    buttonsStyling: false,
                    customClass: {
                        confirmButton: 'btn btn-gradient-primary',
                    },
                });

                return false;
            }

            if (address.val() == '') {
                Swal.fire({
                    icon: "error",
                    text: "Alamat tidak boleh kosong !",
                    buttonsStyling: false,
                    customClass: {
                        confirmButton: 'btn btn-gradient-primary',
                    },
                });

                return false;
            }

            if (identityCardNumber.val() == '') {
                Swal.fire({
                    icon: "error",
                    text: "Nomer KTP tidak boleh kosong !",
                    buttonsStyling: false,
                    customClass: {
                        confirmButton: 'btn btn-gradient-primary',
                    },
                });

                return false;
            }

            if (phoneNumber.val() == '') {
                Swal.fire({
                    icon: "error",
                    text: "No.HP tidak boleh kosong !",
                    buttonsStyling: false,
                    customClass: {
                        confirmButton: 'btn btn-gradient-primary',
                    },
                });

                return false;
            }

            if (medicalRecordNumber.val() == '') {
                Swal.fire({
                    icon: "error",
                    text: "No.RM tidak boleh kosong !",
                    buttonsStyling: false,
                    customClass: {
                        confirmButton: 'btn btn-gradient-primary',
                    },
                });

                return false;
            }

            return true;
        }
    </script>
@endsection
