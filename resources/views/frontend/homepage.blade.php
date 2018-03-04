@extends('frontend._layouts.app')
@section('css')
<link rel="stylesheet" type="text/css" href="{{ asset('/front/css/slick/slick.css') }}"/>
<link rel="stylesheet" type="text/css" href="{{ asset('/front/css/slick/slick-theme.css') }}"/>
@stop
@section('content')
	@include('frontend._partials.carousel')
@endsection
@section('scripts')

<script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
<script type="text/javascript" src="{{ asset('/front/js/slick/slick.min.js') }}"></script>
<script type="text/javascript">
    $(document).ready(function(){
		 $('.fade').slick({
		  dots: true,
		  infinite: true,
		  speed: 500,
		  fade: true,
		  cssEase: 'linear'
		});
    });
</script>
@endsection