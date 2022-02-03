@extends('layouts.app')



@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-8 m-auto">
            <div class="card">
                <div class="card-header">{{ __('Category Edit') }}</div>

                <div class="card-body">
                    {{-- {{ Auth::user()->name }} example for viewing data added by whom--}}


                    {{-- success alert --}}
                    @if(session('InsDone'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>{{  session('InsDone')  }}!!! ✔️ </strong><br>
                            <a style="" href="{{ route('category.list') }}">See it here....</a>
                        </div>
                    @endif



                    <form action="{{route('category.update')}}" method="post">
                        @csrf
                        <div class="mb-3">
                            <input type="hidden" class="form-control" name="category_id" value="{{ $single_data->id }}">
                            <input type="text" class="form-control" name="category_name" value="{{ $single_data->category_name }}">
                            @error('category')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary text-light">Update</button>
                    </form>

                </div>
            </div>
        </div>

    </div>
</div>
@endsection
