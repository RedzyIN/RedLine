<?php
/**
 * Dummy data untuk pengembangan frontend RedLine.
 * Pemakaian: $dummy = require __DIR__ . '/../../app/data/dummy.php';
 * Nanti diganti dengan query ke database (model).
 */

return [
    'blood_stock' => [
        ['type' => 'A+',  'amount' => 42, 'status' => 'aman',     'updated' => '2026-10-04 08:30'],
        ['type' => 'A-',  'amount' => 6,  'status' => 'kritis',   'updated' => '2026-10-04 08:30'],
        ['type' => 'B+',  'amount' => 35, 'status' => 'aman',     'updated' => '2026-10-04 08:30'],
        ['type' => 'B-',  'amount' => 9,  'status' => 'menipis',  'updated' => '2026-10-03 16:10'],
        ['type' => 'AB+', 'amount' => 14, 'status' => 'menipis',  'updated' => '2026-10-03 16:10'],
        ['type' => 'AB-', 'amount' => 3,  'status' => 'kritis',   'updated' => '2026-10-02 11:45'],
        ['type' => 'O+',  'amount' => 58, 'status' => 'aman',     'updated' => '2026-10-04 08:30'],
        ['type' => 'O-',  'amount' => 8,  'status' => 'menipis',  'updated' => '2026-10-04 07:55'],
    ],
    'hospitals' => [
        ['id' => 1, 'name' => 'RSUP Dr. Wahidin Sudirohusodo', 'city' => 'Makassar', 'phone' => '0411-584677', 'verified' => true],
        ['id' => 2, 'name' => 'RS Stella Maris',                'city' => 'Makassar', 'phone' => '0411-854341', 'verified' => true],
        ['id' => 3, 'name' => 'UTD PMI Kota Makassar',          'city' => 'Makassar', 'phone' => '0411-872340', 'verified' => true],
        ['id' => 4, 'name' => 'RS Ibnu Sina',                   'city' => 'Makassar', 'phone' => '0411-452901', 'verified' => false],
    ],
    'blood_requests' => [
        [
            'id' => 101, 'hospital_id' => 1, 'hospital' => 'RSUP Dr. Wahidin Sudirohusodo',
            'blood_type' => 'A-', 'needed' => 4, 'fulfilled' => 1,
            'patient' => 'Pasien pasca operasi', 'urgency' => 'tinggi',
            'deadline' => '2026-10-05 12:00', 'status' => 'aktif',
        ],
        [
            'id' => 102, 'hospital_id' => 2, 'hospital' => 'RS Stella Maris',
            'blood_type' => 'O-', 'needed' => 2, 'fulfilled' => 0,
            'patient' => 'Pasien kecelakaan', 'urgency' => 'tinggi',
            'deadline' => '2026-10-04 20:00', 'status' => 'aktif',
        ],
        [
            'id' => 103, 'hospital_id' => 3, 'hospital' => 'UTD PMI Kota Makassar',
            'blood_type' => 'AB-', 'needed' => 3, 'fulfilled' => 3,
            'patient' => 'Pasien thalassemia', 'urgency' => 'sedang',
            'deadline' => '2026-10-03 17:00', 'status' => 'terpenuhi',
        ],
        [
            'id' => 104, 'hospital_id' => 1, 'hospital' => 'RSUP Dr. Wahidin Sudirohusodo',
            'blood_type' => 'B-', 'needed' => 2, 'fulfilled' => 0,
            'patient' => 'Pasien persalinan', 'urgency' => 'sedang',
            'deadline' => '2026-09-30 09:00', 'status' => 'kedaluwarsa',
        ],
    ],
    'events' => [
        [
            'id' => 1, 'title' => 'Donor Darah Kampus Merah Putih',
            'organizer' => 'BEM Fakultas Teknik', 'location' => 'Aula Fakultas Teknik',
            'date' => '2026-10-10', 'time' => '08:00 - 14:00',
            'quota' => 100, 'registered' => 64, 'status' => 'terbuka',
        ],
        [
            'id' => 2, 'title' => 'Aksi Donor HUT PMI',
            'organizer' => 'PMI Kota Makassar', 'location' => 'Lapangan Karebosi',
            'date' => '2026-10-17', 'time' => '07:30 - 12:00',
            'quota' => 250, 'registered' => 250, 'status' => 'penuh',
        ],
        [
            'id' => 3, 'title' => 'Donor Darah Komunitas Peduli',
            'organizer' => 'Komunitas Peduli Sesama', 'location' => 'Mall Panakkukang',
            'date' => '2026-10-24', 'time' => '10:00 - 16:00',
            'quota' => 80, 'registered' => 12, 'status' => 'terbuka',
        ],
    ],
    'donors' => [
        ['id' => 1, 'name' => 'Andi Pratama',    'blood_type' => 'O+',  'city' => 'Makassar', 'total_donations' => 7, 'last_donation' => '2026-07-12', 'eligible' => true],
        ['id' => 2, 'name' => 'Siti Nurhaliza',  'blood_type' => 'A-',  'city' => 'Gowa',     'total_donations' => 3, 'last_donation' => '2026-09-20', 'eligible' => false],
        ['id' => 3, 'name' => 'Budi Santoso',    'blood_type' => 'B+',  'city' => 'Makassar', 'total_donations' => 12, 'last_donation' => '2026-06-01', 'eligible' => true],
        ['id' => 4, 'name' => 'Rini Aulia',      'blood_type' => 'AB-', 'city' => 'Maros',    'total_donations' => 1, 'last_donation' => null,         'eligible' => true],
    ],
    'donation_history' => [
        ['date' => '2026-07-12', 'place' => 'UTD PMI Kota Makassar',          'blood_type' => 'O+', 'volume' => '350 ml'],
        ['date' => '2026-03-08', 'place' => 'Donor Darah Kampus Merah Putih', 'blood_type' => 'O+', 'volume' => '350 ml'],
        ['date' => '2025-11-22', 'place' => 'RS Stella Maris',                'blood_type' => 'O+', 'volume' => '350 ml'],
    ],
    'tickets' => [
        ['code' => 'RL-2610-0042', 'event' => 'Donor Darah Kampus Merah Putih', 'date' => '2026-10-10', 'slot' => '09:00', 'status' => 'aktif'],
        ['code' => 'RL-2609-0017', 'event' => 'Donor Darah Komunitas Peduli',   'date' => '2026-09-12', 'slot' => '11:00', 'status' => 'terpakai'],
    ],
    'notifications' => [
        ['id' => 1, 'message' => 'Permintaan darurat golongan A- di RSUP Wahidin cocok untukmu.', 'time' => '10 menit lalu', 'read' => false],
        ['id' => 2, 'message' => 'Event "Donor Darah Kampus Merah Putih" dimulai 6 hari lagi.',    'time' => '2 jam lalu',     'read' => false],
        ['id' => 3, 'message' => 'Kamu sudah bisa donor lagi mulai hari ini.',                      'time' => 'Kemarin',        'read' => true],
    ],
    'verifications' => [
        ['id' => 1, 'name' => 'RS Ibnu Sina',            'type' => 'Rumah Sakit', 'submitted' => '2026-10-01', 'status' => 'pending'],
        ['id' => 2, 'name' => 'Komunitas Peduli Sesama', 'type' => 'Penyelenggara', 'submitted' => '2026-09-28', 'status' => 'disetujui'],
        ['id' => 3, 'name' => 'Yayasan Donor Nusantara', 'type' => 'Penyelenggara', 'submitted' => '2026-09-25', 'status' => 'ditolak'],
    ],
];