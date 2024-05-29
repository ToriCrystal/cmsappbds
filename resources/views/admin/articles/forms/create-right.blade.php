<div class="col-12 col-md-3">
    <div class="card mb-3">
        <div class="card-header">
            {{ __('push') }}
        </div>
        <div class="card-body p-2">
            <x-button.submit :title="__('add')" />
        </div>
    </div>
    <div class="card mb-3">
        <div class="card-header">
            {{ __('imageGallary') }}
        </div>
        <div class="card-body p-2">
            <x-input-gallery-ckfinder name="articles[image]" type="multiple" />
        </div>
    </div>
    <div class="card mb-3">
        <div class="card-header">
            {{ __('commission') }}
        </div>
        <div class="card-body p-2 py-2">
            @foreach ($getCommission as $commission)
                <label class="form-check d-flex gap-2">
                    <input type="radio" name="articles[commission_id]" value="{{ $commission->id }}"
                        {{ $commission->id == $selectedCommissionId ? 'checked' : '' }}>
                    <span class="form-check-label">TT - {{ $commission->direct_commission_default }} GT -
                        {{ $commission->indirect_commission_default }}</span>
                </label>
            @endforeach
        </div>
    </div>
    <div class="col-12">
        <div class="mb-3">
            <label class="control-label">{{ __('articleArea') }}:</label>
            <x-select class="select2-bs5" name="articles[area_id]" :required="true">
                @foreach ($getArea as $key => $item)
                    <x-select-option :value="$item->id" :title="$item->name" />
                @endforeach
            </x-select>
        </div>
    </div>

    <div class="col-12">
        <div class="mb-3">
            <label class="control-label">{{ __('houseType') }}:</label>
            <x-select name="articles[houseType_id][]" class="select2-bs5-ajax" :data-url="route('admin.search.select.houseType')"
                multiple></x-select>
        </div>
    </div>
    
    <div class="card mb-3">
        <div class="card-header">
            <label class="control-label">{{ __('activeStatus') }}:</label>
        </div>
        <div class="card-body">
            <x-select name="articles[active_status]" :required="true">
                @foreach ($activeStatus as $key => $value)
                    <x-select-option :value="$key" :title="$value" />
                @endforeach
            </x-select>
        </div>
    </div>
</div>
