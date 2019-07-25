<script>
    function myFunction() {
    var checkPrefix = document.getElementById("aktifPrefix");
    // Get the output text
    var text = $('[name="prefixText"]').val();

    // If the checkbox is checked, display the output text
    if (checkPrefix.checked == true){
        $('[name="contohPrefix"]').text(text);
    } else {
      
    }
    }
        
</script>