var table = $('#busca').DataTable();

// #myInput is a <input type="text"> element
$('#busca').on( 'keyup', function () {
    table.search( this.value ).draw();
} );
