@extends('layouts.app')

@section('title','threebed')



@section('content')

<div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
            <a href="{{route('threebed.create')}}" class="btn btn-info">Add New</a>
            @include('layouts.partials.msg')
          <div class="card">
            <div class="card-header card-header-primary">
              <h4 class="card-title ">All threebed</h4>
            </div>
              <div class="card-content table-responsive">
                <table class="table table-striped table-bordered" id="table" cellspacing="0" width="100%">
                  <thead class=" text-primary">
                   <th>ID</th>
                   <th>Title</th>
                   <th>Description</th>
                   <th>Price</th>
                   <th>Image</th>
                   <th>Created At</th>
                   <th>Updated At</th>
                   <th>Action</th>
                  </thead>
                  <tbody>
                    @foreach ($threebeds as $key => $threebed)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $threebed->title }}</td>
                        <td>{{ $threebed->description }}</td>
                        <td>{{ $threebed->price }}</td>
                        <td><img class="img-responsive img-thumbnail" src="{{ asset('images/threebed/'.$threebed->image) }}" style="height: 100px; width: 100px" alt=""></td>
                        <td>{{ $threebed->created_at }}</td>
                        <td>{{ $threebed->updated_at }}</td>
                        <td>
                            <a href="{{ route('threebed.edit',$threebed->id) }}" class="btn btn-info btn-sm"><i class="material-icons">mode_edit</i></a>

                            <form id="delete-form-{{ $threebed->id }}" action="{{ route('threebed.destroy',$threebed->id) }}" style="display: none;" method="POST">
                                @csrf
                                @method('DELETE')
                            </form>
                            <button type="button" class="btn btn-danger btn-sm" onclick="if(confirm('Are you sure? You want to delete this?')){
                                event.preventDefault();
                                document.getElementById('delete-form-{{ $threebed->id }}').submit();
                            }else {
                                event.preventDefault();
                                    }"><i class="material-icons">delete</i></button>
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
