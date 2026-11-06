# Project Quick Start

This guide covers setup for the new application and a practical multi-agent workflow for starting a development task. `svcl_backup_20261106` is a legacy/reference snapshot only: do not run, modify, or treat it as the new application's implementation. Consult it only when a task explicitly calls for reference to the old system. The architecture and planning documents at the repository root describe the intended new LIS.

## 1. Configure the project

### Prerequisites

- PHP 8.2 or newer and Composer (the target architecture is Laravel 11)
- Node.js and npm
- A database supported by Laravel, selected for the new application
- Git

Open the repository root in VS Code. Create the new Laravel application in its agreed, empty application directory; do not scaffold into or reuse `svcl_backup_20261106`. For example, from the repository root:

```powershell
composer create-project laravel/laravel new-lis-app "^11.0"
Set-Location .\new-lis-app
```

If the team chooses a different application directory, replace `new-lis-app` consistently below. Scaffold the application once; on subsequent setup, work in that directory and install dependencies with:

```powershell
composer install
npm ci
```

The Laravel scaffold creates the environment template. Create a local environment file only if it does not already exist. Do not overwrite an existing `.env`:

```powershell
if (-not (Test-Path .env)) { Copy-Item .env.example .env }
```

Configure `.env` for the chosen local database and other environment-specific settings. Create the database if needed. Keep credentials and other secrets in `.env`, never in tracked files.

For a new local environment with an empty `APP_KEY`, generate the application key. Apply migrations after the new application's migrations are ready:

```powershell
php artisan key:generate
php artisan migrate
```

If migration fails, keep the full error, check the selected database and migration state, and resolve it before proceeding; do not use a destructive reset on a database with data you need.

### Run the app

From the new application's directory, in one terminal start Laravel:

```powershell
php artisan serve
```

In another terminal, from that same directory, start Vite:

```powershell
npm run dev
```

Open the URL printed by `php artisan serve`. To run the new application's automated tests or create a production asset build, run:

```powershell
php artisan test
npm run build
```

Run the checks relevant to your change before handing it off. Backend-only changes usually need Laravel tests; frontend asset changes should also be checked with the Vite build.

## 2. Start a task with multiple agents

The role-specific skills are in `.github/skills/`. Read these project references before splitting work:

- [Architecture](./ARCHITECTURE.md) - target boundaries and workflow invariants
- [Development plan](./DEVELOPMENT_PLAN.md) - delivery sequence, task packages, and acceptance criteria
- [Multi-agent skills](./MULTI_AGENT_SKILLS.md) - role responsibilities and shared expectations

Use the following workflow when starting a task:

1. **Establish the baseline.** From the repository root, check `git status --short` and the current branch. Identify the new application's root, then inspect its relevant implementation and tests; architecture and plan documents describe the target, not proof that a feature already exists. Treat `svcl_backup_20261106` as read-only reference material, not the implementation baseline. Do not overwrite or discard existing work.
2. **Have a lead define the task.** State the user outcome, current behavior, scope, constraints, and acceptance criteria. The lead checks the architecture and development plan, identifies dependencies, and decides whether parallel work is worthwhile.
3. **Split only independent work.** Give each agent a bounded deliverable, an owner/role, allowed files or modules, dependencies, interface assumptions, and testable acceptance criteria. Name shared models, workflow states, authorization rules, and service interfaces that must be agreed with the lead first.
4. **Choose roles that match the work.** Use only the roles needed: lead/architecture for decomposition and integration; data-model, workflow/backend, security/authorization, frontend/workflow UX, QA/test, operations/integration, or clinical workflow reviewer. The role references are guidance, not a requirement to launch every role for every task.
5. **Avoid overlapping edits.** Assign separate files or clearly separated responsibilities. Coordinate shared contracts before parallel implementation; route conflicts and cross-cutting changes through the lead. For a small or tightly coupled change, keep implementation with one agent and use other roles for focused review.
6. **Integrate and verify.** Review each result against its acceptance criteria, inspect the combined diff, resolve contract mismatches, and run relevant tests/builds. Ask QA or another reviewer to focus on high-risk behavior such as authorization, audit history, retries, or result-release rules.
7. **Close the handoff.** Summarize changed areas, validation results, remaining risks, and unresolved clinic-policy questions. Do not invent clinical thresholds, retention periods, or authorization rules; record the question and its decision owner.

### Task handoff template

Use a separate copy for each agent:

```text
Outcome:
Scope and allowed files/modules:
Out of scope:
Dependencies and agreed interfaces:
Acceptance criteria:
Tests/checks to run:
Report back with:
```

For example, a lead might assign an independent form update to the frontend/workflow UX role and a related validation test to QA, while reserving changes to shared order states or authorization rules for explicit coordination before implementation.
