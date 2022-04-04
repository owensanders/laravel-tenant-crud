@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Tenants') }}</div>

                <div class="card-body">
                    <a class="btn btn-primary" href="{{ route('tenants.create') }}">Add New Tenant</a>
                    <br/>
                    <br/>
                   <table class="table">
                       <thead>
                           <tr>
                               <th>Name</th>
                               <th>Email</th>
                               <th>Domain</th>
                               <th></th>
                           </tr>
                       </thead>
                       <tbody>
                           @forelse($tenants as $tenant)
                             <tr>
                                 <td>{{ $tenant->name }}</td>
                                 <td>{{ $tenant->email }}</td>
                                 <td>{{ $tenant->domain }}</td>
                                 <td>
                                     <a class="btn btn-sm btn-info" href="{{ route('tenants.edit', $tenant->id) }}">Edit</a>
                                     <form action="{{ route('tenants.destroy', $tenant->id) }}" method="POST" style="display: inline-block">
                                        @method('DELETE')
                                        @csrf
                                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                                    </form>
                                 </td>
                             </tr>
                             @empty
                             <tr>
                                 <td colspan="4">No tenants.</td>
                             </tr>
                           @endforelse
                       </tbody>
                   </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
