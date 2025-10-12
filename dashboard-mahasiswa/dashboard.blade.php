<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Mahasiswa - Rekapitulasi Nilai</title>
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

    
    .action-btn-red {
        background-image: linear-gradient(to right, #f1948a 0%, #f1948a 51%, #f1948a 100%);
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

    
    .card-color-sks {
    color: #B7E4C7; 
    border-color: #B7E4C7;
    }

    
    .card-color-sem {
        color: #ed8d8d; 
        border-color: #ed8d8d; 
    }
.action-btn-red {
  background-color: #A276B8 !important; /* pakai !important biar menang dari Tailwind */
  transition: background-color 0.3s ease;
}

.action-btn-red:hover {
  background-color: #8b5fa4 !important;
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
                <span class="text-sm font-medium text-gray-600 hidden md:block">John Doe (NIM: 23.01.1000)</span>
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
                    <h3 class="text-lg font-semibold color-accent">MAHASISWA</h3>
                    <p class="text-xs text-gray-200">NIM: 23.01.1000</p> </div>
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
                                <i class="fas fa-list-alt mr-3"></i>
                                <span>Daftar Nilai</span>
                            </a>
                        </li>
                        <li>
                            <a href="#" onclick="cetakKHS(); return false;" class="flex items-center p-3 rounded-lg hover:bg-white hover:bg-opacity-10 text-white">
                                <i class="fas fa-print mr-3"></i>
                                <span>Cetak KHS (PDF)</span>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </aside>

        <div id="sidebarOverlay" class="fixed inset-0 bg-black bg-opacity-50 z-30 hidden md:hidden" onclick="closeSidebar()"></div>

        <main id="contentWrapper" class="flex-1 p-4 sm:p-6 overflow-y-auto w-full">
            
            <div id="dashboardView" class="view-content space-y-6">
                <h1 class="text-2xl font-bold text-gray-800 mb-4">Dashboard Mahasiswa</h1>
                <p class="text-gray-600 mb-6">Selamat datang, John Doe. Berikut adalah ringkasan progres studi Anda.</p>

                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 mb-8">
                    
                    <div class="grade-card bg-white p-5 border-l-4 border-primary">
                        <div class="flex items-center">
                            <div class="flex-shrink-0 mr-4 text-primary"><i class="fas fa-award text-3xl"></i></div>
                            <div>
                                <p class="text-sm font-medium text-gray-500">IPK Kumulatif</p>
                                <p class="text-2xl font-semibold text-gray-900" id="dashboard-ipk">3.85</p>
                            </div>
                        </div>
                    </div>

                   
                    <div class="grade-card bg-white p-5 border-l-4 card-color-sks">
                        <div class="flex items-center">
                            <div class="flex-shrink-0 mr-4 card-color-sks"><i class="fas fa-book-open text-3xl"></i></div>
                            <div>
                                <p class="text-sm font-medium text-gray-500">Total SKS Lulus</p>
                                <p class="text-2xl font-semibold text-gray-900">72</p>
                            </div>
                        </div>
                    </div>

                    
                    <div class="grade-card bg-white p-5 border-l-4" style="border-color: #f8c471;">
                        <div class="flex items-center">
                            <div class="flex-shrink-0 mr-4" style="color: #f8c471;"><i class="fas fa-graduation-cap text-3xl"></i></div>
                            <div>
                                <p class="text-sm font-medium text-gray-500">Mata Kuliah Diambil</p>
                                <p class="text-2xl font-semibold text-gray-900">20</p>
                            </div>
                        </div>
                    </div>

                   
                    <div class="grade-card bg-white p-5 border-l-4 card-color-sem">
                        <div class="flex items-center">
                            <div class="flex-shrink-0 mr-4 card-color-sem"><i class="fas fa-calendar-alt text-3xl"></i></div>
                            <div>
                                <p class="text-sm font-medium text-gray-500">Semester Aktif</p>
                                <p class="text-2xl font-semibold text-gray-700">Ganjil 2024/2025</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="grade-card bg-white rounded-xl overflow-hidden shadow-lg mb-8">
                    <div class="p-6 border-b flex flex-col sm:flex-row justify-between items-start sm:items-center space-y-3 sm:space-y-0">
                        <h2 class="text-xl font-semibold text-gray-800">Daftar Nilai Semester Ganjil 2024/2025 (Ringkas)</h2>
                        <button onclick="navigateTo('gradesView')" class="action-btn-primary text-white font-bold py-2 px-4 rounded-lg transition duration-150 shadow-md">
                            <i class="fas fa-list-alt mr-2"></i> Lihat Detail Nilai
                        </button>
                    </div>

                    <div class="table-responsive overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">No</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Kode MK</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Mata Kuliah</th>
                                    <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">SKS</th>
                                    <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Nilai Akhir</th>
                                    <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Grade</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-100">
                                </tbody>
                        </table>
                    </div>
                    <div class="p-6 bg-gray-50 text-sm text-gray-600 border-t rounded-b-xl">
                        <p>Klik **Lihat Detail Nilai** untuk melihat komponen nilai (Tugas, Kuis, UTS, UAS) dan menggunakan kalkulator.</p>
                    </div>
                </div>
            </div>

            <div id="gradesView" class="view-content space-y-6 max-w-full hidden">
                </div>

            <div id="khsModal" class="fixed inset-0 bg-gray-900 bg-opacity-70 hidden items-center justify-center z-50 transition-opacity duration-300 opacity-0">
                <div class="bg-white p-6 rounded-xl shadow-2xl max-w-sm w-full transform transition-all duration-300 scale-90" id="khsModalContent">
                    <h3 class="text-xl font-extrabold mb-3 text-pastel-red flex items-center"><i class="fas fa-file-pdf mr-3"></i> Konfirmasi Cetak KHS</h3>
                    <p class="text-gray-700 mb-4">Anda akan men-download Kartu Hasil Studi (KHS) dalam format PDF.</p>
                    <p class="text-sm text-pastel-red-dark bg-pastel-red-light p-3 rounded-lg mb-4 border border-pastel-red-light flex items-center">
                         <i class="fas fa-exclamation-triangle mr-2"></i>
                         Penting: Pastikan pembayaran sudah lunas dan nilai sudah dikunci Dosen.
                   </p>
                    <div class="flex justify-end space-x-3 mt-4">
                        <button onclick="closeModal()" class="bg-gray-200 hover:bg-gray-300 text-gray-700 font-semibold py-2 px-4 rounded-lg transition duration-150 shadow-md">Batal</button>
                        <button onclick="downloadKHS();" class="action-btn-red text-white font-semibold py-2 px-4 rounded-lg transition duration-150 shadow-md">Download KHS</button>
                    </div>
                </div>
            </div>
        </main>
    </div>

    <script>
        
        const summaryData = {
            ipkKumulatif: 3.48, 
            totalSks: 9, 
            ipsSemester: 3.48, 
            currentSemester: 'Ganjil 2024/2025'
        };

        const gradesData = [
            { no: 1, course_code: 'TIF301', course_name: 'Struktur Data Lanjut', sks: 4, tugas: 90, kuis: 80, uts: 85, uas: 92, final_score: 89.4, grade_letter: 'A' },
            { no: 2, course_code: 'IND305', course_name: 'Kewirausahaan Digital', sks: 3, tugas: 75, kuis: 85, uts: 70, uas: 80, final_score: 76.5, grade_letter: 'B' },
            { no: 3, course_code: 'MTK303', course_name: 'Kalkulus Lanjut', sks: 2, tugas: 60, kuis: 50, uts: 55, uas: 60, final_score: 58.0, grade_letter: 'D' },
            { no: 4, course_code: 'FIS102', course_name: 'Fisika Dasar', sks: 3, tugas: 40, kuis: 30, uts: 40, uas: 40, final_score: 39.0, grade_letter: 'E' },
            { no: 5, course_code: 'AGM401', course_name: 'Pendidikan Agama', sks: 2, tugas: 95, kuis: 90, uts: 88, uas: 90, final_score: 90.0, grade_letter: 'A' },
            { no: 6, course_code: 'ENG201', course_name: 'Bahasa Inggris II', sks: 2, tugas: 70, kuis: 65, uts: 60, uas: 75, final_score: 68.0, grade_letter: 'C' },
        ];


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
            
            let title = "Rekapitulasi Nilai"; 
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
                renderDashboardGrades();
            }
            if (viewId === 'gradesView') {
                renderGradesView();
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

        function getGradeClass(gradeLetter) {
    switch (gradeLetter) {
        case 'A':
        case 'B':
        case 'B+':
            return { rowClass: 'grade-highlight-ab', textColor: 'text-green-300' }; 
        case 'C':
        case 'C+':
            return { rowClass: 'grade-highlight-c', textColor: 'text-yellow-400' }; 
        case 'D':
            return { rowClass: 'grade-highlight-d', textColor: 'text-amber-300' };
        case 'E':
            return { rowClass: 'grade-highlight-de', textColor: 'text-red-300' }; 
        default:
            return { rowClass: 'hover:bg-gray-50', textColor: 'text-gray-700' };
    }
}

        function renderDashboardGrades() {
             const tbody = document.querySelector('#dashboardView .min-w-full tbody');
             if (!tbody) return;
             
             const limitedData = gradesData.slice(0, 3);
             
             let rowsHtml = limitedData.map(grade => {
                 const { rowClass, textColor } = getGradeClass(grade.grade_letter);
                 const finalScore = grade.final_score !== undefined ? grade.final_score.toFixed(1) : '-';
                 
                 let badgeClass = '';
                 if (grade.grade_letter === 'A' || grade.grade_letter === 'B' || grade.grade_letter === 'B+') {
                     badgeClass = 'bg-green-200 text-green-600'; 
                 } else if (grade.grade_letter === 'C' || grade.grade_letter === 'C+') {
                     badgeClass = 'bg-yellow-200 text-yellow-600'; 
                 } else if (grade.grade_letter === 'D' || grade.grade_letter === 'E') {
                     badgeClass = 'bg-amber-200 text-amber-600'; 
                 }

                 return `
                     <tr class="${rowClass}">
                         <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">${grade.no}</td>
                         <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">${grade.course_code}</td>
                         <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 font-semibold">${grade.course_name}</td>
                         <td class="px-6 py-4 whitespace-nowrap text-sm text-center">${grade.sks}</td>
                         <td class="px-6 py-4 whitespace-nowrap text-sm text-center font-bold ${textColor}">${finalScore}</td>
                         <td class="px-6 py-4 whitespace-nowrap text-sm text-center"><span class="${badgeClass} text-xs font-bold px-2.5 py-1 rounded-full">${grade.grade_letter}</span></td>
                     </tr>
                 `;
             }).join('');
             
             tbody.innerHTML = rowsHtml;
        }

        function renderGradesView() {
            const container = document.getElementById('gradesView');
            container.innerHTML = '';
            
            const summaryHTML = `
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">
                    <div class="container-card border-l-4" style="background-color: #f4f2f7; border-color: #A276B8;">
                        <p class="text-sm text-primary font-semibold">IPK Kumulatif</p>
                        <h3 class="text-3xl font-extrabold text-primary mt-1">${summaryData.ipkKumulatif.toFixed(2)}</h3>
                    </div>
                    <div class="container-card border-l-4" style="background-color: #fff8f0; border-color: #f8c471;">
                        <p class="text-sm" style="color: #f8c471; font-weight: 600;">Total SKS Semester</p>
                        <h3 class="text-3xl font-extrabold" style="color: #f8c471; opacity: 0.9;">${gradesData.reduce((sum, grade) => sum + grade.sks, 0)}</h3>
                    </div>
                    <div class="container-card bg-green-50 border-l-4 border-green-600">
                        <p class="text-sm text-green-700 font-semibold">IPS Semester Saat Ini</p>
                        <h3 class="text-3xl font-extrabold text-green-900 mt-1">${summaryData.ipsSemester.toFixed(2)}</h3>
                    </div>
                </div>
            `;

            
            let tableRows = gradesData.map(grade => {
                const { rowClass, textColor } = getGradeClass(grade.grade_letter);
                const finalScore = grade.final_score !== undefined ? grade.final_score.toFixed(2) : '-';
                
                return `
                    <tr class="${rowClass} text-sm hover:opacity-80 transition duration-100">
                        <td class="py-3 px-4 text-center">${grade.no}</td>
                        <td class="py-3 px-4 font-medium">${grade.course_code}</td>
                        <td class="py-3 px-4">${grade.course_name}</td>
                        <td class="py-3 px-4 text-center">${grade.sks}</td>
                        <td class="py-3 px-4 text-center">${grade.tugas ?? '-'}</td>
                        <td class="py-3 px-4 text-center">${grade.kuis ?? '-'}</td>
                        <td class="py-3 px-4 text-center">${grade.uts ?? '-'}</td>
                        <td class="py-3 px-4 text-center">${grade.uas ?? '-'}</td>
                        <td class="py-3 px-4 text-center font-bold ${finalScore === '-' ? 'text-gray-400' : textColor}">
                            ${finalScore}
                        </td>
                        <td class="py-3 px-4 text-center font-bold ${textColor}">
                            ${grade.grade_letter ?? '-'}
                        </td>
                    </tr>
                `;
            }).join('');

            if (gradesData.length === 0) {
                 tableRows = `<tr><td colspan="10" class="text-center py-6 text-gray-500 font-medium">
                                 <i class="fas fa-info-circle mr-2"></i> Belum ada data nilai untuk semester ini.
                               </td></tr>`;
            }

            const tableHTML = `
                <div class="container-card overflow-x-auto mb-6">
                    <div class="flex justify-between items-center mb-4 border-b pb-3">
                        <h2 class="text-xl font-bold text-gray-800">Daftar Nilai Lengkap Semester ${summaryData.currentSemester}</h2>
                        <button type="button" onclick="cetakKHS()" class="action-btn-red text-white font-semibold py-2 px-4 rounded-lg shadow-md hover:shadow-lg transition duration-300">
                            <i class="fas fa-file-pdf mr-2"></i> Cetak KHS
                        </button>
                    </div>

                    <div class="table-responsive">
                        <table class="min-w-full divide-y divide-gray-200 rounded-lg overflow-hidden border grade-table">
                            <thead>
                                <tr>
                                    <th class="py-3 px-4 text-center">NO</th>
                                    <th class="py-3 px-4">KODE MK</th>
                                    <th class="py-3 px-4">MATA KULIAH</th>
                                    <th class="py-3 px-4 text-center">SKS</th>
                                    <th class="py-3 px-4 text-center">TUGAS (20%)</th>
                                    <th class="py-3 px-4 text-center">KUIS (10%)</th>
                                    <th class="py-3 px-4 text-center">UTS (30%)</th>
                                    <th class="py-3 px-4 text-center">UAS (40%)</th>
                                    <th class="py-3 px-4 text-center">NILAI AKHIR</th>
                                    <th class="py-3 px-4 text-center">GRADE</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200 text-gray-700">
                                ${tableRows}
                            </tbody>
                        </table>
                    </div>
                    
                    <p class="mt-4 text-sm text-gray-600">
                        **Keterangan Bobot Nilai:** Tugas (20%), Kuis (10%), UTS (30%), UAS (40%).
                    </p>
                </div>
            `;

            const calculatorHTML = `
                <div class="container-card">
                    <h2 class="text-xl font-bold text-gray-800 mb-4 border-b pb-2">Kalkulator Prediksi Nilai Akhir</h2>
                    
                    <div class="space-y-4">
                        <div class="grid grid-cols-2 md:grid-cols-5 gap-4">
                            <input type="number" id="nilaiTugas" placeholder="Tugas (20%)" class="w-full p-3 border border-gray-300 rounded-lg focus:ring-primary focus:border-primary" min="0" max="100">
                            <input type="number" id="nilaiKuis" placeholder="Kuis (10%)" class="w-full p-3 border border-gray-300 rounded-lg focus:ring-primary focus:border-primary" min="0" max="100">
                            <input type="number" id="nilaiUTS" placeholder="UTS (30%)" class="w-full p-3 border border-gray-300 rounded-lg focus:ring-primary focus:border-primary" min="0" max="100">
                            <input type="number" id="nilaiUAS" placeholder="UAS (40%)" class="w-full p-3 border border-gray-300 rounded-lg focus:ring-primary focus:border-primary" min="0" max="100">
                           <button onclick="hitungNilaiAkhir()" 
                                class="w-full bg-green-400 text-white p-3 rounded-lg font-semibold hover:bg-green-400 transition duration-150 shadow-md">
                                <i class="fas fa-calculator"></i> Hitung
                            </button>

                        </div>
                    </div>

                    <div id="hasilKalkulasi" class="mt-6 p-4 bg-gray-100 rounded-xl border border-gray-200">
                        <h3 class="text-lg font-bold text-primary mb-2">Hasil Prediksi:</h3>
                        <p id="hasilAngka" class="text-gray-700 font-medium">Nilai Angka: -</p>
                        <p id="hasilHuruf" class="text-gray-700 font-medium">Nilai Huruf: -</p>
                        <p id="hasilKeterangan" class="mt-2 text-sm font-semibold hidden"></p>
                    </div>
                </div>
            `;

            container.innerHTML = summaryHTML + tableHTML + calculatorHTML;
        }


        function konversiNilai(nilaiAngka) {
            if (nilaiAngka >= 85) return { huruf: 'A', bobot: 4.00 };
            if (nilaiAngka >= 80) return { huruf: 'B+', bobot: 3.50 };
            if (nilaiAngka >= 75) return { huruf: 'B', bobot: 3.00 };
            if (nilaiAngka >= 70) return { huruf: 'C+', bobot: 2.50 };
            if (nilaiAngka >= 60) return { huruf: 'C', bobot: 2.00 };
            if (nilaiAngka >= 50) return { huruf: 'D', bobot: 1.00 };
            return { huruf: 'E', bobot: 0.00 };
        }

        function hitungNilaiAkhir() {
            const tugas = parseFloat(document.getElementById('nilaiTugas').value) || 0;
            const kuis = parseFloat(document.getElementById('nilaiKuis').value) || 0;
            const uts = parseFloat(document.getElementById('nilaiUTS').value) || 0;
            const uas = parseFloat(document.getElementById('nilaiUAS').value) || 0;

            const bobotTugas = 0.20;
            const bobotKuis = 0.10;
            const bobotUTS = 0.30;
            const bobotUAS = 0.40;

            const inputs = [tugas, kuis, uts, uas];
            for (const val of inputs) {
                if (val < 0 || val > 100) {
                    document.getElementById('hasilAngka').textContent = 'Nilai Angka: Input harus antara 0-100!';
                    document.getElementById('hasilHuruf').textContent = 'Nilai Huruf: -';
                    document.getElementById('hasilKeterangan').classList.add('hidden');
                    return;
                }
            }

            let nilaiAkhir = 
                (tugas * bobotTugas) + 
                (kuis * bobotKuis) +
                (uts * bobotUTS) + 
                (uas * bobotUAS);

            nilaiAkhir = parseFloat(nilaiAkhir.toFixed(2));

            const hasilKonversi = konversiNilai(nilaiAkhir);

            document.getElementById('hasilAngka').textContent = `Nilai Angka: ${nilaiAkhir}`;
            document.getElementById('hasilHuruf').textContent = `Nilai Huruf: ${hasilKonversi.huruf}`;

            const hasilKeterangan = document.getElementById('hasilKeterangan');
            hasilKeterangan.classList.remove(
            'hidden',
            'text-green-400',
            'text-yellow-400',
            'text-amber-300',
            'text-red-400'
            );

            if (hasilKonversi.huruf === 'E') {
                hasilKeterangan.textContent = `❌ PERHATIAN: Nilai ${hasilKonversi.huruf} - Mata kuliah ini HARUS diulang!`;
                hasilKeterangan.classList.add('text-red-400'); 
            } else if (hasilKonversi.huruf === 'D') {
                hasilKeterangan.textContent = `⚠️ Nilai ${hasilKonversi.huruf} - Risiko tinggi tidak lulus. Segera lakukan perbaikan atau konsultasi dengan dosen!`;
                hasilKeterangan.classList.add('text-amber-400');
            } else if (hasilKonversi.huruf === 'C') {
                hasilKeterangan.textContent = `ℹ️ Nilai ${hasilKonversi.huruf} - Masih aman, tetapi disarankan meningkatkan belajar.`;
                hasilKeterangan.classList.add('text-yellow-400');
            } else {
                hasilKeterangan.textContent = `✅ Prediksi Nilai: ${hasilKonversi.huruf} - Sudah Aman.`;
                hasilKeterangan.classList.add('text-green-400');
            }

        }

        function cetakKHS() {
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

        function downloadKHS() {
            alert("Download KHS PDF...");
            closeModal();
        }

   

        document.addEventListener('DOMContentLoaded', () => {
            navigateTo('dashboardView'); 
        });
        
    </script>
</body>
</html>