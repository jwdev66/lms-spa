@extends('layouts.base')

@section('title', 'Dashboard')

@section('content')
    <h1>My Ideas
        <button dusk="add-button"  class="btn btn-primary btn-sm rounded-s" data-toggle="modal" data-target="#modalAddIdea">Add New</button>
    </h1>


    <table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Title</th>
      <th scope="col">Description</th>
      <th scope="col">Created At</th>
      <th scope="col">Handle</th>
    </tr>
  </thead>
  <tbody>

    @forelse($ideas as $idea)
    <tr>
      <th scope="row">{{ $idea->id }}</th>
      <td>{{ $idea->title }}</td>
      <td class="text-justify">{{ Str::limit($idea->description,70)}}</td>
      <td>{{ $idea->created_at}}</td>
      <td>
      <button type="button" class="btn btn-primary btn-sm">Edit</button>
      <button type="button" class="btn btn-danger btn-sm">Delete</button>
      </td>
    </tr>
    @empty
        Kind to add new ideas. <code>😊</code>
    @endforelse

    </tbody>
</table>


    <div class="modal fade" id="modalAddIdea" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form action="{{route('ideas.store')}}" method="post">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title"> + Add New</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">


                            <div class="form-group">
                                <label for="title">Title</label>
                                <input type="text" class="form-control" id="title" name="title" placeholder="Some title" min="2"
                                       required="">
                            </div>

                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea class="form-control" name="description" id="description" cols="30" rows="3" required=""></textarea>
                            </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    @parent
    <script src="{{ asset('js/app1.js') }}" defer></script>
@endsection
