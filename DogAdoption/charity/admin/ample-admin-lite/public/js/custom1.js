
$(document).ready(function () {
    setTimeout(function () {
        $('.alert').hide();
    },3000);


    if($("#all_delete").click(function () {
            if(this.checked){
                $('.check_all_data').each(function() {
                    $('#delete_all_data').show();
                    this.checked=true;
                })
            }
            else
            {
                $( '.check_all_data').each(function() {
                    $('#delete_all_data').hide();
                    this.checked=false;
                })
            }
        }));

    $('#delete_all_data').hide();
});

