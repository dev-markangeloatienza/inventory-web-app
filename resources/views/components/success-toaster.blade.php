@if(session()->has('success'))
  <div class="absolute top-10 right-10 bg-green-100 border border-green-500 text-black p-2 rounded  text-xs text-center">
    {{ session('success')}}
  </div>
@endif

@push('scripts')
  <script>
    (function(){
      const toaster = document.querySelectorAll('#toaster')
      console.log(toaster.length)
      if(toaster.length !== 0){
        setTimeout(()=>{
          toaster[0].classList.toggle('hidden')
        },3000)
      }
    })()
  </script>
@endpush