<x-layout>
  <x-sidebar></x-sidebar>
  <section class="p-10 h-screen w-screen bg-gray-standard relative">
    <div class="mb-10">
      <h1 class="text-3xl font-bold">Users - View</h1>
      <small>View, select, modify or delete users.</small>
    </div>
    <div>
      <x-create-modal>
      </x-create-modal>
      <table class="min-w-full">
        <thead>
          <tr class="text-left">
            <th class="px-4 py-2">ID</th>
            <th class="px-4 py-2">Name</th>
            <th class="px-4 py-2">Email</th>
            <th class="px-4 py-2">Role</th>
            <th class="px-4 py-2">Action</th>
          </tr>
        </thead>
        <tbody>
          @foreach($users as $user)
          <tr>
            <td class="border px-4 py-2">{{ $user->id }}</td>
            <td class="border px-4 py-2">
              <a href="{{ route('pages.user.show', $user->id) }}" class="text-blue-500 hover:text-secondary">{{ $user->name }}</a>
            </td>
            <td class="border px-4 py-2">
              <a href="mailto:{{ $user->email }}" class="text-blue-500 hover:text-secondary">{{ $user->email }}</a>
            </td>
            <td class="border px-4 py-2 uppercase text-sm">{{ $user->role->name }}</td>
            <td class="border px-4 py-2">
              {{-- <a href="{{ route('users.edit', $user->id) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Edit</a>
              <form action="{{ route('users.destroy', $user->id) }}" method="POST" class="inline">
                @csrf
                @method('DELETE')
                <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Delete</button>
              </form> --}}
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
      {{ $users->links() }}
    </div>
   
  </section>
</x-layout>