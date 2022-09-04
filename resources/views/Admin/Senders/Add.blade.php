@extends('Admin.Master')
@section('content')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">

            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Senders</h4>
                        <p class="card-description">
                            Senders
                        </p>
                        <form class="forms-sample" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="exampleInputName1">Name</label>
                                <input type="text" class="form-control" id="exampleInputName1" placeholder="Name" name="name" value="{{old('name',Request::segment(3)?$sender->name:'')}}">
                                @error('name')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputName1">ID Proof No </label>
                                <input type="text" class="form-control" id="exampleInputName1" placeholder="Id Proof" name="idproof" value="{{old('idproof',Request::segment(3)?$sender->idproof:'')}}">
                                @error('idproof')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputName1">Designation</label>
                                <select name="designation" id="" class="form-control">
                                    <option value="">SELECT DESIGNATION </option>
                                    <option value="compoffice" {{old('designation')?'selected':""}} {{Request::segment(3)?'selected':''}}>compolinace officer </option>
                                </select>
                                @error('designation')
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