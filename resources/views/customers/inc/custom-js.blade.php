<script>
    $(document).on('click', '#add-more-contacts', function() {
        $('.contact-information-row:last').clone()
            .find("input:text").val("").end()
            .find("input:hidden").val("").end()
            .appendTo('.contact-information:last');
    });

    $(document).on('click','.remove-row', function(){
        if ($('.contact-information-row').length == '1') {
            return;
        }
        $(this).closest(".contact-information-row").remove();
        var id = $(this).attr('data-id');
        if(id != 0 ){
        deleteCustomerByid(id);
        }
    });

    function deleteCustomerByid(id){
        if (id=='') {
            return;
        }
        var csrf_token = $('meta[name="csrf-token"]').attr('content');
        $.ajax({
            type: 'POST',
            url: '{{route("customers.customer_contact_destroy")}}',
            data: {id:id, _token: csrf_token},
            dataType: 'JSON',
            success: function (data) {
                if (data.status == 'success') {
                } 
            }
        });
    }
</script>