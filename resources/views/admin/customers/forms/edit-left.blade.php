<div class="col-12 col-md-9">
    <div class="card">
        <div class="card-header justify-content-between">
            <h2 class="mb-0">{{ __('editCustomerInformation') }}</h2>

        </div>
        <div class="row card-body">
            <!-- broker_id -->
            <div class="col-12">
            <div class="mb-3">
{{--                @dd($customer->broker_id)--}}
                <label class="control-label">{{ __('broker') }}:</label>
                <x-select name="broker_id" :required="true" disabled>
                    <x-select-option :value="$customer->broker_id" :title="__($customer->user->fullname)" :disable="true"/>
                </x-select>
                <x-input type="hidden" name="broker_id" :value="$customer->broker_id" />
            </div>
        </div><!-- customer_name -->
            <div class="col-12">
                <div class="mb-3">
                    <label class="control-label">{{ __('customerName') }} <span style="color:red;">*</span>:</label>
                    <x-input name="customer_name" :value="$customer->customer_name"
                        :required="true" placeholder="{{ __('customerName') }}" />

                </div>
            </div><!-- phone -->
            <div class="col-12">
                <div class="mb-3">
                    <label class="control-label">{{ __('phone') }} :</label>
                    <x-input type="number" name="phone" :value="$customer->phone"
                         placeholder="{{ __('phone') }}" />
                </div>
            </div><!-- refferal_code -->
            <div class="col-12">
                <div class="mb-3">
                    <label class="control-label">{{ __('referralCode') }} :</label>
                    <x-input name="refferal_code" :value="$customer->user->refferal_code" readonly
                         placeholder="{{ __('referralCode') }}" />

                </div>
            </div><!-- needs -->
            <div class="col-12">
                <div class="mb-3">
                    <label class="control-label">{{ __('needs') }} :</label>
                    <x-textarea name="needs"
                        >{{ $customer->needs }}</x-textarea>
                </div>
            </div><!-- status -->
            <div class="col-12">
            <div class="mb-3">
                <label class="control-label">{{ __('status') }}:</label>
                <x-select name="status" :required="true">
                    <x-select-option value="" :title="__('status')"/>
                    @foreach ($status as $key => $value)
                        <x-select-option :option="$customer->user->status" :value="$key" :title="__($value)"/>
                    @endforeach
                </x-select>
            </div>
        </div>

        </div>
    </div>
</div>
