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
                <div class="col-md-4">
                   
                </div>
                <div class="col-md-4 text-center">
                    <img src="{{ asset('assets/img/logo.png')}}" class="img-responsive" width="300px" alt="Logo2">
                </div>
                <div class="col-md-4">

                </div>
            </div>
            <div class="row mt-3">
                <div class="col-md-4 col-xl-4 col-sm-12">
                    
                </div>
                <div class="col-md-4 col-xl-4 col-sm-12">
                    <div class="card">
                        <div class="card-header">
                          Enter your code access
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                {{-- <label for="nama_lengkap"><span class="text-danger">*</span></label> --}}
                                <input type="password" class="form-control" name="code_access" id="code_access" placeholder="Code Access">
                                <span class="text-danger" id="valid_code_access"></span>
                            </div>
                        </div>
                        <div class="card-footer text-muted">
                            <button type="button" class="btn btn-primary btn-block" id="btnSubmit" onclick="getAccess()"><i class="fas fa-save"></i> Submit</button>
                        </div>
                      </div>
                </div>
                <div class="col-md-4 col-xl-4 col-sm-12">
                    
                </div>
            </div>
        </div>
    </body>
    <script>
        function getAccess(){
            $.ajax({
                    url : "{{ url('access/get') }}",
                    method : 'POST',
                    data :{
                        'code_access' : $("#code_access").val(),
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
                            }).then(function(){
                                window.location.href = '{{ url("/") }}';
                            })
                        }else if(e.status == 400){
                            $.each(e.errors,function(i,a){
                                $("#valid_"+i).text(a)
                            })
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
</html>
