@extends('layouts.frontLayout.front_design')
@section('content')

<section id="cart_items">
	<div class="container">
		<div class="breadcrumbs">
			<ol class="breadcrumb">
			  <li><a href="#">Home</a></li>
			  <li class="active">Thanks</li>
			</ol>
		</div>
		
	</div>
</section> 

	<section id="do_action">
		<div class="container">
			<div class="heading" align="center">
				<h3>YOUR COD ORDER HAS BEEN PLACED</h3>
				<p>Your Order Number Is {{ Session::get('order_id') }} And Total Payable amount is INR {{ Session::get('grand_total') }} </p>
			</div>
		</div>
	</section><!--/#do_action-->

@endsection

<?php 
Session::forget('grand_total');
Session::forget('order_id');
?>