
<div>
    <h3 class="text-center">My Task ({{$totalTasks}})</h3>

    <table class="table bg-white ">
        <thead>
            <tr>
                <th>id</th>
                <th>Title</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($tasks as $task)
            <tr>
                <td scope="row">{{ $task->id }}</td>
                <td>{{ $task->title }}</td>
                <td>{{ $task->status == true ? 'Completed' : 'Pending' }}</td>
                <td>
                    <button  wire:click="deleterecord({{$task->id}})" class="btn btn-danger">
                        Delete
                    </button>
                    <a class="btn btn-info" href="javascript:" onclick="Swal.fire({
                        title: 'Update Task',
                        input: 'text',
                        inputValue: '{{$task->title}}',
                        showDenyButton: true,
                        confirmButtonColor: '#FC6A57',
                        cancelButtonColor: '#363636',
                        confirmButtonText: 'Save',
                         denyButtonText: 'Cancel', }).
                         then((result) => { if (result.isConfirmed)
                         { const newTitle = result.value; Livewire.emit('updaterecord', {{$task->id}}, newTitle); }
                          else { Swal.fire('Canceled', '', 'info'); } })">
                           Update
                </a>

                </td>
            </tr>
            @endforeach

        </tbody>
    </table>
    {{$tasks->links()}}
</div>
