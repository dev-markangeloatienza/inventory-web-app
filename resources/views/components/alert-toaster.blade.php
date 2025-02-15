@if($errors->any())
  <ul class="hidden flex flex-col gap-2 absolute z-10 top-10 right-10" id="toaster">
    @foreach($errors->all() as $error)
      <li class="bg-red-100 border border-red-400 text-red-700 p-2 rounded  text-xs text-center">{{ $error }}</li>
    @endforeach
  </ul>
@endif

@push('scripts')
  <script>
    (function(){
      const toaster = document.querySelectorAll('#toaster')
      console.log(toaster.length)

      if(toaster.length !== 0){
        toaster[0].classList.remove('hidden')

        setTimeout(()=>{
          console.log('TOASTER', toaster)
          toaster[0].classList.toggle('hidden')
        },3000)
      }
    })()
  </script>
@endpush