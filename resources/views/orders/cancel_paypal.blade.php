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
				<h3>YOUR PAYPAL ORDER HAS BEEN CANCELED</h3>
				<p>Please Contact Us If There Is Any enquire</p>
				
			</div>
		</div>
	</section><!--/#do_action-->

@endsection

<?php 
Session::forget('grand_total');
Session::forget('order_id');
?>