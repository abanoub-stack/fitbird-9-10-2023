@extends('layouts.layout')
@section('title')
    Edit Nutrition
@endsection
@section('content')
@section('head-title')
Edit Nutrition "{{$nutrtion->title}}"
@endsection

        <div class="row">
            <div class="col-md-10 offset-md-1">
                <div class="row">
                    <div class="col-lg-12 m-auto">
                        <a href="{{url('nutrition')}}" class="btn btn-outline-dark float-lg-right m-2">Back</a>
                        <div class="card">
                          <div class="card-body">
                              <form action="{{route('nutrition.update')}}" method="post">
                                  @csrf
                                  <input type="hidden" name="id" value="{{$nutrtion->id}}">
                                  <div class="mb-3">
                                      <label  class="form-label">Title</label>
                                      <input type="text" required value="{{$nutrtion->title}}" name="title"  class="form-control" placeholder="Nutrition Title">
                                      <small class="text-muted">Enter Nutrition Title (Required)</small>
                                      @error('title')
                                          <span class="invalid-feedback text-danger" role="alert">
                                              <strong>{{ $message }}</strong>
                                          </span>
                                      @enderror
                                  </div>

                                  <div class="mb-3">
                                      <label  class="form-label">Nutrition Details</label>
                                      <textarea  id="nutrition_textarea" class="form-control"  name="details"  cols="30" rows="20" placeholder="Nutrition Details">{!! $nutrtion->data !!}</textarea>
                                      @error('details')
                                          <span class="invalid-feedback text-danger" role="alert">
                                              <strong>{{ $message }}</strong>
                                          </span>
                                      @enderror
                                  </div>

                                  <button type="submit" class="btn btn-success float-lg-right">Update</button>

                              </form>
                          </div>
                        </div>

                    </div>
                </div>


            </div>

        </div>

@endsection


@section('js')

<script>
    tinymce.init({
      selector: '#nutrition_textarea',
      plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount checklist mediaembed casechange export formatpainter pageembed linkchecker a11ychecker tinymcespellchecker permanentpen powerpaste advtable advcode editimage tinycomments tableofcontents footnotes mergetags autocorrect typography inlinecss',
      toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table mergetags | addcomment showcomments | spellcheckdialog a11ycheck typography | align lineheight | checklist numlist bullist indent outdent | emoticons charmap | removeformat',
      tinycomments_mode: 'embedded',
      tinycomments_author: 'Author name',
      mergetags_list: [
        { value: 'First.Name', title: 'First Name' },
        { value: 'Email', title: 'Email' },
      ]
    });
  </script>
@endsection
