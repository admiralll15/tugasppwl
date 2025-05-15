@extends('layouts.layout')

@section('jeremi')
<form action="{{route('todolist.update', $task->id)}}" method="POST" class="container mt-5">
    @csrf
    @method('PUT')
    <div class="row justify-content-center">
      <div class="col-md-8 col-lg-6">
        <div class="mb-3">
          <label for="task" class="form-label text-success fw-bold">Update todolist</label>
          <input 
            name="task" 
            type="text" 
            id="task" 
            placeholder="Type here"
            value="{{ $task->task }}"
            class="form-control border-success @error('task') is-invalid @enderror">
          
          @error('task')
          <div class="invalid-feedback d-block text-danger">{{ $message }}</div>
          @enderror
        </div>
  
        <div class="d-grid">
          <button type="submit" class="btn btn-success">Update</button>
        </div>
      </div>
    </div>
  </form>
  
@endsection