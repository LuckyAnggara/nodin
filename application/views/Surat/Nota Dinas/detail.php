        <!-- Bootstrap tagsinput -->
        <script src="assets/plugins/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js"></script>
        <div class="wrapper">
            <div class="container-fluid">

                <!-- Page-Title -->
                <div class="row">
                    <div class="col-sm-12">
                        <h4 class="page-title">Detail Nomor  : <?=$detail['id_no_surat']; ?></h4>
                    </div>
                </div>
                <!-- end page title end breadcrumb -->

                <div class="row">
                    <div class="col-md-8">
                        <div class="card-box task-detail">
                            <div class="dropdown pull-right">
                                <a href="#" class="dropdown-toggle arrow-none card-drop" data-toggle="dropdown" aria-expanded="false">
                                    <i class="mdi mdi-dots-vertical"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right">
                                   <a href="javascript:void(0);" class="dropdown-item">Delete</a>
                                </div>
                            </div>
                            <div class="media m-b-30">
                                <div class="media-body">
                                    <h4 class="media-heading mb-0 mt-0">Status</h4>
                                    <span class="badge badge-danger">Not Sent</span>
                                </div>
                            </div>
                    
                            <div class="dropdown pull-right">
                                <a href="#" class="dropdown-toggle arrow-none card-drop" data-toggle="dropdown" aria-expanded="false">
                                    <i class="fa fa-window-close" data-toggle="tooltip" data-placement="top" title="Delete Lampiran"></i>
                                </a>
                            </div>
                            <h4 class="font-600 m-b-20">Lampiran</h4>
                            <hr>
                            <ul class="list-inline task-dates m-b-0 m-t-20">
                                <li>
                                    <h5 class="font-600 m-b-5">Tanggal Upload Lampiran</h5>
                                    <p><?= $detail['date_upload'];?></p>
                                </li>

                                <li>
                                    <h5 class="font-600 m-b-5">Tanggal Kirim</h5>
                                    <?php if ($detail['status']==0)  {;?>

                                    <span class="badge badge-danger">Not Sent</span>
                                    <?php }else{ ?>
                                    <p> <?= $detail['date_kirim'];?> </p>
                                    <?php } ?>
                                </li>
                            </ul>
                            
                            <?php if($detail['lampiran'] == ""){;?>
                            "Lampiran Belum ada"
                            <?php }else{ ?>
                            <embed src="<?= base_url('assets/lampiran/surat/'.$detail['lampiran']);?>" width="100%" height="720" type="application/pdf">
                            <?php } ?>
                            
                            <div class="clearfix"></div>
                            <?php if($detail['lampiran'] == ""){;?>
                            
                            
                            <div class="attached-files m-t-30">
                                <h5 class="font-600">Upload Files </h5>
                                <div class="files-list">
                                    <div class="file-box m-l-15">
                                        <div class="fileupload add-new-plus">
                                            <span><i class="fa fa-book"></i></span>
                                            <input type="file" class="upload">
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="text-right m-t-30">
                                            <button type="submit" class="btn btn-success waves-effect waves-light">
                                                Send
                                            </button>
                                            <button type="button"
                                                    class="btn btn-light waves-effect">Close
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php }else{ ?>
                                <div class="attached-files m-t-30">
                                    <table class="table">
                                <thead class="thead-light">
                                <tr>
                                    <th>#</th>
                                    <th>Lampiran</th>
                                    <th>Tanggal Upload</th>
                                    <th>Aksi</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <th scope="row">1</th>
                                    <td>Mark</td>
                                    <td>Otto</td>
                                    <td>@mdo</td>
                                </tr>
                                <tr>
                                    <th scope="row">2</th>
                                    <td>Jacob</td>
                                    <td>Thornton</td>
                                    <td>@fat</td>
                                </tr>
                                <tr>
                                    <th scope="row">3</th>
                                    <td>Larry</td>
                                    <td>the Bird</td>
                                    <td>@twitter</td>
                                </tr>
                                </tbody>
                            </table>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="text-right m-t-30">
                                                <?php if ($detail['status']==0)  {;?>
                                                <button type="submit" class="btn btn-success waves-effect waves-light">
                                                    Send
                                                </button>
                                                <?php }else{ ?>
                                                <button type="submit" disabled class="btn btn-danger waves-effect waves-light">
                                                    Sended
                                                </button>
                                                <?php }?>
                                                <button type="button"
                                                        class="btn btn-light waves-effect">Close
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php }?>
                        </div>
                    </div><!-- end col -->

                    <div class="col-md-4">
                        <div class="card-box">
                            <div class="dropdown pull-right">
                                <a href="#" class="dropdown-toggle arrow-none card-drop" data-toggle="dropdown" aria-expanded="false">
                                    <i class="mdi mdi-dots-vertical"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <!-- item-->
                                    <a href="javascript:void(0);" class="dropdown-item">Delete</a>
                                </div>
                            </div>

                            <a href="" ><p class="header-title m-t-0 m-b-30">Comments (<?= count($comment);?>)</p></a>
                                                
                            
                            <table class="comment datatable-surat">
                            <tbody>
                                <?php foreach ($comment as $key => $value): ?>
                                <tr>
                                    <th>
                                    <div class="media m-b-20">
                                        <div class="d-flex mr-3">
                                            <a href="#"> <img class="media-object rounded-circle thumb-sm" alt="64x64" src="<?= base_url('assets/images/users/'.$value['image']);?>"> </a>
                                        </div>
                                        <div class="media-body">
                                            <h5 class="mt-0"><?= $value['user'];?></h5>
                                            <p class="font-13 text-muted mb-0">
                                                <a href="" class="text-primary"></a>
                                                <?= nl2br($value['isi']);?>
                                            </p>
                                            <p class="text-success font-13"><?= $value['tanggal'];?></p>
                                        </div>
                                    </div>
                                    </th>
                                </tr>                                   
                                <?php endforeach ;?>
                                
                            </tbody>
                            </table>

                            <div>
                                <div class="media m-b-20">
                                    <div class="d-flex mr-3">
                                        <a href="#"> <img class="media-object rounded-circle thumb-sm" alt="64x64" src="<?= base_url('assets/images/users/avatar-1.jpg');?>"> </a>
                                    </div>
                                    <div class="media-body">
                                        <input type="text" class="form-control input-sm" placeholder="Some text value...">
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div><!-- end col -->
                </div>
                <!-- end row -->


            </div> <!-- end container -->
