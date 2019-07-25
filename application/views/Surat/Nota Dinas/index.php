<!-- ============================================================== -->
<!-- Start right Content here -->
<!-- ============================================================== -->

<!-- Sweet Alert css -->
    <link href="<?= base_url('assets/'); ?>css/datatablewrap.css" rel="stylesheet" type="text/css" />
<div class="wrapper">
    <div class="container-fluid">

        <!-- Page-Title -->
        <div class="row">
            <div class="col-sm-12">
                <h4 class="page-title">Database Nota Dinas</h4>
            </div>
        </div>
        <!-- end page title end breadcrumb -->
        <div class="row">

            <div class="col-sm-4">
                <button name="contoh" id="contoh" data-target="#addModal" data-toggle="modal" class="btn btn-success btn-rounded w-md waves-effect waves-light m-b-20">
                    <i class="fa fa-plus"></i>
                    <span>Tambah Data</span>
                </button>
            </div>
        </div>
        <!-- end row -->
        <div class="row">
            <div class="col-12">
                <div class="card-box table-responsive">
                    <table  id="datatable-surat" class="table table-bordered table-bordered dt-responsive" width="100%">
                        <thead>
                            <tr>
                                <th>NO</th>
                                <th>NO SURAT</th>
                                <th>DARI</th>
                                <th>TUJUAN</th>
                                <th>PERIHAL</th>
                                <th>ACTION</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
        <!-- end row -->
    </div> <!-- content -->

    <!-- modal tambah data -->
    <div id="addModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="false" data-backdrop="static" data-keyboard="false">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">Tambah Data Nota Dinas</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    <form data-parsley-validate novalidate autocomplete="off" method="post" enctype="multipart/form-data" class="form-horizontal" role="form">
                        <div class="form-group row">
                            <label class="col-3 col-form-label">Asal Nota Dinas</label>
                            <div class="col-9">
                                <input type="text" value="PHP" name="asal" class="form-control" required placeholder="Asal Pengirim Surat" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-3 col-form-label">Tujuan Nota Dinas</label>
                            <div class="col-9">
                                <select name="tujuan" class="form-control selectTujuan" multiple></select>
                              <!--       <option>Bagian Sistem Informasi Pengawasan</option>
                                    <option>Bagian Keuangan</option>
                                    <option>Bagian Kepegawaian</option>
                                    <option>Bagian UMUM</option>
                                    <option>Inspektorat Wilayah I</option>
                                    <option>Inspektorat Wilayah II</option>
                                    <option>Inspektorat Wilayah III</option>
                                    <option>Inspektorat Wilayah IV</option>
                                    <option>Inspektorat Wilayah V</option>
                                    <option>Inspektorat Wilayah VI</option> -->
                                
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-3 col-form-label">Perihal Nota Dinas</label>
                            <div class="col-9">
                                <textarea type="text" name="perihal" class="form-control" required placeholder="Mohon di isi Perihal Nota Dinas"></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-3 col-form-label">Tanggal Nota Dinas</label>
                            <div class="col-4">
                                <div class="input-group">
                                    <input name="tanggalNodin" type="text" class="form-control" required placeholder="Tanggal Surat Masuk" id="tanggalNodin">
                                    <div class="input-group-append">
                                        <span class="input-group-text"><i class="ti-calendar"></i></span>
                                    </div>
                                </div><!-- input-group -->
                            </div>
                        </div>
                        <!-- <div class="form-group row">
                            <label class="col-3 col-form-label">Lampiran*</label>
                            <div class="col-5">
                                <input name="lampiran" type="file" class="dropify" />
                            </div>
                        </div>
                        <div class="col-12">
                            <span>*Lampiran adalah hasil scan nota dinas, bisa di Upload Kemudian</span>
                        </div> -->
                </div>
                <div class="modal-footer">
                    <button id="md-close" type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
                    <button type="button" onclick="addData();" class="btn btn-primary waves-effect waves-light">Submit</button>
                </div>
                </form>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

    <!-- modal Rinci Data -->
    <div id="detailModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="false" data-backdrop="static" data-keyboard="false">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" name="noData" hide></h4>
                    <h4 class="modal-title" name="labelViewData"></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    <form data-parsley-validate novalidate autocomplete="off" method="post" enctype="multipart/form-data" class="form-horizontal" role="form">
                        <div class="form-group row">
                            <label class="col-3 col-form-label">Tanggal Nota Dinas</label>
                            <div class="col-4">
                                <div class="input-group">
                                    <input name="tanggalView" type="text" class="form-control" readonly id="tanggal">
                                    <div class="input-group-append">
                                        <span class="input-group-text"><i class="ti-calendar"></i></span>
                                    </div>
                                </div><!-- input-group -->
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-3 col-form-label">Asal Nota Dinas</label>
                            <div class="col-9">
                                <input type="text" value="PHP" name="dariView" class="form-control" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-3 col-form-label">Tujuan Nota Dinas</label>
                            <div class="col-9">
                                <select name="tujuanView" class="form-control" multiple>
                                    
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-3 col-form-label">Perihal Nota Dinas</label>
                            <div class="col-9">
                                <textarea type="text" name="perihalView" class="form-control" rows="6" required placeholder="Mohon di isi Perihal Nota Dinas" readonly></textarea>
                            </div>
                        </div>
                        
                        <!-- <div class="form-group row">
                            <label class="col-3 col-form-label">Lampiran*</label>
                            <div class="col-5">
                                <input name="lampiran" type="file" class="dropify" />
                            </div>
                        </div>
                        <div class="col-12">
                            <span>*Lampiran adalah hasil scan nota dinas, bisa di Upload Kemudian</span>
                        </div> -->
                </div>
                <div class="modal-footer">
                    <button name="editData" id="md-close" type="button" onclick="openEdit();" class="btn btn-danger waves-effect">Edit</button>
                    <button id="md-close" type="button" onclick= "closeEdit()" class="btn btn-secondary waves-effect">Close</button>
                </div>
                </form>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->








    