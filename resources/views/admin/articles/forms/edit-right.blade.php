<div class="col-12 col-md-3">
    <div class="card mb-3">
        <div class="card-header">
            {{ __('push') }}
        </div>
        <div class="card-body p-2 d-flex justify-content-between">
            <x-button.submit :title="__('update')" />
            <x-button.modal-delete data-route="{{ route('admin.articles.delete', $articles->id) }}" :title="__('delete')" />
        </div>
    </div>
    <div class="card mb-3">
        <div class="card-header">
            {{ __('imageGallary') }}
        </div>
        <div class="card-body p-2">
            <x-input-gallery-ckfinder name="articles[image]" type="multiple" :value="$articles->image" />
        </div>
    </div>

    @if ($articles->admin_id != null || $userRole->value == 2)
        <div class="card mb-3">
            <div class="card-header">
                {{ __('commission') }}
            </div>
            <div class="card-body p-2 py-2">
                @foreach ($getCommission as $commission)
                    <label class="form-check d-flex gap-2">
                        <input type="radio" name="articles[commission_id]" value="{{ $commission->id }}"
                            {{ $commission->id == $articles->commission_id ? 'checked' : '' }}>
                        <span
                            class="form-check-label">TT-{{ $commission->direct_commission_default }}GT-{{ $commission->indirect_commission_default }}</span>
                    </label>
                @endforeach
            </div>
        </div>
    @else
        <input type="hidden" name="commission_id" value="0">
    @endif

    <div class="col-12">
        <div class="mb-3">
            <label class="control-label">{{ __('articleArea') }}:</label>
            <x-select class="select2-bs5" name="articles[area_id]" :required="true">
                @foreach ($getArea as $key => $item)
                    <x-select-option :value="$item->id" :title="$item->name" :selected="$item->id == $articles->area_id ? 'selected' : ''" />
                @endforeach
            </x-select>
        </div>
    </div>

    {{-- <div class="col-12">
        <div class="mb-3">
            <label class="control-label">{{ __('houseType') }}:</label>
            <x-select class="select2-bs5" name="articles[houseType_id]" :required="true">
                @foreach ($getHouseType as $key => $item)
                    <x-select-option :value="$item->id" :title="$item->name" :selected="$item->id == $articles->houseType_id ? 'selected' : ''" />
                @endforeach
            </x-select>
        </div>
    </div> --}}

    <div class="col-12">
        <div class="mb-3">
            <label class="control-label">{{ __('houseType') }}:</label>
            <x-select id="selectArticle" name="articles[houseType_id][]" class="select2-bs5-ajax" :data-url="route('admin.search.select.houseType')"
                :multiple="true">
                @foreach ($field as $item)
                    <x-select-option :option="$item->id" :value="$item->id" :title="$item->name" />
                @endforeach
            </x-select>
        </div>
    </div>



    <div class="card mb-3">
        <div class="card-header">
            <label class="control-label">{{ __('activeStatus') }}:</label>
        </div>
        <div class="card-body">
            <x-select name="articles[active_status]" :required="true">
                @foreach ($activeStatus as $key => $value)
                    <x-select-option :value="$key" :title="$value" :selected="$articles->active_status == $key" />
                @endforeach
            </x-select>
        </div>
    </div>
    <div class="card mb-3">
        <div class="card-header">
            <label class="control-label">{{ __('articleStatus') }}:</label>
        </div>
        <div class="card-body">
            <x-select name="articles[article_status]" :required="true">
                @foreach ($articleStatus as $key => $value)
                    <x-select-option :value="$key" :title="$value" :selected="$articles->article_status == $key" />
                @endforeach
            </x-select>
        </div>
    </div>
</div>
