@extends('layouts.admin')

@section('content')

<form method="POST" action="/admin/team/{{ $team->id }}">
  @csrf
  @method('PUT')

  <div class="form-row">
    <div class="form-group col-md-12">
      <label for="member_name"><b>Team Member Name</b></label>
      <input type="text" class="form-control" id="member_name" name="member_name" value="{{ $team->member_name }}">
    </div>
    <div class="form-group col-md-12">
      <label for="member_surname"><b>Team Member Surname</b></label>
      <input type="text" class="form-control" id="member_surname" name="member_surname" value="{{ $team->member_surname }}">
    </div>
    <div class="form-group col-md-12">
      <label for="member_mission"><b>Team Member Mission</b></label>
      <input type="text" class="form-control" id="member_mission" name="member_mission" value="{{ $team->member_mission }}">
    </div>
    <div class="form-group col-md-12">
      <label for="member_facebook"><b>Team Member Facebook</b></label>
      <input type="url" class="form-control" id="member_facebook" name="member_facebook" value="{{ $team->member_facebook }}">
    </div>
    <div class="form-group col-md-12">
      <label for="member_instagram"><b>Team Member Instagram</b></label>
      <input type="url" class="form-control" id="member_instagram" name="member_instagram" value="{{ $team->member_instagram }}">
    </div>
    <div class="form-group col-md-12">
      <label for="member_twitter"><b>Team Member Twitter</b></label>
      <input type="url" class="form-control" id="member_twitter" name="member_twitter" value="{{ $team->member_twitter }}">
    </div>
    <div class="form-group col-md-12">
      <label for="member_image"><b>Team Member Photo</b></label>
      <input type="file" class="form-control-file" id="member_image" name="member_image" value="{{ $team->member_image }}">
    </div>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>

@endsection
