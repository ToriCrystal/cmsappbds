<x-input type="hidden" id="brokerRoute" name="route_search_select_broker" :value="route('admin.search.select.broker')" />

<x-input type="hidden" id="houseTypeRoute" name="route_search_select_broker" :value="route('admin.search.select.houseType')" />

<script>
    $(document).ready(function() {
        select2LoadData($('#brokerRoute').val(), '.select2-bs5-ajax[name="articles[broker_id][]"]');
    });

    $(document).ready(function() {
        select2LoadData($('#houseTypeRoute').val(), '.select2-bs5-ajax[name="articles[houseType_id][]"]');
    });
</script>
