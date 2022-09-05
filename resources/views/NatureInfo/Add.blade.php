@extends('Layouts.Master')
@section('content')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">

            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Recipiniest</h4>
                        <p class="card-description">
                        Recipienst
                        </p>
                        <form class="forms-sample" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="exampleInputName1">Nature Info</label>
                                <input type="text" class="form-control" id="exampleInputName1" placeholder="Name" name="natureinfo" value="{{old('natureinfo',Request::segment(3)?$natureinfo->natureinfo:'')}}">
                                @error('natureinfo')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            
                            
                            <!-- <div class="form-group">
                                <label for="exampleInputName1">Status</label>
                                <select name="status" id="" class="form-control">
                                    <option value="">Status</option>
                                    <option value="active">Active</option>
                                    <option value="active">Active</option>
                                </select>
                            </div> -->


                            <input type="submit" class="btn btn-primary mr-2" value="Add" name="{{Request::segment(3)?'update':'add'}}">

                        </form>
                    </div>
                </div>
            </div>


        </div>
    </div>
    @endsection