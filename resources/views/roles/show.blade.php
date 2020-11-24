<x-layout>
    <div class="container-fluid">
        <br>
        <div class="row">
            <new-sidebar-component></new-sidebar-component>
            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
                <div
                    class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2">{{ $role->name }}</h1>
                    <div class="btn-toolbar mb-2 mb-md-0">
                        <p>Home \ Roles \ Show</p>
                    </div>
                </div>
                
                <div class="card">
                    <div class="card-header">
                        Permissions
                    </div>
                    <form action="/roles/{{$role->id}}" method="POST">
                        {{ csrf_field() }}                    
                        <div class="card-body">
                            <div class="container">
                                @foreach($permissions as $permission)
                                    <div class="form-check">
                                        <input 
                                            class="form-check-input" 
                                            name="permissionsId[]" 
                                            type="checkbox"
                                            value="{{ $permission->id }}" 
                                            @if($role->permissions->contains($permission->id)) checked=checked @endif>
                                        <label class="form-check-label">
                                            {{ $permission->name }}
                                        </label>
                                    </div>
                                @endforeach
                            </div>
                            <button class="btn btn-info">Update permissions</button>
                        </div>
                    </form>
                </div>
            </main>
        </div>
    </div>
</x-layout>
