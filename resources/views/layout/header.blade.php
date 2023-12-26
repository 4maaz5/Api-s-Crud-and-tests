 <!-- Navbar Start -->
 <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
      <!-- Brand Logo -->
      <a class="navbar-brand" href="#">
        <img src="{{ asset('img/download.png') }}" alt="Logo" width="30" height="30" class="d-inline-block align-top">
        Task Management System
      </a>

      <!-- Navbar Toggle Button -->
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <!-- Navbar Links -->
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item">
            <a class="nav-link" href="{{ url('/task') }}">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('tasks') }}">Tasks</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Projects</a>
          </li>
          <!-- Add more menu items as needed -->
        </ul>
      </div>
    </div>
  </nav>
  <!-- Navbar End -->
