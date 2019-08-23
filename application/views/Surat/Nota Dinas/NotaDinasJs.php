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
<!-- Required datatable js -->
<script src="<?= base_url('assets/'); ?>plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url('assets/'); ?>plugins/datatables/dataTables.bootstrap4.min.js"></script>

<!-- Responsive examples -->
<script src="<?= base_url('assets/'); ?>plugins/datatables/dataTables.responsive.min.js"></script>
<script src="<?= base_url('assets/'); ?>plugins/datatables/responsive.bootstrap4.min.js"></script>

<!-- Select2 JS -->
<script src="<?= base_url('assets/'); ?>plugins/select2/js/select2.min.js" type="text/javascript"></script>

<!-- Validation js (Parsleyjs) -->
<script src="<?= base_url('assets/'); ?>plugins/parsleyjs/dist/parsley.min.js"></script>

<!-- Toastr js -->
<script src="<?= base_url('assets/'); ?>plugins/toastr/toastr.min.js"></script>

<!-- Datepicker JS -->
<script src="<?= base_url('assets/'); ?>plugins/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>

<!-- script datatable -->
<script type="text/javascript">
$(document).ready(function() {
    $.fn.dataTableExt.oApi.fnPagingInfo = function(oSettings) {
        return {
            "iStart": oSettings._iDisplayStart,
            "iEnd": oSettings.fnDisplayEnd(),
            "iLength": oSettings._iDisplayLength,
            "iTotal": oSettings.fnRecordsTotal(),
            "iFilteredTotal": oSettings.fnRecordsDisplay(),
            "iPage": Math.ceil(oSettings._iDisplayStart / oSettings._iDisplayLength),
            "iTotalPages": Math.ceil(oSettings.fnRecordsDisplay() / oSettings._iDisplayLength)
        };
    };
    //Buttons 
    var table = $('#datatable-surat').DataTable({
        initComplete: function() {
            var api = this.api();
            $('#datatable-surat_filter input')
                .off('.DT')
                .on('keyup.DT', function(e) {
                    if (e.keyCode == 13) {
                        api.search(this.value).draw();
                    }
                });
        },
        oLanguage: {
            sProcessing: "Mencari..."
        },
        "lengthChange": true,
        "responsive": true,
        "deferRender": true,
        "processing": true, //Feature control the processing indicator.
        "serverSide": true, //Feature control DataTables' server-side processing mode.
        "order": [], //Initial no order.
        // Load data for the table's content from an Ajax source
        "ajax": {
            "url": '<?= base_url("surat/getDataMasuk"); ?>',
            "type": "POST"
        },
        // lengthChange: true,
        // responsive: true,
        // // datanya
        // processing: true,
        // serverSide: true,
        // ajax: '<?= base_url("surat/getDataMasuk"); ?>',
        "columns": [{

                "data": null,
                "width": "10px",

            },
            {
                "data": "nosurat_nodin",
                "width": "30px",
            },
            {
                "data": "dari_nodin",
                "width": "40px",
            },
            {
                "width": "40px",
            },
            {
                "data": "perihal_nodin",
                "width": "100px",
            },
            {
                "data": "aksi",
                "width": "80px",
                "sClass": "text-center",
            },

        ],
        "columnDefs": [{
                // render: function (data, type, full, meta) {
                //     return type === 'display' && data.length > 30 ?
                //     '<span title="'+data+'">'+data.substr( 0, 28 )+'...</span>' :
                //     data;
                // },

                targets: 4,
                render: function(data, type, full, meta) {
                    var str = data.split('\n');
                    var string = '';
                    for (i = 0; i < str.length; i++) {
                        string += str[i] + "<br>";
                    }
                    return string;
                }

            },
            {
                data: "ke_nodin",
                targets: 3,
                render: function(data, type, full, meta) {
                    var str = data.split(',');
                    var string = '';
                    for (i = 0; i < str.length; i++) {
                        string += i + 1 + ". " + str[i] + "<br>";
                    }
                    return string;
                }

            },

            {
                "searchable": false,
                "targets": 0
            }
        ],
        "order": [
            [1, 'desc']
        ],
        "buttons": [
            'copy', 'excel', 'pdf'
        ],
        "rowCallback": function(row, data, iDisplayIndex) {
            var info = this.fnPagingInfo();
            var page = info.iPage;
            var length = info.iLength;
            var index = page * length + (iDisplayIndex + 1);
            $('td:eq(0)', row).html(index);
        }
    });
});
</script>
<!-- script select2 -->
<script type="text/javascript">
// Datatables
$(document).ready(function() {
    //Select 2
    $(".select2").select2();
    $(".selectTujuan").select2({
        ajax: {
            url: '<?= base_url("surat/getDataTujuan"); ?>',
            type: "post",
            dataType: 'json',
            delay: 250,
            data: function(params) {
                return {
                    nama: params.term
                };
            },
            processResults: function(data) {
                var results = [];
                $.each(data, function(index, item) {
                    results.push({
                        id: item.nama,
                        text: item.nama
                    });
                });
                return {
                    results: results
                };
            },
            cache: true
        },
        minimumInputLength: 3,
        placeholder: "Pilih tujuan Nota Dinas"
    });
});
</script>

<!-- script data -->
<script>
function addData() {
    var asal = $('[name="asal"]').val();
    var tujuan = $('[name="tujuan"]').val();
    var perihal = $('[name="perihal"]').val();
    var tanggalNodin = $('[name="tanggalNodin"]').val();
    if (asal !== "" && tujuan !== "") {
        if (perihal !== "" && tanggalNodin !== "") {
            $.ajax({
                url: "<?= Base_url('surat/addNodin'); ?>",
                type: "post",
                data: {
                    asal: asal,
                    tujuan: tujuan,
                    perihal: perihal,
                    tanggalNodin: tanggalNodin,
                },
                success: function(data) {
                    $('#datatable-surat').DataTable().ajax.reload();
                    $('#addModal').modal('hide');
                    viewNoSurat();
                    clearForm();
                }
            })
        }
    } else {}
}

function clearForm() {

    $('[name="tujuan"]').val("").trigger("change");;
    $('[name="perihal"]').val('');
    $('[name="tanggalNodin"]').val('');
}

//script edit/ delete data siswa
function viewNoSurat() {
    $.ajax({
        url: "<?= base_url('surat/getNoNodin'); ?>",
        type: "POST",
        dataType: "JSON",
        async: false,
        success: function(data) {
            swal(
                data.nosurat_nodin,
                'Nomor Surat',
                'success'
            );
            toastr.info(data.nosurat_nodin, 'Nomor Surat Dinas anda : ', {
                "closeButton": false,
                "debug": false,
                "newestOnTop": true,
                "progressBar": false,
                "positionClass": "toast-top-right",
                "preventDuplicates": false,
                "onclick": null,
                "showDuration": "2000",
                "hideDuration": "500",
                "timeOut": "1000",
                "extendedTimeOut": "2000",
                "showEasing": "swing",
                "hideEasing": "linear",
                "showMethod": "fadeIn",
                "hideMethod": "fadeOut"
            });
        }
    });
}

//script edit/ delete data siswa
function warningDelete($id) {
    swal({
        title: 'Apa anda yakin?',
        text: "File tidak bisa di Kembalikan!!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#4fa7f3',
        cancelButtonColor: '#d57171',
        confirmButtonText: 'Yes, delete it!'
    }).then(function() {
        deleteData($id)
        swal(
            'Deleted!',
            'Data telah di Delete.',
            'success'
        )
    });
}

function deleteData($id) {
    var id = $id;
    $.ajax({
        url: "<?= base_url('Surat/deleteNodin/'); ?>" + id,
        async: false,
        success: function(data) {
            $('#datatable-surat').DataTable().ajax.reload();
        }
    });
}

function viewData($id) {
    var id = $id;
    $.ajax({
        url: "<?= Base_url('surat/viewDetailNodin/'); ?>" + id,
        type: "POST",
        dataType: "JSON",
        async: false,
        success: function(data) {
            $('[name="labelViewData"]').text('Detail Data Nota Dinas Nomor : ' + data.nosurat_nodin);
            $('[name="noData"]').text(data.id_nodin);
            $('[name="tanggalView"]').val(data.tanggal_nodin);
            $('[name="tanggalView"]').css('pointer-events', 'none');
            $('[name="dariView"]').val(data.dari_nodin);
            // split tujuan biar ke select semua
            var str = data.ke_nodin;
            var string = str.split(',');
            var results = [];
            for (i = 0; i < string.length; i++) {
                results.push({
                    id: string[i],
                    text: string[i],
                    selected: true
                });
            };
            $('[name="tujuanView"]').empty();
            $('[name="tujuanView"]').select2({
                data: null,
                disabled: true,
                data: results,
                templateResult: results
            });
            // end
            $('[name="perihalView"]').val(data.perihal_nodin);
            $('#detailModal').modal('show');
        }
    });
}

function openEdit() {
    var id = $('[name="noData"]').text();
    $('[name="tanggalView"]').removeAttr("readonly");
    $('[name="dariView"]').removeAttr("readonly");
    $('[name="tujuanView"]').select2({
        ajax: {
            url: '<?= base_url("surat/getDataTujuan"); ?>',
            type: "post",
            dataType: 'json',
            delay: 250,
            data: function(params) {
                return {
                    nama: params.term
                };
            },
            processResults: function(data) {
                var results = [];
                $.each(data, function(index, item) {
                    results.push({
                        id: item.nama,
                        text: item.nama
                    });
                });
                return {
                    results: results
                };
            },
            cache: true
        },
        disabled: false,
        minimumInputLength: 3,
        placeholder: "Pilih tujuan Nota Dinas"
    });
    $('[name="perihalView"]').removeAttr("readonly");
    $('[name="editData"]').removeClass("btn-danger");
    $('[name="editData"]').addClass("btn-success");
    $('[name="editData"]').removeAttr("onclick");
    $('[name="editData"]').attr("onclick", "saveEdit(" + id + ")");
    $('[name="editData"]').text('Simpan');
    $('[name="tanggalView"]').css("pointer-events", "");
}

function closeEdit() {
    $('[name="tanggalView"]').prop("readonly", true);
    $('[name="dariView"]').prop("readonly", true);
    $('[name="perihalView"]').prop("readonly", true);
    $('[name="editData"]').addClass("btn-danger");
    $('[name="editData"]').removeClass("btn-success");
    $('[name="editData"]').removeAttr("onclick", "saveEdit()");
    $('[name="editData"]').attr("onclick", "openEdit()");
    $('[name="editData"]').text('edit');
    $('#detailModal').modal('hide');
    $('[name="tanggalView"]').css('pointer-events', 'none');
}

function saveEdit($id) {
    var id = $id;
    var asal = $('[name="dariView"]').val();
    var tujuan = $('[name="tujuanView"]').val();
    var perihal = $('[name="perihalView"]').val();
    var tanggalNodin = $('[name="tanggalView"]').val();
    if (asal !== "" && tujuan !== "") {
        if (perihal !== "" && tanggalNodin !== "") {
            $.ajax({
                url: "<?= Base_url('surat/editNodin'); ?>",
                type: "post",
                data: {
                    id: id,
                    asal: asal,
                    tujuan: tujuan,
                    perihal: perihal,
                    tanggalNodin: tanggalNodin,
                },
                success: function(data) {
                    $('#datatable-surat').DataTable().ajax.reload();
                    $('#detailModal').modal('hide');
                    closeEdit()
                    // viewNoSurat();
                    // clearForm();
                }
            })
        }
    } else {}
}
jQuery('#tanggalNodin').datepicker({
    autoclose: true,
    todayHighlight: true,
    format: "yyyy-mm-dd"
});
$('[name="tanggalView"]').datepicker({
    autoclose: true,
    format: "yyyy-mm-dd"
});
</script>