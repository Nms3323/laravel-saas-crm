# Laravel SaaS CRM Platform

Production-ready SaaS CRM built with Laravel 11, designed using clean architecture and real-world business workflows.

## 🚀 Key Highlights
- Multi-role authentication (Admin, Manager, Agent)
- Modular architecture (Domain-based)
- Advanced role & permission system (Spatie)
- Real-time notifications
- Activity & audit logs (observer-based)

- Optimized for performance and scalability

## 🏗 Architecture
- Laravel 11
- Service & Repository pattern
- Policy-based authorization
- Event-driven design

## 🔐 Demo Access
Admin: admin@demo.com / Admin@123  
Manager: manager@demo.com / Manager@123  
Agent: agent@demo.com / Agent@123

## 🔁 Business Workflow
Lead → Assignment → Status Update → Notification → Conversion → Invoice

## 🧰 Tech Stack
- Backend: Laravel 11
- Database: MySQL
- Frontend: Blade + Bootstrap (or your frontend stack)
- Auth: Laravel Sanctum
- Permissions: Spatie Laravel Permission

## 📦 Modules
- Authentication & Authorization
- CRM Management (Leads, Pipeline)
- Invoice & Payments
- Notifications
- Reports & Analytics

## ⚡ Performance
- Query optimization
- Indexing strategies
- Caching support

## 🧪 Testing
- Feature tests
- API tests

## 📄 Installation (local)
```bash
git clone https://github.com/username/laravel-saas-crm
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate --seed
php artisan serve
```

---

## ✅ What I included (scaffold)
- Project skeleton: `app/Modules`, `Services/`, `Repositories/`, `Policies/`, `Observers/`
- Seeds and migrations for demo users, leads and invoices
- `.env.example` with placeholders and demo creds
- Dockerfile and `docker-compose.yml` stubs to run locally
- GitHub Actions CI stub (`.github/workflows/ci.yml`)

---

If you want, I can now:
1. Wire up Sanctum + Spatie permissions and example policies
2. Add feature flows (Lead → Assign → Notify → Convert → Invoice)
3. Add more tests and CI checks (PHPStan, Psalm)

---

## ⚡ Quick-start & dev helpers
Use the included Makefile or quickstart scripts to run the demo locally quickly.

- Make (Linux/macOS/WSL):

```bash
make demo       # composer install, migrate, seed, serve
make docker-up  # docker-compose up -d --build
make analyse    # run PHPStan
make psalm      # run Psalm
```

- Quickstart (bash):

```
./bin/quickstart      # installs deps, sets .env, migrates + seeds, serves app
```

- Quickstart (PowerShell on Windows):

```
./bin/quickstart.ps1 -Serve
```

Tell me which of the remaining items you want next and I’ll continue.

---

## ⚙️ Static analysis baselines & auto-fix
To reduce noise in CI we generate baselines and attempt safe automatic fixes for high-severity issues.

- Generate baselines locally:

```bash
make baseline-phpstan
make baseline-psalm
```

- Attempt automatic fixes (Psalm/CS-Fixer/Rector):

```bash
make fix-static
```

- Manually review Rector output before applying (the script runs Rector in dry-run by default).

- CI includes a manual workflow to generate and commit baselines (`.github/workflows/baseline.yml`).