<x-layout>
  <x-sidebar></x-sidebar>
  <section  class="p-10 h-screen w-screen bg-gray-standard">
    <div class="mb-10">
      <h1 class="text-3xl font-bold">Roles</h1>
      <small>View roles</small>
      
    </div>
    <div>
      <table>
        <thead>
          <tr>
            <th>ID</th>
            <th>Name</th>
            {{-- <th>Permissions</th> --}}
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          @foreach($roles as $role)
            <tr>
              <td class="border px-4 py-2">{{ $role->id }}</td>
              <td class="border px-4 py-2 uppercase">{{ $role->name }}</td>
              {{-- <td>
                <ul>
                  @foreach($role->permissions as $permission)
                  <li>{{ $permission->name }}</li>
                  @endforeach
                </ul>
              </td> --}}
              <td class="border px-4 py-2">
                <a href="{{ route('pages.roles', $role->id) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Edit</a>
                {{-- <form action="{{ route('pages.roles.destroy', $role->id) }}" method="POST" class="inline">
                  @csrf
                  @method('DELETE') --}}
                  <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Delete</button>
                {{-- </form> --}}
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </section>
</x-layout>