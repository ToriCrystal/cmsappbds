<div class="col-12 col-md-9">
    <div class="card">
        <div class="card-header justify-content-center">
            <h2 class="mb-0">{{ __('informationArticles') }}</h2>
        </div>
        <div class="row card-body">

            <x-hidden-input name="articles[admin_id]" value="{{ $getAdmin->id }}" />

            <!-- title -->
            <div class="col-12">
                <div class="mb-3">
                    <label class="control-label">{{ __('title') }} <span style="color:red;">*</span>:</label>
                    <x-input name="articles[title]" :value="old('title')" :required="true"
                        placeholder="{{ __('title') }}" />
                </div>
            </div>

            <div class="col-12">
                <div class="mb-3">
                    <label class="control-label">{{ __('broker') }}:</label>
                    <x-select name="articles[broker_id][]" class="select2-bs5-ajax" :data-url="route('admin.search.select.broker')"
                        multiple></x-select>
                </div>
            </div>


            <!-- description -->
            <div class="col-12">
                <div class="mb-3">
                    <label class="control-label">{{ __('description') }} :</label>
                    <x-textarea name="articles[description]"
                        class="ckeditor visually-hidden">{{ old('description') }}</x-textarea>
                </div>
            </div>
            <div class="col-md-3 col-12">
                <!-- type -->
                <div class="mb-3">
                    <label class="control-label">{{ __('type') }}:</label>
                    <x-select class="select2-bs5" name="articles[type]" :required="true">
                        @foreach ($type as $key => $item)
                            <x-select-option :value="$key" :title="$item" />
                        @endforeach
                    </x-select>
                </div>
            </div>

            <div class="col-md-3 col-12">
                <div class="mb-3">
                    <label class="control-label">{{ __('area') }} <span style="color:red;">*</span>:</label>
                    <x-input name="articles[area]" :value="old('area')" :required="true"
                        placeholder="{{ __('area') }}" class="form-control" />
                </div>
            </div>

            <div class="col-md-3 col-12">
                <!-- price -->
                <div class="mb-3">
                    <label class="control-label">{{ __('price') }} <span style="color:red;">*</span>:</label>
                    <x-input type="number" name="articles[price]" :value="old('price')" :required="true"
                        placeholder="{{ __('price') }}" />
                </div>
            </div>
            <!-- price_consent -->
            <div class="col-md-3 col-12">
                <div class="mb-3">
                    <label class="control-label">{{ __('priceConsent') }}:</label>
                    <x-select class="select2-bs5" name="articles[price_consent]" :required="true">
                        @foreach ($price_consent as $key => $item)
                            <x-select-option :value="$key" :title="$item" />
                        @endforeach
                    </x-select>
                </div>
            </div>



            <!-- quantity -->
            <div class="col-12 col-md-3">
                <div class="mb-3">
                    <label class="control-label">{{ __('quantity') }} <span style="color:red;">*</span>:</label>
                    <x-input type="number" name="articles[quantity]" :value="old('quantity')" :required="true"
                        placeholder="{{ __('quantity') }}" />
                </div>
            </div>
            <!-- height_floor -->
            <div class="col-md-3 col-12">
                <div class="mb-3">
                    <label class="control-label">{{ __('heightFloor') }} :</label>
                    <x-input type="number" name="articles[height_floor]" :value="old('height_floor')"
                        placeholder="{{ __('heightFloor') }}" />
                </div>
            </div>
            <!-- project_size -->
            <div class="col-md-3 col-12">
                <div class="mb-3">
                    <label class="control-label">{{ __('projectSize') }} <span style="color:red;">*</span>:</label>
                    <x-input type="number" name="articles[project_size]" :value="old('project_size')" :required="true"
                        placeholder="{{ __('projectSize') }}" />
                </div>
            </div>
            <!-- building_density -->
            <div class="col-md-3 col-12">
                <div class="mb-3">
                    <label class="control-label">{{ __('buildingDensity') }} :</label>
                    <x-input name="articles[building_density]" :value="old('building_density')"
                        placeholder="{{ __('buildingDensity') }}" />
                </div>
            </div>
            <!-- investor -->
            <div class="col-md-3 col-12">
                <div class="mb-3">
                    <label class="control-label">{{ __('investor') }} :</label>
                    <x-input name="articles[investor]" :value="old('investor')" placeholder="{{ __('investor') }}" />
                </div>
            </div><!-- constructor -->
            <div class="col-md-3 col-12">
                <div class="mb-3">
                    <label class="control-label">{{ __('contructor') }} :</label>
                    <x-input name="articles[constructor]" :value="old('constructor')" placeholder="{{ __('contructor') }}" />
                </div>
            </div>
            <!-- hand_over -->
            <div class="col-md-3 col-12">
                <div class="mb-3">
                    <label class="control-label">{{ __('handOver') }} :</label>
                    <x-input name="articles[hand_over]" :value="old('hand_over')" placeholder="{{ __('handOver') }}" />
                </div>
            </div>
            <!-- operative_management -->
            <div class="col-md-3 col-12">
                <div class="mb-3">
                    <label class="control-label">{{ __('operativeManagent') }} :</label>
                    <x-input name="articles[operative_management]" :value="old('operative_management')"
                        placeholder="{{ __('operativeManagent') }}" />
                </div>
            </div>
            <!-- deployment_time -->
            <div class="col-md-6 col-12">
                <div class="mb-3">
                    <label class="control-label">{{ __('deploymentTime') }} :</label>
                    <x-input type="datetime-local" name="articles[deployment_time]"
                        placeholder="{{ __('deploymentTime') }}" />
                </div>
            </div>
            <!-- time_start -->
            <div class="col-md-6 col-12">
                <div class="mb-3">
                    <label class="control-label">{{ __('timeStart') }} :</label>
                    <x-input type="datetime-local" name="articles[time_start]"
                        placeholder="{{ __('timeStart') }}" />
                </div>
            </div>
            <!-- utilities -->
            <div class="col-12">
                <div class="mb-3">
                    <label class="control-label">{{ __('utilities') }} :</label>
                    <x-textarea name="articles[utilities]"
                        class="ckeditor visually-hidden">{{ old('utilities') }}</x-textarea>
                </div>
            </div><!-- name_contact -->
            <div class="col-12 col-md-6">
                <div class="mb-3">
                    <label class="control-label">{{ __('nameContact') }} :</label>
                    <x-input name="articles[name_contact]" :value="old('name_contact')"
                        placeholder="{{ __('nameContact') }}" />
                </div>
            </div><!-- phone_contact -->
            <div class="col-12 col-md-6">
                <div class="mb-3">
                    <label class="control-label">{{ __('phoneContact') }} <span style="color:red;">*</span>:</label>
                    <x-input type="number" name="articles[phone_contact]" :value="old('phone_contact')" :required="true"
                        placeholder="{{ __('phoneContact') }}" />
                </div>
            </div><!-- status -->
            <div class="col-md-6 col-12">
                <div class="mb-3">
                    <label class="control-label">{{ __('status') }}:</label>
                    <x-select class="select2-bs5" name="articles[status]" :required="true">
                        @foreach ($status as $key => $item)
                            <x-select-option :value="$key" :title="$item" />
                        @endforeach
                    </x-select>
                </div>
            </div>
            <!-- active_days -->
            <div class="col-md-6 col-12">
                <div class="mb-3">
                    <label class="control-label">{{ __('activeDays') }} :</label>
                    <x-input type="number" name="articles[active_days]" :value="old('active_days')"
                        placeholder="{{ __('activeDays') }}" />
                </div>
            </div>

            <!-- province_id -->
            <div class="col-md-4 col-12">
                <div class="mb-3">
                    <label class="control-label">{{ __('province') }}:</label>
                    <x-select name="articles[province_id]" id="provinceSelect" :required="true">
                        @foreach ($getProvince as $province)
                            <x-select-option value="{{ $province->code }}" title="{{ $province->name }}" />
                        @endforeach
                    </x-select>
                </div>
            </div>

            <!-- district_id -->
            <div class="col-md-4 col-12">
                <div class="mb-3">
                    <label class="control-label">{{ __('district') }}:</label>
                    <x-select name="articles[district_id]" id="districtSelect" :required="true">
                        <!-- District options will be populated dynamically -->
                    </x-select>
                </div>
            </div>

            <!-- ward_id -->
            <div class="col-md-4 col-12">
                <div class="mb-3">
                    <label class="control-label">{{ __('ward') }}:</label>
                    <x-select name="articles[ward_id]" id="wardSelect" :required="true">
                        <!-- Ward options will be populated dynamically -->
                    </x-select>
                </div>
            </div>

        </div>
    </div>
</div>
