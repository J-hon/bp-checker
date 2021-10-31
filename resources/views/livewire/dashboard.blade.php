<div class="mb-6">
    <div class="flex justify-between my-4 ml-4 mr-4">
            <div class="ml-4">
                <a href="{{ route('patient.create') }}" class="border bg-transparent font-semibold py-2 px-4 rounded" style="color: green">
                    <i class="fas fa-hospital-user"></i> Add patient
                </a>
            </div>


        <div>&nbsp;</div>

        @auth
            <div class="mr-4">
                <a href="{{ route('logout') }}" class="text-red-500 border bg-transparent font-semibold py-2 px-4 rounded">
                    <i class="fas fa-sign-out-alt"></i>
                    Log out
                </a>
            </div>
        @endauth
    </div>

    <div class="max-w-7xl mx-auto">
        <div>
            <livewire:patient-table />
        </div>
    </div>
</div>
