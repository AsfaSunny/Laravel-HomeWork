@extends('layouts.app')



@section('content')
<div class="container">
    <div class="row">

        <div class="col-lg-8 m-auto">
            <div class="card">
                <div class="card-header"><center><b><i>{{ __('Category List') }}</i></b></center></div>

                <div class="card-body">

                <table class="table table-striped table-dark">
                    <thead>
                        <tr>
                            <th scope="col">Sl</th>
                            <th scope="col">Category</th>
                            <th scope="col">Status</th>
                            <th scope="col">Added By</th>
                            <th scope="col">Created At</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    @forelse($all_the_category as $category_list)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $category_list->category_name }}</td>
                            <td>
                                 @if($category_list->status == 1)
                                    <span class="badge badge-pill badge-success">Active</span>
                                @else
                                    <span class="badge badge-danger">Deactive</span>
                                 @endif
                            </td>
                            <td>{{ $category_list->UserXCategory->name }}</td>
                            <td>{{ $category_list->created_at->diffForHumans() }}</td>
                            <td>
                                <div class="btn-group" role="group" aria-label="Basic outlined example">
                                    <a href="{{ url('category/delete') }}/{{ $category_list->id }}" class="btn btn-outline-warning">delete</a>
                                    <a href="{{ url('category/edit') }}/{{ $category_list->id }}" class="btn btn-outline-primary">edit</a>
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
