<div class="col-12 col-md-9">
    <div class="card">
        <div class="card-header justify-content-center">
            <h2 class="mb-0">{{ __('commissionInformation') }}</h2>
        </div>
        <div class="row card-body">
            <!-- indirect_commission_default -->
            <div class="col-12">
                <div class="mb-3">
                    <label class="control-label">{{ __('indirectCommission') }} :</label>
                    <x-input type="number" name="indirect_commission_default" :value="old('indirect_commission_default')"
                        placeholder="{{ __('indirectCommission') }}" />
                </div>
            </div><!-- direct_commission_default -->
            <div class="col-12">
                <div class="mb-3">
                    <label class="control-label">{{ __('directCommission') }} :</label>
                    <x-input type="number" name="direct_commission_default" :value="old('direct_commission_default')"
                        placeholder="{{ __('directCommission') }}" />
                </div>
            </div>
        </div>
    </div>
</div>
