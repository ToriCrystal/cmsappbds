<div class="col-12 col-md-3">
    <div class="card">
        <div class="card-header">
            {{ __('Đăng') }}
        </div>
        <div class="card-body p-2 d-flex justify-content-between">
            <x-button.submit :title="__('Cập nhật')" />
            <x-button.modal-delete data-route="{{ route('admin.user.delete', $user->id) }}" :title="__('Xóa')" />
        </div>
    </div>
    <!-- gender -->
    <div class="col-md-12 col-sm-12">
        <div class="mb-3">
            <label class="control-label">{{ __('Giới tính') }}:</label>
            <x-select name="gender" :required="true">
                <x-select-option value="" :title="__('Chọn Giới tính')" />
                @foreach ($gender as $key => $value)
                    <x-select-option :option="$user->gender->value" :value="$key" :title="__($value)" />
                @endforeach
            </x-select>
        </div>
    </div>
    <!-- vip -->
    <div class="col-md-12 col-sm-12">
        <div class="mb-3">
            <label class="control-label">{{ __('Vai trò') }}:</label>
            <x-select name="roles" :required="true">
                <x-select-option value="" :title="__('Chọn vai trò')" />
                @foreach ($roles as $key => $value)
                    <x-select-option :option="$user->roles->value" :value="$key" :title="__($value)" />
                @endforeach
            </x-select>
        </div>
    </div>
</div>
