@extends('layouts.main')

@section('content')

    <section class="container mt-2 my-3 py-5">
        <div class="container mt-2 text-center">
            <h4>Payment</h4>
            @if (Session::has('total') && Session::get('total') != null)
                @if (Session::has('order_id') && Session::get('order_id') != null)
                    <h4 style="color:yellow" class="my-5">Total: ${{ Session::get('total') }}</h4>


                    <!--Set up a container element for the button -->
                    <div id="paypal-button-container"></div>
                @endif
            @endif
        </div>
    </section>

    <script
        src="https://www.paypal.com/sdk/js?client-id=AVJvuzFfibnGBnbGG_csDBB5ybbnlb-N_n7Y9DUVZFyc-NLkB1occ7N4Na__aoHp7Ae5KTOcjAlVxnLY&currency=USD">
    </script>

    <script>
        paypal.Buttons({

            // Sets up the transaction when a payment button is clicked
            createOrder: function(data, actions) {
                return actions.order.create({
                    purchase_units: [{
                        amount: {
                            value: '{{ Session::get('total') }}' // Can reference variables or functions. Example: `value: document.getElementById('...').value`
                        }
                    }]
                });
            },

            // Finalize the transaction after payer approval
            onApprove: function(data, actions) {
                return actions.order.capture().then(function(orderData) {
                    // Successful capture! For dev/demo purposes:
                    console.log('Capture result', orderData, JSON.stringify(orderData, null, 2));
                    var transaction = orderData.purchase_units[0].payments.captures[0];
                    alert('Transaction ' + transaction.status + ': ' + transaction.id +
                        '\n\nSee console for all available details');


                    window.location.href = "/verify_payment/" + transaction.id;

                    // When ready to go live, remove the alert and show a success message within this page. For example:
                    // var element = document.getElementById('paypal-button-container');
                    // element.innerHTML = '';
                    // element.innerHTML = '<h3>Thank you for your payment!</h3>';
                    // Or go to another URL:  actions.redirect('thank_you.html');
                });
            }
        }).render('#paypal-button-container');
    </script>



@endsection
