@extends('Layouts.Master')
@section('content')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">

            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Hoverable Table</h4>
                        <p class="card-description">
                            Add class <code>.table-hover</code>
                        </p>
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Degignation</th>
                                        <th>Id Proof</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if($senders)
                                    @foreach($senders as $s)
                                    <tr>
                                        <td>{{$s->name}}</td>
                                        <td>{{$s->designation}}</td>
                                        <td class="text-success">{{$s->idproof}}</i></td>
                                        <td><label class="badge badge-warning">{{$s->status}}</label></td>
                                        <td>
                                            <a href="{{route('deletesender',$s->id)}}" class="btn btn-danger">DELETE</a>
                                            <a href="{{route('editsender',$s->id)}}" class="btn btn-info">EDIT</a>
                                        </td>
                                    </tr>
                                    @endforeach
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!-- content-wrapper ends -->
    @endsection