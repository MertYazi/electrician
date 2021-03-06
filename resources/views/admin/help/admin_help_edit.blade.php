@extends('layouts.admin')

@section('content')

<form method="POST" action="/admin/help/1" enctype="multipart/form-data">
  @csrf
  @method('PUT')

  <div class="form-row">
    <div class="form-group col-md-12">
      <label class="text-orange" for="help_caption"><b>Help Caption</b></label>
      <input type="text" class="form-control @error('help_caption') is-invalid @enderror" id="help_caption" name="help_caption" value="{{ $help->help_caption }}">
      @error('help_caption')
      <p class="alert alert-danger">{{ $errors->first('help_caption') }}</p>
      @enderror
    </div>
    <div class="form-group col-md-12">
      <label class="text-orange" for="help_keywords"><b>Help Keywords</b></label>
      <input type="text" class="form-control @error('help_keywords') is-invalid @enderror" id="help_keywords" name="help_keywords" value="{{ $help->help_keywords }}">
      @error('help_keywords')
      <p class="alert alert-danger">{{ $errors->first('help_keywords') }}</p>
      @enderror
    </div>
    <div class="form-group col-md-12">
      <label class="text-orange" for="decide_text"><b>Decide Text</b></label>
      <textarea class="form-control @error('decide_text') is-invalid @enderror" id="decide_text" name="decide_text" rows="3">{{ $help->decide_text }}</textarea>
      @error('decide_text')
      <p class="alert alert-danger">{{ $errors->first('decide_text') }}</p>
      @enderror
    </div>
    <div class="form-group col-md-12">
      <label class="text-orange" for="decide_image"><b>Decide Image</b></label>
      <input type="file" class="form-control-file @error('decide_image') is-invalid @enderror" id="decide_image" name="decide_image" value="{{ $help->decide_image }}">
      @error('decide_image')
      <p class="alert alert-danger">{{ $errors->first('decide_image') }}</p>
      @enderror
    </div>
    <div class="form-group col-md-12">
      <label class="text-orange" for="reach_text"><b>Reach Text</b></label>
      <textarea class="form-control @error('reach_text') is-invalid @enderror" id="reach_text" name="reach_text" rows="3">{{ $help->reach_text }}</textarea>
      @error('reach_text')
      <p class="alert alert-danger">{{ $errors->first('reach_text') }}</p>
      @enderror
    </div>
    <div class="form-group col-md-12">
      <label class="text-orange" for="reach_image"><b>Reach Image</b></label>
      <input type="file" class="form-control-file @error('reach_image') is-invalid @enderror" id="reach_image" name="reach_image" value="{{ $help->reach_image }}">
      @error('reach_image')
      <p class="alert alert-danger">{{ $errors->first('reach_image') }}</p>
      @enderror
    </div>
    <div class="form-group col-md-12">
      <label class="text-orange" for="consult_text"><b>Consult Text</b></label>
      <textarea class="form-control @error('consult_text') is-invalid @enderror" id="consult_text" name="consult_text" rows="3">{{ $help->consult_text }}</textarea>
      @error('consult_text')
      <p class="alert alert-danger">{{ $errors->first('consult_text') }}</p>
      @enderror
    </div>
    <div class="form-group col-md-12">
      <label class="text-orange" for="consult_image"><b>Consult Image</b></label>
      <input type="file" class="form-control-file @error('consult_image') is-invalid @enderror" id="consult_image" name="consult_image" value="{{ $help->consult_image }}">
      @error('consult_image')
      <p class="alert alert-danger">{{ $errors->first('consult_image') }}</p>
      @enderror
    </div>
    <div class="form-group col-md-12">
      <label class="text-orange" for="get_service_text"><b>Get Service Text</b></label>
      <textarea class="form-control @error('get_service_text') is-invalid @enderror" id="get_service_text" name="get_service_text" rows="3">{{ $help->get_service_text }}</textarea>
      @error('get_service_text')
      <p class="alert alert-danger">{{ $errors->first('get_service_text') }}</p>
      @enderror
    </div>
    <div class="form-group col-md-12">
      <label class="text-orange" for="get_service_image"><b>Get Service Image</b></label>
      <input type="file" class="form-control-file @error('get_service_image') is-invalid @enderror" id="get_service_image" name="get_service_image" value="{{ $help->get_service_image }}">
      @error('get_service_image')
      <p class="alert alert-danger">{{ $errors->first('get_service_image') }}</p>
      @enderror
    </div>
  </div>
  <button type="submit" class="btn btn-primary">Save Changes</button>
</form>

@endsection
