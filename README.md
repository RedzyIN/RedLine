donorasi/
├── public/                         # Document root
│   ├── index.php                   # Landing page
│   ├── .htaccess                   # Rewrite URL & blokir akses file sensitif
│   ├── auth/
│   │   ├── login.php
│   │   ├── register-donor.php
│   │   ├── register-institution.php   # RS / penyelenggara (status pending)
│   │   ├── verify-email.php
│   │   ├── forgot-password.php
│   │   └── logout.php
│   ├── donor/
│   │   ├── dashboard.php
│   │   ├── requests.php            # Permintaan darurat yang cocok
│   │   ├── events.php / event-detail.php
│   │   ├── tickets.php             # QR tiket
│   │   ├── history.php
│   │   └── profile.php
│   ├── hospital/
│   │   ├── dashboard.php
│   │   ├── stock/                  # index.php, update.php, history.php
│   │   ├── requests/               # index.php, form.php, detail.php
│   │   ├── scan.php                # Scan QR + skrining + catat donasi
│   │   ├── events/                 # daftar & persetujuan event mitra
│   │   ├── donations/              # riwayat
│   │   ├── reports/                # index.php, export-pdf.php, export-excel.php
│   │   ├── staff/
│   │   └── settings/
│   ├── organizer/
│   │   ├── dashboard.php
│   │   ├── events/                 # index.php, form.php, slots.php
│   │   ├── registrants/            # index.php, checkin.php
│   │   ├── reports/
│   │   └── profile.php
│   ├── superadmin/
│   │   ├── verifications.php
│   │   ├── users.php
│   │   ├── reports-abuse.php
│   │   ├── stats.php
│   │   ├── rules.php               # jeda donor, batas umur/berat, dst.
│   │   └── audit-log.php
│   ├── api/
│   │   ├── public/                 # stock-summary.php, events-list.php
│   │   ├── donor/                  # respond-request.php, register-event.php, notifications.php
│   │   ├── hospital/               # stock-update.php, request-create.php, scan-verify.php, donation-record.php
│   │   └── organizer/              # event-save.php, checkin.php
│   └── assets/
│       ├── css/                    # input.css, output.css (build Tailwind)
│       ├── js/                     # app.js, charts.js, scanner.js, map.js
│       └── img/
├── app/
│   ├── config/                     # app.php, database.php, rules.php
│   ├── core/                       # Database, Auth, Session, Csrf, Tenant, Validator, Response, RateLimiter
│   ├── middleware/                 # require_login.php, require_role.php, require_verified.php
│   ├── models/                     # User, DonorProfile, Hospital, Organizer, BloodStock,
│   │                               # BloodRequest, Event, Registration, Donation, Notification
│   ├── services/                   # MatchingService, EligibilityService, NotificationService,
│   │                               # StockService, ReportService, ExportService, QrService, MailService
│   └── views/
│       ├── layouts/                # landing, donor, hospital, organizer, superadmin
│       └── partials/               # sidebar per peran, navbar, flash, stock-card
├── cron/                           # expire_requests.php, stale_stock.php, reminders.php
├── database/                       # schema.sql, seed.sql
├── storage/                        # logs/, cache/, exports/
├── tailwind.config.js
├── package.json
├── composer.json
├── .env                            # Kredensial DB, SMTP (jangan di-commit)
└── README.md