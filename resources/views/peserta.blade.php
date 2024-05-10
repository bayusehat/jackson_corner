<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Jackson Event</title>
    <link rel="icon" type="image/png" sizes="192x192" href="{{ asset('assets/img/icon.png') }}">

    <!-- Fonts -->
    <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Styles -->
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.5/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/fixedheader/3.3.2/css/fixedHeader.bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.4.1/css/responsive.bootstrap.min.css">
    <script src="https://cdn.datatables.net/fixedheader/3.3.2/js/dataTables.fixedHeader.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.4.1/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.4.1/js/responsive.bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <script src="https://cdn.datatables.net/buttons/2.4.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.print.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js" integrity="sha512-2ImtlRlf2VVmiGZsjm9bEyhjGW4dU7B6TNwh/hx/iSByxNENtj3WVE6o/9Lj4TJeVXPi4bnOIMXFIJJAeufa0A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" integrity="sha512-nMNlpuaDPrqlEls3IX/Q56H36qvBASwb3ipuo3MxeWbsQB1881ox0cRv7UPTgBlriqoynt35KjEwgGUeUXIPnw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="{{ asset('assets/plugin/jquery.table2excel.js') }}"></script>

    <style>
        body {
            font-family: 'Nunito', sans-serif;
            background-color: whitesmoke;
        }
        .alert-error{
            border-radius: 0;
        }
        .header-event{
            padding: 0 !important;
        }
        #tableListPeserta{
            font-size: 13px;
        }
        .textExcel{
            mso-number-format:"\@";/*force text*/
        }
    </style>
</head>
<body>
<div class="container-fluid mb-3">
{{--    <div class="row">--}}
{{--        <div class="col-md-6" style="background-color: black">--}}
{{--            <img src="{{ asset('assets/img/BG.png')}}" class="img-responsize text-center" width="300px" alt="Logo">--}}
{{--        </div>--}}
{{--        <div class="col-md-6" style="background-color: black">--}}
{{--            <img src="{{ asset('assets/img/logo.png')}}" class="img-responsize text-center float-right" width="300px" alt="Logo2">--}}
{{--        </div>--}}
{{--    </div>--}}
    <div class="row mt-3">
        <div class="col-md-3 col-xl-3 col-sm-12"></div>
        <div class="col-md-6 col-xl-6 col-sm-12">
            <div class="card">
                <div class="card-header header-event">
                    <div class="row">
                        <div class="col-md-12 col-sm-12">
                            <img src="{{ asset('assets/img/header.png')}}" class="img-responsize text-center" width="100%" alt="header">
                        </div>
{{--                        <div class="col-md-6" style="background-color: black">--}}
{{--                            <img src="{{ asset('assets/img/BG.png')}}" class="img-responsize text-center" width="300px" alt="Logo">--}}
{{--                        </div>--}}
{{--                        <div class="col-md-6" style="background-color: black">--}}
{{--                            <img src="{{ asset('assets/img/logo.png')}}" class="img-responsize text-center float-right" width="300px" alt="Logo2">--}}
{{--                        </div>--}}
                    </div>
                </div>
                <div class="form-group" id="errorSection">
                    <div class="alert alert-danger alert-dismissible fade show alert-error" role="alert">
                        <strong>Error!</strong>
                        <div id="errorMessage"></div>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                </div>
                <div class="card-body" id="kop">
                    <table width="100%">
                        <tr>
                            <td><h4>AREA : <span id="kota_display"></span></h4> </td>
                            <td class="text-right">
                                <button class="btn btn-secondary" id="buttonCekData"><i class="fa fa-list"></i> Cek Data Peserta</button>
                            </td>
                        </tr>
                        <tr>
                            <td><h5 id="toko_display"></h5></td>
                        </tr>
                    </table>
                </div>
                <div class="card-body" id="download">
                    <a href="{{ url('peserta/export')  }}" target="_blank" class="btn btn-success btn-block" id="downloadDataPeserta"><i class="fa fa-download"></i> DOWNLOAD DATA PESERTA</a>
                    <a href="{{ url('/doLogout') }}" class="btn btn-danger btn-block"><i class="fa fa-sign-out"></i> Logout</a>
                </div>
                <div class="card-body" id="first-content">
                    <div class="form-group">
                        <label>Pilih Regional <small class="text-danger">*</small></label>
                        <select name="kota" id="kota" class="form-control">
                            <option value="">Pilih Regional</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Pilih Toko <small class="text-danger">*</small></label>
                        <select name="toko" id="toko" class="form-control">
                            <option value=""> Pilih Toko</option>
                        </select>
                    </div>
                    <div class="form-group text-right">
                        <button type="button" class="btn btn-primary " id="nextButton"><i class="fa fa-arrow-right"></i> Next</button>
                    </div>
                </div>
                <div class="card-body" id="next-content">
                    <span class="text-danger"><strong>Note: (*) Wajib diisi</strong></span>
                    <div class="form-group">
                        <label for="nama_peserta">Nama Lengkap<span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="nama_peserta" id="nama_peserta" placeholder="Nama Lengkap" pattern="^[a-zA-Z]+$">
                        <span class="text-danger" id="valid_nama_peserta"></span>
                    </div>
                    <div class="form-group">
                        <label for="tanggal_lahir">Tanggal Lahir Peserta</label>
                        <div class="row">
                            <div class="col-md-6 col-sm-12">
                                <input type="date" name="tanggal_lahir" id="tanggal_lahir" class="form-control">
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <p><strong>Usia</strong> <span id="usia-text"></span> tahun</p>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="kategori">Kategori yang Diikuti</label>
                        <div class="form-check">
                            <input type="radio" value="1" name="kategori_peserta" class="form-check-input">
                            <label class="form-check-label" for="flexCheckChecked">
                                <strong>KATEGORI A</strong> (5-8 tahun)
                            </label>
                        </div>
                        <div class="form-check">
                            <input type="radio" value="2" name="kategori_peserta" class="form-check-input">
                            <label class="form-check-label" for="flexCheckChecked">
                                <strong>KATEGORI B</strong> (9-12 tahun)
                            </label>
                        </div>
                        <small class="text-danger" id="errorKategori"></small>
                    </div>
                    <div class="row">
                        <div class="col-md-6 col-sm-6 col-6">
                            <button type="button" class="btn btn-danger" id="backButtonPage2"><i class="fas fa-arrow-left"></i> Back</button>
                        </div>
                        <div class="col-md-6 col-sm-6 col-6 text-right">
                            <button type="button" class="btn btn-primary" id="nextButtonPage2"><i class="fas fa-arrow-right"></i> Next</button>
                        </div>
                    </div>
                </div>
                <div class="card-body" id="next-content-3">
                    <div class="form-group">
                        <label for="nama_wali">Nama Wali Peserta <smal class="text-danger">*</smal></label>
                        <input type="text" class="form-control" name="nama_wali" id="nama_wali" placeholder="Masukkan Nama Wali Peserta" pattern="^[a-zA-Z]+$">
                    </div>
                    <div class="form-group">
                        <label for="nama_wali">Nomor Handphone Wali Peserta <smal class="text-danger">*</smal></label>
                        <input type="number" class="form-control" name="nomor_handphone_wali" id="nomor_handphone_wali" placeholder="Masukkan Nomor Handphone Wali Peserta">
                    </div>
                    <div class="form-group">
                        <button type="button" class="btn btn-block btn-success btn-lg" id="button-submit" name="button-submit">SUBMIT</button>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <button type="button" class="btn btn-danger" id="backButtonPage3"><i class="fas fa-arrow-left"></i> Back</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-xl-3 col-sm-12"></div>
    </div>
</div>
<!-- Modal -->
<div class="modal" tabindex="-1" role="dialog" id="myModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Summary</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table class="table table-borderless">
                    <tr>
                        <td>Area</td>
                        <td>:</td>
                        <td><span id="sum-area"></span></td>
                    </tr>
                    <tr>
                        <td>Toko</td>
                        <td>:</td>
                        <td><span id="sum-toko"></span></td>
                    </tr>
                </table>
                <hr>
                <table class="table table-borderless">
                    <tr>
                        <td>Nama</td>
                        <td>:</td>
                        <td><span id="sum-nama"></span> </td>
                    </tr>
                    <tr>
                        <td>Tanggal Lahir</td>
                        <td>:</td>
                        <td><span id="sum-ttl"></span> </td>
                    </tr>
                    <tr>
                        <td>Kategori Peserta</td>
                        <td>:</td>
                        <td><span id="sum-kategori-peserta"></span> </td>
                    </tr>
                    <tr>
                        <td>Nama Wali</td>
                        <td>:</td>
                        <td><span id="sum-nama-wali"></span> </td>
                    </tr>
                    <tr>
                        <td>Nomor Handphone Wali</td>
                        <td>:</td>
                        <td><span id="sum-nomor-handphone-wali"></span> </td>
                    </tr>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" id="confirmSummary">Submit</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal" tabindex="-1" role="dialog" id="modalCekData">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">List Data Peserta</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="buttonCloseCekPeserta">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table class="table table-sm table-striped table-hover text-nowrap" id="tableListPeserta">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nama</th>
                            <th>Tanggal Lahir</th>
                            <th>Kategori</th>
                            <th>Wali</th>
                            <th>No. HP Wali</th>
                            <th>Di buat pada</th>
                        </tr>
                    </thead>
                    <tbody id="contentListPeserta">

                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" id="downloadCekData"><i class="fa fa-download"></i> Download Data</button>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function(){
        const user = '{{ auth()->user()->email }}';
        if(user == 'superadmin' || user == 'admin'){
            $("#download").show()
            $("#kop").hide()
            $("#first-content").hide();
            $("#next-content").hide();
            $("#next-content-3").hide();
        }else{
            $("#download").hide();
        }
        const $firstContent = $("#first-content");
        const $nextCotent = $("#next-content");
        const $buttonNextContent = $("#nextButton");
        const $buttonBackPage2 = $("#backButtonPage2");
        const $buttonNextPage2 = $("#nextButtonPage2");
        const $nextContent3 = $("#next-content-3");
        const $buttonBackPage3 = $("#backButtonPage3");
        let $inputKategori = $("input[name='kategori_peserta']:checked");
        const $inputToko = $("#toko");
        const $inputKota = $("#kota");

        $("#errorSection").hide();
        $inputToko.attr('readonly',true);
        $("#kop").hide();
        $nextContent3.hide();
        $nextCotent.hide();

        $("#button-submit").click(function(){
            showSummary();
        })

        $buttonNextContent.click(function(){
            if($("#kota").val() == ''){
                return Swal.fire({
                    title: 'Error!',
                    text: 'Area harus dipilih terlebih dahulu!',
                    icon: 'error',
                    confirmButtonText: 'Back'
                })
            }

            if($("#toko").val() == ''){
                return Swal.fire({
                    title: 'Error!',
                    text: 'Toko harus dipilih terlebih dahulu!',
                    icon: 'error',
                    confirmButtonText: 'Back'
                })
            }
            $("#kota_display").text($("#kota option:selected").text());
            $("#toko_display").text($("#toko option:selected").text());
            $firstContent.hide();
            $nextCotent.show();
            $("#kop").show();
        })

        $buttonBackPage2.click(function(){
            $firstContent.show();
            $nextCotent.hide();
            $("#kop").hide()
        })

        $buttonNextPage2.click(function(){
            if($("#nama_peserta").val() == ''){
                return Swal.fire({
                    title: 'Error!',
                    text: 'Nama Peserta harus diisi terlebih dahulu!',
                    icon: 'error',
                    confirmButtonText: 'Back'
                })
            }

            if($("#tanggal_lahir").val() == ''){
                return Swal.fire({
                    title: 'Error!',
                    text: 'Tanggal lahir harus diisi dahulu terlebih dahulu!',
                    icon: 'error',
                    confirmButtonText: 'Back'
                })
            }

            if(!$("input[name='kategori_peserta']").is(':checked')){
                return Swal.fire({
                    title: 'Error!',
                    text: 'Kategori Peserta harus dipilih terlebih dahulu!',
                    icon: 'error',
                    confirmButtonText: 'Back'
                })
            }

            checkDuplicate($("#kota").val(),$("#toko").val());
        })

        function checkDuplicate(regional,toko){
            $.ajax({
                url : "{{ url('peserta/duplicate') }}/"+regional+'/'+toko,
                method: "GET",
                dataType : "JSON",
                data : {
                    'nama_peserta' : $("#nama_peserta").val(),
                    'tanggal_lahir' : $("#tanggal_lahir").val()
                },
                success:function(res){
                  if(res.status == 400){
                      return Swal.fire({
                          title: 'Error!',
                          text: res.message,
                          icon: 'error',
                          confirmButtonText: 'Back'
                      })
                  }
                }
            }).then((result) => {
                if(result.status == 200){
                    $firstContent.hide();
                    $nextCotent.hide();
                    $nextContent3.show();
                    $("#kop").show()
                }
            });
        }

        $buttonBackPage3.click(function(){
            $firstContent.hide();
            $nextCotent.show();
            $nextContent3.hide();
            $("#kop").show()
        })

        $('#buttonCekData').click(function(){
            const regionalPst = $("#kota").val();
            const tokoPst = $("#toko").val();
            getDataPeserta(regionalPst,tokoPst);
        })

        $("#buttonCloseCekPeserta").click(function (){
            $("#modalCekData").fadeOut()
        })

        function getDataPeserta(regional, toko){
            $("#modalCekData").fadeIn();
            $.ajax({
                url : "{{ url('peserta/list') }}/"+regional+'/'+toko,
                method: "GET",
                dataType : "JSON",
                success:function(res){
                    let html = '';
                    $.each(res.data,function(i,a){
                        if(a.kategori_peserta == 1){
                            var kat = 'Kategori A';
                        }else{
                            var kat = 'Kategori B';
                        }
                        html += `
                        <tr>
                            <td>${i+1}</td>
                            <td>${a.nama_peserta}</td>
                            <td class="textExcel">${formatDate(a.tanggal_lahir)}</td>
                            <td>${kat}</td>
                            <td>${a.nama_wali}</td>
                            <td class="textExcel">${"'"+a.nomor_handphone_wali}</td>
                            <td class="textExcel">${formatDate(a.created_at,1)}</td>
                        </tr>`;
                    })
                    $("#contentListPeserta").html(html);
                }
            })
        }

        $("#downloadCekData").click(function(){
            let fileName = $("#kota option:selected").text() + ' - ' + $("#toko option:selected").text();
            $("#tableListPeserta").table2excel({
                exclude:".noExl",
                name:"Worksheet Name",
                filename:fileName,//do not include extension
                fileext:".xls" // file extension
            })
        })


        $('#tanggal_lahir').on('change', function() {
            var dob = new Date(this.value);
            var today = new Date('2024-06-23');
            var age = Math.floor((today-dob) / (365.25 * 24 * 60 * 60 * 1000));
            $('#usia-text').text(age);
        });

        $("input[name='kategori_peserta']").on('change', function(){
            let usia = $("#usia-text").text();
            if(this.value == 1){
                if(usia >= 5 && usia <= 8){
                    $("#errorKategori").text('');
                }else{
                    $("#errorKategori").text('Usia belum mencukupi / melibihi kategori!');
                }
            }else{
                if(usia >= 9 && usia <= 12){
                    $("#errorKategori").text('');
                }else{
                    $("#errorKategori").text('Usia belum mencukupi / melibihi kategori!');
                }
            }
        })

        let regional = '{{ auth()->user()->id_regional }}';

        const kota = $.ajax({
            url : "{{ url('kota') }}",
            method: "GET",
            dataType : "JSON",
            success:function(res){
                let html = '';
                $.each(res.result,function(i,a){
                    html += `<option value="${a.id}">${a.nama.toUpperCase()}</option>`;
                })
                $("#kota").append(html);
                $("#kota").val(regional).trigger('change').attr('disabled',true);
            }
        })

        $inputKota.change(function(){
            getToko($inputKota.val());
        })
    })

    function formatDate(date, hour = null){
        var gg = new Date(date);
        const tanggal = gg.getDate() < 10 ? '0'+gg.getDate() : gg.getDate();
        const bulan = ((gg.getMonth()) + 1) < 10 ? '0'+((gg.getMonth()) + 1) : ((gg.getMonth()) + 1);
        const jam = hour != null ? ((gg.getHours()) < 10 ? '0'+gg.getHours() : gg.getHours()) +':'+((gg.getMinutes()) < 10 ? '0'+gg.getMinutes() : gg.getMinutes()) : '';
        const resultDate = hour != null ? tanggal+'/'+bulan+'/'+gg.getFullYear()+' '+jam : tanggal+'/'+bulan+'/'+gg.getFullYear();;
        return resultDate;
    }

    function getToko(kota){
        $("#toko").attr('readonly',false);
        $.ajax({
            url : "{{ url('toko') }}/"+kota,
            method: "GET",
            dataType : "JSON",
            success:function(res){
                let html = '';
                html = '<option value="">Pilih Toko</option>';
                $.each(res.result,function(i,a){
                    html += `<option value="${a.id}">${a.code+ '-' +a.nama.toUpperCase()}</option>`;
                })
                $("#toko").html(html);
            }
        })
    }

    function showSummary(){
        if($("#nama_wali").val() == ''){
            return Swal.fire({
                title: 'Error!',
                text: 'Nama wali harus diisi dahulu terlebih dahulu!',
                icon: 'error',
                confirmButtonText: 'Back'
            })
        }

        if($("#nomor_handphone_wali").val() == ''){
            return Swal.fire({
                title: 'Error!',
                text: 'Nomor handphone wali harus diisi dahulu terlebih dahulu!',
                icon: 'error',
                confirmButtonText: 'Back'
            })
        }

        if($("input[name='kategori_peserta']:checked").val() == 1){
            var kat = 'Kategori A (5-8 tahun)';
        }else{
            var kat = 'Kategori B (8-12 tahun)';
        }

        $("#myModal").modal('show');
        $("#sum-area").text($("#kota option:selected").text());
        $("#sum-toko").text($("#toko option:selected").text());
        $("#sum-nama").text($("#nama_peserta").val());
        $("#sum-ttl").text(formatDate($("#tanggal_lahir").val()));
        $("#sum-kategori-peserta").text(kat);
        $("#sum-nama-wali").text($("#nama_wali").val());
        $("#sum-nomor-handphone-wali").text($("#nomor_handphone_wali").val());
    }

    $("#confirmSummary").click(function(){
        addPlayer();
        // setTimeout(function(){
        //     location.reload();
        // },200)

    })

    function addPlayer(){
        // Swal.fire({
        //     title: "Apakah anda yakin telah mengisi dengan benar?",
        //     text: "Jika iya, klik tombol submit.",
        //     icon: 'question',
        //     confirmButtonText: 'Submit',
        //     showCancelButton: true,
        // }).then((result) => {
        //     if(!result.isConfirmed){
        //         return false;
        //         // Swal.fire("Data tidak tersimpan!", "", "info");
        //     }else{
                $.ajax({
                    url : "{{ url('peserta/insert') }}",
                    method : 'POST',
                    data :{
                        'kota' :  $("#kota").val(),
                        'toko' : $("#toko").val(),
                        'nama_peserta' : $("#nama_peserta").val(),
                        'tanggal_lahir' : $("#tanggal_lahir").val(),
                        'kategori_peserta' : $("input[name='kategori_peserta']:checked").val(),
                        'nama_wali' : $("#nama_wali").val(),
                        'nomor_handphone_wali' : $("#nomor_handphone_wali").val()
                    },
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success:function(e){
                        if(e.status == 200){
                            Swal.fire({
                                title: "Success!",
                                text: e.message,
                                icon: 'success',
                                confirmButtonText: 'Confirm'
                            }).then((result) => {
                                if(result.isConfirmed){
                                    location.reload();
                                }
                            });
                        }else if(e.status == 400){
                            let html = '';
                            $.each(e.errors,function(i,a){
                                html += `<li>${a}</li>`;
                            })
                            $("#errorSection").show();
                            $("#errorMessage").append(html);
                            // $("#btnRefresh").show();
                        }else{
                            Swal.fire({
                                title: 'Error!',
                                text: e.message,
                                icon: 'error',
                                confirmButtonText: 'Back'
                            })
                        }
                    }
                })
        //     }
        // })
    }


</script>
</body>
</html>
