<div>
    <a wire:click="export" class="bg-transparent hover:bg-blue-500 text-blue-700 hover:text-white py-1 px-2 border border-blue-500 hover:border-transparent rounded cursor-pointer">Export Patients</a>
    @if($exporting && !$exportFinished)
        <div class="mt-4" wire:poll="updateExportProgress">
            Exporting...please wait.
        </div>
    @endif

    @if($exportFinished)
        <div class="mt-4">
            Export completed. Download file <a class="underline cursor-pointer text-blue-600" wire:click="downloadExport">here</a>
        </div>
    @endif
</div>
