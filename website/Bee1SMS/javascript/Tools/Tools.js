$(document).ready(function () {
  
    var table = $('.example').DataTable({

           
       
        responsive: true,
        colReorder: true,

        dom: 'Bfrtip',
        buttons: {
            dom: {
                button: {
                    tag: 'a'
                }
            },
            buttons: [
        {
            extend: 'collection',
            text: 'Tools',
            buttons: ['copy', 'csv', 'excel', 'pdf', 'print', 'colvis']
        }
            ]
        }
    });
    
    $('a.toggle-vis').on('click', function (e) {
        e.preventDefault();

        // Get the column API object
        var column = table.column($(this).attr('data-column'));

        // Toggle the visibility
        column.visible(!column.visible());
    });

    //webshims.setOptions('waitReady', false);
    //webshims.setOptions('forms-ext', { type: 'date' });
    //webshims.setOptions('forms-ext', { type: 'time' });
    //webshims.polyfill('forms forms-ext');

    
});