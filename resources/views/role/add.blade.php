@extends('layouts.app')



@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-4">
            <div class="card">
                <div class="card-header">{{ __('User Role') }}</div>

                <div class="card-body">

{{--  session isn't the session that we used in php, its a builtin function--}}
                     @if(session('InsErr')) {{-- with function er data nia asar por InsErr ke session er khujteche --}}
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <strong>{{  session('InsErr')  }}</strong>
                        {{-- <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button> --}}
                    </div>
                    @endif


                    <form action="{{url('/role/add')}}" method="post">
                        @csrf
                        <div class="mb-3">
                            <input type="text" class="form-control" name="role">
                            @error('role')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-info text-light">Submit</button>
                    </form>

                </div>
            </div>
        </div>

        <div class="col-lg-8">
            <div class="card">
                <div class="card-header">{{ __('Role List') }}</div>

                <div class="card-body">

                <table class="table table-striped table-info">
                    <thead>
                        <tr>
                            <th scope="col">Sl</th>
                            <th scope="col">Role</th>
                            <th scope="col">Status</th>
                            <th scope="col">Created At</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    @forelse($all_the_role as $roles)    {{-- data catching via compact--}}
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $roles->role }}</td>
                            <td>{{ $roles->status }}</td>
                            <td>{{ $roles->created_at->diffForHumans() }}</td>     {{-- carbon time stamp game --}}
                            <td>-</td>
                        </tr>
                        @empty
                        <tr>
                            <td class="text-danger text-center" colspan="20"><b>No data have been added yet</b></td>
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
