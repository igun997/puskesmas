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
                
                <!-- /.row -->
                <!--row -->
                <!--row -->
                <div class="row">
                    <div class="col-sm-12">
                        <div class="white-box">
                            <h3 class="box-title">Data Dokter

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

	                		<button class="btn btn-info btn_tambahkan" data-toggle="modal" data-target="#d_dokter">Tambahkan Data</button>
	                		<button class="btn btn-primary">Export Data (.xls)</button>
	                		<br><br>
                            <div class="table-responsive">                            	
                                <table class="table " id="tdokter">
                                    <thead>
                                        <tr>
                                            <th>Kode Dokter</th>
                                            <th>Nama</th>
                                            <th>Alamat</th>
                                            <th>Spesialis</th>
                                            <th>Ruangan</th>
                                            <th>Tools</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    	@foreach($datadokter as $dd)
                                    	<tr class="item_{{ $dd->kd_dokter }}">
                                    		<td >{{$dd->kd_dokter}}</td>
                                    		<td>{{$dd->nama_dokter}}</td>
                                    		<td>{{$dd->alamat}}</td>
                                    		<td>{{$dd->spesialis}}</td>
                                            <td>Belum Ditetapkan</td>
                                    		<td><button class="btn btn-success btn_edit" data-toggle="modal" data-target="#d_dokter">Edit</button> <button data-id="{{$dd->kd_dokter}}" class="btn btn-danger btn_hapus">Hapus</button></td>
                                    	</tr>
                                    	@endforeach
                                    </tbody>
                                </table> 
                            </div>
                        </div>
                    </div>
                </div>
                <h4 class="page-title">Ruangan Dokter</h4>
                <!-- /.row -->
<button class="btn btn-info">Tetapkan Ruangan</button>
                <div class="row">
                    <div class="col-md-4"><br>
                        <div class="white-box">
                            <h3>Melati</h3>
                            <hr>
                            <ol>
                                <li>Jonat</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.container-fluid -->
            <footer class="footer text-center"> 2017 &copy; Pixel Admin brought to you by wrappixel.com </footer>
        </div>



<div class="modal" tabindex="-1" role="dialog" id="d_dokter">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Data dokter</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      	@yield('f_dokter')
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" id="btnsubmit">Submit</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>


<div class="modal" tabindex="-1" role="dialog" id="d_det_r_dokter">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Data dokter</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        @yield('f_dokter')
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

    $('#tdokter').DataTable();


    $(document).on('click','.btn_tambahkan',function(){
        sts = true;
        $('.form-material')[0].reset();


        $('.lkp').hide();
        $('[name="kd_dokter"]').hide();
    });


    $(document).on('click','.btn_edit',function(){
        sts = false;
        $('.form-material')[0].reset();


        $('.lkp').show();
        $('[name="kd_dokter"]').show();
        $('[name="kd_dokter"]').attr('readonly',true);

        kd = $(this).closest('tr').find('td:eq(0)').text();
        nm = $(this).closest('tr').find('td:eq(1)').text();
        al = $(this).closest('tr').find('td:eq(2)').text();
        sp = $(this).closest('tr').find('td:eq(3)').text();

        $('[name="kd_dokter"]').val(kd);
        $('[name="nama_dokter"]').val(nm);
        $('[name="alamat"]').val(al);
        $('[name="spesialis"]').val(sp);
    });


    $('#btnsubmit').click(function(){
        console.log(sts);
        if(sts){
                $.ajax({
                type: 'POST',
                url: 'dokter',
                data:{
                    '_token' : $('input[name="_token"]').val(),
                    'nama_dokter' : $('input[name="nama_dokter"]').val(),
                    'alamat' : $('input[name="alamat"]').val(),
                    'spesialis' : $('.spesialis').find('option:selected').val()
                },success: function(data){
                    swal({
                        title: "Berhasil!",
                        text: "Data berhasil ditambahkan!",
                        icon: "success",
                        button: "Ok!",
                    });

                    $('#tdokter').append("<tr class='item_"+ data.kd_dokter +"'><td>"+ data.kd_dokter +"</td> <td>" + data.nama_dokter + "</td> <td>" + data.alamat + "</td> <td>"+ data.spesialis +"</td> <td> <button class='btn btn-success btn_edit' data-toggle='modal' data-target='#d_dokter'>Edit</button> <button data-id='"+ data.kd_dokter +"' class='btn btn-danger btn_hapus'>Hapus</button> </td> </tr>");


                    $('#d_dokter').modal('toggle');


                }
            });
        }else{

        id = $('input[name="kd_dokter"]').val();
            $.ajax({
                type:'PUT',
                url:'dokter/'+ id,
                data : {
                    '_token': $('input[name=_token]').val(),
                    'nama_dokter' : $('input[name="nama_dokter"]').val(),
                    'alamat' : $('input[name="alamat"]').val(),
                    'spesialis' : $('.spesialis').find('option:selected').val()
                },
                success: function(data){
                    swal({
                        title: "Berhasil!",
                        text: "Data berhasil diubah!",
                        icon: "success",
                        button: "Ok!",
                    });

                    $('.item_'+id).replaceWith("<tr class='item_"+ $('input[name="kd_dokter"]').val() +"'><td>"+ $('input[name="kd_dokter"]').val() +"</td> <td>" + $('input[name="nama_dokter"]').val() + "</td> <td>" + $('input[name="alamat"]').val() + "</td> <td>"+ $('.spesialis').find('option:selected').val() +"</td><td> <button class='btn btn-success btn_edit' data-toggle='modal' data-target='#d_dokter'>Edit</button> <button data-id='"+ $('input[name="kd_dokter"]').val() +"' class='btn btn-danger btn_hapus'>Hapus</button> </td> </tr>");
                    $('#d_dokter').modal('toggle');
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
                url: 'dokter/' + id,
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