<div class="col-12 col-md-9">
    <div class="card">
        <div class="card-header justify-content-between">
            <h2 class="mb-0">{{ __('Thông tin khách hàng') }}</h2>
{{--           @dd($customerRegistrations)--}}
        </div>
        <div class="row card-body">
            <!-- customer_id -->
            <div class="col-12">
            <div class="mb-3">
                <label class="control-label">{{ __('Chọn khách hàng') }}:</label>
                <x-select name="customer_id" class="select2-bs5-ajax" :data-url="route('admin.search.select.customer')">
                        <x-select-option :value="$customerRegistrations->customer_id ?? ''" :title="$customerinfo->customer_name.' - '.$customerinfo->phone" />
                </x-select>
            </div>
        </div><!-- article_id -->
            <div class="col-12">
            <div class="mb-3">
                <label class="control-label">{{ __('Chọn bài đăng') }}:</label>
                <x-select name="article_id" class="select2-bs5-ajax" :data-url="route('admin.search.select.article')">
                    <x-select-option :value="$customerRegistrations->article_id ?? ''" :title="$articleinfo->title.' - '.$articleinfo->code" />
                </x-select>
            </div>
        </div><!-- status -->
            <div class="col-12">
            <div class="mb-3">
                <label class="control-label">{{ __('Trạng thái') }}:</label>
                <x-select name="status" :required="true">
                    <x-select-option value="" :title="__('Chọn status')"/>
                    @foreach ($status as $key => $value)
                        <x-select-option :option="$customerRegistrations->status->value" :value="$key" :title="__($value)"/>
                    @endforeach
                </x-select>
            </div>
        </div><!-- registration_day -->
            <div class="col-12">
                <div class="mb-3">
                    <label class="control-label">{{ __('Ngày đăng ký') }} <span style="color:red;">*</span>:</label>
{{--                    @dd($customerRegistrations->registration_day)--}}
                    <x-input type="datetime-local" name="registration_day" :value="$customerRegistrations->registration_day"
                        :required="true" placeholder="{{ __('Ngày đăng ký') }}" />
                </div>
            </div><!-- approval_day -->
            <div class="col-12">
                <div class="mb-3">
                    <label class="control-label">{{ __('Ngày phê duyệt') }} <span style="color:red;">*</span>:</label>
                    <x-input type="datetime-local" name="approval_day" :value="$customerRegistrations->approval_day"
                        :required="true" placeholder="{{ __('Ngày phê duyệt') }}" />
                </div>
            </div>

        </div>
    </div>
</div>
