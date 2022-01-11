@extends('layouts.viewer')

@section('content')

{{-- @include('layouts.loading') --}}

<div class="content-wrapper">
    <div class="landing-bg img-fluid">
        <div class="content">
            <div class="container">
                <div class="landing-header d-flex flex-column justify-content-center">
                    <p class="mb-0" data-aos="fade-right">
                        UKMads.
                    </p>
                    <small data-aos="fade-right">
                        An advertising system that allows people to share their advertisement throughout the whole
                        world.
                    </small>

                    <div class="row ml-1 mt-5">
                        <button class="landing-btn" data-aos="fade-right">
                            <i class="fas fa-angle-double-down"></i>
                            &nbsp;
                            <a href="#offer">What we offer?</a>
                        </button>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
<div class="landing-offer" id="offer">
    <div class="container text-center">
        <h1 data-aos="fade-up">What we offer.</h1>
        <br>
        <div class="row justify-content-center">
            <div class="col-md-6 text-center border-right" data-aos="fade-up">
                <i class="fas fa-bullhorn symbol"></i>
                
                <p class="lead">You can create and post as many advertisement as you want. As long as it is an appropriate ads.
                    Unless you want to get your ads rejected. You also can view all the available advertisement on this
                    website.</p>
                  <br>
                <a href="{{ route('advertisement.ads') }}" class="btn-links">
                    View ads
                    <i class="fas fa-arrow-right"></i>
                </a>
            </div>
            <div class="col-md-6 text-center" data-aos="fade-up">
                <i class="fas fa-calendar-week symbol"></i>
                
                <p class="lead mb-3">This is a very suitable platform for event organizer to promote their event. Since, this platform is
                    an open to public, you really don't want to let this chance slipped away! As an organizer, you can
                    let visitor to submit registration form as easy as it done!</p>
                  <br>
                <a href="{{ route('event.events') }}" class="btn-links">
                    View event
                    <i class="fas fa-arrow-right"></i>
                </a>
            </div>
        </div>
    </div>
</div>
<div class="landing-advertiser" id="advertiser">
  <div class="content advertiser-content" data-aos="fade-right">
      <h3>Interested in our<br>advertisement services?</h3>

      <p>You can register here for free! You don't have to spam all your advertisement on Telegram or Whatsapp status. </p>
      <p>What you get is:</p>
      <ul>
        <li>Create any advertisement you want.</li>
        <li>Draft the advertisement before verify it.</li>
        <li>See how many people stalk your ads.</li>
        <li>Let people easily contact you through whatsapp using this website.</li>
      </ul>
      <br>
      <a href="{{ route('register') }}" class="btn-links">
        Register as Advertiser
        <i class="fas fa-arrow-right"></i>
    </a>
  </div>
</div>
<div class="landing-organizer" id="organizer">
  <div class="content organizer-content" data-aos="fade-down">
      <h3>Are you represent<br>or under any organizations?</h3>

      <p>You can register here for free! You don't have to spam all your events on Telegram or Whatsapp status. </p>
      <p>What you get is:</p>
      <ul>
        <li>Create any event you want.</li>
        <li>Draft the events before verify it.</li>
        <li>Let people join your event by fill the given form.</li>
        <li>Export a list of participant of your event.</li>
      </ul>
      <br>
      <a href="{{ route('org.form') }}" class="btn-links">
        Register as Organizer
        <i class="fas fa-arrow-right"></i>
    </a>
  </div>
</div>



@endsection
