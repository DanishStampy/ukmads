@extends('layouts.master')

@section('title', 'Payment')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card card-primary card-outline text-center">
                <h2 class="my-3">Payment Details</h2>
                <div class="card-body">
                    <form role="form" action="{{ route('organizer.payment') }}" method="post"
                        class="require-validation" data-cc-on-file="false"
                        data-stripe-publishable-key="{{ env('STRIPE_PUBLISHABLE_KEY') }}"
                        id="payment-form">
                        @csrf

                        @if(Session::has('success'))
                        <div class="alert alert-success text-center">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">x</a>
                            <p>{{ Session::get('success') }}</p>
                        </div>
                        @endif

                        <div class="row justify-content-center">
                            <div class="col-12">
                                <div class="form_group">
                                    <input id="name" type="text" class="form_input is-invalid control-label card-name" name="name" placeholder=" "
                                        autofocus value="" required>
                                    <label for="name" class="form_label">Cardholder Name</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form_group">
                                    <input id="card_number" type="text" class="form_input is-invalid control-label  card-number" name="card_number" placeholder=" "
                                        autofocus value="" required>
                                    <label for="card_number" class="form_label">Card Number</label>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form_group">
                                    <input id="exp_month" type="text" class="form_input is-invalid control-label card-expiry-month" name="exp_month" placeholder=" "
                                        autofocus value="" required>
                                    <label for="exp_month" class="form_label">Expiration Month</label>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form_group">
                                    <input id="exp_year" type="text" class="form_input is-invalid control-label card-expiry-year" name="exp_year" placeholder=" "
                                        autofocus value="" required>
                                    <label for="exp_year" class="form_label">Expiration Year</label>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form_group">
                                    <input id="cvc" type="text" class="form_input is-invalid control-label card-cvc" name="cvc" placeholder=" "
                                        autofocus value="" required>
                                    <label for="cvc" class="form_label">CVC</label>
                                </div>
                            </div>

                            <div class="col-md-8">
                                <button class="btn bg-indigo " type="submit">
                                    Submit Payment
                                </button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript" src="https://js.stripe.com/v2/"></script>
<script type="text/javascript">
    $(function () {

        var $form = $(".require-validation");

        $('form.require-validation').bind('submit', function (e) {
            var $form = $(".require-validation"),
                inputSelector = ['input[type=email]', 'input[type=password]',
                    'input[type=text]', 'input[type=file]',
                    'textarea'
                ].join(', '),
                $inputs = $form.find('.required').find(inputSelector),
                $errorMessage = $form.find('div.error'),
                valid = true;

            $errorMessage.addClass('hide');
            $('.has-error').removeClass('has-error');
            $inputs.each(function (i, el) {
                var $input = $(el);
                if ($input.val() === '') {
                    $input.parent().addClass('has-error');
                    $errorMessage.removeClass('hide');
                    e.preventDefault();
                }
            });

            if (!$form.data('cc-on-file')) {
                e.preventDefault();
                Stripe.setPublishableKey($form.data('stripe-publishable-key'));
                Stripe.createToken({
                    name: $('.card-name').val(),
                    number: $('.card-number').val(),
                    cvc: $('.card-cvc').val(),
                    exp_month: $('.card-expiry-month').val(),
                    exp_year: $('.card-expiry-year').val()
                }, stripeResponseHandler);
            }
        });

        function stripeResponseHandler(status, response) {
            if (response.error) {
                $('.error')
                    .removeClass('hide')
                    .find('.alert')
                    .text(response.error.message);
            } else {
                /* token contains id, last4, and card type */
                var token = response['id'];
                $form.find('input[type=text]').empty();
                $form.append("<input type='hidden' name='stripeToken' value='" + token + "'/>");
                $form.get(0).submit();
            }
        }
    });

</script>
@endsection
