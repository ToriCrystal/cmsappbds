<script>
    function searchColumsDataTable(datatable) {
        datatable.api().columns([0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23,
            24,
        ]).every(function() {
            var column = this;
            var input = document.createElement("input");
            if (column.selector.cols == 25) {
                input = document.createElement("input");
            } else if (column.selector.cols == 1) {
                input = document.createElement("input");
            } else if (column.selector.cols == 4) {
                input = document.createElement("select");
                var myOptions = ["Bán", "Thuê"];
                generateSelectOptions(input, myOptions);
            } else if (column.selector.cols == 8) {
                input = document.createElement("select");
                var myOptions = ["Có", "Không"];
                generateSelectOptions(input, myOptions);
            } else if (column.selector.cols == 20) {
                input = document.createElement("select");
                var myOptions = ["VIP", "Tin thường"];
                generateSelectOptions(input, myOptions);
            } else if (column.selector.cols == 22) {
                input = document.createElement("select");
                var myOptions = [""];
                generateSelectOptions(input, myOptions);
            } else if (column.selector.cols == 23) {
                input = document.createElement("select");
                var myOptions = [""];
                generateSelectOptions(input, myOptions);
            } else if (column.selector.cols == 24) {
                input = document.createElement("select");
                var myOptions = [""];
                generateSelectOptions(input, myOptions);
            }

            input.setAttribute('placeholder', 'Nhập từ khóa');
            input.setAttribute('class', 'form-control');

            $(input).appendTo($(column.footer()).empty())
                .on('change', function() {
                    column.search($(this).val(), false, false, true).draw();
                });
        });
    }
    $(document).ready(function() {
        columns = window.LaravelDataTables["articlesTable"].columns();
        toggleColumnsDatatable(columns);
    });
</script>


<script>
    $(document).ready(function() {
        select2LoadData($('#brokerRoute').val(), '.select2-bs5-ajax[name="articles[customer_id][]"]');
    });

    $(document).ready(function() {
        select2LoadData($('#houseTypeRoute').val(), '.select2-bs5-ajax[name="articles[houseType_id][]"]');
    });
</script>
