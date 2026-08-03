/*************************************************************************************/
// -->Template Name: Bootstrap Press Admin
// -->Author: Themedesigner
// -->Email: niravjoshi87@gmail.com
// -->File: datatable_basic_init
/*************************************************************************************/

/****************************************
 *       Basic Table                   *
 ****************************************/
$('#zero_config').DataTable({
   "language": {
    "decimal": "",
    "emptyTable": "No hay información disponible",
    "info": "Mostrando _START_ a _END_ de _TOTAL_ entradas",
    "infoEmpty": "Mostrando 0 a 0 de 0 entradas",
    "infoFiltered": "(filtrado de _MAX_ entradas totales)",
    "infoPostFix": "",
    "thousands": ",",
    "lengthMenu": "Mostrar _MENU_ entradas",
    "loadingRecords": "Cargando...",
    "processing": "Procesando...",
    "search": "Buscar:",
    "zeroRecords": "No se encontraron resultados coincidentes",
    "paginate": {
      "first": "Primero",
      "last": "Último",
      "next": "Siguiente",
      "previous": "Anterior"
    },
    "aria": {
      "orderable": ": activar para ordenar la columna de forma ascendente",
      "orderableReverse": ": activar para ordenar la columna de forma descendente"
    }
  }
}); 

/****************************************
 *       Default Order Table           *
 ****************************************/
$('#default_order').DataTable({
    "order": [
        [3, "desc"]
    ]
});

/****************************************
 *       Multi-column Order Table      *
 ****************************************/
$('#multi_col_order').DataTable({
    columnDefs: [{
        targets: [0],
        orderData: [0, 1]
    }, {
        targets: [1],
        orderData: [1, 0]
    }, {
        targets: [4],
        orderData: [4, 0]
    }]
});

/****************************************
 *       Complex header Table          *
 ****************************************/
$('#complex_header').DataTable();

/****************************************
 *       DOM positioning Table         *
 ****************************************/
$('#DOM_pos').DataTable({
    "dom": '<"top"i>rt<"bottom"flp><"clear">'
});

/****************************************
 *     alternative pagination Table    *
 ****************************************/
$('#alt_pagination').DataTable({
    "pagingType": "full_numbers"
});

/****************************************
 *     vertical scroll Table    *
 ****************************************/
$('#scroll_ver').DataTable({
    "scrollY": "300px",
    "scrollCollapse": true,
    "paging": false
});

/****************************************
 * vertical scroll,dynamic height Table *
 ****************************************/
$('#scroll_ver_dynamic_hei').DataTable({
    scrollY: '50vh',
    scrollCollapse: true,
    paging: false
});

/****************************************
 *     horizontal scroll Table    *
 ****************************************/
$('#scroll_hor').DataTable({
    "scrollX": true
});

/****************************************
 * vertical & horizontal scroll Table  *
 ****************************************/
$('#scroll_ver_hor').DataTable({
    "scrollY": 300,
    "scrollX": true
});

/****************************************
 * Language - Comma decimal place Table  *
 ****************************************/
$('#lang_comma_deci').DataTable({
    "language": {
        "decimal": ",",
        "thousands": "."
    }
});

/****************************************
 *         Language options Table      *
 ****************************************/
$('#lang_opt').DataTable({
    "language": {
        "lengthMenu": "Display _MENU_ records per page",
        "zeroRecords": "Nothing found - sorry",
        "info": "Showing page _PAGE_ of _PAGES_",
        "infoEmpty": "No records available",
        "infoFiltered": "(filtered from _MAX_ total records)"
    }
});