@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center"><div>
                    {{ __('Dashboard') }}</div>
                <a href="{{ route("hasil.create") }}" class="btn btn-primary">+ Add New</a>
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <th>SL</th>
                            <th>League</th>
                            <th>Home Team</th>
                            <th>Away Team</th>
                            <th>Result One</th>
                            <th>Result Two</th>
                            <th>Action</th>
                        </thead>
                        <tbody>
                           <tr>
                            <td>01</td>
                            <td>Indian Premiur League</td>
                            <td>Barcalona</td>
                            <td>Real Madrid</td>
                            <td>Soon</td>
                            <td>Soon</td>
                            <td>
                                <button type="button" class="btn btn-success">Edit</button>
                                <button type="button" class="btn btn-danger">Button</button>
                            </td>
                           </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
