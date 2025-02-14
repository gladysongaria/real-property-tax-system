
$(document).on('click', '#logout', function (e) {
    e.preventDefault();
    
    var url = $(this).prop('action');
    e.preventDefault();
    bootbox.confirm({
        closeButton: false,
        message: "Are you sure you want to logout?",
        buttons: {
            confirm: {
                label: 'Yes',
                className: 'btn-success'
            },
            cancel: {
                label: 'No',
                className: 'btn-danger'
            }
        },
        callback: function (result) {
            if (result) {
                var dialog = bootbox.dialog({
                    message: '<p class="text-center mb-0" style="color:green;"><i class="fa fa-check"></i> Logout Successfully </p>',
                    closeButton: false
                });
                $("#logoutform").submit();
                 setInterval('location.reload()', 2000);
                 
            }
        }
    });
     
});
