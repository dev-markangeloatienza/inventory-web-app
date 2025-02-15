@if(auth()->user()->role->name == 'admin')
  <x-sidebar-admin/>
@else
  <x-sidebar-non-admin/>
@endif
    