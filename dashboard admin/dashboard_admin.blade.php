<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rekapitulasi Nilai</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" crossorigin="anonymous" referrerpolicy="no-referrer" />
    
<style>
    
    body {
        font-family: 'Inter', sans-serif;
        background-color: #f4f6f9;
    }

    .main-sidebar {
        transition: transform 0.3s ease;
        width: 16rem; 
    }

    @media (max-width: 767px) {
        .main-sidebar {
            position: fixed;
            height: 100%;
            top: 0;
            left: 0;
            z-index: 40;
            transform: translateX(-100%);
        }
        .main-sidebar.is-open {
            transform: translateX(0);
        }
    }

    @media (min-width: 768px) {
        .main-sidebar {
            position: sticky;
            top: 0;
            height: 100vh;
            transform: translateX(0) !important;
        }
    }

    .color-primary-dark {
        background-color: #A276B8; 
    }
    .color-primary-medium {
        background-color: #A276B8; 
    }
    .text-primary,
    .border-primary {
        color: #A276B8;
        border-color: #A276B8;
    }

    
    .color-accent {
        color: #ffffff;
    }

    
    #sidebarToggle,
    #pageTitle {
        color: #1f2937;
    }

    
    .grade-card {
        border-radius: 0.75rem;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
    }
    .container-card {
        background-color: white;
        padding: 1.5rem;
        border-radius: 0.75rem;
        box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1),
                     0 2px 4px -2px rgba(0, 0, 0, 0.06);
    }

    /* Interactive card for Data Master */
    .master-card {
        transition: transform 0.2s, box-shadow 0.2s;
        cursor: pointer;
        user-select: none;
    }
    .master-card:hover {
        transform: translateY(-3px);
        box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -4px rgba(0, 0, 0, 0.1);
    }
    .master-card:active {
        transform: translateY(0);
        box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -2px rgba(0, 0, 0, 0.06);
    }

    
    .action-btn-red {
        background-image: linear-gradient(to right,  #f28b82 0%,  #f28b82 51%,  #f28b82 100%);
        color: white;
        transition: 0.5s;
        background-size: 200% auto;
    }
    .action-btn-red:hover {
        background-position: right center;
    }

    .action-btn-primary {
        background-color: #A276B8;
        transition: background-color 0.15s ease;
    }
    .action-btn-primary:hover {
        background-color: #B79BC9;
    }

    
    .card-color-dosen {
    color: #3b82f6; 
    border-color: #3b82f6;
    }

    
    .card-color-kelas {
        color: #ed8d8d; 
        border-color: #ed8d8d; 
    }

    .table-header-custom {
        background-color: #f1f5f9;
    }

    /* Pastel heading khusus modal ekspor laporan */
    #laporanModal h3 {
        color: #ed8d8d !important; /* pastel pink */
    }
    #laporanModal h3 i {
        color: #ed8d8d !important;
    }

</style>

</head>
<body class="min-h-screen flex flex-col">
    <!-- Navbar (Header) -->
    <nav class="bg-white border-b border-gray-200 shadow-md sticky top-0 z-20">
        <div class="px-4 sm:px-6 lg:px-8 h-16 flex items-center justify-between">
            <div class="flex items-center">
                <button id="sidebarToggle" onclick="toggleSidebar()" class="focus:outline-none p-2 rounded-lg mr-4 md:mr-6 transition duration-150">
                    <i class="fas fa-bars text-xl"></i>
                </button>
                <a href="#" class="text-xl font-extrabold" id="pageTitle">Rekapitulasi Nilai</a>
            </div>
            <div class="flex items-center space-x-4">
                <span class="text-sm font-medium text-gray-600 hidden md:block">Admin (ID: 1235456)</span>
                <img class="h-9 w-9 rounded-full object-cover ring-2 ring-red-500" src="https://placehold.co/40x40/b91c1c/ffffff?text=AD" alt="Admin Avatar">
                <a href="#" class="action-btn-red flex items-center text-white px-3 py-2 rounded-lg transition shadow-md" title="Logout">
                <i class="fas fa-sign-out-alt mr-2"></i>
                <span class="font-medium hidden sm:inline">Logout</span>
                </a>
            </div>
        </div>
    </nav>

    <div class="flex flex-1 flex-grow">

        <!-- Sidebar (Menu) -->
        <aside id="mainSidebar" class="main-sidebar color-primary-dark text-white flex-shrink-0 shadow-xl md:shadow-none">
            <div class="flex flex-col h-full">
                <div class="p-4 border-b border-white border-opacity-20">
                    <h3 class="text-lg font-semibold color-accent">ADMIN / PRODI</h3>
                    <p class="text-xs text-gray-200">Sistem Akademik</p> </div>
                <nav class="mt-2 flex-1 overflow-y-auto">
                    <ul class="space-y-1 p-2">
                        <li id="nav-dashboard">
                            <a href="#" onclick="navigateTo('dashboardView'); return false;" class="nav-link flex items-center p-3 rounded-lg color-primary-medium bg-opacity-20 text-white font-medium">
                                <i class="fas fa-tachometer-alt mr-3"></i> 
                                <span>Dashboard</span>
                            </a>
                        </li>
                        <li id="nav-master">
                            <a href="#" onclick="navigateTo('masterView'); return false;" class="nav-link flex items-center p-3 rounded-lg hover:bg-white hover:bg-opacity-10 text-white">
                                <i class="fas fa-database mr-3"></i>
                                <span>Data Master</span>
                            </a>
                        </li>
                        <li id="nav-rekap">
                            <a href="#" onclick="navigateTo('rekapView'); return false;" class="nav-link flex items-center p-3 rounded-lg hover:bg-white hover:bg-opacity-10 text-white">
                                <i class="fas fa-chart-bar mr-3"></i>
                                <span>Rekap Nilai</span>
                            </a>
                        </li>
                        <li>
                            <a href="#" onclick="cetakLaporan(); return false;" class="flex items-center p-3 rounded-lg hover:bg-white hover:bg-opacity-10 text-white">
                                <i class="fas fa-file-export mr-3"></i>
                                <span>Ekspor Laporan</span>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </aside>

        <!-- Overlay for mobile sidebar -->
        <div id="sidebarOverlay" class="fixed inset-0 bg-black bg-opacity-50 z-30 hidden md:hidden" onclick="closeSidebar()"></div>

        <!-- Main Content Area -->
        <main id="contentWrapper" class="flex-1 p-4 sm:p-6 overflow-y-auto w-full">
            
            <!-- 1. Dashboard View -->
            <div id="dashboardView" class="view-content space-y-6">
                <h1 class="text-2xl font-bold text-gray-800 mb-4">Dashboard Admin</h1>
                <p class="text-gray-600 mb-6">Ringkasan data utama sistem rekapitulasi nilai perkuliahan.</p>

                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 mb-8" id="adminSummaryCards">
                    <!-- Stat Card: Total Mahasiswa -->
                    <div class="grade-card bg-white p-5 border-l-4 border-primary">
                        <div class="flex items-center">
                            <div class="flex-shrink-0 mr-4 text-primary"><i class="fas fa-users text-3xl"></i></div>
                            <div>
                                <p class="text-sm font-medium text-gray-500">Total Mahasiswa</p>
                                <p class="text-2xl font-semibold text-gray-900" id="stat-mahasiswa">520</p>
                            </div>
                        </div>
                    </div>

                    <!-- Stat Card: Total Dosen Aktif -->
                    <div class="grade-card bg-white p-5 border-l-4 card-color-dosen">
                        <div class="flex items-center">
                            <div class="flex-shrink-0 mr-4 card-color-dosen"><i class="fas fa-chalkboard-teacher text-3xl"></i></div>
                            <div>
                                <p class="text-sm font-medium text-gray-500">Total Dosen Aktif</p>
                                <p class="text-2xl font-semibold text-gray-900" id="stat-dosen">55</p>
                            </div>
                        </div>
                    </div>

                    <!-- Stat Card: Total Mata Kuliah -->
                    <div class="grade-card bg-white p-5 border-l-4" style="border-color: #f8c471;">
                        <div class="flex items-center">
                            <div class="flex-shrink-0 mr-4" style="color: #f8c471;"><i class="fas fa-book text-3xl"></i></div>
                            <div>
                                <p class="text-sm font-medium text-gray-500">Total Mata Kuliah</p>
                                <p class="text-2xl font-semibold text-gray-900" id="stat-mk">85</p>
                            </div>
                        </div>
                    </div>

                    <!-- Stat Card: Kelas Aktif -->
                    <div class="grade-card bg-white p-5 border-l-4 card-color-kelas">
                        <div class="flex items-center">
                            <div class="flex-shrink-0 mr-4 card-color-kelas"><i class="fas fa-door-open text-3xl"></i></div>
                            <div>
                                <p class="text-sm font-medium text-gray-500">Kelas Aktif</p>
                                <p class="text-2xl font-semibold text-gray-700" id="stat-kelas">28</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="grade-card bg-white rounded-xl overflow-hidden shadow-lg mb-8">
                    <div class="p-6 border-b flex flex-col sm:flex-row justify-between items-start sm:items-center space-y-3 sm:space-y-0">
                        <h2 class="text-xl font-semibold text-gray-800">Rekap Nilai Semester Ganjil 2024/2025 (Berdasarkan Prodi)</h2>
                        <button onclick="navigateTo('rekapView')" class="action-btn-primary text-white font-bold py-2 px-4 rounded-lg transition duration-150 shadow-md">
                            <i class="fas fa-chart-bar mr-2"></i> Lihat Laporan Lengkap
                        </button>
                    </div>

                    <div class="table-responsive overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">No</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Program Studi</th>
                                    <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Jml Mahasiswa</th>
                                    <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Rata-rata IPS</th>
                                    <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-100" id="dashboard-rekap-body">
                            </tbody>
                        </table>
                    </div>
                    <div class="p-6 bg-gray-50 text-sm text-gray-600 border-t rounded-b-xl">
                        <p>Data di atas merupakan ringkasan rata-rata Indeks Prestasi Semester (IPS) per Program Studi.</p>
                    </div>
                </div>
            </div>
            
            <!-- 2. Data Master View (Main Options) -->
            <div id="masterView" class="view-content space-y-6 hidden">
                <h1 class="text-2xl font-bold text-gray-800 mb-4">Data Master</h1>
                <div class="container-card">
                    <p class="text-gray-700 mb-4">
                        Pilih kategori data master yang ingin Anda kelola (tambah, edit, hapus).
                    </p>

                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
                        <!-- Mahasiswa -->
                        <div class="bg-[#EEF2FF] hover:bg-[#E0E7FF] text-indigo-400 rounded-2xl shadow-sm p-5 text-center transition duration-200 cursor-pointer border-b-4 border-indigo-300" onclick="showMasterSubView('mahasiswa')">
                            <i class="fas fa-user-graduate text-3xl mb-2 text-indigo-500"></i>
                            <p class="text-lg font-semibold">Kelola Mahasiswa</p>
                        </div>

                        <!-- Dosen -->
                        <div class="bg-[#FCE7F3] hover:bg-[#FBCFE8] text-pink-400 rounded-2xl shadow-sm p-5 text-center transition duration-600 cursor-pointer border-b-4 border-pink-300" onclick="showMasterSubView('dosen')">
                            <i class="fas fa-chalkboard-teacher text-3xl mb-2 text-pink-500"></i>
                            <p class="text-lg font-semibold">Kelola Dosen</p>
                        </div>

                        <!-- Mata Kuliah -->
                        <div class="bg-[#D1FAE5] hover:bg-[#A7F3D0] text-teal-500 rounded-2xl shadow-sm p-5 text-center transition duration-200 cursor-pointer border-b-4 border-teal-300" onclick="showMasterSubView('matakuliah')">
                            <i class="fas fa-book-open text-3xl mb-2 text-teal-500"></i>
                            <p class="text-lg font-semibold">Kelola Mata Kuliah</p>
                        </div>

                        <!-- Kelas -->
                        <div class="bg-[#FFF7ED] hover:bg-[#FFEDD5] text-orange-400 rounded-2xl shadow-sm p-5 text-center transition duration-200 cursor-pointer border-b-4 border-orange-300" onclick="showMasterSubView('kelas')">
                            <i class="fas fa-door-open text-3xl mb-2 text-orange-500"></i>
                            <p class="text-lg font-semibold">Kelola Kelas</p>
                        </div>
                    </div>
                </div>
            </div>


            <div id="modalDetail" class="hidden fixed inset-0 bg-black bg-opacity-40 flex items-center justify-center z-50">
                <div class="bg-white rounded-xl shadow-lg p-6 w-96 relative">
                    <button id="closeModal" class="absolute top-2 right-2 text-gray-500 hover:text-black">&times;</button>
                    <h2 class="text-xl font-semibold mb-4 text-center text-gray-800">Detail Program Studi</h2>
                    <div class="space-y-2 text-gray-700">
                    <p><strong>Program Studi:</strong> <span id="detailProdi"></span></p>
                    <p><strong>Jumlah Mahasiswa:</strong> <span id="detailJumlah"></span></p>
                    <p><strong>Rata-rata IPS:</strong> <span id="detailIps"></span></p>
                    <p><strong>Predikat:</strong> <span id="detailPredikat"></span></p>
                    </div>
                </div>
                </div>


            <!-- 3. Rekap Nilai View -->
            <div id="rekapView" class="view-content space-y-6 max-w-full hidden">
                <!-- Content injected by renderRekapNilaiView() -->
            </div>

            <!-- 4. Data Master Sub-Views Container (Dynamic CRUD Tables) -->
            <div id="masterSubViewContainer" class="view-content space-y-6 hidden">
                <!-- Dynamic content for Mahasiswa, Dosen, MK, Kelas tables will be loaded here -->
            </div>

            <!-- Modal for Export Laporan (already existing) -->
            <div id="laporanModal" class="fixed inset-0 bg-gray-900 bg-opacity-70 hidden items-center justify-center z-50 transition-opacity duration-300 opacity-0">
                <div class="bg-white p-6 rounded-xl shadow-2xl max-w-sm w-full transform transition-all duration-300 scale-90" id="laporanModalContent">
                   <h3 class="text-xl font-extrabold mb-3 flex items-center" style="color #ed8d8d !important;">
                        <i class="fas fa-file-export mr-3" style="color: #ed8d8d !important;"></i> Konfirmasi Ekspor Laporan
                    </h3>
                    <p class="text-gray-700 mb-4">Anda akan men-download Laporan Rekapitulasi Nilai per Semester/Prodi dalam format PDF/Excel.</p>
                    <div class="flex justify-end space-x-3 mt-4">
                        <button onclick="closeModal()" class="bg-gray-200 hover:bg-gray-300 text-gray-700 font-semibold py-2 px-4 rounded-lg transition duration-150 shadow-md">Batal</button>
                        <button onclick="downloadLaporan();" class="action-btn-red text-white font-semibold py-2 px-4 rounded-lg transition duration-150 shadow-md">Download Laporan</button>
                    </div>
                </div>
            </div>
        </main>
    </div>

    <script>
        // --- DATA MOCKUP ---
        const adminSummary = {
            totalStudents: 520,
            totalLecturers: 55,
            totalCourses: 85,
            activeClasses: 28,
        };

        const prodiRekap = [
            { no: 1, prodi: 'Teknik Informatika D3', students: 150, ipsAvg: 3.55, grade: 'Sangat Baik' },
            { no: 2, prodi: 'Sistem Informasi S1', students: 220, ipsAvg: 3.40, grade: 'Baik' },
            { no: 3, prodi: 'Manajemen Bisnis D4', students: 150, ipsAvg: 3.65, grade: 'Sangat Baik' },
            { no: 4, prodi: 'Akuntansi D3', students: 100, ipsAvg: 3.20, grade: 'Cukup Baik' },
        ];

        const masterData = {
            mahasiswa: [
                { id: 'MHS001', nim: '23.01.1000', nama: 'Budi Santoso', prodi: 'Teknik Informatika D3', angkatan: 2023 },
                { id: 'MHS002', nim: '20.02.002', nama: 'Siti Aminah', prodi: 'Sistem Informasi S1', angkatan: 2023 },
                { id: 'MHS003', nim: '20.02.015', nama: 'Agus Salim', prodi: 'Manajemen Bisnis D4', angkatan: 2022 },
                { id: 'MHS004', nim: '20.01.2040', nama: 'Dewi Lestari', prodi: 'Teknik Informatika D3', angkatan: 2021 },
            ],
            dosen: [
                { id: 'DSN01', nip: '19800101', nama: 'Dr. Rina Wati, M.Kom.', bidang: 'Rekayasa Perangkat Lunak' },
                { id: 'DSN02', nip: '19750515', nama: 'Prof. Jono S., S.T., M.T.', bidang: 'Jaringan Komputer' },
                { id: 'DSN03', nip: '19901020', nama: 'Ir. Ahmad Yani, M.Eng.', bidang: 'Sistem Informasi' },
            ],
            matakuliah: [
                { id: 'MK01', kode: 'TI301', nama: 'Pemrograman Web', sks: 3, semester: 5 },
                { id: 'MK02', kode: 'SI205', nama: 'Basis Data', sks: 4, semester: 3 },
                { id: 'MK03', kode: 'MB410', nama: 'Akuntansi Manajerial', sks: 3, semester: 7 },
                { id: 'MK04', kode: 'AK101', nama: 'Pengantar Akuntansi', sks: 2, semester: 1 },
            ],
            kelas: [
                { id: 'KLS01', nama: 'TI D3-A', mataKuliah: 'Pemrograman Web', kodeMk: 'TI301', dosen: 'Dr. Rina Wati', totalMhs: 45 },
                { id: 'KLS02', nama: 'SI S1-B', mataKuliah: 'Basis Data', kodeMk: 'SI205', dosen: 'Prof. Jono S.', totalMhs: 50 },
                { id: 'KLS03', nama: 'MB D4-C', mataKuliah: 'Akuntansi Manajerial', kodeMk: 'MB410', dosen: 'Ir. Ahmad Yani', totalMhs: 30 },
            ]
        };

        // --- NAVIGATION & UTILITIES ---

        function updateActiveLink(currentViewId) {
            const links = document.querySelectorAll('.nav-link');
            const mainViewId = currentViewId.includes('master') ? 'masterView' : currentViewId;

            links.forEach(link => {
                link.classList.remove('color-primary-medium', 'bg-opacity-20', 'font-medium');
                link.classList.add('text-white', 'hover:bg-white', 'hover:bg-opacity-10');
            });

            // Highlight the active main link (Master remains active even in sub-view)
            const activeLinkElement = document.getElementById(`nav-${mainViewId.replace('View', '').replace('Sub', '')}`);
            if (activeLinkElement) {
                const activeLink = activeLinkElement.querySelector('a');
                activeLink.classList.add('color-primary-medium', 'bg-opacity-20', 'font-medium');
                activeLink.classList.remove('hover:bg-white', 'hover:bg-opacity-10');
            }
            
            let title = "Rekapitulasi Nilai"; 
            if (mainViewId === 'masterView') title = "Rekapitulasi Nilai";
            if (currentViewId === 'mahasiswaSub') title = "Rekapitulasi Nilai";
            if (currentViewId === 'dosenSub') title = "Rekapitulasi Nilai";
            if (currentViewId === 'matakuliahSub') title = "Rekapitulasi Nilai";
            if (currentViewId === 'kelasSub') title = "Rekapitulasi Nilai";
            if (currentViewId === 'rekapView') title = "Rekapitulasi Nilai";
            document.getElementById('pageTitle').textContent = title;
        }

        function navigateTo(viewId) {
            const views = document.querySelectorAll('.view-content');
            views.forEach(view => {
                view.classList.add('hidden');
            });

            const targetView = document.getElementById(viewId);
            if (targetView) {
                targetView.classList.remove('hidden');
                updateActiveLink(viewId);
            }
            
            // Close sidebar on mobile after navigation
            if (window.innerWidth < 768) {
                closeSidebar();
            }

            // Render specific views
            if (viewId === 'dashboardView') {
                renderAdminDashboard();
            }
            if (viewId === 'rekapView') {
                renderRekapNilaiView();
            }
            if (viewId === 'masterView') {
                // Ensure sub-view container is empty when returning to master options
                document.getElementById('masterSubViewContainer').innerHTML = '';
            }
        }
 
        
        function closeSidebar() {
            const sidebar = document.getElementById('mainSidebar');
            const sidebarOverlay = document.getElementById('sidebarOverlay');
            if (window.innerWidth < 768) {
                sidebar.classList.remove('is-open'); 
                sidebarOverlay.classList.add('hidden');
            }
        }

        function openSidebar() {
             const sidebar = document.getElementById('mainSidebar');
             const sidebarOverlay = document.getElementById('sidebarOverlay');
             if (window.innerWidth < 768) {
                 sidebar.classList.add('is-open'); 
                 sidebarOverlay.classList.remove('hidden');
             }
        }
        
        function toggleSidebar() {
            const sidebar = document.getElementById('mainSidebar');
            if (window.innerWidth < 768) {
                if (sidebar.classList.contains('is-open')) {
                    closeSidebar();
                } else {
                    openSidebar();
                }
            }
        }

       
        function openSidebar() {
        const sidebar = document.getElementById('mainSidebar');
        sidebar.classList.add('is-open');
        sidebar.classList.remove('-translate-x-full');
        }

        function closeSidebar() {
        const sidebar = document.getElementById('mainSidebar');
        sidebar.classList.remove('is-open');
        sidebar.classList.add('-translate-x-full');
        }

        function getIpsBadge(grade) {
            if (grade === 'Sangat Baik') return 'bg-green-200 text-green-700';
            if (grade === 'Baik') return 'bg-yellow-200 text-yellow-700';
            if (grade === 'Cukup Baik') return 'bg-orange-200 text-orange-700';
            return 'bg-gray-200 text-gray-700';
        }

        // --- RENDER FUNCTIONS (EXISTING) ---

        function renderAdminDashboard() {
            // Update summary cards
            document.getElementById('stat-mahasiswa').textContent = adminSummary.totalStudents;
            document.getElementById('stat-dosen').textContent = adminSummary.totalLecturers;
            document.getElementById('stat-mk').textContent = adminSummary.totalCourses;
            document.getElementById('stat-kelas').textContent = adminSummary.activeClasses;
            
            // Render brief rekap table
            const tbody = document.getElementById('dashboard-rekap-body');
            if (!tbody) return;
            
            let rowsHtml = prodiRekap.slice(0, 3).map(data => {
                const badgeClass = getIpsBadge(data.grade);
                
                return `
                    <tr class="hover:bg-gray-50">
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">${data.no}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 font-semibold">${data.prodi}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-center">${data.students}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-center font-bold text-primary">${data.ipsAvg.toFixed(2)}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-center">
                            <span class="${badgeClass} text-xs font-bold px-2.5 py-1 rounded-full">${data.grade}</span>
                        </td>
                    </tr>
                `;
            }).join('');
            
            tbody.innerHTML = rowsHtml;
        }

        function renderRekapNilaiView() {
            const container = document.getElementById('rekapView');
            container.innerHTML = '';
            
            const totalAvgIps = (prodiRekap.reduce((sum, d) => sum + d.ipsAvg, 0) / prodiRekap.length).toFixed(2);

            const summaryHTML = `
                <h1 class="text-2xl font-bold text-gray-800 mb-4">Rekap Nilai</h1>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">
                    <div class="container-card border-l-4" style="background-color: #f4f2f7; border-color: #A276B8;">
                        <p class="text-sm text-primary font-semibold">Total Mahasiswa</p>
                        <h3 class="text-3xl font-extrabold text-primary mt-1">${adminSummary.totalStudents}</h3>
                    </div>
                    <div class="container-card border-l-4" style="background-color: #fff8f0; border-color: #f8c471;">
                        <p class="text-sm" style="color: #f8c471; font-weight: 600;">Prodi Terlibat</p>
                        <h3 class="text-3xl font-extrabold" style="color: #f8c471; opacity: 0.9;">${prodiRekap.length}</h3>
                    </div>
                    <div class="container-card bg-green-50 border-l-4 border-green-600">
                        <p class="text-sm text-green-700 font-semibold">IPS Rata-rata Global</p>
                        <h3 class="text-3xl font-extrabold text-green-900 mt-1">${totalAvgIps}</h3>
                    </div>
                </div>
            `;

            
          let tableRows = prodiRekap.map(data => {
            const badgeClass = getIpsBadge(data.grade);
            
            return `
                <tr class="hover:bg-gray-100 text-sm transition duration-100"
                    data-prodi="${data.prodi}"
                    data-students="${data.students}"
                    data-ips="${data.ipsAvg.toFixed(2)}"
                    data-grade="${data.grade}">
                    <td class="py-3 px-4 text-center">${data.no}</td>
                    <td class="py-3 px-4 font-medium">${data.prodi}</td>
                    <td class="py-3 px-4 text-center">${data.students}</td>
                    <td class="py-3 px-4 text-center font-bold text-primary">${data.ipsAvg.toFixed(2)}</td>
                    <td class="py-3 px-4 text-center"><span class="${badgeClass} text-xs font-bold px-2.5 py-1 rounded-full">${data.grade}</span></td>
                    <td class="py-3 px-4 text-center">
                        <button class="btn-detail bg-blue-100 text-blue-700 text-xs font-semibold px-2 py-1 rounded hover:bg-blue-200 transition">
                            <i class="fas fa-eye"></i> Detail
                        </button>
                    </td>
                </tr>
            `;
        }).join('');


            
            const tableHTML = `
                <div class="container-card overflow-x-auto mb-6">
                    <div class="flex justify-between items-center mb-4 border-b pb-3">
                        <h2 class="text-xl font-semibold text-gray-800">Tabel Rekapitulasi Nilai per Program Studi (Ganjil 2024/2025)</h2>
                        <button type="button" onclick="cetakLaporan()" class="action-btn-red text-white font-semibold py-2 px-4 rounded-lg shadow-md hover:shadow-lg transition duration-300">
                            <i class="fas fa-file-export mr-2"></i> Ekspor Laporan
                        </button>
                    </div>

                    <div class="table-responsive">
                        <table class="min-w-full divide-y divide-gray-200 rounded-lg overflow-hidden border">
                            <thead>
                                <tr class="bg-gray-50 text-xs text-gray-500 uppercase tracking-wider">
                                    <th class="py-3 px-4 text-center">NO</th>
                                    <th class="py-3 px-4 text-left">PROGRAM STUDI</th>
                                    <th class="py-3 px-4 text-center">JML. MAHASISWA</th>
                                    <th class="py-3 px-4 text-center">RATA-RATA IPS</th>
                                    <th class="py-3 px-4 text-center">PREDIKAT</th>
                                    <th class="py-3 px-4 text-center">AKSI</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200 text-gray-700">
                                ${tableRows}
                            </tbody>
                        </table>
                    </div>
                    
                    <p class="mt-4 text-sm text-gray-600">
                        *Laporan ini menunjukkan rata-rata Indeks Prestasi Semester (IPS) untuk seluruh mahasiswa aktif pada semester yang bersangkutan.
                    </p>
                </div>
            `;

            container.innerHTML = summaryHTML + tableHTML;
        }


        // Event listener untuk tombol Detail
    document.addEventListener('click', function(e) {
        if (e.target.closest('button')?.innerText.includes('Detail')) {
            const row = e.target.closest('tr');
            const prodi = row.children[1].textContent;
            const jumlah = row.children[2].textContent;
            const ips = row.children[3].textContent;
            const predikat = row.children[4].textContent;

            document.getElementById('detailProdi').textContent = prodi;
            document.getElementById('detailJumlah').textContent = jumlah;
            document.getElementById('detailIps').textContent = ips;
            document.getElementById('detailPredikat').textContent = predikat;

            document.getElementById('modalDetail').classList.remove('hidden');
        }
    });

    // Tutup modal
    document.getElementById('closeModal').addEventListener('click', function() {
        document.getElementById('modalDetail').classList.add('hidden');
    });


        // --- NEW MASTER DATA FUNCTIONS ---

        const capitalize = (s) => s.charAt(0).toUpperCase() + s.slice(1);

        function showMasterSubView(type) {
            // Hide main master view options and show sub-view container
            document.getElementById('masterView').classList.add('hidden');
            document.getElementById('masterSubViewContainer').classList.remove('hidden');
            
            renderMasterSubView(type);
            updateActiveLink(type + 'Sub');

            // Close sidebar on mobile after navigation
            if (window.innerWidth < 768) {
                closeSidebar();
            }
        }
        
        function getMasterTableHeaders(type) {
            switch(type) {
                case 'mahasiswa':
                    return ['NIM', 'Nama', 'Program Studi', 'Angkatan'];
                case 'dosen':
                    return ['NIP', 'Nama Dosen', 'Bidang Keahlian'];
                case 'matakuliah':
                    return ['Kode MK', 'Nama Mata Kuliah', 'SKS', 'Semester'];
                case 'kelas':
                    return ['Nama Kelas', 'Mata Kuliah (Kode)', 'Dosen Pengampu', 'Jml. Mhs'];
                default:
                    return [];
            }
        }

        function getMasterTableRow(type, data) {
            switch(type) {
                case 'mahasiswa':
                    return `
                        <td class="py-3 px-4 font-mono text-sm">${data.nim}</td>
                        <td class="py-3 px-4 font-semibold">${data.nama}</td>
                        <td class="py-3 px-4 text-sm">${data.prodi}</td>
                        <td class="py-3 px-4 text-center text-sm">${data.angkatan}</td>
                    `;
                case 'dosen':
                    return `
                        <td class="py-3 px-4 font-mono text-sm">${data.nip}</td>
                        <td class="py-3 px-4 font-semibold">${data.nama}</td>
                        <td class="py-3 px-4 text-sm">${data.bidang}</td>
                    `;
                case 'matakuliah':
                    return `
                        <td class="py-3 px-4 font-mono text-sm">${data.kode}</td>
                        <td class="py-3 px-4 font-semibold">${data.nama}</td>
                        <td class="py-3 px-4 text-center text-sm">${data.sks}</td>
                        <td class="py-3 px-4 text-center text-sm">${data.semester}</td>
                    `;
                case 'kelas':
                    return `
                        <td class="py-3 px-4 font-semibold">${data.nama}</td>
                        <td class="py-3 px-4 text-sm">${data.mataKuliah} (${data.kodeMk})</td>
                        <td class="py-3 px-4 text-sm">${data.dosen}</td>
                        <td class="py-3 px-4 text-center text-sm">${data.totalMhs}</td>
                    `;
                default:
                    return '';
            }
        }

        function renderMasterSubView(type) {
            const container = document.getElementById('masterSubViewContainer');
            const titleText = capitalize(type);
            const headers = getMasterTableHeaders(type);
            const dataSet = masterData[type] || [];
            
            // Build table header row
            const headerRowHtml = headers.map(header => 
                `<th class="py-3 px-4 text-left">${header}</th>`
            ).join('');
            
            // Build table body rows
            const bodyRowsHtml = dataSet.map((data, index) => {
                const rowContent = getMasterTableRow(type, data);
                return `
                    <tr class="hover:bg-gray-50">
                        <td class="py-3 px-4 text-center text-sm font-medium text-gray-500">${index + 1}</td>
                        ${rowContent}
                        <td class="py-3 px-4 text-center whitespace-nowrap">
                            <button onclick="console.log('Edit ${data.id}')" class="text-blue-600 hover:text-blue-800 p-1 rounded transition" title="Edit Data"><i class="fas fa-edit"></i></button>
                            <button onclick="showMasterSubViewDeleteConfirmation('${type}', '${data.id}')" class="text-red-600 hover:text-red-800 p-1 rounded transition ml-2" title="Hapus Data"><i class="fas fa-trash-alt"></i></button>
                        </td>
                    </tr>
                `;
            }).join('');


            // Construct the full HTML for the sub-view
            container.innerHTML = `
                <div class="flex items-center space-x-4 mb-4">
                    <button onclick="navigateTo('masterView')" class="text-gray-600 hover:text-primary transition" title="Kembali ke Pilihan Master Data">
                        <i class="fas fa-arrow-left text-xl"></i>
                    </button>
                    <h1 class="text-2xl font-bold text-gray-800">Kelola Data ${titleText}</h1>
                </div>
                
                <div class="container-card">
                    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center mb-4 border-b pb-3 space-y-3 sm:space-y-0">
                        
                        <div class="flex space-x-3">
                            <input type="text" placeholder="Cari data ${titleText}..." class="p-2 border border-gray-300 rounded-lg w-full sm:w-64 focus:ring-primary focus:border-primary transition">
                            <button class="action-btn-primary text-white font-semibold py-2 px-4 rounded-lg transition shadow-md hover:shadow-lg">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>

                        <button onclick="console.log('Open form Tambah ${titleText}')" class="action-btn-primary text-white font-semibold py-2 px-4 rounded-lg transition shadow-md hover:shadow-lg w-full sm:w-auto">
                            <i class="fas fa-plus-circle mr-2"></i> Tambah Data ${titleText}
                        </button>
                    </div>

                    <div class="table-responsive overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead>
                                <tr class="table-header-custom text-xs text-gray-600 uppercase tracking-wider">
                                    <th class="py-3 px-4 text-center w-12">NO</th>
                                    ${headerRowHtml}
                                    <th class="py-3 px-4 text-center w-32">AKSI</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-100 text-gray-700">
                                ${bodyRowsHtml.length > 0 ? bodyRowsHtml : `
                                    <tr>
                                        <td colspan="${headers.length + 2}" class="py-8 text-center text-lg text-gray-500">
                                            <i class="fas fa-exclamation-triangle mr-2"></i> Data ${titleText} belum tersedia.
                                        </td>
                                    </tr>
                                `}
                            </tbody>
                        </table>
                    </div>

                    <p class="mt-4 text-sm text-gray-600 border-t pt-3">
                        Total Data: ${dataSet.length}. Gunakan tombol Tambah Data untuk memasukkan entri baru.
                    </p>
                </div>
            `;
        }

        // --- MODAL FUNCTIONS (UPDATED) ---

        function cetakLaporan() {
            // Re-uses modal for Export Laporan
            const modal = document.getElementById('laporanModal');
            const modalContent = document.getElementById('laporanModalContent');
            
            const isDelete = modalContent.getAttribute('data-action') === 'delete';
            
            // Set for Laporan Export
            modalContent.innerHTML = `
                <h3 class="text-xl font-extrabold mb-3 text-red-500 flex items-center"><i class="fas fa-file-export mr-3"></i> Konfirmasi Ekspor Laporan</h3>
                <p class="text-gray-700 mb-4">Anda akan men-download Laporan Rekapitulasi Nilai per Semester/Prodi dalam format PDF/Excel.</p>
                <div class="flex justify-end space-x-3 mt-4">
                    <button onclick="closeModal()" class="bg-gray-200 hover:bg-gray-300 text-gray-700 font-semibold py-2 px-4 rounded-lg transition duration-150 shadow-md">Batal</button>
                    <button onclick="downloadLaporan();" class="action-btn-red text-white font-semibold py-2 px-4 rounded-lg transition duration-150 shadow-md">Download Laporan</button>
                </div>
            `;

            modal.classList.remove('hidden');
            modal.classList.add('flex', 'opacity-100');
            modalContent.classList.remove('scale-90');
            modalContent.classList.add('scale-100');
        }

        function showMasterSubViewDeleteConfirmation(type, id) {
             const modal = document.getElementById('laporanModal');
             const modalContent = document.getElementById('laporanModalContent');
             
             modalContent.innerHTML = `
                 <h3 class="text-xl font-extrabold mb-3 text-red-500 flex items-center"><i class="fas fa-trash-alt mr-3"></i> Konfirmasi Hapus Data</h3>
                 <p class="text-gray-700 mb-4">Apakah Anda yakin ingin menghapus data ${capitalize(type)} dengan ID: <strong>${id}</strong>? Aksi ini tidak dapat dibatalkan.</p>
                 <div class="flex justify-end space-x-3 mt-4">
                     <button onclick="closeModal()" class="bg-gray-200 hover:bg-gray-300 text-gray-700 font-semibold py-2 px-4 rounded-lg transition duration-150 shadow-md">Batal</button>
                     <button onclick="executeDelete('${type}', '${id}');" class="action-btn-red text-white font-semibold py-2 px-4 rounded-lg transition duration-150 shadow-md">Ya, Hapus Permanen</button>
                 </div>
             `;

             modal.classList.remove('hidden');
             modal.classList.add('flex', 'opacity-100');
             modalContent.classList.remove('scale-90');
             modalContent.classList.add('scale-100');
        }

        function executeDelete(type, id) {
            console.log(`Menghapus data ${type} dengan ID: ${id}`);
            // In a real app, this would perform API call and re-render the table
            closeModal();
            // For mock: just re-render the current view
            setTimeout(() => {
                // Simplified mock message
                alert(`Data ${capitalize(type)} ID ${id} berhasil dihapus (Mock action).`);
                renderMasterSubView(type);
            }, 50);
        }
        
        function closeModal() {
            const modal = document.getElementById('laporanModal');
            const modalContent = document.getElementById('laporanModalContent');
            
            modal.classList.add('opacity-0');
            modalContent.classList.remove('scale-100');
            modalContent.classList.add('scale-90');
            
            setTimeout(() => {
                modal.classList.remove('flex', 'opacity-100');
                modal.classList.add('hidden');
            }, 300); 
        }

        function downloadLaporan() {
            // Using console.log instead of alert
            console.log("Download Laporan Rekapitulasi Nilai...");
            closeModal();
            // Mock download process
            alert("Laporan berhasil di-download! (Mock action).");
        }

        // --- INITIALIZATION ---
        document.addEventListener('DOMContentLoaded', () => {
            // Initialize Dashboard content
            renderAdminDashboard();
            // Navigate to Dashboard
            navigateTo('dashboardView'); 
        });

       
        document.getElementById("menu-toggle").addEventListener("click", function() {
        const sidebar = document.getElementById("sidebar");
        sidebar.classList.toggle("hidden");
        });        
    </script>
</body>
</html>
