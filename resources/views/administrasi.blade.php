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
                <!--row -->
                <!--row -->
                <div class="row">
                    <div class="col-sm-12">
                        <div class="white-box">
                            <h3 class="box-title">Data administrasi

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

	                		<button class="btn btn-info btn_tambahkan" data-toggle="modal" data-target="#d_administrasi">Tambahkan Data</button>
	                		<button class="btn btn-primary">Export Data (.xls)</button>
	                		<br><br>
                            <div class="table-responsive">                            	
                                <table class="table " id="tadministrasi">
                                    <thead>
                                        <tr>
                                            <th>Kode administrasi</th>
                                            <th>Nama</th>
                                            <th>Alamat</th>
                                            <th>Jam Jaga</th>
                                            <th>Tools</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    	@foreach($dataadministrasi as $dp)
                                    	<tr class="item_{{ $dp->kd_petugas }}">
                                    		<td >{{$dp->kd_petugas}}</td>
                                    		<td>{{$dp->nama_petugas}}</td>
                                    		<td>{{$dp->alamat_petugas}}</td>
                                    		<td>{{$dp->jam_jaga}}</td>
                                    		<td><button class="btn btn-success btn_edit" data-toggle="modal" data-target="#d_administrasi">Edit</button> <button data-id="{{$dp->kd_petugas}}" class="btn btn-danger btn_hapus">Hapus</button></td>
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
           
        </div>



<div class="modal" tabindex="-1" role="dialog" id="d_administrasi">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Data administrasi</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      	@yield('f_administrasi')
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

    $('#tadministrasi').DataTable();

    $(document).on('click','.btn_tambahkan',function(){
        sts = true;
        $('.form-material')[0].reset();


        $('.lkp').hide();
        $('[name="kd_petugas"]').hide();
    });


    $(document).on('click','.btn_edit',function(){
        sts = false;
        $('.form-material')[0].reset();


        $('.lkp').show();
        $('[name="kd_petugas"]').show();
        $('[name="kd_petugas"]').attr('readonly',true);

        kd = $(this).closest('tr').find('td:eq(0)').text();
        nm = $(this).closest('tr').find('td:eq(1)').text();
        ap = $(this).closest('tr').find('td:eq(2)').text();
        jg = $(this).closest('tr').find('td:eq(3)').text();

        $('[name="kd_petugas"]').val(kd);
        $('[name="nama_petugas"]').val(nm);
        $('[name="alamat_petugas"]').val(ap);
        $('[name="jam_jaga"]').val(jg);
    });

    $('#btnsubmit').click(function(){
        console.log(sts);
        if(sts){
                $.ajax({
                type: 'POST',
                url: 'administrasi',
                data:{
                    '_token' : $('input[name="_token"]').val(),
                    'nama_petugas' : $('input[name="nama_petugas"]').val(),
                    'alamat_petugas' : $('input[name="alamat_petugas"]').val(),
                    'jam_jaga' : $('input[name="jam_jaga"]').val()
                },success: function(data){
                    swal({
                        title: "Berhasil!",
                        text: "Data berhasil ditambahkan!",
                        icon: "success",
                        button: "Ok!",
                    });

                    $('#tadministrasi').append("<tr class='item_"+ data.kd_petugas +"'><td>"+ data.kd_petugas +"</td> <td>" + data.nama_petugas + "</td> <td>" + data.alamat_petugas + "</td> <td>"+ data.jam_jaga +"</td> <td> <button class='btn btn-success btn_edit' data-toggle='modal' data-target='#d_administrasi'>Edit</button> <button data-id='"+ data.kd_petugas +"' class='btn btn-danger btn_hapus'>Hapus</button> </td> </tr>");


                    $('#d_administrasi').modal('toggle');


                }
            });
        }else{

        id = $('input[name="kd_petugas"]').val();
            $.ajax({
                type:'PUT',
                url:'administrasi/'+ id,
                data : {
                    '_token': $('input[name=_token]').val(),
                    'nama_petugas' : $('input[name="nama_petugas"]').val(),
                    'alamat_petugas' : $('input[name="alamat_petugas"]').val(),
                    'jam_jaga' : $('input[name="jam_jaga"]').val()
                },
                success: function(data){
                    swal({
                        title: "Berhasil!",
                        text: "Data berhasil diubah!",
                        icon: "success",
                        button: "Ok!",
                    });

                    $('.item_'+id).replaceWith("<tr class='item_"+ $('input[name="kd_petugas"]').val() +"'><td>"+ $('input[name="kd_petugas"]').val() +"</td> <td>" + $('input[name="nama_petugas"]').val() + "</td> <td>" + $('input[name="alamat_petugas"]').val() + "</td> <td>"+ $('input[name="jam_jaga"]').val() +"</td> <td> <button class='btn btn-success btn_edit' data-toggle='modal' data-target='#d_administrasi'>Edit</button> <button data-id='"+ $('input[name="kd_petugas"]').val() +"' class='btn btn-danger btn_hapus'>Hapus</button> </td> </tr>");
                    $('#d_administrasi').modal('toggle');
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
                url: 'administrasi/' + id,
                data: {
                    '_token': $('input[name=_token]').val(),
                },
                success: function(data) {
                    swal("Poof! Data Telah Terhapus..", {
                      icon: "success",
                    });
                    

                     $('.item_'+id).remove();
                }
            });
            
          } else {
            swal("Hapus data dibatalkan");
          }
        });
    });


</script>