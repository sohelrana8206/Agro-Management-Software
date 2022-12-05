$(document).on('click','.del-ac', function(e){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    var id = $(this).attr('data-id');
    var url = $(this).attr('data-href');
    //var url = e.target;
    var csrf_token=$('meta[name="csrf_token"]').attr('content');
    const swalWithBootstrapButtons = Swal.mixin({
        customClass: {
            confirmButton: 'btn btn-info',
            cancelButton: 'btn btn-danger'
        },
        buttonsStyling: false
    })

    swalWithBootstrapButtons.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Yes, delete it!',
        cancelButtonText: 'No, cancel!',
        reverseButtons: true
    }).then((result) => {
        if (result.value) {
        swalWithBootstrapButtons.fire(
            'Deleted!',
            'Your file has been deleted.',
            'success',
            $.ajax({
                url: url,
                type: 'DELETE',
                method: 'DELETE',
                data: {
                    "id": id,
                    "_token": csrf_token,
                },
                success:function(data)
                {
                    location.reload();
                }
            })
        )
    } else if (
        /* Read more about handling dismissals below */
    result.dismiss === Swal.DismissReason.cancel
    ) {
        swalWithBootstrapButtons.fire(
            'Cancelled',
            'Your imaginary file is safe :)',
            'error'
        )
    }
    })
});

$(document).on('click','.del-head', function(e){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    var id = $(this).attr('data-id');
    var url = $(this).attr('data-href');
    //var url = e.target;
    var csrf_token=$('meta[name="csrf_token"]').attr('content');
    const swalWithBootstrapButtons = Swal.mixin({
        customClass: {
            confirmButton: 'btn btn-info',
            cancelButton: 'btn btn-danger'
        },
        buttonsStyling: false
    })

    swalWithBootstrapButtons.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Yes, delete it!',
        cancelButtonText: 'No, cancel!',
        reverseButtons: true
    }).then((result) => {
        if (result.value) {
        swalWithBootstrapButtons.fire(
            'Deleted!',
            'Your file has been deleted.',
            'success',
            $.ajax({
                url: url,
                type: 'DELETE',
                method: 'DELETE',
                data: {
                    "id": id,
                    "_token": csrf_token,
                },
                success:function(data)
                {
                    location.reload();
                }
            })
        )
    } else if (
        /* Read more about handling dismissals below */
    result.dismiss === Swal.DismissReason.cancel
    ) {
        swalWithBootstrapButtons.fire(
            'Cancelled',
            'Your imaginary file is safe :)',
            'error'
        )
    }
    })
});

$(document).on('click','.del-employee', function(e){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    var id = $(this).attr('data-id');
    var url = $(this).attr('data-href');
    //var url = e.target;
    var csrf_token=$('meta[name="csrf_token"]').attr('content');
    const swalWithBootstrapButtons = Swal.mixin({
        customClass: {
            confirmButton: 'btn btn-info',
            cancelButton: 'btn btn-danger'
        },
        buttonsStyling: false
    })

    swalWithBootstrapButtons.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Yes, delete it!',
        cancelButtonText: 'No, cancel!',
        reverseButtons: true
    }).then((result) => {
        if (result.value) {
        swalWithBootstrapButtons.fire(
            'Deleted!',
            'Your file has been deleted.',
            'success',
            $.ajax({
                url: url,
                type: 'DELETE',
                method: 'DELETE',
                data: {
                    "id": id,
                    "_token": csrf_token,
                },
                success:function(data)
                {
                    location.reload();
                }
            })
        )
    } else if (
        /* Read more about handling dismissals below */
    result.dismiss === Swal.DismissReason.cancel
    ) {
        swalWithBootstrapButtons.fire(
            'Cancelled',
            'Your imaginary file is safe :)',
            'error'
        )
    }
    })
});

/*ONCLICK VIEW PAYMENT HISTORY*/
$(document).on('click','.payment_history', function(e){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    var id = $(this).attr('data-id');
    var url = $(this).attr('data-href');
    //var url = e.target;
    var csrf_token=$('meta[name="csrf_token"]').attr('content');
    $.ajax({
        url: url,
        type: 'GET',
        method: 'GET',
        data: {
            "id": id,
            "_token": csrf_token,
        },
        success:function(data)
        {
            $('.payment_history_data').html(data);
            $("#defaultModal").modal('show');
        }
    })
});

/*ON SUBMIT SEARCH RESULT IN CASH AND BANK ACCOUNT*/
$(document).on('submit','#search_form', function(e){
    e.preventDefault();
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    var tra_type = $('#tran_type_id').val();
    var tra_for = $('#re_pay').val();
    var from_month = $('#month_form').val();
    var to_month = $('#month_to').val();
    var url = $(this).attr('data-href');

    //var url = e.target;
    var csrf_token=$('meta[name="csrf_token"]').attr('content');
    $.ajax({
        url: url,
        type: 'GET',
        method: 'GET',
        data: {
            "tra_type": tra_type,
            "tra_for": tra_for,
            "from_month": from_month,
            "to_month": to_month,
            "_token": csrf_token,
        },
        success:function(data)
        {
            $('.search_result').html(data);
        }
    })
});

/*ON SUBMIT SEARCH RESULT IN LEDGER ACCOUNT*/
$(document).on('submit','#ledger_form', function(e){
    e.preventDefault();
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    var acc_head = $('#acc_head').val();
    var from_month = $('#month_form').val();
    var to_month = $('#month_to').val();
    var url = $(this).attr('data-href');

    //var url = e.target;
    var csrf_token=$('meta[name="csrf_token"]').attr('content');
    $.ajax({
        url: url,
        type: 'GET',
        method: 'GET',
        data: {
            "acc_head": acc_head,
            "from_month": from_month,
            "to_month": to_month,
            "_token": csrf_token,
        },
        success:function(data)
        {
            $('.search_result').html(data);
        }
    })
});

/*ON SUBMIT SEARCH RESULT IN INCOME EXPENDITURE ACCOUNT*/
$(document).on('submit','#incomeExpense_form', function(e){
    e.preventDefault();
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    var from_month = $('#month_form').val();
    var to_month = $('#month_to').val();
    var url = $(this).attr('data-href');

    //var url = e.target;
    var csrf_token=$('meta[name="csrf_token"]').attr('content');
    $.ajax({
        url: url,
        type: 'GET',
        method: 'GET',
        data: {
            "from_month": from_month,
            "to_month": to_month,
            "_token": csrf_token,
        },
        success:function(data)
        {
            $('.search_result').html(data);
        }
    })
});


/*ON SUBMIT SEARCH RESULT IN BALANCE SHEET ACCOUNT*/
$(document).on('submit','#balanceSheet_form', function(e){
    e.preventDefault();
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    var from_month = $('#month_form').val();
    var to_month = $('#month_to').val();
    var url = $(this).attr('data-href');

    //var url = e.target;
    var csrf_token=$('meta[name="csrf_token"]').attr('content');
    $.ajax({
        url: url,
        type: 'GET',
        method: 'GET',
        data: {
            "from_month": from_month,
            "to_month": to_month,
            "_token": csrf_token,
        },
        success:function(data)
        {
            $('.search_result').html(data);
        }
    })
});

/*ON SUBMIT SEARCH RESULT IN TRIAL BALANCE ACCOUNT*/
$(document).on('submit','#trialBalance_form', function(e){
    e.preventDefault();
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    var from_month = $('#month_form').val();
    var to_month = $('#month_to').val();
    var url = $(this).attr('data-href');

    //var url = e.target;
    var csrf_token=$('meta[name="csrf_token"]').attr('content');
    $.ajax({
        url: url,
        type: 'GET',
        method: 'GET',
        data: {
            "from_month": from_month,
            "to_month": to_month,
            "_token": csrf_token,
        },
        success:function(data)
        {
            $('.search_result').html(data);
        }
    })
});


/*ONCHANGE IN TRANSACTION VIEW FILE*/
$(document).on('change','.acc_head', function(e){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    var acc_head_id = $(this).val();
    var url = $(this).attr('data-href');
    //var url = e.target;
    var csrf_token=$('meta[name="csrf_token"]').attr('content');
    $.ajax({
        url: url,
        type: 'POST',
        method: 'POST',
        data: {
            "acc_head_id": acc_head_id,
            "_token": csrf_token,
        },
        success:function(data)
        {
            $('.transaction_for').html(data);
        }
    })
});

/*ONCLICK CHECK MONTH TO IN NOT SMALLER THAN MONTH FROM*/
$(document).on('change','.month_to', function(e){
    var month_to = $(this).val();
    var month_from = $('.month_form').val();
    var to_month = new Date(month_to);
    var from_month = new Date(month_from);
    if(month_from == ''){
        alert('From month must be set before to month set');
        $('.month_to').val("");
    }
    if(to_month < from_month){
        alert('To month is smaller than from month.');
        $('.month_to').val("");
    }
});

/*ONCLICK CHANGE PURCHASE OR BORN INFO*/
$(document).on('change','.collection_type', function(e){
    var collection_type = $(this).val();
    if(collection_type == 1){
        $('#born').hide();
        $('#purchase').show();
    }
    if(collection_type == 2){
        $('#purchase').hide();
        $('#born').show();
    }
});

/*ONCLICK CHANGE HUT, FARMER OR AGENT INFO*/
$(document).on('change','.purchase_from', function(e){
    var purchase_from = $(this).val();
    if(purchase_from == 1){
        $('#farner').hide();
        $('#agent').hide();
        $('#hut').show();
    }
    if(purchase_from == 2){
        $('#hut').hide();
        $('#agent').hide();
        $('#farmer').show();
    }
    if(purchase_from == 3){
        $('#hut').hide();
        $('#farmer').hide();
        $('#agent').show();
    }
});

/*ONCLICK OPEN UPDATE ANIMAL STATUS MODAL*/
$(document).on('click','.editAnimalStatus', function(e){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    var id = $(this).attr('data-id');
    var url = $(this).attr('data-href');
    //var url = e.target;
    var csrf_token=$('meta[name="csrf_token"]').attr('content');
    $.ajax({
        url:url,
        type:"POST",
        data: {
            "id": id,
            "_token": csrf_token,
        },
        success:function(data) {
            $('#animal-status-update_modal').modal('show');
            $('#animal-status').html(data);
        }
    })
});

/*ONCLICK CHANGE FOOD PURCHASE, YIELD INFO*/
$(document).on('change','.collectionForm', function(e){
    var collectionForm = $(this).val();
    if(collectionForm == 1){
        $('#yield').hide();
        $('#purchase').show();
    }
    if(collectionForm == 2){
        $('#purchase').hide();
        $('#yield').show();
    }
});

/*ONCLICK CHANGE YIELD RENT, PURCHASE INFO*/
$(document).on('change','.yieldOwnership', function(e){
    var yieldOwnership = $(this).val();
    if(yieldOwnership == 1){
        $('#yield-purchase').hide();
        $('#rent-yield').show();
    }
    if(yieldOwnership == 2){
        $('#rent-yield').hide();
        $('#yield-purchase').show();
    }
});

/*ONCLICK CHANGE ACCOUNT HEAD TO PURCHASE, SALES*/
$(document).on('change','.acc_head', function(e){
    var accHeadID = $(this).val();
    if(accHeadID == 5 || accHeadID == 6){
        $('#animal-profile').show();
    }
});

/*ONCLICK OPEN RENTAL YIELD LIST MODAL*/
$(document).on('click','.rentalYieldList', function(e){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    var id = $(this).attr('data-id');
    var url = $(this).attr('data-href');
    //var url = e.target;
    var csrf_token=$('meta[name="csrf_token"]').attr('content');
    $.ajax({
        url:url,
        type:"POST",
        data: {
            "id": id,
            "_token": csrf_token,
        },
        success:function(data) {
            $('#yield_modal').modal('show');
            $('#yield').html(data);
        }
    })
});

/*ONCLICK OPEN OWN YIELD LIST MODAL*/
$(document).on('click','.ownYieldList', function(e){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    var id = $(this).attr('data-id');
    var url = $(this).attr('data-href');
    //var url = e.target;
    var csrf_token=$('meta[name="csrf_token"]').attr('content');
    $.ajax({
        url:url,
        type:"POST",
        data: {
            "id": id,
            "_token": csrf_token,
        },
        success:function(data) {
            $('#yield_modal').modal('show');
            $('#yield').html(data);
        }
    })
});
