<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Import - Export Excel & CSV File to Database | Laravel version 10 | Tuantq </title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <div class="container-fluid">
            <div class="container1">
                <div class="card1 card-outline1 card-primary1 mt-3 mb-3">
                    <div class="card-header text-center">
                        <h1>Import - Export Excel & CSV File</h1>
                    </div>
                    <div class="card-body">
                        <div class="container flex flex-col">
                            <form action="{{ route('items.import') }}" method="POST" enctype="multipart/form-data" id="formImport">
                                @csrf
                                <input type="file" name="file" id="file"
                                    class="form-control {{ Session::has('message') ? 'border-danger' : '' }}">
                                <br>
                                <button class="btn btn-primary">
                                    <span class="fa fa-upload"> </span> Import Data</button>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Content Wrapper. Contains page content -->
        <div class="container-fluid">
            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="card">
                        <form action="{{ route('items.clear') }}" method="POST">
                            @csrf
                            <button class="btn btn-danger" id="clearDB">
                                <span class="fa fa-trash-alt mr-2"> </span> Clear DB</button>
                        </form>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="card card-primary card-outline">
                                {{-- <div class="card-header">
                                    <h3 class="card-title">List Items</h3>
                                </div> --}}
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <table id="example1" class="table table-bordered table-striped table-hover my-2"
                                        width="100%">
                                        <thead>
                                            <tr>
                                                <th>Host</th>
                                                <th>Risk</th>
                                                <th>Base</th>
                                                <th>Protocol</th>
                                                <th>Port</th>
                                                <th>CVE</th>
                                                <th>Category Order</th>
                                                <th>Name</th>
                                                <th>Synopsis</th>
                                                <th>Description</th>
                                                <th>Solution</th>
                                                <th>Plugin</th>
                                                <th>Zone</th>
                                                <th>Site</th>
                                                <th>Unit</th>
                                                <th>SO</th>
                                                <th>Note</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($items as $item)
                                                <tr>
                                                    <td>{{ $item->host }}</td>
                                                    <td>{{ $item->risk }}</td>
                                                    <td>{{ $item->base }}</td>
                                                    <td>{{ $item->protocol }}</td>
                                                    <td>{{ $item->port }}</td>
                                                    <td>{{ $item->cve }}</td>
                                                    <td>{{ $item->category_order }}</td>
                                                    <td>{{ $item->name }}</td>
                                                    <td>{{ $item->synopsis }}</td>
                                                    <td class="pointer description">
                                                        {{ $item->description }}</td>
                                                    <td class="pointer">{{ $item->solution }}</td>
                                                    <td>{{ $item->plugin }}</td>
                                                    <td>{{ $item->zone }}</td>
                                                    <td>{{ $item->site }}</td>
                                                    <td>{{ $item->unit }}</td>
                                                    <td>{{ $item->so }}</td>
                                                    <td>{{ $item->note }}</td>
                                                    <td>{{ $item->status }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>

    <!-- jQuery -->
    <script src="{{ asset('/plugins/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- DataTables  & Plugins -->
    <script src="{{ asset('/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('/plugins/datatables-buttons/js/buttons.bootstrap4.min.j') }}s"></script>
    <script src="{{ asset('/plugins/jszip/jszip.min.js') }}"></script>
    <script src="{{ asset('/plugins/pdfmake/pdfmake.min.js') }}"></script>
    <script src="{{ asset('/plugins/pdfmake/vfs_fonts.js') }}"></script>
    <script src="{{ asset('/plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('/plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('/plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>

    <script>
        $(function() {
            $("#example1").DataTable({
                "responsive": false,
                "lengthChange": true,
                "autoWidth": true,
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"],
                "paging": true,
                "searching": true,
                "ordering": true,
                "info": true,
                "scrollX": true
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
            // $('#example2').DataTable({
            //     "paging": true,
            //     "lengthChange": false,
            //     "searching": false,
            //     "ordering": true,
            //     "info": true,
            //     "autoWidth": false,
            //     "responsive": true,
            // });
        });
    </script>
    <script>
        $("#clearDB").click(function() {
            if (confirm("Are you sure you want to clear DATA ?")) {
                console.log('confirm');
            } else {
                console.log('Not confirm !');
                return false;
            }
        });
    </script>
</body>

</html>
