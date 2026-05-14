<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Story App Dashboard</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        body {
            margin: 0;
            font-family: 'Segoe UI', sans-serif;
            background: #f5f7fb;
        }

        /* Sidebar */
        .sidebar {
            width: 240px;
            height: 100vh;
            background: linear-gradient(180deg, #4e73df, #224abe);
            position: fixed;
            padding: 20px;
        }

        .sidebar h4 {
            color: white;
        }

        .sidebar .nav-link {
            color: #d1d3e2;
            margin-bottom: 10px;
            border-radius: 10px;
            padding: 10px;
        }

        .sidebar .nav-link:hover,
        .sidebar .nav-link.active {
            background: rgba(255,255,255,0.2);
            color: #fff;
        }

        /* Main */
        .main-content {
            margin-left: 240px;
        }

        /* Topbar */
        .topbar {
            background: white;
            border-bottom: 1px solid #ddd;
        }

        /* Card */
        .card {
            border: none;
            border-radius: 15px;
        }

        /* Form */
        .form-control, .form-select {
            border-radius: 10px;
        }

        /* Button */
        .btn-primary {
            background: #4e73df;
            border: none;
            border-radius: 10px;
        }

        .btn-primary:hover {
            background: #2e59d9;
        }
    </style>
</head>

<body>

<div class="d-flex">

    <!-- Sidebar -->
    <div class="sidebar">
        <h4 class="mb-4"><i class="bi bi-journal-bookmark"></i> StoryApp</h4>

        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link active" href="#"><i class="bi bi-house"></i> Dashboard</a>
            </li>

        </ul>
    </div>

    <!-- Main Content -->
    <div class="main-content w-100">

        <!-- Topbar -->
        <div class="topbar d-flex justify-content-between align-items-center px-4 py-3">
            <h5 class="mb-0">Dashboard</h5>
            <span class="text-muted">Welcome 👋</span>
        </div>

        <!-- Page Content -->
        <div class="container py-4">

            <div class="card shadow-lg p-4">

                <h4><i class="bi bi-book"></i> Favorite Story Series</h4>
                <p class="text-muted">Share what inspires you 📖</p>

                <!-- Success -->
                @if(session('success'))
                    <div class="alert alert-success text-center">
                        {{ session('success') }}
                    </div>
                @endif

                <!-- Errors -->
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <strong>Please fix the following:</strong>
                        <ul class="mt-2 mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <!-- Form -->
                <form action="/story-form" method="POST">
                    @csrf

                    <div class="row">
                        <!-- Name -->
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Name</label>
                            <input type="text" name="name" class="form-control" value="{{ old('name') }}">
                            @error('name') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>

                        <!-- Email -->
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Email</label>
                            <input type="email" name="email" class="form-control" value="{{ old('email') }}">
                            @error('email') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>
                    </div>

                    <div class="row">
                        <!-- Age -->
                        <div class="col-md-4 mb-3">
                            <label class="form-label">Age</label>
                            <input type="number" name="age" class="form-control" value="{{ old('age') }}">
                            @error('age') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>

                        <!-- Genre -->
                        <div class="col-md-8 mb-3">
                            <label class="form-label">Genre</label>
                            <select name="genre" class="form-select">
                                <option value="">Select Genre</option>
                                <option value="fantasy" {{ old('genre')=='fantasy'?'selected':'' }}>Fantasy</option>
                                <option value="sci-fi" {{ old('genre')=='sci-fi'?'selected':'' }}>Sci-Fi</option>
                                <option value="romance" {{ old('genre')=='romance'?'selected':'' }}>Romance</option>
                                <option value="mystery" {{ old('genre')=='mystery'?'selected':'' }}>Mystery</option>
                            </select>
                            @error('genre') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>
                    </div>

                    <!-- Story -->
                    <div class="mb-3">
                        <label class="form-label">Why do you like this series?</label>
                        <textarea name="story" class="form-control" rows="4">{{ old('story') }}</textarea>
                        @error('story') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>

                    <!-- Submit -->
                    <div class="text-end">
                        <button type="submit" class="btn btn-primary px-4">
                            <i class="bi bi-send"></i> Submit
                        </button>
                    </div>

                </form>

            </div>

        </div>

    </div>

</div>

</body>
</html>
