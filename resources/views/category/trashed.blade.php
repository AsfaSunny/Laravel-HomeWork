@extends('layouts.app')



@section('content')
<div class="container">
    <div class="row">

        <div class="col-lg-8 m-auto">
            <div class="card">
                <div class="card-header text-primary"><center><b>{{ __('Category Trashed Bin') }}</b></center></div>

                <div class="card-body">

                    @if(session('DelErr')) {{-- with function er data nia asar por InsErr ke session er khujteche --}}
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            <strong>{{  session('DelErr')  }}</strong>
                        </div>
                    @endif

                <table class="table table-striped table-dark">
                    <thead>
                        <tr>
                            <th scope="col">Sl</th>
                            <th scope="col">Category</th>
                            <th scope="col">Added By</th>
                            {{-- <th scope="col">Created At</th> --}}
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    @forelse($all_trashed as $trashed_item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $trashed_item->category_name }}</td>
                            <td>{{ $trashed_item->UserXCategory->name }}</td>
                            {{-- <td>{{ $trashed_item->created_at->format('d-m-y') }}</td> --}}
                            <td>
                                <div class="btn-group" role="group" aria-label="Basic outlined example">
                                    <a href="{{ url('category/perdelete') }}/{{ $trashed_item->id }}" class="btn btn-outline-danger">Permanent delete</a>
                                    <a href="{{ url('category/restore') }}/{{ $trashed_item->id }}" class="btn btn-outline-light">Restore</a>
                                </div>
                            </td>
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
