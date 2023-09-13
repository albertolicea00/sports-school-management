<div class="">
    @if (session()->has('message'))
    <div class="alert alert-success">{{ session('message') }}</div>
    @endif
    <!-- Navbar -->
    <!-- End Navbar -->
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="d-flex justify-content-between align-items-center">
                    <div> @include('livewire.management.users.template.views') </div>
                    <div> @livewire('management.users.crud-users') </div>
                </div>

                <div class="card mb-4">
                    <div class="card-body px-0 pb-2">
                        @include('livewire.management.users.template.table')
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
