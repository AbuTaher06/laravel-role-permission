@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
            <div class="card-header">
                        <h4>Role : {{ $role->name }}
                            <a href="{{ url('roles') }}" class="btn btn-danger float-end">Back</a>
                        </h4>
                    </div>
                <div class="card-body">
                <form action="{{ url('roles/'.$role->id.'/give-permissions') }}" method="POST">
                        @csrf
                        @method('PUT')

                       <div class="mb-3">
                            @error('permissions')
                            <span class="text-danger">{{ $message  }}</span>
                            @enderror
                       </div>
                        <label for="permissions">Permissions</label>
                     
                        <div class="row">
                            @foreach ($permissions as $permission)
                            <div class="col-md-2">
                                <label>
                                    <input type="checkbox"
                                     name="permissions[]"
                                     value="{{ $permission->id }}"
                                      {{ in_array($permission->id, $rolePermissions) ? 'checked' : '' }}
                                      />
                                    {{ $permission->name }}
                                </label>
                        </div>
                            @endforeach
                        </div>
                        <div class="mb-3">
                        <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
