# Project Quick Start

This guide covers local setup and a practical multi-agent workflow for starting a development task. The repository documentation is at the root; the Laravel application is in `svcl_backup_20261106`.

## 1. Configure the project

### Prerequisites

- PHP 8.2 or newer and Composer
- Node.js and npm
- MySQL, or another database configured for this Laravel app
- Git

Open the repository root in VS Code so both the app and its documentation and agent skills are available. Run application commands from the Laravel application directory:

```powershell
Set-Location .\svcl_backup_20261106
```

Install dependencies:

```powershell
composer install
npm ci
```

Create a local environment file only if you do not already have one. Do not overwrite an existing `.env`:

```powershell
if (-not (Test-Path .env)) { Copy-Item .env.example .env }
```

Edit `.env` for your local environment. The example uses MySQL with database `svfcl`; create that database if needed and set `DB_HOST`, `DB_PORT`, `DB_DATABASE`, `DB_USERNAME`, and `DB_PASSWORD` to match your local server. Keep credentials and other secrets in `.env`, never in tracked files.

For a new local environment with an empty `APP_KEY`, generate the application key, then apply migrations:

```powershell
php artisan key:generate
php artisan migrate
```

If migration fails, keep the full error, check the selected database and migration state, and resolve it before proceeding; do not use a destructive reset on a database with data you need.

### Run the app

In one terminal, start Laravel:

```powershell
php artisan serve
```

In another terminal, from `svcl_backup_20261106`, start Vite:

```powershell
npm run dev
```

Open the URL printed by `php artisan serve`. To check the existing automated test suite or create a production asset build, run:

```powershell
php artisan test
npm run build
```

Run the checks relevant to your change before handing it off. Backend-only changes usually need Laravel tests; frontend asset changes should also be checked with the Vite build.

## 2. Start a task with multiple agents

The role-specific skills are in `.github/skills/`. Read these project references before splitting work:

- [Architecture](./ARCHITECTURE.md) — target boundaries and workflow invariants
- [Development plan](./DEVELOPMENT_PLAN.md) — delivery sequence, task packages, and acceptance criteria
- [Multi-agent skills](./MULTI_AGENT_SKILLS.md) — role responsibilities and shared expectations

Use the following workflow when starting a task:

1. **Establish the baseline.** From the repository root, check `git status --short` and the current branch. Inspect the relevant implementation and tests; architecture and plan documents describe the target, not proof that a feature already exists. Do not overwrite or discard existing work.
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
