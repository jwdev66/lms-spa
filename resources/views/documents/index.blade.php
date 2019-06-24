@extends('layouts.base')

@section('title', 'Dashboard')

@section('content')
    <h1>Welcome to your application dashboard!
        <a href="#" class="btn btn-primary btn-sm rounded-s" data-toggle="modal" data-target="#modalUpload">
            Upload
        </a>
    </h1>

<div class="card-deck">
    @forelse($documents as $doc)
        <div class="col-4 mt-4">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">
                        <h4>{{\Illuminate\Support\Str::limit($doc->title,10)}}

                            <button class="btn btn-danger btn-sm float-right ml-2">🕶</button>
                            <button class="btn btn-secondary btn-sm float-right">💬</button>
                        </h4>
                    </div>
                </div>
                <div class="card-body">
                    <div class="card-text">
                        <p>{{$doc->file}}</p>
                    </div>
                </div>
            </div>
        </div>
    @empty
        No talks this day.
    @endforelse

</div>

    {{--Upload Concept Note Modal--}}
    <div class="modal fade" id="modalUpload" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form action="{{route('documents.store')}}" method="post"
                      enctype="multipart/form-data">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title">Upload PDF Document</h5>
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
                            <label for="document">Document</label>
                            <input type="file" class="form-control-file" id="document" name="document" required="">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Upload</button>
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
