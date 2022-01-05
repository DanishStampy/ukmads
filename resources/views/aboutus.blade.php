@extends('layouts.master')

@section('title','About UKMads')
@section('content')

@include('layouts.loading')

<div class="card card-solid">
    <div class="row justify-content-center align-items-center">
      <div class="col-md-4">
        <img src="{{ asset('img/ukmads-logo.png') }}" alt="UKMads logo" class="img-fluid" style="">
      </div>
      <div class="col-md-8">
        <div class="card-body">
          <blockquote>

            <h2 class="card-title">What is UKMads?</h2>
            <p class="card-text">
              UKMads is a platform for UKM community to advertise their business or events on one plaform with ease. The system is also a platform to notify students about any formal or main events held in the UKM.
            </p>
          </blockquote>
        </div>
      </div>
    </div>
</div>

<h2 style="margin: 16px 0 24px 0; font-weight: 700;">Our Team</h2>

<div class="card card-solid">
    <div class="card-body pb-0">
        <div class="row justify-content-center">
            <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch flex-column mb-3">
                <div class="card bg-light d-flex flex-fill">
                    <div class="card-header text-muted border-bottom-0">
                        Project Manager
                    </div>
                    <div class="card-body pt-0">
                        <div class="row">
                            <div class="col-7">
                                <h2 class="lead mt-2"><b>Nurfakhrullah</b></h2>
                                <p class="text-muted text-sm"><b>About: </b> Hentai Expert / Documenter / Trap Leader
                                </p>
                                <ul class="ml-4 mb-0 fa-ul text-muted">
                                    <li class="small"><span class="fa-li"><i class="fas fa-lg fa-building"></i></span>
                                        Address: Matrikulasi Johor</li>
                                    <li class="small mt-1"><span class="fa-li"><i class="fas fa-lg fa-phone"></i></span>
                                        Phone #: 999</li>
                                </ul>
                            </div>
                            <div class="col-5 text-center">
                                <img src="{{ asset('img/team/fakhrul.jpg ') }}"
                                    alt="user-avatar" class="img-circle img-fluid mt-2">
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="text-right">
                            <a href="https://github.com/NurfaNuva" target="_blank" class="btn btn-sm bg-dark">
                                <i class="fab fa-github"></i>
                            </a>
                            
                            <a href="https://api.WhatsApp.com/send?phone=+60196965841" target="_blank" class="btn btn-sm bg-teal">
                                <i class="fab fa-whatsapp"></i>
                            </a>

                            <a href="https://www.instagram.com/nurfa_krul/" target="_blank" class="btn btn-sm bg-cyan">
                                <i class="fab fa-instagram"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch flex-column mb-3">
                <div class="card bg-light d-flex flex-fill">
                    <div class="card-header text-muted border-bottom-0">
                        Scrum Master
                    </div>
                    <div class="card-body pt-0">
                        <div class="row">
                            <div class="col-7">
                                <h2 class="lead mt-2"><b>Putera Niq Aziz</b></h2>
                                <p class="text-muted text-sm"><b>About: </b> UI/UX Designer / Valorant Pro Player </p>
                                <ul class="ml-4 mb-0 fa-ul text-muted">
                                    <li class="small"><span class="fa-li"><i class="fas fa-lg fa-building"></i></span>
                                        Address: Kuala Lumpur</li>
                                    <li class="small mt-1"><span class="fa-li"><i class="fas fa-lg fa-phone"></i></span>
                                        Phone #: 619</li>
                                </ul>
                            </div>
                            <div class="col-5 text-center">
                                <img src="{{ asset('img/team/niq.jpg') }}" alt="user-avatar"
                                    class="img-circle img-fluid mt-2">
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="text-right">
                            <a href="https://github.com/niqaziz17" target="_blank" class="btn btn-sm bg-dark">
                                <i class="fab fa-github"></i>
                            </a>
                            
                            <a href="https://api.WhatsApp.com/send?phone=+60142684528" target="_blank" class="btn btn-sm bg-teal">
                                <i class="fab fa-whatsapp"></i>
                            </a>

                            <a href="https://www.instagram.com/niqaziz_/" target="_blank" class="btn btn-sm bg-cyan">
                                <i class="fab fa-instagram"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch flex-column mb-3">
                <div class="card bg-light d-flex flex-fill">
                    <div class="card-header text-muted border-bottom-0">
                        Backend Developer
                    </div>
                    <div class="card-body pt-0">
                        <div class="row">
                            <div class="col-7">
                                <h2 class="lead mt-2"><b>Muhammad Syazili</b></h2>
                                <p class="text-muted text-sm"><b>About: </b> Cat Lover / Battlefield 2042 Part-timer
                                </p>
                                <ul class="ml-4 mb-0 fa-ul text-muted">
                                    <li class="small"><span class="fa-li"><i class="fas fa-lg fa-building"></i></span>
                                        Address: Melaka</li>
                                    <li class="small mt-1"><span class="fa-li"><i class="fas fa-lg fa-phone"></i></span>
                                        Phone #: 777</li>
                                </ul>
                            </div>
                            <div class="col-5 text-center">
                                <img src="{{ asset('img/team/cili.jpg') }}" alt="user-avatar"
                                    class="img-circle img-fluid mt-2">
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="text-right">
                            <a href="https://github.com/syazilijuhari" target="_blank" class="btn btn-sm bg-dark">
                                <i class="fab fa-github"></i>
                            </a>
                            
                            <a href="https://api.WhatsApp.com/send?phone=+60136660566" target="_blank" class="btn btn-sm bg-teal">
                                <i class="fab fa-whatsapp"></i>
                            </a>

                            <a href="https://www.instagram.com/syazilijuhari/" target="_blank"
                                class="btn btn-sm bg-cyan">
                                <i class="fab fa-instagram"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch flex-column mb-3">
                <div class="card bg-light d-flex flex-fill">
                    <div class="card-header text-muted border-bottom-0">
                        Fullstack Developer
                    </div>
                    <div class="card-body pt-0">
                        <div class="row">
                            <div class="col-7">
                                <h2 class="lead mt-2"><b>Muhammad Danish</b></h2>
                                <p class="text-muted text-sm"><b>About: </b> Weeb / Hentai Expert / Candice's BF </p>
                                <ul class="ml-4 mb-0 fa-ul text-muted">
                                    <li class="small"><span class="fa-li"><i class="fas fa-lg fa-building"></i></span>
                                        Address: Ipoh, Perak</li>
                                    <li class="small mt-1"><span class="fa-li"><i class="fas fa-lg fa-phone"></i></span>
                                        Phone #: 6969</li>
                                </ul>
                            </div>
                            <div class="col-5 text-center">
                                <img src="{{ asset('img/team/vice.jpg') }}" alt="user-avatar"
                                    class="img-circle img-fluid mt-2">
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="text-right">
                            <a href="https://github.com/ViceNish" target="_blank" class="btn btn-sm bg-dark">
                                <i class="fab fa-github"></i>
                            </a>
                            
                            <a href="https://api.WhatsApp.com/send?phone=+601118501474" target="_blank" class="btn btn-sm bg-teal">
                                <i class="fab fa-whatsapp"></i>
                            </a>

                            <a href="https://www.instagram.com/danish_nish/" target="_blank" class="btn btn-sm bg-cyan">
                                <i class="fab fa-instagram"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch flex-column mb-3">
                <div class="card bg-light d-flex flex-fill">
                    <div class="card-header text-muted border-bottom-0">
                        Frontend Developer
                    </div>
                    <div class="card-body pt-0">
                        <div class="row">
                            <div class="col-7">
                                <h2 class="lead mt-2"><b>Danish Irfan Shah</b></h2>
                                <p class="text-muted text-sm"><b>About: </b> Bread Lover / Your GF's Lover </p>
                                <ul class="ml-4 mb-0 fa-ul text-muted">
                                    <li class="small"><span class="fa-li"><i class="fas fa-lg fa-building"></i></span>
                                        Address: Banting, Selangor</li>
                                    <li class="small mt-1"><span class="fa-li"><i class="fas fa-lg fa-phone"></i></span>
                                        Phone #: + 800 - 12 12 23 52</li>
                                </ul>
                            </div>
                            <div class="col-5 text-center">
                                <img src="{{ asset('img/team/stampy.JPG') }}" alt="user-avatar"
                                    class="img-circle img-fluid mt-2">
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="text-right">
                            <a href="https://github.com/DanishStampy" target="_blank" class="btn btn-sm bg-dark">
                                <i class="fab fa-github"></i>
                            </a>
                            
                            <a href="https://api.WhatsApp.com/send?phone=+60123631097" target="_blank" class="btn btn-sm bg-teal">
                                <i class="fab fa-whatsapp"></i>
                            </a>

                            <a href="https://www.instagram.com/danishstampy/" target="_blank"
                                class="btn btn-sm bg-cyan">
                                <i class="fab fa-instagram"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /.card-body -->
<br>

@endsection
