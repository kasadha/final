@extends('layouts.app')

@section('title','threebed')


@push('css')

@endpush

@section('content')

<div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
                @include('layouts.partials.msg')
          <div class="card">
            <div class="card-header card-header-primary">
              <h4 class="card-title ">Edit threebed</h4>
            </div>
              <div class="card-content ">
                <form method="POST" action="{{ route('threebed.update',$threebed->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-md-12">
                          <div class="form-group">
                            <label class="bmd-label-floating">Title</label>
                            <input type="text" class="form-control" name="title" value="{{ $threebed->title }}">
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-12">
                          <div class="form-group">
                            <label class="bmd-label-floating">description</label>
                            <input type="text" class="form-control" name="description" value="{{ $threebed->description }}">
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-12">
                          <div class="form-group">
                            <label class="bmd-label-floating">Price</label>
                            <input type="text" class="form-control" name="price" value="{{ $threebed->price }}">
                          </div>
                        </div>
                      </div>

                      <div class="row">
                        <div class="col-md-12">
                                <label class="bmd-label-floating">Image</label>
                            <input type="file" name="image">
                        </div>
                      </div>
                      <a href="{{route('threebed.index')}}" class="btn btn-danger">Back</a>
                      <button type="submit" class="btn btn-primary">Save</button>
                </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection


@push('scripts')

@endpush
