@extends('layouts.doctor_dash')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-3 statistics wow fadeInDown" data-wow-duration="2s" data-wow-offset="300">
                <button class="btn btn-block btn-primary stat"  data-toggle="modal" data-target="#contact-modal">contact with admin</button><br>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 statistics wow fadeInLeft" data-wow-duration="2s" data-wow-offset="300">
                <h4>Last Month Visits</h4>
                <button class="btn btn-block stat1">{{$last}}</button>
            </div>
            <div class="col-md-4 statistics wow fadeInUp" data-wow-duration="2s" data-wow-offset="300">
                <h4>Total Visits</h4>
                <button class="btn btn-block stat2">{{$visits}}</button>
            </div>
            <div class="col-md-4 statistics wow fadeInRight" data-wow-duration="2s" data-wow-offset="300">
                <h4>Current Month Visits</h4>
                <button class="btn btn-block stat3">{{$next}}</button>
            </div>
        </div>

        <div class="row">
            <div class="col-md-4 statistics wow fadeInLeft" data-wow-duration="2s" data-wow-offset="300">
                <h4>Last Month Earnings</h4>
                <button class="btn btn-block stat1">{{$lastearn}} EGP</button>
            </div>
            <div class="col-md-4 statistics wow fadeInDown" data-wow-duration="2s" data-wow-offset="300">
                <h4>Total Earnings</h4>
                <button class="btn btn-block stat2">{{$total}} EGP</button>
            </div>
            <div class="col-md-4 statistics wow fadeInRight" data-wow-duration="2s" data-wow-offset="300">
                <h4>Current Month Earnings</h4>
                <button class="btn btn-block stat3">{{$nextearn}} EGP</button>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 offset-3 statistics">
                <h4>The most written medicine </h4>
                <button class="btn btn-block stat4">EDRONAX 4MG TAB</button><br>
            </div>
        </div>
    </div>
    <!-- price 1 edit  Modal -->
    <div class="modal fade" id="contact-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">contact admin</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">x</span>
                    </button>
                </div>
                <div class="modal-body">
                    <button class="btn btn-block btn-primary stat">01286864223</button><br>
                    <button class="btn btn-block stat4">admin@gmail.com</button><br>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
@endsection
