
@if(session('error'))
<div class="alert alert-danger text-center" role="alert" id="alert">
   {{session('error')}}

</div>
@endif