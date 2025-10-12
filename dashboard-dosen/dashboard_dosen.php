<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Dosen - Input & Rekap Nilai</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" crossorigin="anonymous" referrerpolicy="no-referrer" />
   
<style>
    /* Styling dari template dashboard.php (tetap dipertahankan) */
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

    /* Warna Primer: Ungu tua/medium untuk identitas Dosen */
    .color-primary-dark {
        background-color: #A276B8; 
    }
    .color-primary-medium {
        background-color: #B79BC9; 
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
    
    /* Tombol Logout/Kunci Nilai */
    .action-btn-red {
        background-color: #f14c4c;
        transition: background-color 0.15s ease;
    }
    .action-btn-red:hover {
        background-color: #c93b3b;
    }

    /* Tombol Aksi Primer (Hitung/Simpan) */
    .action-btn-primary {
        background-color: #A276B8;
        transition: background-color 0.15s ease;
    }
    .action-btn-primary:hover {
        background-color: #B79BC9;
    }

    /* Styling khusus Input Nilai */
    .input-nilai-cell {
        /* Lebar kolom input nilai (sedikit lebih sempit) */
        width: 70px; 
        min-width: 70px;
    }
    .input-nilai-cell input {
        text-align: center;
        padding: 4px;
        border-radius: 4px;
        border: 1px solid #d1d5db;
        width: 100%;
        font-size: 0.875rem; /* text-sm */
    }
    .input-nilai-cell input:focus {
        border-color: #A276B8;
        outline: none;
        box-shadow: 0 0 0 1px #A276B8;
    }
    .input-nilai-cell input:disabled {
        background-color: #f0f0f0;
    }

    /* Kustomisasi untuk tampilan mobile (di bawah 640px) */
    @media (max-width: 639px) {
        .input-nilai-cell {
            width: 55px; /* Lebih kecil lagi di layar sangat kecil */
            min-width: 55px;
        }
        .input-nilai-cell input {
            font-size: 0.75rem; /* text-xs */
        }
        
        /* Judul kolom input agar lebih singkat di mobile */
        .grade-table th {
            font-size: 0.75rem; /* text-xs */
            padding-left: 0.5rem;
            padding-right: 0.5rem;
        }

        .grade-table td {
             font-size: 0.8rem;
        }

        /* Menyembunyikan beberapa label di layar kecil */
        .mobile-hide {
            display: none !important;
        }
    }
</style>

</head>
<body class="min-h-screen flex flex-col">
    <nav class="bg-white border-b border-gray-200 shadow-md sticky top-0 z-20">
        <div class="px-4 sm:px-6 lg:px-8 h-16 flex items-center justify-between">
            <div class="flex items-center">
                <button id="sidebarToggle" onclick="toggleSidebar()" class="focus:outline-none p-2 rounded-lg mr-4 md:mr-6 transition duration-150">
                    <i class="fas fa-bars text-xl"></i>
                </button>
                <a href="#" class="text-xl font-extrabold" id="pageTitle">Rekapitulasi Nilai</a>
            </div>
            <div class="flex items-center space-x-4">
                <span class="text-sm font-medium text-gray-600 hidden md:block">Dr. John Doe (NIDN: 23.01.1000)</span> 
                 <img class="h-9 w-9 rounded-full object-cover ring-2 ring-red-500" src="https://placehold.co/40x40/b91c1c/ffffff?text=JD" alt="User Avatar">
                <a href="#" class="action-btn-red flex items-center text-white px-3 py-2 rounded-lg transition shadow-md" title="Logout">
                <i class="fas fa-sign-out-alt mr-2"></i>
                <span class="font-medium hidden sm:inline">Logout</span>
                </a>
            </div>
        </div>
    </nav>
    <div class="flex flex-1 flex-grow">

        <aside id="mainSidebar" class="main-sidebar color-primary-dark text-white flex-shrink-0 shadow-xl md:shadow-none">
            <div class="flex flex-col h-full">
                <div class="p-4 border-b border-white border-opacity-20">
                    <h3 class="text-lg font-semibold color-accent">DOSEN</h3>
                    <p class="text-xs text-gray-200">NIDN: 23.01.1000</p> </div>
                <nav class="mt-2 flex-1 overflow-y-auto">
                    <ul class="space-y-1 p-2">
                        <li id="nav-dashboard">
                            <a href="#" onclick="navigateTo('dashboardView'); return false;" class="nav-link flex items-center p-3 rounded-lg color-primary-medium bg-opacity-20 text-white font-medium">
                                <i class="fas fa-tachometer-alt mr-3"></i> 
                                <span>Dashboard</span>
                            </a>
                        </li>
                        <li id="nav-grades">
                            <a href="#" onclick="navigateTo('gradesView'); return false;" class="nav-link flex items-center p-3 rounded-lg hover:bg-white hover:bg-opacity-10 text-white">
                                <i class="fas fa-edit mr-3"></i> 
                                <span>Input / Rekap Nilai</span>
                            </a>
                        </li>
                        <li>
                            <a href="#" onclick="cetakLaporanNilai(); return false;" class="flex items-center p-3 rounded-lg hover:bg-white hover:bg-opacity-10 text-white">
                                <i class="fas fa-print mr-3"></i>
                                <span>Cetak Laporan Nilai</span>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </aside>

        <div id="sidebarOverlay" class="fixed inset-0 bg-black bg-opacity-50 z-30 hidden md:hidden" onclick="closeSidebar()"></div>

        <main id="contentWrapper" class="flex-1 p-4 sm:p-6 overflow-y-auto w-full">
            
            <div id="dashboardView" class="view-content space-y-6">
                <h1 class="text-2xl font-bold text-gray-800 mb-4">Dashboard Dosen</h1>
                <p class="text-gray-600 mb-6">Selamat datang, Dr. John Doe. Berikut adalah ringkasan kegiatan mengajar Anda.</p>

                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 mb-8">
                    
                    <div class="grade-card bg-white p-5 border-l-4 border-primary">
                        <div class="flex items-center">
                            <div class="flex-shrink-0 mr-4 text-primary"><i class="fas fa-chalkboard-teacher text-3xl"></i></div>
                            <div>
                                <p class="text-sm font-medium text-gray-500">Jumlah Mata Kuliah</p>
                                <p class="text-2xl font-semibold text-gray-900">3</p>
                            </div>
                        </div>
                    </div>

                    <div class="grade-card bg-white p-5 border-l-4" style="border-color: #60a5fa;">
                        <div class="flex items-center">
                            <div class="flex-shrink-0 mr-4" style="color: #60a5fa;"><i class="fas fa-users text-3xl"></i></div>
                            <div>
                                <p class="text-sm font-medium text-gray-500">Total Kelas Diajar</p>
                                <p class="text-2xl font-semibold text-gray-900">3</p>
                            </div>
                        </div>
                    </div>

                    <div class="grade-card bg-white p-5 border-l-4" style="border-color: #f8c471;">
                        <div class="flex items-center">
                            <div class="flex-shrink-0 mr-4" style="color: #f8c471;"><i class="fas fa-user-graduate text-3xl"></i></div>
                            <div>
                                <p class="text-sm font-medium text-gray-500">Total Mahasiswa</p>
                                <p class="text-2xl font-semibold text-gray-900">100</p>
                            </div>
                        </div>
                    </div>

                    <div class="grade-card bg-white p-5 border-l-4" style="border-color: #81c784;">
                        <div class="flex items-center">
                            <div class="flex-shrink-0 mr-4" style="color: #81c784;"><i class="fas fa-calendar-alt text-3xl"></i></div>
                            <div>
                                <p class="text-sm font-medium text-gray-500">Semester Aktif</p>
                                <p class="text-2xl font-semibold text-gray-700">Ganjil 2024/2025</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="grade-card bg-white rounded-xl overflow-hidden shadow-lg mb-8">
                    <div class="p-6 border-b flex flex-col sm:flex-row justify-between items-start sm:items-center space-y-3 sm:space-y-0">
                        <h2 class="text-xl font-semibold text-gray-800">Status Kunci Nilai Per Kelas</h2>
                        <button onclick="navigateTo('gradesView')" class="action-btn-primary text-white font-bold py-2 px-4 rounded-lg transition duration-150 shadow-md">
                            <i class="fas fa-edit mr-2"></i> Input Nilai Sekarang
                        </button>
                    </div>

                    <div class="table-responsive overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Kelas</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Kode MK</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Mata Kuliah</th>
                                    <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Jml Mhs</th>
                                    <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-100" id="dashboard-kelas-tbody">
                                </tbody>
                        </table>
                    </div>
                    <div class="p-6 bg-gray-50 text-sm text-gray-600 border-t rounded-b-xl">
                        <p>Pastikan semua nilai (Tugas, Kuis, UTS, UAS) sudah terinput dan nilai akhir telah dikunci sebelum batas akhir pengisian.</p>
                    </div>
                </div>
            </div>

            <div id="gradesView" class="view-content space-y-6 max-w-full hidden">
                <div class="container-card mb-6 p-4">
                    <h2 class="text-xl font-bold text-gray-800 mb-3">Pilih Mata Kuliah & Kelas</h2>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                        <div>
                             <label for="selectMK" class="block text-sm font-medium text-gray-700">Mata Kuliah</label>
                             <select id="selectMK" class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-primary focus:border-primary sm:text-sm rounded-md">
                                <option value="MK1">TIF301 (Struktur Data Lanjut)</option>
                                <option value="MK2">MTK303 (Kalkulus Lanjut)</option>
                                <option value="MK3">ENG201 (Bahasa Inggris II)</option>
                             </select>
                        </div>
                        <div>
                             <label for="selectKelas" class="block text-sm font-medium text-gray-700">Kelas</label>
                             <select id="selectKelas" class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-primary focus:border-primary sm:text-sm rounded-md">
                                </select>
                        </div>
                        <div class="flex items-end">
                            <button onclick="renderGradesTable(document.getElementById('selectMK').value, document.getElementById('selectKelas').value)" class="w-full action-btn-primary text-white font-semibold py-2 px-4 rounded-lg shadow-md transition duration-150">
                                <i class="fas fa-search mr-2"></i> <span class="hidden sm:inline">Tampilkan Data</span><span class="inline sm:hidden">Tampil</span>
                            </button>
                        </div>
                    </div>
                </div>

                <div id="nilaiTableContainer">
                     <p class="container-card text-gray-500">Silakan pilih Mata Kuliah dan Kelas, lalu klik Tampilkan Data.</p>
                     </div>
            </div>

            <div id="khsModal" class="fixed inset-0 bg-gray-900 bg-opacity-70 hidden items-center justify-center z-50 transition-opacity duration-300 opacity-0">
                <div class="bg-white p-6 rounded-xl shadow-2xl max-w-sm w-full transform transition-all duration-300 scale-90" id="khsModalContent">
                    <h3 class="text-xl font-extrabold mb-3 text-red-500 flex items-center"><i class="fas fa-file-pdf mr-3"></i> Konfirmasi Cetak Laporan</h3>
                    <p class="text-gray-700 mb-4">Anda akan men-download Laporan Nilai untuk kelas **TIF301 A** dalam format PDF.</p>
                    <p class="text-sm text-red-700 bg-red-100 p-3 rounded-lg mb-4 border border-red-200 flex items-center">
                         <i class="fas fa-info-circle mr-2"></i>
                         Pastikan semua nilai sudah final dan telah dikunci.
                   </p>
                    <div class="flex justify-end space-x-3 mt-4">
                        <button onclick="closeModal()" class="bg-gray-200 hover:bg-gray-300 text-gray-700 font-semibold py-2 px-4 rounded-lg transition duration-150 shadow-md">Batal</button>
                        <button onclick="downloadLaporan();" class="action-btn-red text-white font-semibold py-2 px-4 rounded-lg transition duration-150 shadow-md">Download Laporan</button>
                    </div>
                </div>
            </div>
        </main>
    </div>

    <script>
        
        // --- DATA DUMMY ---
        const dosenData = {
            mkDiajar: [
                // Hanya satu mata kuliah yang kita anggap aktif (sesuai data kelas)
                { id: 'MK1', kode: 'TIF301', nama: 'Struktur Data Lanjut' },
                // MK2 dan MK3 tetap ada, namun tidak ada kelas yang di-assign ke sini 
                { id: 'MK2', kode: 'MTK303', nama: 'Kalkulus Lanjut' }, 
                { id: 'MK3', kode: 'ENG201', nama: 'Bahasa Inggris II' },
            ],
            // Data Kelas yang Fokus pada A, B, dan C
            kelasDiajar: [
                { id: 'K1', mk_id: 'MK1', nama: 'A', jumlah_mhs: 30, status_kunci: 'Belum Dikunci' }, // Kelas A
                { id: 'K2', mk_id: 'MK1', nama: 'B', jumlah_mhs: 32, status_kunci: 'Sudah Dikunci' }, // Kelas B
                { id: 'K3', mk_id: 'MK1', nama: 'C', jumlah_mhs: 25, status_kunci: 'Belum Dikunci' }, // Kelas C
            ],
            // Data Nilai Mahasiswa (Simulasi data yang di-load dari server)
            gradesInputData: [
                // Mahasiswa Kelas K1 (A)
                { nim: '2101001', nama: 'Ahmad Faisal', tugas: 85, kuis: 90, uts: 88, uas: 92, final_score: 0, grade_letter: '', kelas_id: 'K1' },
                { nim: '2101002', nama: 'Budi Santoso', tugas: 70, kuis: 75, uts: 65, uas: 70, final_score: 0, grade_letter: '', kelas_id: 'K1' },
                { nim: '2101003', nama: 'Citra Dewi', tugas: 60, kuis: 50, uts: 55, uas: 60, final_score: 0, grade_letter: '', kelas_id: 'K1' },
                // Mahasiswa Kelas K2 (B) - Dikunci
                { nim: '2102001', nama: 'Dini Fitri', tugas: 77, kuis: 77, uts: 77, uas: 77, final_score: 77.00, grade_letter: 'B', kelas_id: 'K2' },
                { nim: '2102002', nama: 'Eko Putra', tugas: 90, kuis: 90, uts: 90, uas: 90, final_score: 90.00, grade_letter: 'A', kelas_id: 'K2' },
                // Mahasiswa Kelas K3 (C)
                { nim: '2103001', nama: 'Fajar Kurnia', tugas: 80, kuis: 75, uts: 70, uas: 80, final_score: 0, grade_letter: '', kelas_id: 'K3' },
                { nim: '2103002', nama: 'Gita Laras', tugas: 65, kuis: 60, uts: 65, uas: 60, final_score: 0, grade_letter: '', kelas_id: 'K3' },
                
            ],
            activeClassId: 'K1' // Default kelas aktif
        };
        
        // --- FUNGSI NAVIGASI & SIDEBAR (Tidak diubah, sudah responsif) ---

        function updateActiveLink(currentViewId) {
            const links = document.querySelectorAll('.nav-link');
            
            links.forEach(link => {
                link.classList.remove('color-primary-medium', 'bg-opacity-20', 'font-medium');
                link.classList.add('text-white', 'hover:bg-white', 'hover:bg-opacity-10');
            });

            const activeLinkElement = document.getElementById(`nav-${currentViewId.replace('View', '')}`);
            if (activeLinkElement) {
                 const activeLink = activeLinkElement.querySelector('a');
                 
                 activeLink.classList.add('color-primary-medium', 'bg-opacity-20', 'font-medium');
                 activeLink.classList.remove('hover:bg-white', 'hover:bg-opacity-10');
            }
            
            const title = "Rekapitulasi Nilai"; 
            document.getElementById('pageTitle').textContent = title;
        }

        function navigateTo(viewId) {
            const views = document.querySelectorAll('.view-content');
            views.forEach(view => {
                view.classList.add('hidden');
            });

            document.getElementById(viewId).classList.remove('hidden');
            updateActiveLink(viewId);
            
            if (window.innerWidth < 768) {
                closeSidebar();
            }

            if (viewId === 'dashboardView') {
                renderDashboardKelas();
            }
             if (viewId === 'gradesView') {
                // Render tampilan default kelas saat pertama kali masuk ke gradesView
                const defaultMK = document.getElementById('selectMK').value;
                const defaultKelas = document.getElementById('selectKelas').value;
                if(defaultMK && defaultKelas) { // Cek agar tidak error jika dropdown kosong
                    // Panggil renderGradesTable tanpa paksaan hitungSemuaNilai() di akhir (akan diperbaiki di renderGradesTable)
                    renderGradesTable(defaultMK, defaultKelas, false); 
                }
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
        
        // --- FUNGSI KHUSUS DOSEN (INPUT NILAI) ---

        function getStatusBadge(status) {
             if (status === 'Sudah Dikunci') {
                 return '<span class="bg-green-100 text-green-700 text-xs font-semibold px-2 py-1 rounded-full">Dikunci</span>';
             } else {
                 return '<span class="bg-yellow-100 text-yellow-700 text-xs font-semibold px-2 py-1 rounded-full">Belum Dikunci</span>';
             }
        }

        function renderDashboardKelas() {
             const tbody = document.getElementById('dashboard-kelas-tbody');
             if (!tbody) return;
             
             // Filter data kelas agar hanya MK1, dan tampilkan kelas A, B, C (sesuai data dummy yang baru)
             const dataKelas = dosenData.kelasDiajar
                .filter(kelas => kelas.mk_id === 'MK1') // Hanya tampilkan MK1
                .map(kelas => {
                    const mk = dosenData.mkDiajar.find(m => m.id === kelas.mk_id);
                    return {
                        ...kelas,
                        kode_mk: mk ? mk.kode : 'N/A',
                        nama_mk: mk ? mk.nama : 'N/A'
                    };
                });
             
             let rowsHtml = dataKelas.map(kelas => {
                 return `
                     <tr class="hover:bg-gray-50">
                         <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">${kelas.nama}</td>
                         <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">${kelas.kode_mk}</td>
                         <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 font-semibold">${kelas.nama_mk}</td>
                         <td class="px-6 py-4 whitespace-nowrap text-sm text-center">${kelas.jumlah_mhs}</td>
                         <td class="px-6 py-4 whitespace-nowrap text-sm text-center">${getStatusBadge(kelas.status_kunci)}</td>
                     </tr>
                 `;
             }).join('');
             
             tbody.innerHTML = rowsHtml;
             
             // Mengupdate ringkasan dashboard dengan nilai statis yang diminta:
             document.querySelector('.grade-card:nth-child(1) .text-2xl').textContent = 
                 '3'; // Jumlah Mata Kuliah: 3 (Statis)
             
             document.querySelector('.grade-card:nth-child(2) .text-2xl').textContent = 
                 '3'; // Total Kelas Diajar: 3 (Statis)

             document.querySelector('.grade-card:nth-child(3) .text-2xl').textContent = 
                 '100'; // Total Mahasiswa: 100 (Statis)
        }


        // Fungsi konversi nilai (sesuai kriteria bobot)
        function konversiNilai(nilaiAngka) {
            if (nilaiAngka >= 85) return { huruf: 'A', bobot: 4.00 };
            if (nilaiAngka >= 80) return { huruf: 'B+', bobot: 3.50 };
            if (nilaiAngka >= 75) return { huruf: 'B', bobot: 3.00 };
            if (nilaiAngka >= 70) return { huruf: 'C+', bobot: 2.50 };
            if (nilaiAngka >= 60) return { huruf: 'C', bobot: 2.00 };
            if (nilaiAngka >= 50) return { huruf: 'D', bobot: 1.00 };
            return { huruf: 'E', bobot: 0.00 };
        }

        function getGradeClass(gradeLetter) {
            let badgeClass = 'bg-gray-200 text-gray-700';
            if (gradeLetter === 'A' || gradeLetter === 'B+') {
                badgeClass = 'bg-green-200 text-green-600'; 
            } else if (gradeLetter === 'B' || gradeLetter === 'C+') {
                badgeClass = 'bg-yellow-200 text-yellow-600'; 
            } else if (gradeLetter === 'C' || gradeLetter === 'D') {
                 badgeClass = 'bg-amber-200 text-amber-600';
            } else if (gradeLetter === 'E') {
                 badgeClass = 'bg-red-200 text-red-600';
            }
             return badgeClass;
        }

        function hitungNilaiAkhirRow(nim) {
            // Ambil nilai dari input spesifik per baris
            const tugasElement = document.getElementById(`tugas-${nim}`);
            const kuisElement = document.getElementById(`kuis-${nim}`);
            const utsElement = document.getElementById(`uts-${nim}`);
            const uasElement = document.getElementById(`uas-${nim}`);

            // Cek jika elemen tidak ditemukan, return saja
            if (!tugasElement || !kuisElement || !utsElement || !uasElement) return { final_score: 0, grade_letter: '' };

            const tugas = parseFloat(tugasElement.value) || 0;
            const kuis = parseFloat(kuisElement.value) || 0;
            const uts = parseFloat(utsElement.value) || 0;
            const uas = parseFloat(uasElement.value) || 0;

            // Bobot Nilai: Tugas (20%), Kuis (10%), UTS (30%), UAS (40%)
            const bobotTugas = 0.20;
            const bobotKuis = 0.10;
            const bobotUTS = 0.30;
            const bobotUAS = 0.40;

            let nilaiAkhir = 
                (tugas * bobotTugas) + 
                (kuis * bobotKuis) +
                (uts * bobotUTS) + 
                (uas * bobotUAS);

            nilaiAkhir = parseFloat(nilaiAkhir.toFixed(2));
            const hasilKonversi = konversiNilai(nilaiAkhir);
            
            // Update tampilan di baris yang sama
            const finalScoreElement = document.getElementById(`final-score-${nim}`);
            const gradeLetterElement = document.getElementById(`grade-letter-${nim}`);
            
            if (finalScoreElement && gradeLetterElement) {
                finalScoreElement.textContent = nilaiAkhir.toFixed(2);
                gradeLetterElement.textContent = hasilKonversi.huruf;
                gradeLetterElement.className = `text-xs font-bold px-2.5 py-1 rounded-full ${getGradeClass(hasilKonversi.huruf)}`;
            }

            return { final_score: nilaiAkhir, grade_letter: hasilKonversi.huruf };
        }
        
        // FUNGSI INI: Menambahkan parameter `showPopup`
        function hitungSemuaNilai(showPopup = true) {
             const activeGrades = dosenData.gradesInputData.filter(mhs => mhs.kelas_id === dosenData.activeClassId);
             
             activeGrades.forEach(mhs => {
                 if(document.getElementById(`tugas-${mhs.nim}`)) {
                    hitungNilaiAkhirRow(mhs.nim);
                 }
            });
            
            // Pop-up hanya muncul jika dipanggil dengan showPopup = true (dari tombol)
            if (showPopup) {
                alert("Perhitungan nilai akhir untuk semua mahasiswa telah diperbarui!");
            }
        }

        function simpanNilai() {
             // 1. Ambil nilai terbaru dari semua input field
             const activeClassId = dosenData.activeClassId;
             const activeGrades = dosenData.gradesInputData.filter(mhs => mhs.kelas_id === activeClassId);
             
             const updatedData = activeGrades.map(mhs => {
                 const tugasElement = document.getElementById(`tugas-${mhs.nim}`);
                 const kuisElement = document.getElementById(`kuis-${mhs.nim}`);
                 const utsElement = document.getElementById(`uts-${mhs.nim}`);
                 const uasElement = document.getElementById(`uas-${mhs.nim}`);
                 
                 const tugas = tugasElement ? (parseFloat(tugasElement.value) || 0) : mhs.tugas;
                 const kuis = kuisElement ? (parseFloat(kuisElement.value) || 0) : mhs.kuis;
                 const uts = utsElement ? (parseFloat(utsElement.value) || 0) : mhs.uts;
                 const uas = uasElement ? (parseFloat(uasElement.value) || 0) : mhs.uas;

                 const result = hitungNilaiAkhirRow(mhs.nim); 

                 return { 
                     ...mhs, 
                     tugas, 
                     kuis, 
                     uts, 
                     uas, 
                     final_score: result.final_score, 
                     grade_letter: result.grade_letter 
                 };
             });
             
             // 2. Simulasi update data
             dosenData.gradesInputData = dosenData.gradesInputData.map(mhs => {
                 const updatedMhs = updatedData.find(u => u.nim === mhs.nim && u.kelas_id === activeClassId);
                 return updatedMhs || mhs; 
             });

             alert("Data nilai berhasil disimpan dan diperbarui!");
        }

        function kunciNilai() {
             // Alur: Hitung/Simpan -> Konfirmasi Kunci -> Kunci
             simpanNilai();
             
             const activeClass = dosenData.kelasDiajar.find(k => k.id === dosenData.activeClassId);

             if (confirm(`Anda yakin ingin MENGUNCI NILAI untuk ${activeClass.nama} (${activeClass.mk_id})? Nilai yang sudah dikunci tidak dapat diubah lagi! Lanjutkan?`)) {
                 
                 activeClass.status_kunci = 'Sudah Dikunci';
                 
                 // Panggil renderGradesTable dengan flag false untuk menghindari pop-up saat kunci
                 renderGradesTable(activeClass.mk_id, activeClass.id, false); 
                 
                 alert(`Nilai untuk kelas ${activeClass.nama} berhasil dikunci!`);
             }
        }

        function bukaKunciNilai() {
            const activeClass = dosenData.kelasDiajar.find(k => k.id === dosenData.activeClassId);
             
            if (!activeClass || activeClass.status_kunci !== 'Sudah Dikunci') {
                alert("Nilai kelas ini belum dikunci. Tidak perlu dibuka.");
                return;
            }

            if (confirm(`Anda yakin ingin MEMBUKA KUNCI NILAI untuk ${activeClass.nama} (${activeClass.mk_id})? Tindakan ini memungkinkan perubahan nilai. Lanjutkan?`)) {
                 
                activeClass.status_kunci = 'Belum Dikunci';
                 
                // Panggil renderGradesTable dengan flag false untuk menghindari pop-up saat buka kunci
                renderGradesTable(activeClass.mk_id, activeClass.id, false);
                 
                alert(`Kunci nilai untuk kelas ${activeClass.nama} berhasil dibuka! Anda sekarang dapat mengubah nilai.`);
            }
        }

        // FUNGSI INI: Telah disempurnakan responsivitasnya
        function renderGradesTable(mkId, kelasId, initialLoad = true) {
            dosenData.activeClassId = kelasId;
            const container = document.getElementById('nilaiTableContainer');
            const selectedMK = dosenData.mkDiajar.find(m => m.id === mkId);
            const selectedClass = dosenData.kelasDiajar.find(k => k.id === kelasId);
            
            if (!selectedMK || !selectedClass) {
                container.innerHTML = `<p class="container-card text-red-500">Data mata kuliah atau kelas tidak ditemukan.</p>`;
                return;
            }

            const statusKunci = selectedClass.status_kunci;
            const isLocked = statusKunci === 'Sudah Dikunci';
            
            const filteredGrades = dosenData.gradesInputData.filter(mhs => mhs.kelas_id === kelasId);

            // Generate rows for the table
            let tableRows = filteredGrades.map(mhs => {
                const nilaiAkhirValue = mhs.final_score > 0 ? mhs.final_score : (
                    (mhs.tugas * 0.20) + (mhs.kuis * 0.10) + (mhs.uts * 0.30) + (mhs.uas * 0.40)
                );
                const nilaiAkhir = parseFloat(nilaiAkhirValue).toFixed(2);
                const gradeLetter = mhs.grade_letter || konversiNilai(nilaiAkhirValue).huruf;
                const badgeClass = getGradeClass(gradeLetter);
                const disabled = isLocked ? 'disabled' : '';

                return `
                    <tr class="text-sm hover:bg-gray-50">
                        <td class="py-3 px-4 text-center">${mhs.nim}</td>
                        <td class="py-3 px-4 font-medium">${mhs.nama}</td>
                        <td class="py-3 px-2 input-nilai-cell"><input type="number" id="tugas-${mhs.nim}" value="${mhs.tugas}" onblur="hitungNilaiAkhirRow('${mhs.nim}')" ${disabled} min="0" max="100"></td>
                        <td class="py-3 px-2 input-nilai-cell"><input type="number" id="kuis-${mhs.nim}" value="${mhs.kuis}" onblur="hitungNilaiAkhirRow('${mhs.nim}')" ${disabled} min="0" max="100"></td>
                        <td class="py-3 px-2 input-nilai-cell"><input type="number" id="uts-${mhs.nim}" value="${mhs.uts}" onblur="hitungNilaiAkhirRow('${mhs.nim}')" ${disabled} min="0" max="100"></td>
                        <td class="py-3 px-2 input-nilai-cell"><input type="number" id="uas-${mhs.nim}" value="${mhs.uas}" onblur="hitungNilaiAkhirRow('${mhs.nim}')" ${disabled} min="0" max="100"></td>
                        <td class="py-3 px-4 text-center font-bold text-gray-700 whitespace-nowrap" id="final-score-${mhs.nim}">${nilaiAkhir}</td>
                        <td class="py-3 px-4 text-center whitespace-nowrap">
                            <span id="grade-letter-${mhs.nim}" class="text-xs font-bold px-2.5 py-1 rounded-full ${badgeClass}">${gradeLetter}</span>
                        </td>
                        <td class="py-3 px-4 text-center">
                            <button onclick="hitungNilaiAkhirRow('${mhs.nim}')" class="text-primary hover:text-purple-700 disabled:text-gray-400 p-1" ${disabled} title="Hitung Nilai"><i class="fas fa-calculator text-sm"></i></button>
                        </td>
                    </tr>
                `;
            }).join('');

            // Logika menampilkan Tombol Aksi Kunci / Buka Kunci (Dibuat Flex-Col di mobile)
            let actionButtons = '';
            if (isLocked) {
                 actionButtons = `
                     <button id="tombolBukaKunci" type="button" onclick="bukaKunciNilai()" class="bg-yellow-500 hover:bg-yellow-600 text-white font-semibold py-2 px-4 rounded-lg shadow-md hover:shadow-lg transition duration-300 w-full sm:w-auto">
                         <i class="fas fa-unlock mr-2"></i> Buka Kunci Nilai
                     </button>
                 `;
            } else {
                // Tombol Hitung Semua memanggil hitungSemuaNilai(true) untuk memunculkan pop-up
                actionButtons = `
                    <button id="tombolHitungSemua" type="button" onclick="hitungSemuaNilai(true)" class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded-lg shadow-md transition duration-300 w-full sm:w-auto">
                        <i class="fas fa-calculator mr-2"></i> <span class="hidden md:inline">Hitung Semua Otomatis</span><span class="inline md:hidden">Hitung</span>
                    </button>
                    <button id="tombolSimpan" type="button" onclick="simpanNilai()" class="bg-green-500 hover:bg-green-600 text-white font-semibold py-2 px-4 rounded-lg shadow-md transition duration-300 w-full sm:w-auto">
                        <i class="fas fa-save mr-2"></i> <span class="hidden md:inline">Simpan Nilai</span><span class="inline md:hidden">Simpan</span>
                    </button>
                    <button id="tombolKunci" type="button" onclick="kunciNilai()" class="action-btn-red text-white font-semibold py-2 px-4 rounded-lg shadow-md hover:shadow-lg transition duration-300 w-full sm:w-auto">
                        <i class="fas fa-lock mr-2"></i> <span class="hidden md:inline">Kunci Nilai</span><span class="inline md:hidden">Kunci</span>
                    </button>
                `;
            }

            const tableHTML = `
                <div class="container-card overflow-x-auto mb-6">
                    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center mb-4 border-b pb-3 space-y-3 sm:space-y-0">
                        <h2 class="text-xl font-bold text-gray-800">Input Nilai ${selectedMK.kode} (${selectedMK.nama}) - Kelas ${selectedClass.nama}</h2>
                        <div class="flex flex-col sm:flex-row space-y-2 sm:space-y-0 sm:space-x-3 w-full sm:w-auto">
                            ${actionButtons}
                        </div>
                    </div>
                    
                    ${isLocked ? '<p class="text-red-600 font-bold mb-4 p-3 bg-red-100 rounded-lg"><i class="fas fa-lock mr-2"></i> Nilai untuk kelas ini sudah dikunci dan tidak dapat diubah!</p>' : ''}

                    <div class="table-responsive overflow-x-auto pb-4"> 
                        <table class="min-w-full divide-y divide-gray-200 rounded-lg overflow-hidden border grade-table">
                            <thead>
                                <tr class="bg-gray-50 whitespace-nowrap">
                                    <th class="py-3 px-4 text-center">NIM</th>
                                    <th class="py-3 px-4">NAMA MAHASISWA</th>
                                    <th class="py-3 px-2 text-center mobile-hide">TUGAS (20%)</th>
                                    <th class="py-3 px-2 text-center mobile-hide">KUIS (10%)</th>
                                    <th class="py-3 px-2 text-center">UTS (30%)</th>
                                    <th class="py-3 px-2 text-center">UAS (40%)</th>
                                    <th class="py-3 px-4 text-center">NILAI AKHIR</th>
                                    <th class="py-3 px-4 text-center">GRADE</th>
                                    <th class="py-3 px-4 text-center">AKSI</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200 text-gray-700">
                                ${tableRows}
                            </tbody>
                        </table>
                    </div>
                    
                    <p class="mt-4 text-sm text-gray-600">
                        Bobot Nilai: Tugas (20%), Kuis (10%), UTS (30%), UAS (40%). Nilai akhir dihitung otomatis.
                    </p>
                    <button type="button" onclick="cetakLaporanNilai()" class="action-btn-primary text-white font-semibold py-2 px-4 rounded-lg shadow-md hover:shadow-lg transition duration-300 mt-4">
                        <i class="fas fa-print mr-2"></i> Cetak Laporan Nilai Kelas Ini
                    </button>
                </div>
            `;

            container.innerHTML = tableHTML;
            // Panggil hitungSemuaNilai dengan parameter false agar pop-up tidak muncul saat load tabel
            hitungSemuaNilai(false);
        }
        
        // FUNGSI: Mengisi dropdown kelas secara dinamis 
        function populateKelasDropdown() {
             const dropdown = document.getElementById('selectKelas');
             dropdown.innerHTML = ''; 

             // Mengambil daftar nama kelas unik (A, B, C)
             const uniqueClassNames = [...new Set(dosenData.kelasDiajar.map(kelas => kelas.nama))].sort();
             
             // Tambahkan opsi baru (Kelas A, Kelas B, Kelas C, dst.)
             uniqueClassNames.forEach(className => {
                 // Cari ID kelas pertama yang cocok dengan nama ini (misalnya: Kelas A -> K1)
                 const firstClass = dosenData.kelasDiajar.find(k => k.nama === className);
                 
                 const option = document.createElement('option');
                 option.value = firstClass.id; // Menggunakan ID kelas yang valid (K1, K2, K3)
                 option.textContent = `Kelas ${className}`; // Tampilkan "Kelas A", "Kelas B"
                 dropdown.appendChild(option);
             });
             
             // Jika dropdown kosong, tambahkan opsi default
             if(dropdown.options.length === 0) {
                 dropdown.innerHTML = '<option value="">-- Pilih Kelas --</option>';
             }
        }


        // --- FUNGSI MODAL CETAK LAPORAN ---
        
        function cetakLaporanNilai() {
            const modal = document.getElementById('khsModal');
            const modalContent = document.getElementById('khsModalContent');
            
            modal.classList.remove('hidden');
            modal.classList.add('flex', 'opacity-100');
            modalContent.classList.remove('scale-90');
            modalContent.classList.add('scale-100');
        }
        
        function closeModal() {
            const modal = document.getElementById('khsModal');
            const modalContent = document.getElementById('khsModalContent');
            
            modal.classList.add('opacity-0');
            modalContent.classList.remove('scale-100');
            modalContent.classList.add('scale-90');
            
            setTimeout(() => {
                modal.classList.remove('flex', 'opacity-100');
                modal.classList.add('hidden');
            }, 300); 
        }

        function downloadLaporan() {
            alert("Download Laporan Nilai PDF...");
            closeModal();
        }

        // --- INIT ---
        document.addEventListener('DOMContentLoaded', () => {
             // 1. ISI DROPDOWN KELAS
             populateKelasDropdown();
             
             // 2. Set event listener untuk tombol "Tampilkan Data"
             document.querySelector('#gradesView .flex.items-end button').onclick = () => {
                 const selectedMkId = document.getElementById('selectMK').value;
                 const selectedKelasId = document.getElementById('selectKelas').value;
                 // Panggil renderGradesTable dengan flag initialLoad=false karena ini dari tombol "Tampilkan Data"
                 renderGradesTable(selectedMkId, selectedKelasId, false);
             };
             
            // Set judul navbar secara default saat halaman dimuat
            document.getElementById('pageTitle').textContent = "Rekapitulasi Nilai";
             
            // Tampilkan default view saat halaman dimuat
            navigateTo('dashboardView'); 
        });
        
    </script>
</body>
</html>