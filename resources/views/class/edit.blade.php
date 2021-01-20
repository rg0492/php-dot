@extends('layout')
@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h4>Edit Class</h4>
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
   
<form action="{{route('class.update',[$class->id])}}" class="kt-form kt-form--label-right" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                
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
                                        <option value="{{$value->id}}" {{$class->college_id==$value->id?'selected':''}}>{{$value->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-lg-4 form-group-sub">
                                    <label class="form-control-label">Title:<span
                                            class="kt-font-danger kt-font-bold"></span></label>
                                    <input type="text" class="form-control" name="title" placeholder="Enter Class Title" value="{{$class->title}}">
                                </div>
                            </div>
                            <div class="form-group row">
                                 <div class="col-lg-4 form-group-sub">
                                <div class="input-group">
                                <input type="hidden" class="form-control" name="phone_number" placeholder="Phone Number" >
                            </div>
                        </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-lg-4 form-group-sub">
                                    <label class="form-control-label">Contact Number:<span
                                            class="kt-font-danger kt-font-bold"></span></label>
                                    <input type="text" class="form-control" name="contact_number" placeholder="Enter Phone Number" value="{{$class->contact_number}}">
                                </div>
                                <div class="col-lg-4 form-group-sub">
                                    <label class="form-control-label">Email:<span
                                            class="kt-font-danger kt-font-bold"></span></label>
                                    <input type="email" class="form-control" name="email" placeholder="Enter Email" value="{{$class->email}}">
                                </div>
                                <div class="col-lg-4 form-group-sub">
                                    <label class="form-control-label">Price<span
                                            class="kt-font-danger kt-font-bold"></span></label>
                                    <input type="text" class="form-control" name="price" placeholder="Enter Price" value="{{$class->price}}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-lg-4 form-group-sub">
                                    <label class="form-control-label">Levels:<span
                                            class="kt-font-danger kt-font-bold"></span></label>
                                    <input type="text" class="form-control" name="levels" placeholder="Enter name" value="{{$class->levels}}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-lg-4 form-group-sub">
                                    <label class="form-control-label">Description<span
                                            class="kt-font-danger kt-font-bold"></span></label>
                                    <textarea name="description" style="margin: 0px; width: 300px; height: 80px;">{{$class->description}}</textarea>
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