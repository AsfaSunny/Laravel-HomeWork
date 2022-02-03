@extends('layouts.app')

@section('content')
<div class="container">

    <div class="row">

        <div class="col-md-4">
            <caption>Now <mark style="background-color:rgb(223, 189, 255) ; color: rgba(0, 49, 209, 0.959);">{{ Auth::user()->name }}</mark> is logged in,</caption>
            <br>
            <b style="text-transform: titlecase;">Welcome Mr. {{ Auth::user()->name }} on the board!!!!</b>
        </div>



        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('User Table') }}</div>

                <div class="card-body">

                    <table class="table table-striped table-dark">
                        <thead>
                            <tr>
                                <th scope="col">Sl</th>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($all_the_user as $show_user)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $show_user->name }}</td>
                                <td>{{ $show_user->email }}</td>
                                <td>-</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
