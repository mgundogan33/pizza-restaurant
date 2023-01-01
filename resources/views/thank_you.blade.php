@extends('layouts.main')

@section('content')



	<section class="container mt-2 my-3 py-5">
		<div class="container mt-2 text-center">
			<h4>Thank You</h4>
			 @if(Session::has('order_id') && Session::get('order_id') != null)

				<h4 style="color:yellow" class="my-5"> Order Id: {{Session::get('order_id')}}</h4>
              <p>Please keep order id in safe place for future reference</p>
              <p>We will deliver your order within 1 hour days</p>
 
		     @endif
		     	
		</div>



	</section>







@endsection


