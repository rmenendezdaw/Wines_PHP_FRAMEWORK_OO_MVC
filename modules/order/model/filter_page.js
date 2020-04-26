$(document).ready(function () {
//
//
$.ajax({

    type: "GET",
    dataType: "JSON",
    url: "module/order/controller/controller_order.php?op=datatable"
})

.done(function(data) {
    console.log(data); 
    var source =
    {
        localData: data,
        dataType: "array",
        dataFields: [
            { name: 'name', type: 'string' },
            { name: 'mark', type: 'string' },
            { name: 'grades', type: 'float' },
            { name: 'origin', type: 'string' },
            { name: 'year', type: 'integer' }

        ],
        id: 'id'
    };

    var dataAdapter = new $.jqx.dataAdapter(source);
    console.log(dataAdapter);

    $("#order_dataTable").jqxDataTable(
        {
            width: getWidth("order_dataTable"),
        pageable: true,
        pagerButtonsCount: 10,
        source: dataAdapter,
        sortable: true,
        pageable: true,
        altRows: true,
        filterable: true,
        columnsResize: true,
        pagerMode: 'advanced',
        columns: [
          { text: 'Name', dataField: 'name'},
          { text: 'Mark', dataField: 'mark' },
          { text: 'Grades', dataField: 'grades'},
          { text: 'Origin', dataField: 'origin' },
          { text: 'Year', dataField: 'year' }
      ]
    });
}).fail(function() {
    console.log('Fail from Ajax');
})
});