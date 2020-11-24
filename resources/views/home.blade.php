<x-layout>
    <div class="container">
        <div class="row justify-content-center">
        <new-sidebar-component></new-sidebar-component>
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Dashboard</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <dashboard-chart-component></dashboard-chart-component>   
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>
