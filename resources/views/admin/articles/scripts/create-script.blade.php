<script>
    document.addEventListener("DOMContentLoaded", function() {
        var provinceSelect = document.getElementById('provinceSelect');
        var districtSelect = document.getElementById('districtSelect');
        var wardSelect = document.getElementById('wardSelect');

        function fetchDistricts(provinceCode) {
            fetch('/appbds/admin/articles/get-districts/' + provinceCode)
                .then(response => response.json())
                .then(data => {
                    districtSelect.innerHTML = '';
                    var defaultDistrictOption = document.createElement('option');
                    defaultDistrictOption.text = '{{ __('selectDistrict') }}';
                    districtSelect.appendChild(defaultDistrictOption);
                    data.forEach(district => {
                        var option = document.createElement('option');
                        option.value = district.code;
                        option.text = district.name;
                        districtSelect.appendChild(option);
                    });

                    // Add code to ensure "Select Ward" option is displayed
                    wardSelect.innerHTML = '';
                    var defaultWardOption = document.createElement('option');
                    defaultWardOption.text = '{{ __('selectWard') }}';
                    wardSelect.appendChild(defaultWardOption);
                })
                .catch(error => {
                    console.error('Error fetching districts:', error);
                });
        }

        function addDefaultWardOption() {
            var defaultWardOption = document.createElement('option');
            defaultWardOption.text = '{{ __('selectWard') }}';
            wardSelect.innerHTML = '';
            wardSelect.appendChild(defaultWardOption);
        }

        fetchDistricts(1);

        provinceSelect.addEventListener('change', function() {
            var provinceCode = provinceSelect.value;
            fetchDistricts(provinceCode);
            addDefaultWardOption();
        });

        districtSelect.addEventListener('change', function() {
            var districtCode = districtSelect.value;
            fetch('/appbds/admin/articles/get-wards/' + districtCode)
                .then(response => response.json())
                .then(data => {
                    wardSelect.innerHTML = '';
                    addDefaultWardOption();
                    data.forEach(ward => {
                        var option = document.createElement('option');
                        option.value = ward.code;
                        option.text = ward.name;
                        wardSelect.appendChild(option);
                    });
                })
                .catch(error => {
                    console.error('Error fetching wards:', error);
                });
        });
    });
</script>
