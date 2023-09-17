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
                    <div> @include('livewire.management.trainers.template.views') </div>
                    <div> @include('livewire.management.trainers.template.create-trainer') </div>
                </div>

                <div class="card mb-4">
                    <div class="card-body px-0 pb-2">
                        @include('livewire.management.trainers.template.table')
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
