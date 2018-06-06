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
