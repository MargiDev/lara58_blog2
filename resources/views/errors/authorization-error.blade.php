
@extends('layouts.main')

@section('content')

    <div class="container">
      <div class="row">
        <div class="col-md-12 page-not-found">
          <h2>Authorization Error</h2>
          <p>
            Sorry, You cannot delete default item!
          </P>
          <a href="javascript:window.history.back();" class="btn btn-default">Go back</a>
        </div>
      </div>
    </div>

@endsection
