@extends('layouts.app')

@section('title','blogheader')



@section('content')

<div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <a href="{{route('blogheader.create')}}" class="btn btn-info">Add</a>
            @include('layouts.partials.msg')
          <div class="card">
            <div class="card-header card-header-primary">
              <h4 class="card-title ">About header</h4>
            </div>
              <div class="card-content table-responsive">
                <table class="table table-striped table-bordered" id="table" cellspacing="0" width="100%">
                  <thead class=" text-primary">
                   <th>ID</th>
                   <th>Image</th>
                   <th>Created At</th>
                   <th>Updated At</th>
                   <th>Action</th>
                  </thead>
                  <tbody>
                    @foreach ($blogheaders as $key => $blogheader)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td><img class="img-responsive img-thumbnail" src="{{ asset('images/blogheader/'.$blogheader->image) }}" style="height: 100px; width: 100px" alt=""></td>
                        <td>{{ $blogheader->created_at }}</td>
                        <td>{{ $blogheader->updated_at }}</td>
                        <td>
                            <a href="{{ route('blogheader.edit',$blogheader->id) }}" class="btn btn-info btn-sm"><i class="material-icons">mode_edit</i></a>
                        </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
