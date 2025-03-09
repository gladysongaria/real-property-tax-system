$(document).on('change','.filter-type',function () {
    var name = $(this).val()
    var brgy = $(this).val()
    if ($("#filter_taxrol").val() == "brgy") {
        $('#label_taxrolName').html("Select Barangay")
        $('#filter_brgy').attr('name', 'select_brgy');
    } else {
        $('#label_taxrolName').html("Name")
        $('#filter_brgy').attr('name', 'ownerName');
        
    }
});

