# ChildShield Project Overview (Frontend-Friendly)

## 1) What this project does (step-by-step flow)

ChildShield is a Laravel + Blade web app for reporting child-safety incidents and tracking case progress.

### Step 1: Visitor opens public website
- Route: `/` (`HomeController@index`)
- Visitor sees landing page, impact stats, FAQ, quick links.
- Other public pages: `/about`, `/contact`, `/privacy`, `/terms`.

### Step 2: User creates account or logs in
- Auth routes come from `routes/auth.php` (Laravel Breeze style).
- Features available: register, login, forgot password, reset password, email verification, logout.

### Step 3: Logged-in user opens dashboard
- Route: `/dashboard` (`DashboardController@index`).
- If user role is `admin`, auto-redirect to admin dashboard.
- Normal user sees:
  - report counts by status,
  - recent reports,
  - unread notifications.

### Step 4: User submits a new report
- Route: `reports.store` (`ReportController@store`) with form in `resources/views/reports/_form.blade.php`.
- Required report details: age, gender, location, description, contact, image proof.
- Validation + input cleaning handled in `StoreReportRequest`.
- Image uploaded to `storage/app/public/reports`.
- Status auto-set to `pending`.

### Step 5: User manages own reports
- CRUD routes from `Route::resource('reports', ReportController::class)`.
- User can list, view, edit, delete own reports.
- Ownership check in `authorizeOwner()` blocks unauthorized access.

### Step 6: Admin reviews and updates reports
- Admin routes under `/admin/*`, protected by `auth` + `admin` middleware.
- Admin can:
  - see global dashboard,
  - filter/search all reports,
  - open a case,
  - change status (`pending/under_review/verified/resolved/rejected`),
  - add admin remark,
  - delete report.

### Step 7: Notification is sent to user
- Service: `CaseNotificationService`.
- On report submission or status update, system:
  - creates DB notification record (`notifications` table),
  - sends email using `SystemNotificationMail`.

### Step 8: User reads notification history
- Route: `/notifications` (`NotificationController@index`).
- User can mark notification as read or delete it.

### Step 9: Optional API usage
- API routes under `/api/v1/reports` (still session auth + web middleware).
- Supports list, create, status update, delete via JSON endpoints.

---

## 2) Feature-by-feature explanation (what it is + how implemented)

## Feature A: Public informational pages
**Use:** Explain project mission and guide new users.

**How implemented:**
- Routes in `routes/web.php`.
- Controller methods in `HomeController`.
- Blade templates: `home.blade.php`, `about.blade.php`, `contact.blade.php`, `privacy.blade.php`, `terms.blade.php`.

## Feature B: Contact form with email
**Use:** Visitors can send enquiry/support request.

**How implemented:**
- Form posts to `contact.send` route.
- Validation in `ContactFormRequest`.
- `HomeController@sendContact` sends mail via `SystemNotificationMail`.

## Feature C: Authentication and account access
**Use:** Securely identify users before allowing report actions.

**How implemented:**
- Auth routes in `routes/auth.php`.
- Standard Laravel auth controllers (login/register/reset/verify).
- Guest users are redirected by custom `EnsureUserIsGuest` middleware.

## Feature D: Role-based admin access
**Use:** Only admins can see management tools.

**How implemented:**
- `users` table has `role` column (`add_role_to_users_table` migration).
- `User::isAdmin()` checks role.
- `EnsureUserIsAdmin` middleware enforces admin-only routes.
- Middleware alias configured in `bootstrap/app.php`.

## Feature E: Report creation and evidence upload
**Use:** Capture incident details and proof.

**How implemented:**
- Form component in `reports/_form.blade.php`.
- Validation in `StoreReportRequest` (`image`, age range, gender, description length, etc.).
- Sanitization in `prepareForValidation()` using `trim` + `strip_tags`.
- Image file saved via `store('reports', 'public')`.

## Feature F: Report lifecycle management
**Use:** Track case progress from pending to resolution/rejection.

**How implemented:**
- `Report` model defines status constants and `statuses()` map.
- Admin updates status in `AdminController@updateStatus`.
- User and admin UIs show color-coded status pills in Blade.

## Feature G: User report CRUD
**Use:** User can manage their own case submissions.

**How implemented:**
- Resource controller methods: index/create/store/show/edit/update/destroy.
- Ownership check in `ReportController@authorizeOwner()`.
- On update, old image file deleted if replaced.

## Feature H: Admin report management panel
**Use:** Operational control center for all reports.

**How implemented:**
- `AdminController@index`, `reports`, `show`, `updateStatus`, `destroy`.
- Search/filter uses `Report::scopeSearch()` + optional status filter.
- Pagination in admin list view.
- Monthly chart rendered in Blade using Chart.js CDN.

## Feature I: In-app + email notifications
**Use:** Keep reporters informed automatically.

**How implemented:**
- `CaseNotificationService::notify()` creates `SystemNotification` DB record.
- Sends `SystemNotificationMail` to user email.
- Trigger points:
  - after report creation,
  - after admin status update.

## Feature J: Notification inbox for users
**Use:** Central place for updates and follow-ups.

**How implemented:**
- `NotificationController@index/markRead/destroy`.
- Ownership protection before read/delete.
- Blade page: `notifications/index.blade.php`.

## Feature K: API endpoints for reports
**Use:** Mobile app / external client integration.

**How implemented:**
- `routes/api.php` under `/v1` prefix.
- `Api\ReportController` returns JSON responses.
- Reuses request validation and report model.

## Feature L: Basic automated testing
**Use:** Ensure key flows keep working.

**How implemented:**
- Pest tests in `tests/Feature/*`.
- Examples include:
  - public pages render,
  - report submission works,
  - admin route access control works.

---

## 3) If you are frontend-focused: what to read first

1. `resources/views/layouts/master.blade.php` (global layout concept)
2. `resources/views/home.blade.php` (landing structure)
3. `resources/views/reports/_form.blade.php` (form UI + validation message rendering)
4. `resources/views/dashboard.blade.php` (data-driven UI cards/tables)
5. `resources/views/admin/*.blade.php` (admin UX patterns)

Think of Blade like HTML templates with server-side variables, loops, and conditions.

---

## 4) Important practical notes from current code

- File uploads are stored on Laravel `public` disk (`storage/app/public/...`).
- Code includes input sanitization using `strip_tags` in report requests.
- Notification emails are sent synchronously (`Mail::send`), not queued.
- API routes use session auth middleware (`web`, `auth`), not token auth.
- Some marketing text mentions encryption/offline capabilities, but explicit encryption/offline-sync logic is not implemented in this repository code.

---

## 5) Viva questions for Blade and PHP

## A) Blade Viva Questions
1. What is Blade, and how is it different from plain PHP templates?
2. What is the role of `@extends` and `@section` in a Blade view?
3. Why do we use `{{ }}` instead of `{!! !!}` in most cases?
4. What does `@csrf` protect against?
5. How does `@method('PATCH')` work in HTML forms?
6. What is the purpose of `@forelse` compared to `@foreach`?
7. How does `@auth` / `@else` / `@endauth` help in conditional UI?
8. Why is `old('field')` used in forms?
9. How are validation errors shown with `@error('field')`?
10. What is the difference between `route('name')` and hardcoded URLs?
11. Why are partials like `reports/_form.blade.php` useful?
12. How does pagination rendering (`{{ $reports->links() }}`) work?
13. What is the use of `@selected(...)` in select options?
14. Why do we escape user content by default in Blade?
15. What is the purpose of `@push('scripts')` in layouts?

## B) PHP / Laravel Viva Questions
1. What is MVC, and where are Model/View/Controller in this project?
2. What is the purpose of Laravel routes?
3. Why use Form Request classes (`StoreReportRequest`) instead of validating directly in controller?
4. What does `prepareForValidation()` do?
5. What is mass assignment, and why do models define `$fillable`?
6. What are Eloquent relationships? Explain `User hasMany Report`.
7. Why does `Report` model define constants for statuses?
8. What is middleware, and why is `EnsureUserIsAdmin` needed?
9. What is the role of service classes like `CaseNotificationService`?
10. Why should authorization checks be done before update/delete actions?
11. What is the difference between web routes and api routes in Laravel?
12. Why do we store uploaded files using Laravel Storage instead of manual file move?
13. What is pagination and why do we use it for reports?
14. How does `scopeSearch()` in model make controller code cleaner?
15. What is the difference between synchronous mail and queued mail?
16. Why is input sanitization (`strip_tags`) important?
17. What are migrations and why are they important for teams?
18. How does `abort_unless(..., 403)` improve security?
19. Why are tests important in this project?
20. What is the purpose of localization file `resources/lang/en/childshield.php`?

