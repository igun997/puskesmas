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
                            <h3 class="box-title">Data Ruangan

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

	                		<button class="btn btn-info btn_tambahkan" data-toggle="modal" data-target="#d_ruangan">Tambahkan Data</button>
	                		<button class="btn btn-primary">Import Data (.xls)</button>
	                		<br><br>
                            <div class="table-responsive">                            	
                                <table class="table " id="truangan">
                                    <thead>
                                        <tr>
                                            <th>Kode Ruangan</th>
                                            <th>Nama Ruangan</th>
                                            <th>Nama Gedung</th>
                                            <th>Tools</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    	@foreach($dataruangan as $dr)
                                    	<tr class="item_{{ $dr->kd_ruangan }}">
                                    		<td >{{$dr->kd_ruangan}}</td>
                                    		<td>{{$dr->nama_ruangan}}</td>
                                    		<td>{{$dr->nama_gedung}}</td>
                                    		<td><button class="btn btn-success btn_edit" data-toggle="modal" data-target="#d_ruangan">Edit</button> <button data-id="{{$dr->kd_ruangan}}" class="btn btn-danger btn_hapus">Hapus</button></td>
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



<div class="modal" tabindex="-1" role="dialog" id="d_ruangan">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Data ruangan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      	@yield('f_ruangan')
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

    $('#truangan').DataTable();


    $(document).on('click','.btn_tambahkan',function(){
        sts = true;
        $('.form-material')[0].reset();


        $('.lkp').hide();
        $('[name="kd_ruangan"]').hide();
    });


    $(document).on('click','.btn_edit',function(){
        sts = false;
        $('.form-material')[0].reset();


        $('.lkp').show();
        $('[name="kd_ruangan"]').show();
        $('[name="kd_ruangan"]').attr('readonly',true);

        kd = $(this).closest('tr').find('td:eq(0)').text();
        nm = $(this).closest('tr').find('td:eq(1)').text();
        al = $(this).closest('tr').find('td:eq(2)').text();

        $('[name="kd_ruangan"]').val(kd);
        $('[name="nama_ruangan"]').val(nm);
        $('[name="nama_gedung"]').val(al);
    });


    $('#btnsubmit').click(function(){
        console.log(sts);
        if(sts){
                $.ajax({
                type: 'POST',
                url: 'ruangan',
                data:{
                    '_token' : $('input[name="_token"]').val(),
                    'nama_ruangan' : $('input[name="nama_ruangan"]').val(),
                    'nama_gedung' : $('input[name="nama_gedung"]').val()
                },success: function(data){
                    swal({
                        title: "Berhasil!",
                        text: "Data berhasil ditambahkan!",
                        icon: "success",
                        button: "Ok!",
                    });

                    $('#truangan').append("<tr class='item_"+ data.kd_ruangan +"'><td>"+ data.kd_ruangan +"</td> <td>" + data.nama_ruangan + "</td> <td>" + data.nama_gedung + "</td> <td> <button class='btn btn-success btn_edit' data-toggle='modal' data-target='#d_ruangan'>Edit</button> <button data-id='"+ data.kd_ruangan +"' class='btn btn-danger btn_hapus'>Hapus</button> </td> </tr>");
        

                    $('#d_ruangan').modal('toggle');


                }
            });
        }else{

        id = $('input[name="kd_ruangan"]').val();
            $.ajax({
                type:'PUT',
                url:'ruangan/'+ id,
                data : {
                    '_token': $('input[name=_token]').val(),
                    'nama_ruangan' : $('input[name="nama_ruangan"]').val(),
                    'nama_gedung' : $('input[name="nama_gedung"]').val()
                },
                success: function(data){
                    swal({
                        title: "Berhasil!",
                        text: "Data berhasil diubah!",
                        icon: "success",
                        button: "Ok!",
                    });

                    $('.item_'+id).replaceWith("<tr class='item_"+ $('input[name="kd_ruangan"]').val() +"'><td>"+ $('input[name="kd_ruangan"]').val() +"</td> <td>" + $('input[name="nama_ruangan"]').val() + "</td> <td>" + $('input[name="nama_gedung"]').val() + "</td><td> <button class='btn btn-success btn_edit' data-toggle='modal' data-target='#d_ruangan'>Edit</button> <button data-id='"+ $('input[name="kd_ruangan"]').val() +"' class='btn btn-danger btn_hapus'>Hapus</button> </td> </tr>");
                    $('#d_ruangan').modal('toggle');
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
                url: 'ruangan/' + id,
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