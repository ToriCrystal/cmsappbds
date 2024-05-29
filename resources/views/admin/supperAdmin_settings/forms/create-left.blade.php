<div class="col-12 col-md-9">
    <div class="card">
        <div class="card-header justify-content-center">
            <h2 class="mb-0">{{ __('Thông tin SupperAdmin_settings') }}</h2>
        </div>
        <div class="row card-body">
        <!-- bank_account_number -->
            <div class="col-12">
                <div class="mb-3">
                    <label class="control-label">{{ __('Số tài khoản') }} :</label>
                    <x-input name="bank_account_number" :value="old('bank_account_number')" 
                         placeholder="{{ __('Số tài khoản') }}" />
                </div>
            </div><!-- transfer_syntax -->
            <div class="col-12">
                <div class="mb-3">
                    <label class="control-label">{{ __('Cú pháp chuyển khoản') }} <span style="color:red;">*</span>:</label>
                    <x-textarea name="transfer_syntax" 
                        :required="true">{{ old('transfer_syntax') }}</x-textarea>
                </div>
            </div><!-- zalo_number -->
            <div class="col-12">
                <div class="mb-3">
                    <label class="control-label">{{ __('Zalo') }} <span style="color:red;">*</span>:</label>
                    <x-input type="number" name="zalo_number" :value="old('zalo_number')" 
                        :required="true" placeholder="{{ __('Zalo') }}" />
                </div>
            </div><!-- hotline -->
            <div class="col-12">
                <div class="mb-3">
                    <label class="control-label">{{ __('Hotline') }} <span style="color:red;">*</span>:</label>
                    <x-input type="number" name="hotline" :value="old('hotline')" 
                        :required="true" placeholder="{{ __('Hotline') }}" />
                </div>
            </div><!-- max_user_level -->
            <div class="col-12">
                <div class="mb-3">
                    <label class="control-label">{{ __('Tối đa người dùng') }} <span style="color:red;">*</span>:</label>
                    <x-input type="number" name="max_user_level" :value="old('max_user_level')" 
                        :required="true" placeholder="{{ __('Tối đa người dùng') }}" />
                </div>
            </div><!-- commission_per_level -->
            <div class="col-12">
                <div class="mb-3">
                    <label class="control-label">{{ __('Hoa hồng') }} <span style="color:red;">*</span>:</label>
                    <x-input type="number" name="commission_per_level" :value="old('commission_per_level')" 
                        :required="true" placeholder="{{ __('Hoa hồng') }}" />
                </div>
            </div>

        </div>
    </div>
</div>