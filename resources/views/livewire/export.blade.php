<div>
    <div class="flex justify-center">
        <div>&nbsp;</div>
        <div>
            <a wire:click="export" class="text-blue-600 border bg-transparent font-semibold py-2 px-4 rounded cursor-pointer">
                <i class="fas fa-file-export"></i> Export
            </a>
        </div>
        <div>&nbsp;</div>

        @if ($exporting && !$exportFinished)
            <div wire:poll="updateExportProgress">Exporting... Please wait</div>
        @endif

        @if ($exportFinished)
            Done. Download <a wire:click="downloadExport" class="text-blue-400 ml-1 cursor-pointer">here</a>
        @endif
    </div>
</div>
