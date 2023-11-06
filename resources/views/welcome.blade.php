<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Badminton Corner</title>
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
        
        <style>
            body {
                font-family: 'Nunito', sans-serif;
                background-color: grey;
            }
        </style>
    </head>
    <body>
        <div class="container-fluid mb-3">
            <div class="row">
                <div class="col-md-6" style="background-color: black">
                    <img src="{{ asset('assets/img/BG.png')}}" class="img-responsize text-center" width="300px" alt="Logo">
                </div>
                <div class="col-md-6" style="background-color: black">
                    <img src="{{ asset('assets/img/logo.png')}}" class="img-responsize text-center float-right" width="300px" alt="Logo2">
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-md-6 col-xl-6 col-sm-12">
                    <div class="card">
                        <div class="card-header">
                          Form
                        </div>
                        <div class="card-body">
                            <span class="text-danger"><strong>Note: (*) Wajib diisi</strong></span>
                            <hr>
                            <div class="form-group">
                                <label for="nama_lengkap">Nama Lengkap<span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="nama_lengkap" id="nama_lengkap" placeholder="Nama Lengkap">
                                <span class="text-danger" id="valid_nama_lengkap"></span>
                            </div>
                            <div class="form-group">
                                <label for="gender">Gender<span class="text-danger">*</span></label>
                                <select name="gender" id="gender" class="form-control">
                                    <option value="LAKI-LAKI">Laki-laki</option>
                                    <option value="PEREMPUAN">Perempuan</option>
                                </select>
                                <span class="text-danger" id="valid_gender"></span>
                            </div>
                            <div class="form-group">
                                <label for="usia">Usia<span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="usia" id="usia" placeholder="Usia">
                                <span class="text-danger" id="valid_usia"></span>
                            </div>
                            <div class="form-group">
                                <label for="whatsapp_number">Whatsapp Number<span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="whatsapp_number" id="whatsapp_number" placeholder="089232490XXXX">
                                <span class="text-danger" id="valid_whatsapp_number"></span>
                            </div>
                            <div class="form-group">
                                <label for="email">E-mail<span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="email" id="email" placeholder="E-mail">
                                <span class="text-danger" id="valid_email"></span>
                            </div>
                            <div class="form-group">
                                <label for="username_instagram">Username Instagram (Tanpa "@")</label>
                                <input type="text" class="form-control" name="username_instagram" id="username_instagram" placeholder="Username Instagram">
                                <span class="text-danger" id="valid_username_instagram"></span>
                            </div>
                            <div class="form-group">
                                <label for="nama_komunitas">Nama Komunitas (Optional)</label>
                                <input type="text" class="form-control" name="nama_komunitas" id="nama_komunitas" placeholder="Nama Komunitas">
                                <span class="text-danger" id="valid_nama_komunitas"></span>
                            </div>
                            <div class="form-group">
                                <label for="know_jackson_active">Apakah sebelumnya tahu Jackson Active?<span class="text-danger">*</span></label>
                                <select name="know_jackson_active" id="know_jackson_active" class="form-control" onchange="knowJackson()">
                                    <option value="">Pilih Jawaban</option>
                                    <option value="YA">YA</option>
                                    <option value="TIDAK">TIDAK</option>
                                </select>
                                <span class="text-danger" id="valid_know_jackson_active"></span>
                            </div>
                            <div class="form-group kjf">
                                <label for="know_jackson_from">Darimana mengetahui brand Jackson Active?<span class="text-danger">*</span></label>
                                <select name="know_jackson_from" id="know_jackson_from" class="form-control" onchange="otherFunc()">
                                    <option value="">Pilih Jawaban</option>
                                    <option value="SOSMED">Sosmed</option>
                                    <option value="TEMAN/KERABAT">Teman/Kerabat</option>
                                    <option value="OFFLINE STORE">Offline Store</option>
                                    <option value="OTHERS">Others</option>
                                </select>
                                <span class="text-danger" id="valid_know_jackson_from"></span>
                            </div>
                            <div class="form-group oa">
                                <label for="other_answer">Jawaban Lain : </label>
                                <input type="text" class="form-control" name="other_answer" id="other_answer" placeholder="Jawaban lain">
                                <span class="text-danger" id="valid_other_answer"></span>
                            </div>
                        </div>
                        <div class="card-footer text-muted">
                            <button type="button" class="btn btn-primary btn-block" id="btnSubmit" onclick="addPlayer()">Create</button>
                        </div>
                      </div>
                </div>
                <div class="col-md-6 col-xl-6 col-sm-12">
                    <div class="card text-center">
                        <div class="card-header">
                          List registered
                        </div>
                        <div class="card-body">
                            <table class="table table-striped table-responsive display compact" id="tableTicket" width="100%">
                                <thead>
                                  <tr>
                                    <th>No</th>
                                    <th>Nama Lengkap</th>
                                    <th>Whatsapp</th>
                                    <th>Username IG</th>
                                    <th>Created</th>
                                    <th>Action</th>
                                  </tr>
                                </thead>
                                <tbody>
    
                                </tbody>
                              </table>
                        </div>
                        {{-- <div class="card-footer text-muted">
                          2 days ago
                        </div> --}}
                      </div>
                </div>
            </div>
        </div>
        <script>
            $(document).ready(function(){
                $(".oa").hide();
                $(".kjf").hide();
                
            })
            function otherFunc(){
                var kjf = $("#know_jackson_from").val();
                if(kjf == 'OTHERS'){
                    $(".oa").show();
                }else{
                    $(".oa").hide();
                }
            }

            function knowJackson(){
                var kjf = $("#know_jackson_active").val();
                if(kjf == 'YA'){
                    $(".kjf").show();
                }else{
                    $(".kjf").hide();
                }
            }

            var id_event = $("#event_choose").val();
            var table = new DataTable('#tableTicket',{
            dom: 'Bfrtip',
            buttons: [
                'copy', 'excel', 'pdf'
            ],
            processing: true,
            serverSide: true,
            destroy: true,
            paging: true,
            responsive: true,
            ajax: {
                url: '{{ url("player/load") }}'
            },
            columns: [
                { name: 'DT_RowIndex', data: 'DT_RowIndex', searchable: false },
                { name: 'nama_lengkap', data: 'nama_lengkap'},
                { name: 'whatsapp_number', data: 'whatsapp_number'},
                { name: 'username_instagram', data: 'username_instagram'},
                { name: 'created_at', data: 'created_at'},
                { name: 'action' , data: 'action'}
            ],
            lengthMenu: [10,50,-1],
            order: [[3, 'desc']],
            });

            function addPlayer(){
                $.ajax({
                    url : "{{ url('player/insert') }}",
                    method : 'POST',
                    data :{
                        'nama_lengkap' : $("#nama_lengkap").val(),
                        'gender' : $("#gender").val(),
                        'whatsapp_number' : $("#whatsapp_number").val(),
                        'email' : $("#email").val(),
                        'username_instagram' : $("#username_instagram").val(),
                        'usia' : $("#usia").val(),
                        'nama_komunitas' : $("#nama_komunitas").val(),
                        'know_jackson_active' : $("#know_jackson_active").val(),
                        'know_jackson_from' : $("#know_jackson_from").val(),
                        'other_answer' : $("#other_answer").val()
                    },
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success:function(e){
                        if(e.status == 200){
                            $("#nama_lengkap").val(""),
                            $("#gender").val(""),
                            $("#whatsapp_number").val(""),
                            $("#email").val(""),
                            $("#username_instagram").val(""),
                            $("#usia").val(""),
                            $("#nama_komunitas").val(""),
                            $("#know_jackson_active").val("").trigger('change'),
                            $("#know_jackson_from").val("").trigger('change'),
                            $("#other_answer").val("").hide();
                            Swal.fire({
                                title: "Success!",
                                text: e.message,
                                icon: 'success',
                                confirmButtonText: 'Confirm'
                            })
                            table.ajax.reload(null,false);
                        }else if(e.status == 400){
                            $.each(e.errors,function(i,a){
                                $("#valid_"+i).text(a)
                            })
                            $("#btnRefresh").show();
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
            }

            function deletePlayer(id){
                $.ajax({
                    url : "{{ url('player/delete') }}/"+id,
                    method : "GET",
                    dataType: "JSON",
                    success:function(e){
                        if(e.status == 200){
                            Swal.fire({
                                title: "Success!",
                                text: e.message,
                                icon: 'success',
                                confirmButtonText: 'Confirm'
                            })
                            table.ajax.reload(null,false);
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
            }
        </script>
    </body>
</html>
