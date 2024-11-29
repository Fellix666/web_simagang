<style>
    .sidebar .nav-link {
        display: flex;
        align-items: center;
        padding: 10px 15px;
        color: #333;
        text-decoration: none;
        border-radius: 5px;
    }

    .sidebar .nav-link i {
        font-size: 1.2rem;
        /* Sesuaikan ukuran ikon */
        min-width: 25px;
        /* Konsistenkan jarak ikon */
        text-align: center;
        /* Pastikan ikon sejajar di tengah */
    }

    .sidebar .nav-link span {
        flex-grow: 1;
        /* Buat teks menu menempati sisa ruang */
        margin-left: 10px;
        /* Beri jarak teks dari ikon */
    }

    .sidebar .nav-link:hover {
        background-color: #e9ecef;
    }

    .sidebar .nav-link.active {
        background-color: #007bff;
        color: white;
    }
</style>

<div class="sidebar">
    <nav class="nav flex-column">

        <a href="{{ route('dashboard.index') }}" class="nav-link {{ request()->routeIs('dashboard.*') ? 'active' : '' }}">
            <i class="fas fa-dashboard"></i>
            <span>Dashboard</span>
        </a>
        <a href="{{ route('magang.index') }}" class="nav-link {{ request()->routeIs('magang.*') ? 'active' : '' }}">
            <i class="fas fa-users"></i>
            <span>Data Magang</span>
        </a>
        <a href="{{ route('institusi.index') }}"
            class="nav-link {{ request()->routeIs('institusi.*') ? 'active' : '' }}">
            <i class="fas fa-building"></i>
            <span>Data Institusi</span>
        </a>
        <a href="{{ route('divisi.index') }}" class="nav-link {{ request()->routeIs('divisi.*') ? 'active' : '' }}">
            <i class="fas fa-briefcase"></i>
            <span>Data Divisi</span>
        </a>
        <a href="{{ route('berkas.index') }}" class="nav-link {{ request()->routeIs('berkas.*') ? 'active' : '' }}">
            <i class="fas fa-archive"></i>
            <span>Data Berkas</span>
        </a>


        @auth('admin')
            <div class="mt-auto">
                <hr class="my-3">
                <a href="{{ route('readonly') }}" class="nav-link {{ request()->routeIs('readonly') ? 'active' : '' }}">
                    <i class="fas fa-home"></i>
                    <span>Home</span>
                </a>
                <form action="{{ route('logout') }}" method="POST" class="d-inline w-100">
                    @csrf
                    <button type="submit" class="nav-link btn btn-outline-danger w-100 text-start">
                        <i class="fas fa-sign-out-alt"></i>
                        <span>Logout</span>
                    </button>
                </form>
            </div>
        @endauth
    </nav>
</div>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const sidebar = document.querySelector('.sidebar');
        const toggleButton = document.getElementById('sidebarToggle');

        // Fungsi untuk toggle sidebar
        function toggleSidebar() {
            sidebar.classList.toggle('sidebar-collapsed');
        }

        // Tambahkan event listener ke tombol toggle
        if (toggleButton) {
            toggleButton.addEventListener('click', toggleSidebar);
        }

        // Tambahkan gaya untuk sidebar yang bisa di-collapse
        const style = document.createElement('style');
        style.textContent = `
            .sidebar {
                transition: width 0.3s ease, transform 0.3s ease;
                width: 250px;
            }
            .sidebar-collapsed {
                width: 60px;
                overflow: hidden;
            }
            .sidebar-collapsed .nav-link span {
                display: none;
            }
            .sidebar-collapsed .nav-link i {
                margin-right: 0 !important;
            }
        `;
        document.head.appendChild(style);
    });
</script>
