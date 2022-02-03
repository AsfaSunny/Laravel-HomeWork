@extends('layouts.app')



@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-8 m-auto">
            <div class="card">
                <div class="card-header">{{ __('Category Adding Form') }}</div>

                <div class="card-body">
                    {{-- {{ Auth::user()->name }} example for viewing data added by whom--}}

                    {{-- Error alert --}}
                    @if(session('InsErr')) {{-- with function er data nia asar por InsErr ke session er khujteche --}}
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            <strong>{{  session('InsErr')  }}</strong>
                        </div>
                    @endif


                    {{-- success alert --}}
                    @if(session('InsDone')) {{-- with function er data nia asar por InsErr ke session er khujteche --}}
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>{{  session('InsDone')  }}!!! ✔️ </strong><br>
                            <a style="" href="{{ route('category.list') }}">See it here....</a>
                        </div>
                    @endif



                    <form action="{{url('/category/store')}}" method="post">
                        @csrf
                        <div class="mb-3">
                            <input type="text" class="form-control" name="category" placeholder="enter category name">
                            @error('category')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-info text-light">Submit</button>
                    </form>

                </div>
            </div>
        </div>

    </div>
</div>
@endsection
