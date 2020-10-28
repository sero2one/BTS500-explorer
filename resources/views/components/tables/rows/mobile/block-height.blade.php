<div class="flex justify-between w-full">
    @lang('labels.block_height')

    <x-general.loading-state.text :text="$model->height()" />

    <span wire:loading.class="hidden">{{ $model->height() }}</span>
</div>