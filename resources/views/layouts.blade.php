@section('header')

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/png" sizes="16x16" href="../plugins/images/favicon.png">
    <title>Puskesmas | {{ $title }}</title>

    <!-- CSFR token for ajax call -->
    <meta name="_token" content="{{ csrf_token() }}"/>

    <!-- Bootstrap Core CSS -->
    <link href="bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Menu CSS -->
    <link href="../plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.css" rel="stylesheet">
    <!-- toast CSS -->
    <link href="../plugins/bower_components/toast-master/css/jquery.toast.css" rel="stylesheet">
    <!-- morris CSS -->
    <link href="../plugins/bower_components/morrisjs/morris.css" rel="stylesheet">
    <!-- animation CSS -->
    <link href="css/animate.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="css/style.css" rel="stylesheet">
    <!-- color CSS -->
    <link href="css/colors/blue-dark.css" id="theme" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body>

@stop



@section('navigationTop')

    <!-- Preloader -->
    <div class="preloader">
        <div class="cssload-speeding-wheel"></div>
    </div>
    <div id="wrapper">
        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top m-b-0">
            <div class="navbar-header"> <a class="navbar-toggle hidden-sm hidden-md hidden-lg " href="javascript:void(0)" data-toggle="collapse" data-target=".navbar-collapse"><i class="fa fa-bars"></i></a>
                <div class="top-left-part"><a class="logo" href="index.html"><b><img src="../plugins/images/pixeladmin-logo.png" alt="home" /></b><span class="hidden-xs">Puskesmas</span></a></div>
                <ul class="nav navbar-top-links navbar-left m-l-20 hidden-xs">
                    <li>
                        <form role="search" class="app-search hidden-xs">
                            <input type="text" placeholder="Search..." class="form-control"> <a href=""><i class="fa fa-search"></i></a>
                        </form>
                    </li>
                </ul>
                <ul class="nav navbar-top-links navbar-right pull-right">
                    <li>
                        <a class="profile-pic" href="#"> <img src="../plugins/images/users/varun.jpg" alt="user-img" width="36" class="img-circle"><b class="hidden-xs">Lambda</b> </a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-header -->
            <!-- /.navbar-top-links -->
            <!-- /.navbar-static-side -->
        </nav>
@stop

@section('navigationLeft')
<!-- Left navbar-header -->
        <div class="navbar-default sidebar" role="navigation">
            <div class="sidebar-nav navbar-collapse slimscrollsidebar">
                <ul class="nav" id="side-menu">
                    <li style="padding: 10px 0 0;">
                        <a href="{{ url('/') }}" class="waves-effect"><i class="fa fa-clock-o fa-fw" aria-hidden="true"></i><span class="hide-menu">Homepage</span></a>
                    </li>
                    <li>
                        <a href="{{ url('pasien') }}" class="waves-effect"><i class="fa fa-user fa-fw" aria-hidden="true"></i><span class="hide-menu">Pasien</span></a>
                    </li>
                    <li>
                        <a href="{{ url('rekammedis') }}" class="waves-effect"><i class="fa fa-table fa-fw" aria-hidden="true"></i><span class="hide-menu">Rekam Medis</span></a>
                    </li>
                    <li>
                        <a href="{{ url('dokter') }}" class="waves-effect"><i class="fa fa-font fa-fw" aria-hidden="true"></i><span class="hide-menu">Dokter</span></a>
                    </li>
                    <li>
                        <a href="{{ url('administrasi') }}" class="waves-effect"><i class="fa fa-globe fa-fw" aria-hidden="true"></i><span class="hide-menu">Administrasi</span></a>
                    </li>
                    <li>
                        <a href="{{ url('ruangan') }}" class="waves-effect"><i class="fa fa-columns fa-fw" aria-hidden="true"></i><span class="hide-menu">Ruangan</span></a>
                    </li>
                </ul>
            </div>
        </div>
        <!-- Left navbar-header end -->
@stop



@section('footer')

            <footer class="footer text-center"> 2018 &copy; Puskesmas | Lambda Sangkala Murbawisesa </footer>
        </div>
        <!-- /#page-wrapper -->
    </div>
    <!-- /#wrapper -->
    <!-- jQuery -->
    <script src="../plugins/bower_components/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- Menu Plugin JavaScript -->
    <script src="../plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.js"></script>
    <!--slimscroll JavaScript -->
    <script src="js/jquery.slimscroll.js"></script>
    <!--Wave Effects -->
    <script src="js/waves.js"></script>
    <!--Counter js -->
    <script src="../plugins/bower_components/waypoints/lib/jquery.waypoints.js"></script>
    <script src="../plugins/bower_components/counterup/jquery.counterup.min.js"></script>
    <!--Morris JavaScript -->
    <script src="../plugins/bower_components/raphael/raphael-min.js"></script>
    <script src="../plugins/bower_components/morrisjs/morris.js"></script>
    <!-- Custom Theme JavaScript -->
    <script src="js/custom.min.js"></script>
    <script src="js/dashboard1.js"></script>
    <script src="../plugins/bower_components/toast-master/js/jquery.toast.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>

</body>

</html>

@stop



@section('f_pasien')
<form class="form-horizontal form-material" >
	{{ csrf_field() }}
    <div class="form-group">
        <label class="col-md-12 lkp">Kode Pasien</label>
        <div class="col-md-12">
            <input type="text" class="form-control form-control-line" name="kd_pasien"> </div>
    </div>
    <div class="form-group">
        <label class="col-md-12">Nama Pasien</label>
        <div class="col-md-12">
            <input type="text" class="form-control form-control-line" name="nama_pasien"> </div>
    </div>
    <div class="form-group">
        <label class="col-md-12">Alamat Pasien</label>
        <div class="col-md-12">
            <input type="text" class="form-control form-control-line" name="alamat"> </div>
    </div>
</form>
@stop


@section('f_dokter')
<form class="form-horizontal form-material" >
    {{ csrf_field() }}
    <div class="form-group">
        <label class="col-md-12 lkp">Kode Dokter</label>
        <div class="col-md-12">
            <input type="text" class="form-control form-control-line" name="kd_dokter"> </div>
    </div>
    <div class="form-group">
        <label class="col-md-12">Nama Dokter</label>
        <div class="col-md-12">
            <input type="text" class="form-control form-control-line" name="nama_dokter"> </div>
    </div>
    <div class="form-group">
        <label class="col-md-12">Alamat Dokter</label>
        <div class="col-md-12">
            <input type="text" class="form-control form-control-line" name="alamat"> </div>
    </div>
    <div class="form-group">
        <label class="col-md-12">Spesialis</label>
        <div class="col-md-12">
            <select class="form-control spesialis" name="spesialis">
                <option>Dokter Anak</option>
                <option>Dokter Gigi</option>
                <option>Dokter THT</option>
                <option>Dokter Paru-paru</option>
            </select>
        </div>
    </div>
</form>
@stop


@section('f_administrasi')
<form class="form-horizontal form-material" >
    {{ csrf_field() }}
    <div class="form-group">
        <label class="col-md-12 lkp">Kode Petugas</label>
        <div class="col-md-12">
            <input type="text" class="form-control form-control-line" name="kd_petugas"> </div>
    </div>
    <div class="form-group">
        <label class="col-md-12">Nama Petugas</label>
        <div class="col-md-12">
            <input type="text" class="form-control form-control-line" name="nama_petugas"> </div>
    </div>
    <div class="form-group">
        <label class="col-md-12">Alamat Petugas</label>
        <div class="col-md-12">
            <input type="text" class="form-control form-control-line" name="alamat_petugas"> </div>
    </div>
    <div class="form-group">
        <label class="col-md-12">Jam Jaga</label>
        <div class="col-md-12">
            <input type="text" class="form-control form-control-line" name="jam_jaga">
        </div>
    </div>
</form>
@stop

@section('f_ruangan')
<form class="form-horizontal form-material" >
    {{ csrf_field() }}
    <div class="form-group">
        <label class="col-md-12 lkp">Kode Ruangan</label>
        <div class="col-md-12">
            <input type="text" class="form-control form-control-line" name="kd_ruangan"> </div>
    </div>
    <div class="form-group">
        <label class="col-md-12">Nama Ruangan</label>
        <div class="col-md-12">
            <input type="text" class="form-control form-control-line" name="nama_ruangan"> </div>
    </div>
    <div class="form-group">
        <label class="col-md-12">Nama Gedung</label>
        <div class="col-md-12">
            <input type="text" class="form-control form-control-line" name="nama_gedung"> </div>
    </div>
</form>
@stop