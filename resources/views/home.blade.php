@extends('layout')

@section('title', 'Dashboard')

@section('content')
<div class="row">
  <div class="col-xs-12 col-sm-3">
    @include('sidebar') <!-- Include the sidebar -->
  </div>
  
  <div class="col-xs-12">
    <div class="">
      <div class="panel-heading">
        <h3 class="">Dashboard</h3>
      </div>
      <div class="panel-body">
          <p>Welcome, {{ Auth::user()->name }}. Here's an overview of your site.</p>
      </div>
    </div>
    
    <div class="row">
      <div class="col-xs-12 col-sm-6">
        <div class="well" style="max-height: 300px; overflow-y: auto;">
          <h4>Users</h4>
          <table class="table table-bordered">
            <thead>
              <tr>
                <th>Name</th>
                <th>Role</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($users as $user)
                <tr>
                  <td>{{ $user->name }}</td>
                  <td>{{ $user->role }}</td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
      @if(Auth::check() && Auth::user()->role !== 'streamer')
      <div class="col-xs-12 col-sm-6">
        @if(Auth::check() && Auth::user()->role !== 'streamer') <!-- Hide button for streamers -->
          <div class="well">
            <a href="{{ route('approval') }}" class="btn btn-primary">Pending User Approvals</a>
          </div>
        @endif
      </div>
      @endif
    </div>
  </div>
</div>
@endsection
