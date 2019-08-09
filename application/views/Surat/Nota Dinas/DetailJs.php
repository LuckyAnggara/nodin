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
ta.onkeydown = function (event) {
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

function addComment(){
    var comment = $("#commentPost").val();
    var user = $("#namaUserComment").text();
    var idSurat = $("#noSurat").text();
    if (comment !== "") {
        $.ajax({
            url: "<?= Base_url('surat/addComment'); ?>",
            type: "post",
            data: {
            comment: comment,
            user : user,
            idSurat:  idSurat,
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
function deleteLampiran($id){
   
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
      function nl2br (str, is_xhtml) {   
         var breakTag = (is_xhtml || typeof is_xhtml === 'undefined') ? '<br />' : '<br>';    
         return (str + '').replace(/([^>\r\n]?)(\r\n|\n\r|\r|\n)/g, '$1'+ breakTag +'$2');
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
         "searching" : false,
         "paging":false,
         "info":false,
         "ordering":false,
         "ajax": {
                    "url": '<?= base_url("surat/getDataComment2/"); ?>'+ $("#noSurat").text(),
                    "type": "POST",
                    "dataSrc":''   
         },
         "columnDefs": [
                  {
                    data :{               },
                    targets: 0,
                    render: function (data, type, full, meta) {
                        var namaUser = $("#namaUserComment").text();
                        if(data.user == namaUser){
                           var display = '<div class="media m-b-20">'+
                                        '<div class="d-flex mr-3">'+
                                            '<a> <img class="media-object rounded-circle thumb-sm" alt="64x64" src="<?= base_url('assets/images/users/');?>'+data.image+'"> </a>'+
                                        '</div>'+
                                        '<div class="media-body">'+
                                            '<a href="#" onclick="deleteComment('+data.id_comment+'); return false;"><i class="mdi mdi-trash-can text-danger pull-right"></i></a><h5 class="mt-0">'+data.nama_user+'</h5>'+
                                            '<p class="font-13 text-muted mb-0"><a href="" class="text-primary"></a>'+nl2br(data.isi)+'</p>'+
                                            '<p class="text-success font-13">'+data.tanggal+'</p>'+
                                        '</div>'+
                                    '</div>';
                        }else{
                           var display = '<div class="media m-b-20">'+
                                        '<div class="d-flex mr-3">'+
                                            '<a> <img class="media-object rounded-circle thumb-sm" alt="64x64" src="<?= base_url('assets/images/users/');?>'+data.image+'"> </a>'+
                                        '</div>'+
                                        '<div class="media-body">'+
                                            '<h5 class="mt-0">'+data.nama_user+'</h5>'+
                                            '<p class="font-13 text-muted mb-0"><a href="" class="text-primary"></a>'+nl2br(data.isi)+'</p>'+
                                            '<p class="text-success font-13">'+data.tanggal+'</p>'+
                                        '</div>'+
                                    '</div>';
                        }
                        return display;
                  }
                  }], 
      });
   })
   function deleteComment($id)
      {
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