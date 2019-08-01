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

                            <h4 class="font-600 m-b-20">Lampiran</h4>

                            <embed src="<?= base_url('assets/lampiran/surat/'.$detail['lampiran']);?>" width="800" height="720" type="application/pdf">
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
                            <div class="clearfix"></div>

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

                            <h4 class="header-title m-t-0 m-b-30">Comments (6)</h4>

                            <div>

                                <div class="media m-b-20">
                                    <div class="d-flex mr-3">
                                        <a href="#"> <img class="media-object rounded-circle thumb-sm" alt="64x64" src="assets/images/users/avatar-1.jpg"> </a>
                                    </div>
                                    <div class="media-body">
                                        <h5 class="mt-0">Mat Helme</h5>
                                        <p class="font-13 text-muted mb-0">
                                            <a href="" class="text-primary">@Michael</a>
                                            Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque
                                            ante sollicitudin commodo. Cras purus odio.
                                        </p>
                                        <a href="" class="text-success font-13">Reply</a>
                                    </div>
                                </div>

                                <div class="media m-b-20">
                                    <div class="d-flex mr-3">
                                        <a href="#"> <img class="media-object rounded-circle thumb-sm" alt="64x64" src="assets/images/users/avatar-2.jpg"> </a>
                                    </div>
                                    <div class="media-body">
                                        <h5 class="mt-0">Media heading</h5>
                                        <p class="font-13 text-muted mb-0">
                                            <a href="" class="text-primary">@Michael</a>
                                            Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque
                                            ante sollicitudin commodo. Cras purus odio.
                                        </p>
                                        <a href="" class="text-success font-13">Reply</a>
                                    </div>
                                </div>

                                <div class="media m-b-20">
                                    <div class="d-flex mr-3">
                                        <a href="#"> <img class="media-object rounded-circle thumb-sm" alt="64x64" src="assets/images/users/avatar-1.jpg"> </a>
                                    </div>
                                    <div class="media-body">
                                        <h5 class="mt-0">Mat Helme</h5>
                                        <p class="font-13 text-muted mb-0">
                                            <a href="" class="text-primary">@Michael</a>
                                            Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque
                                            ante sollicitudin commodo. Cras purus odio.
                                        </p>
                                        <a href="" class="text-success font-13">Reply</a>
                                    </div>
                                </div>

                                <div class="media m-b-20">
                                    <div class="d-flex mr-3">
                                        <a href="#"> <img class="media-object rounded-circle thumb-sm" alt="64x64" src="assets/images/users/avatar-1.jpg"> </a>
                                    </div>
                                    <div class="media-body">
                                        <h5 class="mt-0">Mat Helme</h5>
                                        <p class="font-13 text-muted mb-0">
                                            <a href="" class="text-primary">@Michael</a>
                                            Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque
                                            ante sollicitudin commodo. Cras purus odio.
                                        </p>
                                        <a href="" class="text-success font-13">Reply</a>
                                    </div>
                                </div>

                                <div class="media m-b-20">
                                    <div class="d-flex mr-3">
                                        <a href="#"> <img class="media-object rounded-circle thumb-sm" alt="64x64" src="assets/images/users/avatar-1.jpg"> </a>
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
