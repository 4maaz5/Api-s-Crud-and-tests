

@extends('layout.master')
@section('main')

  <!-- Content Start -->
  <div class="container mt-5">
    <div class="row justify-content-center">
         <!-- Display success or error messages -->
         @if(session('success'))
         <div class="alert alert-success">{{ session('success') }}</div>
     @endif
     @if(session('delete'))
         <div class="alert alert-danger">{{ session('delete') }}</div>
     @endif
      <div class="col-md-6">

        @if(Auth::user()->hasRole('admin'))
        <h1 class="mb-5 text-center">Task Management System</h1>



        <!-- Form Start -->
        <form id="taskForm" method="POST" action="{{ route('store.task') }}">
            @csrf
            <div class="mb-3">
                <label for="fname" class="form-label">Title</label>
                <input type="text" class="form-control" id="fname" name="firstname" required>
                @error('firstname')
                    <div style="color: red;">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="lname" class="form-label">Description</label>
                <input type="text" class="form-control" id="lname" name="lastname" required>
                @error('lastname')
                    <div style="color: red;">{{ $message }}</div>
                @enderror
            </div>

            <!-- Progress bar container -->
            <div id="progress-container" class="mb-3" style="display:none;">
                <div id="progress-bar" class="progress-bar progress-bar-striped progress-bar-animated bg-success" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;"></div>
            </div>

            <button type="submit" id="updateButton" class="btn btn-primary" onclick="submitForm()">Submit</button>
        </form>
    @endif

        <!-- Form End -->
      </div>
    </div>
  </div>
    <div class="mt-5">
        <div class="row">
            <div class="col-1"></div>
            <div class="col-md-10">
                <h2>Task List</h2>
                <table class="table table-bordered" >
                    <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Title</th>
                        <th scope="col">Description</th>
                        <th scope="col">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($data as $key)
                        <tr>
                            <th scope="row">{{ $loop->iteration}}</th>
                            <td>{{ $key->title }}</td>
                            <td>{{ $key->description }}</td>
                            <td>
                                @php
                                    $user = App\Models\User::find(1);
                                    $user->assignRole('admin');
                                    $employer = App\Models\User::find(2);
                                    $employer->assignRole('employer');
                                @endphp
                                @if(Auth::user()->hasRole('admin'))
                                <a href="#" class="btn btn-secondry" data-toggle="modal" data-target="#exampleModal_{{ $key->id }}">View</a>
                                <a href="#" class="btn btn-secondry" data-toggle="modal" data-target="#exampleModa_{{ $key->id }}">Edit</a>
                                <a href="{{ route('delete.task',$key->id) }}" class="btn btn-secondry" id="myButton" onclick="return confirm('Are you sure you want to delete!');">Delete</a>
                                @elseif(Auth::user()->hasRole('employer'))
                                <a href="#" class="btn btn-secondry" data-toggle="modal" data-target="#exampleModal_{{ $key->id }}">View</a>
                                <a href="#" class="btn btn-secondry" data-toggle="modal" data-target="#exampleModa_{{ $key->id }}">Edit</a>
                                @else
                                <a href="#" class="btn btn-secondry" data-toggle="modal" data-target="#exampleModal_{{ $key->id }}">View</a>
                                <a href="#" class="btn btn-secondry" data-toggle="modal" data-target="#exampleModa">FeedBack</a>
                                @endif
                            </td>
                        </tr>


                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal_{{ $key->id }}" tabindex="-1" role="dialog"
                             aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Task Details</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <h2>ID: <span style="margin-left: 50px;">{{ $key->id }}</span></h2>
                                        <h2>Title: {{ $key->title }}</h2>
                                        <h2>Description: {{ $key->description }}</h2>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                         <!-- Modal -->
                         <div class="modal fade" id="exampleModa_{{ $key->id }}" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                           <div class="modal-dialog" role="document">
                               <div class="modal-content">
                                   <div class="modal-header">
                                       <h5 class="modal-title" id="exampleModalLabel">Edit Task</h5>
                                       <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                           <span aria-hidden="true">&times;</span>
                                       </button>
                                   </div>
                                   <div class="modal-body">
                                    <form method="POST" action="{{ route('update.task',$key->id) }}">
                                        @csrf
                                        @method('PUT')
                                      <div class="mb-3">
                                        <label for="fname" class="form-label">Title</label>
                                        <input type="text" class="form-control" id="fname" value="{{ $key->title }}" name="firstname" required>
                                      </div>
                                      <div class="mb-3">
                                        <label for="lname" class="form-label">Description</label>
                                        <input type="text" class="form-control" id="lname" value="{{ $key->description }}" name="lastname" required>
                                      </div>
                                     <button type="submit" class="btn btn-primary" id="updateButton">Update</button>
                                    </form>
                                   </div>
                                   {{-- <div class="modal-footer">
                                       <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                   </div> --}}
                               </div>
                           </div>
                       </div>
                    @empty
                        <tr>
                            <td colspan="4">
                                <div class="alert alert-primary">Data Not found</div>
                            </td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
     <!-- Modal -->
     <div class="modal fade" id="exampleModa" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
       <div class="modal-dialog" role="document">
           <div class="modal-content">
               <div class="modal-header">
                   <h5 class="modal-title" id="exampleModalLabel">Task Details</h5>
                   <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                       <span aria-hidden="true">&times;</span>
                   </button>
               </div>
               <div class="modal-body">
                <form method="POST" action="{{ route('feedback') }}">
                    @csrf
                    <input type="hidden" name="feedback_value" id="feedback_value" value="">
                    <div class="mb-3">
                        <button type="button" class="w-100 btn btn-secondary" onclick="setFeedback('Good')">Good</button>
                    </div>
                    <div class="mb-3">
                        <button type="button" class="w-100 btn btn-secondary" onclick="setFeedback('Excellent')">Excellent</button>
                    </div>
                    <div class="mb-3">
                        <button type="button" class="w-100 btn btn-secondary" onclick="setFeedback('Bad')">Bad</button>
                    </div>
                    <div class="mb-3">
                        <button type="button" class="w-100 btn btn-secondary" onclick="setFeedback('Awful')">Awful</button>
                    </div>
                    <div class="mb-3">
                        <button type="button" class="w-100 btn btn-secondary" onclick="setFeedback('Enjoying')">Enjoying</button>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit Feedback</button>
                </form>
               </div>
           </div>
       </div>
   </div>
   <script>
    function setFeedback(value) {
        document.getElementById('feedback_value').value = value;
    }
</script>
{{-- <script>
    function submitForm() {
        var form = document.getElementById('taskForm');
        var progressBarContainer = document.getElementById('progress-container');
        var progressBar = document.getElementById('progress-bar');

        // Display the progress bar container
        progressBarContainer.style.display = 'block';

        var formData = new FormData(form);

        fetch(form.action, {
            method: 'POST',
            body: formData,
        })
        .then(response => response.json())
        .then(data => {
            // Handle the response as needed
            console.log(data);
            progressBar.style.width = '100%';
            progressBar.innerHTML = '100%';
            progressBar.classList.remove('progress-bar-animated');
            progressBar.classList.remove('bg-success');
            progressBar.classList.add('bg-info');
            // You may want to redirect or perform additional actions on success
        })
        .catch(error => {
            console.error('Error:', error);
            progressBar.style.width = '0%';
            progressBar.innerHTML = '0%';
            progressBar.classList.remove('progress-bar-animated');
            progressBar.classList.remove('bg-success');
            progressBar.classList.add('bg-danger');
            // You may want to display an error message or perform additional actions on error
        });
    }
</script> --}}

@endsection
