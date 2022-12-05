$(function () {
    $('.js-basic-example').DataTable({
        "order": []
    });

    //Exportable table
    $('.js-exportable').DataTable({
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ],
        "order": []
    });
});