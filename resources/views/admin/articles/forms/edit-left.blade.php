<div class="col-12 col-md-9">
    <div class="card">
        <div class="card-header justify-content-center">
            <h2 class="mb-0">{{ __('informationArticles') }}</h2>
        </div>
        <div class="row card-body">
            <!-- user_id -->
            <div class="col-12">
                <div class="mb-3">
                    <label class="control-label">{{ __('articleAuthor') }}:</label>
                    <x-input value="{{ $authorName }}" readonly />
                    <x-hidden-input name="articles[id]" value="{{ $articles->id }}" />
                </div>
            </div>
            <!-- title -->
            <div class="col-12">
                <div class="mb-3">
                    <label class="control-label">{{ __('title') }} <span style="color:red;">*</span>:</label>
                    <x-input name="articles[title]" :value="$articles->title" :required="true"
                        placeholder="{{ __('title') }}" />
                </div>
            </div>

            <!-- description -->
            <div class="col-12">
                <div class="mb-3">
                    <label class="control-label">{{ __('description') }} :</label>
                    <x-textarea name="articles[description]"
                        class="ckeditor visually-hidden">{{ $articles->description }}</x-textarea>
                </div>
            </div>
            <!-- type -->
            <div class="col-md-3 col-12">
                <div class="mb-3">
                    <label class="control-label">{{ __('type') }}:</label>
                    <x-select class="select2-bs5" name="articles[type]" :required="true">
                        @foreach ($type as $key => $item)
                            <x-select-option :value="$key" :title="$item" :selected="$key == $articles->type" />
                        @endforeach
                    </x-select>
                </div>
            </div>
            <!-- area -->

            <div class="col-md-3 col-12">
                <div class="mb-3">
                    <label class="control-label">{{ __('area') }} <span style="color:red;">*</span>:</label>
                    <x-input name="articles[area]" value="{{ $articles->area }}" :required="true"
                        placeholder="{{ __('area') }}" class="form-control" />
                </div>
            </div>

            <!-- price -->
            <div class="col-md-3 col-12">
                <div class="mb-3">
                    <label class="control-label">{{ __('price') }} <span style="color:red;">*</span>:</label>
                    <x-input type="number" name="articles[price]" :value="$articles->price" :required="true"
                        placeholder="{{ __('price') }}" />
                </div>
            </div><!-- price_consent -->
            <div class="col-md-3 col-12">
                <div class="mb-3">

                    <label class="control-label">{{ __('priceConsent') }}:</label>
                    <x-select class="select2-bs5" name="articles[price_consent]" :required="true">
                        @foreach ($price_consent as $key => $item)
                            <x-select-option :value="$key" :title="$item" :selected="$key == $articles->price_consent" />
                        @endforeach
                    </x-select>

                </div>
            </div>
            <!-- quantity -->
            <div class="col-md-3 col-12">
                <div class="mb-3">
                    <label class="control-label">{{ __('quantity') }} <span style="color:red;">*</span>:</label>
                    <x-input type="number" name="articles[quantity]" :value="$articles->quantity" :required="true"
                        placeholder="{{ __('quantity') }}" />
                </div>
            </div><!-- height_floor -->
            <div class="col-md-3 col-12">
                <div class="mb-3">
                    <label class="control-label">{{ __('heightFloor') }} :</label>
                    <x-input type="number" name="articles[height_floor]" :value="$articles->height_floor"
                        placeholder="{{ __('heightFloor') }}" />
                </div>
            </div><!-- project_size -->
            <div class="col-md-3 col-12">
                <div class="mb-3">
                    <label class="control-label">{{ __('projectSize') }} <span style="color:red;">*</span>:</label>
                    <x-input type="number" name="articles[project_size]" :value="$articles->project_size" :required="true"
                        placeholder="{{ __('projectSize') }}" />
                </div>
            </div>

            <!-- building_density -->
            <div class="col-md-3 col-12">
                <div class="mb-3">
                    <label class="control-label">{{ __('buildingDensity') }} :</label>
                    <x-input name="articles[building_density]" :value="$articles->building_density"
                        placeholder="{{ __('buildingDensity') }}" />
                </div>
            </div>
            <!-- investor -->
            <div class="col-md-3 col-12">
                <div class="mb-3">
                    <label class="control-label">{{ __('investor') }} :</label>
                    <x-input name="articles[investor]" :value="$articles->investor" placeholder="{{ __('investor') }}" />
                </div>
            </div><!-- constructor -->
            <div class="col-md-3 col-12">
                <div class="mb-3">
                    <label class="control-label">{{ __('contructor') }} :</label>
                    <x-input name="articles[constructor]" :value="$articles->constructor" placeholder="{{ __('contructor') }}" />
                </div>
            </div><!-- hand_over -->
            <div class="col-md-3 col-12">
                <div class="mb-3">
                    <label class="control-label">{{ __('handOver') }} :</label>
                    <x-input name="articles[hand_over]" :value="$articles->hand_over" placeholder="{{ __('handOver') }}" />
                </div>
            </div>

            <!-- operative_management -->
            <div class="col-md-3 col-12">
                <div class="mb-3">
                    <label class="control-label">{{ __('operativeManagent') }} :</label>
                    <x-input name="articles[operative_management]" :value="$articles->operative_management"
                        placeholder="{{ __('operativeManagent') }}" />
                </div>
            </div>
            <!-- deployment_time -->
            <div class="col-12 col-md-6">
                <div class="mb-3">
                    <label class="control-label">{{ __('deploymentTime') }} :</label>
                    <x-input type="datetime-local" name="articles[deployment_time]" :value="$articles->deployment_time"
                        placeholder="{{ __('deploymentTime') }}" />
                </div>
            </div>
            <!-- time_start -->
            <div class="col-md-6 col-12">
                <div class="mb-3">
                    <label class="control-label">{{ __('timeStart') }} :</label>
                    <x-input type="datetime-local" name="articles[time_start]" :value="$articles->time_start"
                        placeholder="{{ __('timeStart') }}" />
                </div>
            </div>
            <!-- utilities -->
            <div class="col-12">
                <div class="mb-3">
                    <label class="control-label">{{ __('utilities') }} :</label>
                    <x-textarea name="articles[utilities]"
                        class="ckeditor visually-hidden">{{ $articles->utilities }}</x-textarea>
                </div>
            </div><!-- name_contact -->
            <div class="col-12 col-md-6">
                <div class="mb-3">
                    <label class="control-label">{{ __('nameContact') }} :</label>
                    <x-input name="articles[name_contact]" :value="$articles->name_contact"
                        placeholder="{{ __('nameContact') }}" />
                </div>
            </div><!-- phone_contact -->
            <div class="col-12 col-md-6">
                <div class="mb-3">
                    <label class="control-label">{{ __('phoneContact') }} <span style="color:red;">*</span>:</label>
                    <x-input type="number" name="articles[phone_contact]" :value="$articles->phone_contact" :required="true"
                        placeholder="{{ __('phoneContact') }}" />
                </div>
            </div><!-- status -->
            <div class="col-12 col-md-6">
                <div class="mb-3">
                    <label class="control-label">{{ __('status') }}:</label>
                    <x-select class="select2-bs5" name="articles[status]" :required="true">
                        @foreach ($status as $key => $item)
                            <x-select-option :value="$key" :title="$item" :selected="$key == $articles->status" />
                        @endforeach
                    </x-select>
                </div>
            </div>
            <!-- active_days -->
            <div class="col-12 col-md-6">
                <div class="mb-3">
                    <label class="control-label">{{ __('activeDays') }} :</label>
                    <x-input type="number" name="articles[active_days]" :value="$articles->active_days"
                        placeholder="{{ __('activeDays') }}" />
                </div>
            </div>
            <!-- district_id -->
            <div class="col-12 col-md-4">
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
            <div class="col-12 col-md-4">
                <div class="mb-3">
                    <label class="control-label">{{ __('district') }}:</label>
                    <x-select name="articles[district_id]" id="districtSelect" :required="true">
                        <!-- District options will be populated dynamically -->
                    </x-select>
                </div>
            </div>

            <!-- ward_id -->
            <div class="col-12 col-md-4">
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
