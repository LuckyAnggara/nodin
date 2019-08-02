<script src="<?= base_url('assets/'); ?>plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url('assets/'); ?>plugins/datatables/dataTables.bootstrap4.min.js"></script>

<!-- Responsive examples -->
<script src="<?= base_url('assets/'); ?>plugins/datatables/dataTables.responsive.min.js"></script>
<script src="<?= base_url('assets/'); ?>plugins/datatables/responsive.bootstrap4.min.js"></script>

<!-- Bootstrap tagsinput -->
<script src="<?= base_url('assets/'); ?>plugins/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js"></script>

 <!-- App js -->
<script src="<?= base_url('assets/'); ?>js/jquery.core.js"></script>
<script src="<?= base_url('assets/'); ?>js/jquery.app.js"></script>

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
            }
            })
    }
}
</script>

<script>
   $(document).ready(function() {
      var table = $('#datatable-comment').DataTable({
         "lengthChange": false,
         "searching" : false,
         "ordering":false,
         "paging":false,
         "info":false,
         "ajax": {
                    "url": '<?= base_url("surat/getDataComment2/"); ?>'+'1',
                    "type": "POST"
                },
         "columnDefs": [
                  {
                    data : "isi",
                    targets: 0,
                    render: function (data, type, full, meta) {
                        var str = '<div class="row">'+
                                        '<div class="col-sm-12">'+
                                            '<div class="text-right m-t-30">'+
                                          data +
                                          '</div>'+
                                          '</div>'+
                                          '</div>';
                        return str;
                  }
                  }]
         // "columns": [{

         //                "data": "id_comment",
         //                "width": "10px",

         //            }]  
      });
   })
</script>

