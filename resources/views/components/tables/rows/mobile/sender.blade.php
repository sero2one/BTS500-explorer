<div class="flex justify-between w-full">
    @lang('labels.sender')

    <x-general.address :address="$model->sender()" with-loading />
</div>
