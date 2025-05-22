@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Edycja') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <form method="POST" action="{{ route('attributes.update', $attribute) }}">
                            @csrf
                            @method('PUT')

                            <div class="form-group row mb-3">
                                <label for="width" class="col-md-4 col-form-label text-md-right">{{ __('Width') }}</label>
                                <div class="col-md-6">
                                    <input id="width" type="number" step="0.01" class="form-control @error('width') is-invalid @enderror" 
                                           name="width" value="{{ old('width', $attribute->width) }}" required>
                                    @error('width')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-3">
                                <label for="height" class="col-md-4 col-form-label text-md-right">{{ __('Height') }}</label>
                                <div class="col-md-6">
                                    <input id="height" type="number" step="0.01" class="form-control @error('height') is-invalid @enderror" 
                                           name="height" value="{{ old('height', $attribute->height) }}" required>
                                    @error('height')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-3">
                                <label for="weight" class="col-md-4 col-form-label text-md-right">{{ __('Weight') }}</label>
                                <div class="col-md-6">
                                    <input id="weight" type="number" step="0.01" class="form-control @error('weight') is-invalid @enderror" 
                                           name="weight" value="{{ old('weight', $attribute->weight) }}" required>
                                    @error('weight')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Update') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection 