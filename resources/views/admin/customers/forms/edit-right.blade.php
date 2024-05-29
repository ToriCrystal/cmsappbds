<div class="col-12 col-md-3">
    <div class="card mb-3">
        <div class="card-header">
            {{ __('push') }}
        </div>
        <div class="card-body p-2 d-flex justify-content-between">
            <x-button.submit :title="__('update')" />
            <x-button.modal-delete data-route="{{ route('admin.user.customer.delete', ['user_id' => $customer->user_id ?? 0, 'id' => $customer->id]) }}" :title="__('add')" />
        </div>
    </div>

</div>
