<script>
    function searchColumsDataTable(datatable) {
        datatable.api().columns([0, 1, 2, 3, 4, 5, 6]).every(function () {
            var column = this;
            var input = document.createElement("input");
            if(column.selector.cols == 7){
                input = document.createElement("input");
            }else if(column.selector.cols == 4){
                //input.setAttribute('type', 'date');
            }
            
            input.setAttribute('placeholder', 'Nhập từ khóa');
            input.setAttribute('class', 'form-control');
    
            $(input).appendTo($(column.footer()).empty())
            .on('change', function () {
                column.search($(this).val(), false, false, true).draw();
            });
        }); 
    }
    $(document).ready(function() {
        // define columns for the datatables
        columns = window.LaravelDataTables["supperAdmin_settingsTable"].columns();
        toggleColumnsDatatable(columns);
    });
</script>