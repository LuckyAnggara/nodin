        <div class="wrapper">
            <div class="container-fluid">

                <!-- Page-Title -->
                <div class="row">
                    <div class="col-sm-12">
                        <h4 class="page-title">Detail Nomor  : <?=$detail['id_no_surat']; ?></h4>
                        <p id="noSurat" hidden><?=$detail['id_no_surat']; ?></p>
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
                    
                            <div class="dropdown pull-right" >
                                <a  onclick="deleteLampiran(); class="dropdown-toggle arrow-none card-drop" data-toggle="dropdown" aria-expanded="false">
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
                                <small>*PDF Only</small>
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
                            <a href="" ><p class="header-title m-t-0 m-b-30">Comments (<?php if(count($comment[0])<>0) 
                                                                                        {
                                                                                           echo count($comment);
                                                                                        }else{
                                                                                            echo "0";
                                                                                            }
                                                                                            ?>)</p></a>
                                                
                            
                            <table id="datatable-comment">
                            </table>
                                 <br>
                            <div>
                                <div class="media m-b-20">
                                    <div class="d-flex mr-3">
                                        <a href="#"> <img class="media-object rounded-circle thumb-sm" alt="64x64" src="<?= base_url('assets/images/users/'.$user['image']);?>"> </a>
                                    </div>
                                    <!-- dipake buat parsing variabel id_user ke javascript -->
                                    <p id="namaUserComment" hidden><?php echo $user['id_user'];?></p>
                                    <!-- END -->
                                    <div class="media-body">
                                        <textarea id="commentPost" rows ="1" class="form-control" placeholder="Some text value... Type alt+enter to post"></textarea>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div><!-- end col -->
                </div>
                <!-- end row -->


            </div> <!-- end container -->
