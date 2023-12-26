@if (session('success'))
<div class="alert alert-success pt-3" role="alert">
   <p class="text-center text-white">{{ session('success') }}</p>
  </div>
@endif


@if (session('failed'))
<div class="alert failed_aleart pt-4" role="alert">
    <p class="text-center text-white">{{ session('failed') }}</p>
  </div>
@endif