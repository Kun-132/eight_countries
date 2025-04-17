<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            display: flex;
        }
        .sidebar {
            width: 250px;
            height: 100vh;
            background: #343a40;
            padding-top: 20px;
            color: white;
            position: fixed;
        }
        .sidebar a {
            display: block;
            color: white;
            padding: 10px;
            text-decoration: none;
        }
        .sidebar a:hover {
            background: #495057;
        }
        .content {
            margin-left: 250px;
            padding: 20px;
            width: 100%;
        }
        /* Modal Overlay */
.modal-overlay {
    display: none;
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.5);
    justify-content: center;
    align-items: center;
    z-index: 1000;
}

/* Modal Box */
.modal-box {
    background: white;
    padding: 20px;
    border-radius: 10px;
    text-align: center;
    box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.2);
    animation: fadeIn 0.3s ease-in-out;
}

/* Modal Buttons */
.modal-buttons {
    margin-top: 15px;
    display: flex;
    justify-content: center;
    gap: 10px;
}

/* Button Styling */
.btn {
    padding: 8px 15px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
}

.btn-danger {
    background: red;
    color: white;
}

.btn-secondary {
    background: gray;
    color: white;
}

/* Fade In Animation */
@keyframes fadeIn {
    from {
        transform: scale(0.8);
        opacity: 0;
    }
    to {
        transform: scale(1);
        opacity: 1;
    }
}

    </style>
</head>
<body>

    <!-- Sidebar -->
    <div class="sidebar">
    <h4 class="text-center">Admin Panel</h4>
    <a href="{{ route('admin.home') }}">Dashboard</a>
    <a href="{{ route('admin.country_content.index') }}">Content Posting</a>
    <a href="{{ route('admin.home_video.index') }}">Home Video</a>
    <a href="#" onclick="openLogoutModal()">Logout</a>
</div>


    <!-- Logout Confirmation Modal -->
<div id="logoutModal" class="modal-overlay">
    <div class="modal-box">
        <h3>Confirm Logout</h3>
        <p>Are you sure you want to log out?</p>
        <div class="modal-buttons">
            <button onclick="closeLogoutModal()" class="btn btn-secondary">Cancel</button>
            <button onclick="document.getElementById('logout-form').submit()" class="btn btn-danger">Logout</button>
        </div>
    </div>
</div>

<!-- Hidden Logout Form -->
<form id="logout-form" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
    @csrf
</form>

    <!-- Main Content -->
    <div class="content">
        @yield('content')
    </div>

    <script>
function openLogoutModal() {
    document.getElementById('logoutModal').style.display = 'flex';
}

function closeLogoutModal() {
    document.getElementById('logoutModal').style.display = 'none';
}
</script>

</body>
</html>
