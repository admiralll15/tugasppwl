@extends('layouts.layout')
@section( 'jeremi')


         @if (session('success'))
    <div id="alert" class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
        {{ session('success') }}
    </div>

    <script>
        setTimeout(() => {
            const alert = document.getElementById('alert');
            if (alert) {
                alert.style.display = 'none';
            }
        }, 3000); // 3 detik
    </script>
@endif


<div class="container mt-4">
    <!-- Search Bar -->
   <!-- Search Bar -->
<div class="row justify-content-center">
    <div class="col-md-6">
        <form action="{{ route('home') }}" method="get">
            <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="Type here" aria-label="Task input">
                <a href="{{ route('todolist.create') }}" class="btn btn-success">Add</a>
            </div>
        </form>
    </div>
</div>
    
    <!-- Task List -->
    @foreach ( $task as $tasks  )

    <div class="mt-4">
        <div class="container">
            <div class="col">
                
                <!-- Task 1 -->
                <div class="alert alert-light d-flex justify-content-between align-items-center">
                    <div>
                        <h5 class="mb-1">{{$tasks->task}}</h5>
                        <pc class ="mb-1">{{$tasks->tanggal}}</p>
                    </div>
                    <div>
                        <button class="btn btn-sm btn-secondary" title="Detail">View</button>
                        <a href="{{ route('todolist.edit', $tasks->id) }}"class="btn btn-sm btn-warning" title="Edit">Edit</a>
                        <!-- <a href="{{ route('todolist.destroy', $tasks->id) }}" class="btn btn-sm btn-success" title="Done">Done</a> -->
                        <form action="{{ route('todolist.destroy', $tasks->id) }}" method="POST" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-success" title="Done"
                                        onclick="return confirm('Yakin?')">Done</button>
                        </form>
                    </div>
                </div>

                
        </div>
    </div>
</div>
@endforeach

@endsection