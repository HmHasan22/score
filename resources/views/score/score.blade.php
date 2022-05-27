@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                @if (Session::has('success'))
                    <div class="alert alert-success my-3">
                        {{ session('success') }}
                    </div>
                @endif
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">
                            <div class="">Select Category</div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('qualification') }}" method="POST">
                            @csrf
                            <select class="form-control" name="qualifications[]" id="select2-dropdown" multiple="multiple">
                                @foreach ($data as $item)
                                    <option value="{{ $item }}">{{ $item }}</option>
                                @endforeach
                            </select>
                            </select>
                            <div class="mt-3">
                                <button class="btn btn-primary" type="submit">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        $(document).ready(function() {
            $('#select2-dropdown').select2({
                placeholder: 'Select Option',
            });
        });
    </script>
@endsection
