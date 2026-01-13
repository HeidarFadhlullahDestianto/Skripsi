<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>@yield('title', "Suoerfit")</title>
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

  <!-- Sidebar -->
  <aside class="sidebar hidden">
    <h1>Superfit</h1>
    <nav>
      @guest
        <a href="{{ route('home') }}">🔐 Dashboard</a>
      @else
        {{-- Admin --}}
        @if (Auth::user()->role === 'admin')
        <a href="{{ route('admin.dashboard') }}" class="{{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">🏠 Dashboard</a>
        <a href="{{ route('sliders.index') }}" class="{{ request()->routeIs('sliders.*') ? 'active' : '' }}">🖼 Manajemen Slider</a>
        <a href="{{ route('admin.latihan.index') }}" class="{{ request()->routeIs('admin.latihan.*') ? 'active' : '' }}">
   🏋️ Manajemen Latihan
</a>
<a href="{{ route('admin.news.index') }}" class="{{ request()->routeIs('admin.news.index*') ? 'active' : '' }}">
📰 Manajemen Berita
</a>
<a href="{{ route('admin.program.index') }}"class="{{ request()->routeIs('admin.program.*') ? 'active' : '' }}">
   📚 Manajemen Program
</a>
<a href="{{ route('admin.import.index') }}"class="{{ request()->routeIs('admin.import.*') ? 'active' : '' }}">
   📥 Import Data Latihan
</a>




        @endif

        

        {{-- Role User --}}
        @if (Auth::user()->role === 'user')
        <a href="{{ route('user.dashboard') }}" class="{{ request()->routeIs('user.dashboard') ? 'active' : '' }}">🏠 Dashboard</a>
        <a href="{{ route('user.latihan.index') }}" class="{{ request()->routeIs('user.latihan.index') ? 'active' : '' }}">💪 Latihan</a>
        <a href="{{ route('program.index') }}" class="{{ request()->routeIs('program.index') ? 'active' : '' }}">🏋️‍♂️ Program</a>
        <a href="{{ route('user.jadwal.index') }}" class="{{ request()->routeIs('user.jadwal.index') ? 'active' : '' }}">
        📅 Jadwal Latihan
</a>
        <a href="{{ route('news.index') }}" class="{{ request()->routeIs('news.index') || request()->routeIs('news.show') ? 'active' : '' }}">
   📰 Berita
</a>
<a href="{{ route('expert.index') }}"class="{{ request()->routeIs('expert.index') || request()->routeIs('expert.process') || request()->routeIs('expert.detail') ? 'active' : '' }}">
   🧠 Sistem Pakar Latihan
</a>
<a href="{{ route('expert.saved') }}"class="{{ request()->routeIs('expert.saved') || request()->routeIs('expert.process') || request()->routeIs('expert.detail') ? 'active' : '' }}">
⭐ Tersimpan
</a>
<a href="{{ route('progress.index') }}" class="{{ request()->routeIs('progress.index') || request()->routeIs('progress.detail') ? 'active' : '' }}">
   📊 Progress Badan
</a>

       
        @endif

       
      @endguest
    </nav>
  </aside>

  <main class="main-content">
    <div class="sticky-top topbar w-100 d-flex justify-content-between align-items-center p-2 bg-light border-bottom ;">
      <button id="toggleSidebar" style="background:none;border:none;font-size:24px;cursor:pointer;">☰</button>
<!-- Dropdown User di kanan -->
@auth
    <div class="dropdown-user ms-auto" style="position: relative;">
      <button onclick="toggleDropdown()" class="btn btn-light text-primary fw-bold px-3 py-1 rounded d-flex align-items-center gap-2">
        {{ Auth::user()->name }}
        <span style="font-size: 14px;">▼</span>
      </button>

      <div id="userDropdown" class="dropdown-content" style="display:none; position:absolute; right:0; top:100%; background:white; border:1px solid #ccc; border-radius:6px; min-width:180px; z-index:1000;">

  <a href="{{ route('profile.show') }}" class="dropdown-item"
     style="padding: 10px 20px; display:block; text-decoration:none; color:#333;">
     Edit Profil
  </a>

  <form method="POST" action="{{ route('logout') }}" style="margin: 0;">
    @csrf
    <button type="submit" class="dropdown-item"
      style="padding: 10px 20px; width: 100%; border: none; background: none; text-align: left; cursor: pointer;">
      Logout
    </button>
  </form>
</div>

    </div>
  @endauth

</div>

    <div class="container mt-4">
      @yield('content')
    </div>
  </main>

  <script>
    document.addEventListener('DOMContentLoaded', function () {
      const toggleBtn = document.getElementById('toggleSidebar');
      const sidebar = document.querySelector('.sidebar');
      const mainContent = document.querySelector('.main-content');
      const peminjamanToggle = document.getElementById('peminjamanToggle');
      const peminjamanDropdown = document.getElementById('peminjamanDropdown');
      const masterToggle = document.getElementById('masterToggle');
      const masterDropdown = document.getElementById('masterDropdown');
      
      toggleBtn.addEventListener('click', function () {
        sidebar.classList.toggle('hidden');
        sidebar.classList.toggle('expanded');
        sidebar1.classList.toogle('show')
      });
      
      peminjamanToggle.addEventListener('click', function (e) {
        e.preventDefault();
        peminjamanDropdown.classList.toggle('show');
      });

      masterToggle.addEventListener('click', function (e) {
        e.preventDefault();
        masterDropdown.classList.toggle('show');
      });

     
     
    });

    function toggleDropdown() {
      const dropdown = document.getElementById("userDropdown");
      dropdown.style.display = (dropdown.style.display === "block") ? "none" : "block";
    }

    document.addEventListener('click', function(event) {
      const dropdown = document.getElementById("userDropdown");
      const button = document.querySelector(".dropdown-user button");

      if (!dropdown.contains(event.target) && !button.contains(event.target)) {
        dropdown.style.display = "none";
      }
    });
    
  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

  <script>
    function loadNotifikasiBadge() {
      fetch('/notifikasi/api')
        .then(res => res.json())
        .then(data => {
          const badge = document.getElementById('notif-badge');
          if (badge) {
            badge.innerText = data.length;
            badge.style.display = data.length > 0 ? 'inline-block' : 'none';
          }
        });
    }
    setInterval(loadNotifikasiBadge, 10000);
    loadNotifikasiBadge();
  </script>

</body>
</html>
