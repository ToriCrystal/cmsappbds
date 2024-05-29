<div class="col-12 col-md-9">
    <div class="card">
        <div class="card-header justify-content-between">
            <h2 class="mb-0">{{ __('informationNotification') }}</h2>

        </div>
        <div class="row card-body">
            <!-- user_id -->
            <div class="col-12">
                <div class="mb-3">
                    <label class="control-label">{{ __('userCode') }}:</label>
                    <x-select name="user_id" :required="true">
                        <x-select-option value="" :title="__('')" />
                        @foreach ($fullname as $name => $value)
                            <x-select-option :value="$name" :title="__($value)" />
                        @endforeach
                    </x-select>
                </div>
            </div><!-- title -->
            <div class="col-12">
                <div class="mb-3">
                    <label class="control-label">{{ __('title') }} :</label>
                    <x-input name="title" :value="$notification->title" placeholder="{{ __('status') }}" />
                </div>
            </div><!-- content -->
            <div class="col-12">
                <div class="mb-3">
                    <label class="control-label">{{ __('description') }}:</label>
                    <textarea name="content" class="ckeditor visually-hidden">{{ old('content') }}</textarea>
                </div>
            </div>

        </div>
    </div>
</div>
