@extends('layout')
@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h4>Add Class</h4>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('class.index') }}"> Back</a>
        </div>
    </div>
</div>
   
@if ($errors->any())
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
   
<form action="{{route('class.store')}}" class="kt-form kt-form--label-right" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="kt-portlet__body">
                    <div class="kt-section">
                        <div class="kt-section__content">
                            <div class="form-group row">

                                <div class="col-lg-4 form-group-sub">
                                    <label class="form-control-label">College:<span
                                            class="kt-font-danger kt-font-bold"></span></label>
                                    <select class="form-control" name="college" id="college">
                                        <option>Select College</option>
                                        @foreach($college as $value)
                                        <option value="{{$value->id}}">{{$value->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-lg-4 form-group-sub">
                                    <label class="form-control-label">Title:<span
                                            class="kt-font-danger kt-font-bold"></span></label>
                                    <input type="text" class="form-control" name="title" placeholder="Enter Class Title">
                                </div>
                            </div>
                            <div class="form-group row">
                                 <div class="col-lg-4 form-group-sub">
                                <div class="input-group">
                                <input type="hidden" class="form-control" name="phone_number" placeholder="Phone Number">
                            </div>
                        </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-lg-4 form-group-sub">
                                    <label class="form-control-label">Contact Number:<span
                                            class="kt-font-danger kt-font-bold"></span></label>
                                    <input type="text" class="form-control" name="contact_number" placeholder="Enter Phone Number">
                                </div>
                                <div class="col-lg-4 form-group-sub">
                                    <label class="form-control-label">Email:<span
                                            class="kt-font-danger kt-font-bold"></span></label>
                                    <input type="email" class="form-control" name="email" placeholder="Enter Email" value="">
                                </div>
                                <div class="col-lg-4 form-group-sub">
                                    <label class="form-control-label">Price<span
                                            class="kt-font-danger kt-font-bold"></span></label>
                                    <input type="text" class="form-control" name="price" placeholder="Enter Price" value="">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-lg-4 form-group-sub cloned-input" id="levels">
                                    <label class="form-control-label">Levels:<span
                                            class="kt-font-danger kt-font-bold"></span></label>
                                    <input type="text" class="form-control" name="levels[]" placeholder="Enter name" value="">
                                </div>
                                <a id="clonedInput">Add</a>
                            </div>
                            <div class="form-group row">
                                <div class="col-lg-4 form-group-sub">
                                    <label class="form-control-label">Description<span
                                            class="kt-font-danger kt-font-bold"></span></label>
                                    <textarea name="description" style="margin: 0px; width: 300px; height: 80px;"></textarea>
                                </div>
                                <div class="col-lg-4 form-group-sub">
                                    <label class="form-control-label">Syllabus<span
                                            class="kt-font-danger kt-font-bold"></span></label>
                                    <input type="file" name="syllabus" class="form-control">
                                </div>

                            </div>
                            <div class="form-group row" id="assginModule">
  
                            <button type="submit" class="btn btn-brand">Save</button>
                               <a href="{{route('class.index')}}" class="btn btn-secondary">Cancel</a>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                </form>
@endsection
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){

 $('#clonedInput').click(function(){
  // Create clone of <div class='cloned-input'>
  var newel = $('.cloned-input:last').clone();

  // Add after last <div class='cloned-input'>
  $(newel).insertAfter(".cloned-input:last");
 });

 $('.txt').focus(function(){
  $(this).css('border-color','red');
 });
 
 $('.txt').focusout(function(){
  $(this).css('border-color','initial');
 });

});
</script>