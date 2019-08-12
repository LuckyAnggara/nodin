<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>Sekretariat Inspektorat Jenderal</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
    <meta content="Coderthemes" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <!-- App favicon -->
    <link rel="shortcut icon" href="<?= base_url('assets/'); ?>images/favicon.ico">

    <!-- Plugins css-->
    <link href="<?= base_url('assets/'); ?>plugins/bootstrap-tagsinput/dist/bootstrap-tagsinput.css" rel="stylesheet" />

    <!-- DataTables -->
    <link href="<?= base_url('assets/'); ?>plugins/datatables/dataTables.bootstrap4.min.css" rel="stylesheet"
        type="text/css" />
    <link href="<?= base_url('assets/'); ?>plugins/datatables/buttons.bootstrap4.min.css" rel="stylesheet"
        type="text/css" />
    <!-- Responsive datatable examples -->
    <link href="<?= base_url('assets/'); ?>plugins/datatables/responsive.bootstrap4.min.css" rel="stylesheet"
        type="text/css" />
    <!-- Multi Item Selection examples -->
    <link href="<?= base_url('assets/'); ?>plugins/datatables/select.bootstrap4.min.css" rel="stylesheet"
        type="text/css" />
    <link rel="shortcut icon" href="<?= base_url('assets/'); ?>images/favicon.ico">

    <!-- Select2 CSS -->
    <link href="<?= base_url('assets/'); ?>plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" />

    <!-- Custom box css -->
    <link href="<?= base_url('assets/'); ?>plugins/custombox/dist/custombox.min.css" rel="stylesheet">

    <!-- Date Picker css -->
    <link href="<?= base_url('assets/'); ?>plugins/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css"
        rel="stylesheet">
    <link href="<?= base_url('assets/'); ?>plugins/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">

    <!-- Sweet Alert css -->
    <link href="<?= base_url('assets/'); ?>plugins/sweet-alert/sweetalert2.min.css" rel="stylesheet" type="text/css" />

    <!-- App css -->
    <link href="<?= base_url('assets/'); ?>css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="<?= base_url('assets/'); ?>css/icons.css" rel="stylesheet" type="text/css" />
    <link href="<?= base_url('assets/'); ?>css/style.css" rel="stylesheet" type="text/css" />
    <!-- Notification css (Toastr) -->
    <link href="<?= base_url('assets/'); ?>plugins/toastr/toastr.min.css" rel="stylesheet" type="text/css" />

    <script src="<?= base_url('assets/'); ?>js/modernizr.min.js"></script>

    <!-- form Uploads -->
    <link href="<?= base_url('assets/'); ?>plugins/fileuploads/css/dropify.min.css" rel="stylesheet" type="text/css" />

    <!-- jQuery  -->
    <script src="<?= base_url('assets/'); ?>js/jquery.min.js"></script>
    <script src="<?= base_url('assets/'); ?>js/popper.min.js"></script>
    <script src="<?= base_url('assets/'); ?>js/bootstrap.min.js"></script>
    <script src="<?= base_url('assets/'); ?>js/waves.js"></script>
    <script src="<?= base_url('assets/'); ?>js/jquery.slimscroll.js"></script>

    <!-- App js -->
    <script src="<?= base_url('assets/'); ?>js/jquery.core.js"></script>
    <script src="<?= base_url('assets/'); ?>js/jquery.app.js"></script>
    <!-- Sweet Alert Js  -->
    <script src="<?= base_url('assets/'); ?>plugins/sweet-alert/sweetalert2.min.js"></script>

</head>

<body>

    <!-- Navigation Bar-->
    <header id="topnav">
        <div class="topbar-main">
            <div class="container-fluid">

                <!-- Logo container-->
                <div class="logo">
                    <!-- Text Logo -->
                    <a href="index.html" class="logo">
                        <span class="logo-small"><i class="mdi mdi-radar"></i></span>
                        <span class="logo-large"><i class=></i>Sekretariat Inspektorat Jenderal</span>
                    </a>
                    <!-- Image Logo -->
                    <!-- <a href="index.html" class="logo">
                        <img src="<?= base_url('assets/'); ?>images/logo-sm.png" alt="" height="26" class="logo-small">
                        <img src="<?= base_url('assets/'); ?>images/logo.png" alt="" height="24" class="logo-large">
                    </a> -->
                </div>
                <!-- End Logo container-->

                <div class="menu-extras topbar-custom">

                    <ul class="list-unstyled topbar-right-menu float-right mb-0">

                        <li class="menu-item">
                            <!-- Mobile menu toggle-->
                            <a class="navbar-toggle nav-link">
                                <div class="lines">
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                </div>
                            </a>
                            <!-- End mobile menu toggle-->
                        </li>
                        <li class="hide-phone">
                            <form class="app-search">
                                <input type="text" placeholder="Search..." class="form-control">
                                <button type="submit"><i class="fa fa-search"></i></button>
                            </form>
                        </li>
                        <li>
                            <!-- Notification -->
                            <div class="notification-box">
                                <ul class="list-inline mb-0">
                                    <li>
                                        <a href="javascript:void(0);" class="right-bar-toggle">
                                            <i class="mdi mdi-bell-outline noti-icon"></i>
                                        </a>
                                        <div class="noti-dot">
                                            <span class="dot"></span>
                                            <span class="pulse"></span>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <!-- End Notification bar -->
                        </li>

                        <li class="dropdown notification-list">
                            <a class="nav-link dropdown-toggle waves-effect waves-light nav-user" data-toggle="dropdown"
                                href="#" role="button" aria-haspopup="false" aria-expanded="false">
                                <img src="<?= base_url('assets/images/users/' . $user['image']); ?>" alt="user"
                                    class="rounded-circle">
                            </a>
                            <div class="dropdown-menu dropdown-menu-right profile-dropdown ">

                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <i class="ti-user m-r-5"></i>
                                    <?= $user['nama_user']; ?>
                                </a>

                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <i class="ti-settings m-r-5"></i> Settings
                                </a>

                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <i class="ti-lock m-r-5"></i> Lock screen
                                </a>

                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <i class="ti-power-off m-r-5"></i> Logout
                                </a>

                            </div>
                        </li>

                    </ul>
                </div>
                <!-- end menu-extras -->

                <div class="clearfix"></div>

            </div>
            <!-- end container -->
        </div>
        <!-- end topbar-main -->

        <div class="navbar-custom">
            <div class="container-fluid">
                <div id="navigation">
                    <!-- Navigation Menu-->
                    <ul class="navigation-menu">
                        <li class="has-submenu">
                            <a href="index.html"><i class="mdi mdi-view-dashboard"></i> <span> Dashboard </span> </a>
                        </li>
                        <li class="has-submenu">
                            <a href="#"><i class="mdi mdi mdi-newspaper"></i> <span> Surat </span> </a>
                            <ul class="submenu">
                                <li><a href="ui-buttons.html">Surat Masuk</a></li>
                                <li><a href="ui-cards.html">Surat Keluar</a></li>
                                <hr>
                                <li><a href="<?= base_url('Surat/Nota_Dinas'); ?> ">Nota Dinas</a></li>
                            </ul>
                        </li>
                    </ul>
                    <!-- End navigation menu -->
                </div>
                <!-- end #navigation -->
            </div>
            <!-- end container -->
        </div>
        <!-- end navbar-custom -->
    </header>
    <!-- End Navigation Bar-->

    <div class="wrapper">
        <div class="container-fluid">

            <!-- Page-Title -->
            <div class="row">
                <div class="col-sm-12">
                    <h4 class="page-title">Detail Nomor : <?= $detail['id_no_surat']; ?></h4>
                    <p id="noSurat" hidden>
                        <?= $detail['id_no_surat']; ?>
                    </p>
                </div>
            </div>
            <!-- end page title end breadcrumb -->

            <div class="row">
                <div class="col-md-8">
                    <div class="card-box task-detail">
                        <div class="dropdown pull-right">
                            <a href="#" class="dropdown-toggle arrow-none card-drop" data-toggle="dropdown"
                                aria-expanded="false">
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
                        <?php if ($detail['lampiran'] == "") { } else {; ?>
                        <div class="dropdown pull-right">
                            <a href="#" onclick="warningDelete(); return false;"
                                class="dropdown-toggle arrow-none card-drop">
                                <i class="fa fa-window-close" data-toggle="tooltip" data-placement="top"
                                    title="Delete Lampiran"></i>
                            </a>
                        </div>
                        <?php }; ?>

                        <h4 class="font-600 m-b-20">Lampiran</h4>
                        <hr>
                        <ul class="list-inline task-dates m-b-0 m-t-20">
                            <li>
                                <h5 class="font-600 m-b-5">Tanggal Upload Lampiran</h5>
                                <p>
                                    <?= $detail['date_upload']; ?>
                                </p>
                            </li>
                            <li>
                                <h5 class="font-600 m-b-5">Tanggal Kirim</h5>
                                <?php if ($detail['status'] == 0) {; ?>

                                <span class="badge badge-danger">Not Sent</span>
                                <?php } else { ?>
                                <p>
                                    <?= $detail['date_kirim']; ?>
                                </p>
                                <?php } ?>
                            </li>
                        </ul>

                        <?php if ($detail['lampiran'] == "") {; ?>
                        <?php } else { ?>
                        <embed src="<?= base_url('assets/lampiran/surat/nodin/' . $detail['lampiran']); ?>" width="100%"
                            height="720" type="application/pdf">
                        <?php } ?>

                        <div class="clearfix"></div>
                        <?php if ($detail['lampiran'] == "") {; ?>
                        <div class="attached-files m-t-30">
                            <form action="<?= base_url('surat/uploadLampiran/') . $detail['id_no_surat']; ?>"
                                method="post" enctype="multipart/form-data">
                                <h4 class="header-title m-t-0 m-b-30">Lampiran Belum Ada</h4>
                                <input name="fileLampiran" type="file" class="dropify" data-height="100"
                                    data-max-file-size="10M" data-allowed-file-extensions="pdf" />
                                <br>
                                <button type="submit" class="btn btn-primary waves-effect waves-light">Upload</button>
                                <hr>
                            </form>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="text-right m-t-30">
                                        <button type="submit" disabled data-toggle="tooltip" title="Belum ada Lampiran"
                                            class="btn btn-success waves-effect waves-light">
                                            Send
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php } else { ?>
                        <div class="attached-files m-t-30">
                            <table class="table">
                                <thead class="thead-light">
                                    <tr>
                                        <th>#</th>
                                        <th>Tujuan</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th scope="row">1</th>
                                        <td>Mark</td>
                                        <td>Otto</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">2</th>
                                        <td>Jacob</td>
                                        <td>Thornton</td>
                                    </tr>
                                </tbody>
                            </table>
                            <hr>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="text-right m-t-30">
                                        <?php if ($detail['status'] == 0) {; ?>
                                        <button onclick="#" type="submit"
                                            class="btn btn-success waves-effect waves-light">
                                            Send
                                        </button>
                                        <?php } else { ?>
                                        <button type="submit" disabled class="btn btn-danger waves-effect waves-light">
                                            Sended
                                        </button>
                                        <?php } ?>
                                        <button type="button" class="btn btn-light waves-effect">Back
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php } ?>
                    </div>
                </div>
                <!-- end col -->

                <div class="col-md-4">
                    <div class="card-box">
                        <a id="angkaKomen" href="">
                            <p class="header-title m-t-0 m-b-30">Comments</p>
                        </a>
                        <table id="datatable-comment" class="cell-border" style="width:100%">
                        </table>
                        <br>
                        <div>
                            <div class="media m-b-20">
                                <div class="d-flex mr-3">
                                    <a href="#"> <img class="media-object rounded-circle thumb-sm" alt="64x64"
                                            src="<?= base_url('assets/images/users/' . $user['image']); ?>"> </a>
                                </div>
                                <!-- dipake buat parsing variabel id_user ke javascript -->
                                <p id="namaUserComment" hidden>
                                    <?php echo $user['id_user']; ?>
                                </p>
                                <!-- END -->
                                <div class="media-body">
                                    <textarea id="commentPost" rows="1" class="form-control"
                                        placeholder="Type to Comment... alt+enter to post"></textarea>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- end col -->
            </div>
            <!-- end row -->
        </div>
        <!-- end container -->

        <!-- Right Sidebar -->
        <div class="side-bar right-bar">
            <a href="javascript:void(0);" class="right-bar-toggle">
                <i class="mdi mdi-close-circle-outline"></i>
            </a>
            <h4 class="">Notifications</h4>
            <div class="notification-list nicescroll">
                <ul class="list-group list-no-border user-list">
                    <li class="list-group-item">
                        <a href="#" class="user-list-item">
                            <div class="avatar">
                                <img src="<?= base_url('assets/'); ?>images/users/avatar-2.jpg" alt="">
                            </div>
                            <div class="user-desc">
                                <span class="name">Michael Zenaty</span>
                                <span class="desc">There are new settings available</span>
                                <span class="time">2 hours ago</span>
                            </div>
                        </a>
                    </li>
                    <li class="list-group-item">
                        <a href="#" class="user-list-item">
                            <div class="icon bg-info">
                                <i class="mdi mdi-account"></i>
                            </div>
                            <div class="user-desc">
                                <span class="name">New Signup</span>
                                <span class="desc">There are new settings available</span>
                                <span class="time">5 hours ago</span>
                            </div>
                        </a>
                    </li>
                    <li class="list-group-item">
                        <a href="#" class="user-list-item">
                            <div class="icon bg-pink">
                                <i class="mdi mdi-comment"></i>
                            </div>
                            <div class="user-desc">
                                <span class="name">New Message received</span>
                                <span class="desc">There are new settings available</span>
                                <span class="time">1 day ago</span>
                            </div>
                        </a>
                    </li>
                    <li class="list-group-item active">
                        <a href="#" class="user-list-item">
                            <div class="avatar">
                                <img src="<?= base_url('assets/'); ?>images/users/avatar-3.jpg" alt="">
                            </div>
                            <div class="user-desc">
                                <span class="name">James Anderson</span>
                                <span class="desc">There are new settings available</span>
                                <span class="time">2 days ago</span>
                            </div>
                        </a>
                    </li>
                    <li class="list-group-item active">
                        <a href="#" class="user-list-item">
                            <div class="icon bg-warning">
                                <i class="mdi mdi-settings"></i>
                            </div>
                            <div class="user-desc">
                                <span class="name">Settings</span>
                                <span class="desc">There are new settings available</span>
                                <span class="time">1 day ago</span>
                            </div>
                        </a>
                    </li>

                </ul>
            </div>
        </div>
        <!-- /Right-bar -->
    </div>

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    2016 - 2019 © Adminto. Coderthemes.com
                </div>
            </div>
        </div>
    </footer>
    <!-- End Footer -->

</body>

</html>

<script src="<?= base_url('assets/'); ?>plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url('assets/'); ?>plugins/datatables/dataTables.bootstrap4.min.js"></script>

<!-- Responsive examples -->
<script src="<?= base_url('assets/'); ?>plugins/datatables/dataTables.responsive.min.js"></script>
<script src="<?= base_url('assets/'); ?>plugins/datatables/responsive.bootstrap4.min.js"></script>

<!-- Sweet Alert css -->
<link href="<?= base_url('assets/'); ?>css/datatablewrap.css" rel="stylesheet" type="text/css" />
<!-- file uploads js -->
<script src="<?= base_url('assets/'); ?>/plugins/fileuploads/js/dropify.min.js"></script>

<!-- Bootstrap tagsinput -->
<script src="<?= base_url('assets/'); ?>plugins/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js"></script>

<!-- Toastr js -->
<script src="<?= base_url('assets/'); ?>plugins/toastr/toastr.min.js"></script>

<script>
var ta = document.getElementById('commentPost');
ta.onkeydown = function(event) {
    if (event.defaultPrevented) {
        return;
    }
    var handled = false;
    if (event.key !== undefined) {
        if (event.key === 'Enter' && event.altKey) {
            addComment();
        }
    } else if (event.keyIdentifier !== undefined) {
        if (event.keyIdentifier === "Enter" && event.altKey) {
            addComment();
        }

    } else if (event.keyCode !== undefined) {
        if (event.keyCode === 13 && event.altKey) {
            addComment();
        }
    }
    if (handled) {
        event.preventDefault();
    };
};

function addComment() {
    var comment = $("#commentPost").val();
    var user = $("#namaUserComment").text();
    var idSurat = $("#noSurat").text();
    if (comment !== "") {
        $.ajax({
            url: "<?= Base_url('surat/addComment'); ?>",
            type: "post",
            data: {
                comment: comment,
                user: user,
                idSurat: idSurat,
            },
            success: function(data) {
                $('#datatable-comment').DataTable().ajax.reload();
                $("#commentPost").val('');
                $("#commentPost").focusout('');
                toastr.success('New Comment Success!', user)
            }
        });
    }
};

function warningDelete() {
    var idSurat = $("#noSurat").text();
    swal({
        title: 'Apa anda yakin?',
        text: "File tidak bisa di Kembalikan!!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#4fa7f3',
        cancelButtonColor: '#d57171',
        confirmButtonText: 'Yes, delete it!'
    }).then(function() {
        deleteLampiran(idSurat);
        swal(
            'Deleted!',
            'Data telah di Delete.',
            'success'
        )
    });
}

function deleteLampiran($id) {

    idSurat = $id;
    $.ajax({
        url: "<?= Base_url('surat/deleteLampiran'); ?>",
        type: "post",
        data: {
            idSurat: idSurat,
        },
        success: function(data) {
            console.log(idSurat);
            setTimeout(location.reload.bind(location), 1000);
            toastr.success('Lampiran Deleted');
        }
    });
};
</script>

<script>
$(document).ready(function() {
    function nl2br(str, is_xhtml) {
        var breakTag = (is_xhtml || typeof is_xhtml === 'undefined') ? '<br />' : '<br>';
        return (str + '').replace(/([^>\r\n]?)(\r\n|\n\r|\r|\n)/g, '$1' + breakTag + '$2');
    }
    var table = $('#datatable-comment').DataTable({
        oLanguage: {
            sProcessing: "Sabar yak...",
            zeroRecords: "No Comment Here, be The First"
        },
        "processing": true,
        "serverSide": true,
        "scrollY": "500px",
        "scrollX": false,
        "scrollCollapse": true,
        "lengthChange": false,
        "searching": false,
        "paging": false,
        "info": false,
        "ordering": false,
        "ajax": {
            "url": '<?= base_url("surat/getDataComment2/"); ?>' + $("#noSurat").text(),
            "type": "POST",
            "dataSrc": ''
        },
        "columnDefs": [{
            data: {},
            targets: 0,
            render: function(data, type, full, meta) {
                var namaUser = $("#namaUserComment").text();
                if (data.user == namaUser) {
                    var display = '<div class="media m-b-20">' +
                        '<div class="d-flex mr-3">' +
                        '<a> <img class="media-object rounded-circle thumb-sm" alt="64x64" src="<?= base_url('assets/images/users/'); ?>' +
                        data.image + '"> </a>' +
                        '</div>' +
                        '<div class="media-body">' +
                        '<a href="#" onclick="deleteComment(' + data.id_comment +
                        '); return false;"><i class="mdi mdi-trash-can text-danger pull-right"></i></a><h5 class="mt-0">' +
                        data.nama_user + '</h5>' +
                        '<p class="font-13 text-muted mb-0"><a href="" class="text-primary"></a>' +
                        nl2br(data.isi) + '</p>' +
                        '<p class="text-success font-13">' + data.tanggal + '</p>' +
                        '</div>' +
                        '</div>';
                } else {
                    var display = '<div class="media m-b-20">' +
                        '<div class="d-flex mr-3">' +
                        '<a> <img class="media-object rounded-circle thumb-sm" alt="64x64" src="<?= base_url('assets/images/users/'); ?>' +
                        data.image + '"> </a>' +
                        '</div>' +
                        '<div class="media-body">' +
                        '<h5 class="mt-0">' + data.nama_user + '</h5>' +
                        '<p class="font-13 text-muted mb-0"><a href="" class="text-primary"></a>' +
                        nl2br(data.isi) + '</p>' +
                        '<p class="text-success font-13">' + data.tanggal + '</p>' +
                        '</div>' +
                        '</div>';
                }
                return display;
            }
        }],
    });
})

function deleteComment($id) {
    var idComment = $id;
    swal({
        title: 'Apa anda yakin?',
        text: "File tidak bisa di Kembalikan!!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#4fa7f3',
        cancelButtonColor: '#d57171',
        confirmButtonText: 'Yes, delete it!'
    }).then(function() {
        $.ajax({
            url: "<?= Base_url('surat/deleteComment'); ?>",
            type: "post",
            data: {
                idComment: idComment,
            },
            success: function(data) {
                toastr.success('Lampiran Deleted');
                $('#datatable-comment').DataTable().ajax.reload();
            }
        });
    });
}
</script>
<script type="text/javascript">
$('.dropify').dropify({
    messages: {
        'default': 'Drag and drop a file here or click',
        'replace': 'Drag and drop or click to replace',
        'remove': 'Remove',
        'error': 'Ooops, something wrong appended.',
    },
    error: {
        'fileSize': 'The file size is too big (10M max).'
    }
});
</script>