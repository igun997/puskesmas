@include('layouts')

@yield('header')
@yield('navigationTop')
@yield('navigationLeft')

        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row bg-title">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">{{$title}}</h4>
                    </div>
                  
                    <!-- /.col-lg-12 -->
                </div>
                <!-- row -->
                <div class="row">
                    <!--col -->
                    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                        <div class="white-box">
                            <div class="col-in row">
                                <div class="col-md-6 col-sm-6 col-xs-6"> <i data-icon="E" class="linea-icon linea-basic"></i>
                                    <h5 class="text-muted vb">Total Pasien</h5> </div>
                                <div class="col-md-6 col-sm-6 col-xs-6">
                                    <h3 class="counter text-right m-t-15 text-danger ht">{{$totalpasien}}</h3> </div>
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <div class="progress">
                                        <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 100%"> <span class="sr-only">40% Complete (success)</span> </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.col -->
                    <!--col -->
                    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                        <div class="white-box">
                            <div class="col-in row">
                                <div class="col-md-6 col-sm-6 col-xs-6"> <i class="linea-icon linea-basic" data-icon="&#xe01b;"></i>
                                    <h5 class="text-muted vb">Pasien Belum Di Periksa</h5> </div>
                                <div class="col-md-6 col-sm-6 col-xs-6">
                                    <h3 class="counter text-right m-t-15 text-megna hb">{{$pasienbelumperiksa}}</h3> </div>
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <div class="progress">
                                        <div class="progress-bar progress-bar-megna belumperiksa" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"> <span class="sr-only">40% Complete (success)</span> </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.col -->
                    <!--col -->
                    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                        <div class="white-box">
                            <div class="col-in row">
                                <div class="col-md-6 col-sm-6 col-xs-6"> <i class="linea-icon linea-basic" data-icon="&#xe00b;"></i>
                                    <h5 class="text-muted vb">Pasien Sudah Di Periksa</h5> </div>
                                <div class="col-md-6 col-sm-6 col-xs-6">
                                    <h3 class="counter text-right m-t-15 text-primary" hp>{{$sudahperiksa}}</h3> </div>
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <div class="progress">
                                        <div class="progress-bar progress-bar-primary sudahperiksa" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"> <span class="sr-only">40% Complete (success)</span> </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
                <!--row -->
                <!--row -->
                <div class="row">
                    <div class="col-sm-12">
                        <div class="white-box">
                            <h3 class="box-title">Data Pasien

                                <div class="col-md-2 col-sm-4 col-xs-12 pull-right">

                                    <select class="form-control pull-right row b-none">
                                        <option>March 2016</option>
                                        <option>April 2016</option>
                                        <option>May 2016</option>
                                        <option>June 2016</option>
                                        <option>July 2016</option>
                                    </select>
                                </div>
                            </h3>

	                		<button class="btn btn-info btn_tambahkan" data-toggle="modal" data-target="#d_pasien">Tambahkan Data</button>
	                		<button class="btn btn-primary">Export Data (.xls)</button>
	                		<br><br>
                            <div class="table-responsive">                            	
                                <table class="table " id="tpasien">
                                    <thead>
                                        <tr>
                                            <th>Kode Pasien</th>
                                            <th>Nama</th>
                                            <th>Alamat</th>
                                            <th>Penyakit</th>
                                            <th>Tanggal Berobat</th>
                                            <th>Tools</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    	@foreach($datapasien as $dp)
                                    	<tr class="item_{{ $dp->kd_pasien }}">
                                    		<td >{{$dp->kd_pasien}}</td>
                                    		<td>{{$dp->nama_pasien}}</td>
                                    		<td>{{$dp->alamat}}</td>
                                    		<td>{{$dp->penyakit_pasien}}</td>
                                    		<td>{{$dp->tgl_berobat}}</td>
                                    		<td><button class="btn btn-success btn_edit" data-toggle="modal" data-target="#d_pasien">Edit</button> <button data-id="{{$dp->kd_pasien}}" class="btn btn-danger btn_hapus">Hapus</button></td>
                                    	</tr>
                                    	@endforeach
                                    </tbody>
                                </table> 
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
            <footer class="footer text-center"> 2017 &copy; Pixel Admin brought to you by wrappixel.com </footer>
        </div>



<div class="modal" tabindex="-1" role="dialog" id="d_pasien">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Data Pasien</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      	@yield('f_pasien')
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" id="btnsubmit">Submit</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>



@yield('footer');


<script type="text/javascript">
    var sts;
    var ht = {{ $totalpasien }};
    var hb = {{ $pasienbelumperiksa }};
    $('.belumperiksa').css('width',{{$persentaseB}}+ "%");
    $('.sudahperiksa').css('width',{{$persentaseS}}+ "%");


	$('#tpasien').DataTable();

    $(document).on('click','.btn_tambahkan',function(){
        sts = true;
        $('.form-material')[0].reset();


        $('.lkp').hide();
        $('[name="kd_pasien"]').hide();
    });


    $(document).on('click','.btn_edit',function(){
        sts = false;
        $('.form-material')[0].reset();


        $('.lkp').show();
        $('[name="kd_pasien"]').show();
        $('[name="kd_pasien"]').attr('readonly',true);

        kdp = $(this).closest('tr').find('td:eq(0)').text();
        nmp = $(this).closest('tr').find('td:eq(1)').text();
        ap = $(this).closest('tr').find('td:eq(2)').text();

        $('[name="kd_pasien"]').val(kdp);
        $('[name="nama_pasien"]').val(nmp);
        $('[name="alamat"]').val(ap);
    });

	$('#btnsubmit').click(function(){
        console.log(sts);
		if(sts){
                $.ajax({
                type: 'POST',
                url: 'pasien',
                data:{
                    '_token' : $('input[name="_token"]').val(),
                    'nama_pasien' : $('input[name="nama_pasien"]').val(),
                    'alamat' : $('input[name="alamat"]').val()
                },success: function(data){
                    swal({
                        title: "Berhasil!",
                        text: "Data berhasil ditambahkan!",
                        icon: "success",
                        button: "Ok!",
                    });

                    $('#tpasien').append("<tr class='item_"+ data.kd_pasien +"'><td>"+ data.kd_pasien +"</td> <td>" + data.nama_pasien + "</td> <td>" + data.alamat + "</td> <td>Belum Diperiksa</td> <td>"+ data.tgl_berobat +"</td> <td> <button class='btn btn-success btn_edit' data-toggle='modal' data-target='#d_pasien'>Edit</button> <button data-id='"+ data.kd_pasien +"' class='btn btn-danger btn_hapus'>Hapus</button> </td> </tr>");
                    
                    $('.ht').text(ht+1);
                    $('.hb').text(hb+1);

                    $('#d_pasien').modal('toggle');


                }
            });
        }else{

        id = $('input[name="kd_pasien"]').val();
            $.ajax({
                type:'PUT',
                url:'pasien/'+ id,
                data : {
                    '_token': $('input[name=_token]').val(),
                    'nama_pasien' : $('input[name="nama_pasien"]').val(),
                    'alamat' : $('input[name="alamat"]').val()
                },
                success: function(data){
                    swal({
                        title: "Berhasil!",
                        text: "Data berhasil diubah!",
                        icon: "success",
                        button: "Ok!",
                    });

                    $('.item_'+id).replaceWith("<tr class='item_"+ $('input[name="kd_pasien"]').val() +"'><td>"+ $('input[name="kd_pasien"]').val() +"</td> <td>" + $('input[name="nama_pasien"]').val() + "</td> <td>" + $('input[name="alamat"]').val() + "</td> <td>Belum Diperiksa</td> <td>2018-05-01</td> <td> <button class='btn btn-success btn_edit' data-toggle='modal' data-target='#d_pasien'>Edit</button> <button data-id='"+ $('input[name="kd_pasien"]').val() +"' class='btn btn-danger btn_hapus'>Hapus</button> </td> </tr>");
                    $('#d_pasien').modal('toggle');
                }
            });
        }

	});


    $(document).on('click','.btn_hapus',function(){
        id = $(this).data('id');

        swal({
          title: "Apakah Anda Yakin ?",
          text: "Menghapus data ini tidak dapat dikembalikan lagi",
          icon: "warning",
          buttons: true,
          dangerMode: true,
        })
        .then((willDelete) => {
          if (willDelete) {
            $.ajax({
                type: 'DELETE',
                url: 'pasien/' + id,
                data: {
                    '_token': $('input[name=_token]').val(),
                },
                success: function(data) {
                    swal("Poof! Data Telah Terhapus..", {
                      icon: "success",
                    });
                    $('.ht').text(ht-1);
                    $('.hb').text(hb-1);

                     $('.item_'+id).remove();
                }
            });
            
          } else {
            swal("Hapus data dibatalkan");
          }
        });
    });


</script>