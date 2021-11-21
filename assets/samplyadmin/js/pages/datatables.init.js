$(document).ready(function(){
    $("#datatable").DataTable();
    var a=$("#datatable-buttons").DataTable({
        lengthChange:!1,
        buttons:[
            { "extend": 'copy', "text":'COPY',"className": 'btn btn-outline'},
            { "extend": 'csv', "text":'CSV',"className": 'text-warning'},
            { "extend": 'excel', "text":'EXCEL',"className": 'text-success'},
            { "extend": 'pdf', "text":' PDF ',"className": 'text-danger'},
            { "extend": 'print', "text":'PRINT',"className": 'text-info'}
        ],
    });
    a.buttons().container().appendTo("#datatable-buttons_wrapper .col-md-6:eq(0)"),
    $(".dataTables_length select").addClass("form-select form-select-sm"),
    $("#selection-datatable").DataTable({
        select:{
            style:"multi"
        }
    }),
    $("#key-datatable").DataTable({
        keys:!0
    }),
    a.buttons().container().appendTo("#datatable-buttons_wrapper .col-md-6:eq(0)"),
    $(".dataTables_length select").addClass("form-select form-select-sm"),
    $("#alternative-page-datatable").DataTable({
        pagingType:"full_numbers"
    }),
    $(".dataTables_length select").addClass("form-select form-select-sm"),
    $("#scroll-vertical-datatable").DataTable({
        scrollY:"350px",
        scrollCollapse:!0,
        paging:!1
    }),
    $(".dataTables_length select").addClass("form-select form-select-sm"),
    $("#scroll-horizontal-datatable").DataTable({
        scrollX:!0
    }),
    $(".dataTables_length select").addClass("form-select form-select-sm"),
    $("#complex-header-datatable").DataTable({
        columnDefs:[{
            visible:!1,
            targets:-1
        }]
    }),
    $(".dataTables_length select").addClass("form-select form-select-sm"),
    $("#row-callback-datatable").DataTable({
        createdRow:function(a,e,t){15e4<+e[5].replace(/[\$,]/g,"")&&$("td",a).eq(5).addClass("text-danger")}
    }),
    $(".dataTables_length select").addClass("form-select form-select-sm"),
    $("#state-saving-datatable").DataTable({
        stateSave:!0
    }),
    $(".dataTables_length select").addClass("form-select form-select-sm")
});