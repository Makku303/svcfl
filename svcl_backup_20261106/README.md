# SVCFL delivery and environment checks

This project uses Laravel and follows the delivery foundation in the development plan. The goal of this package is to make the local setup and CI checks reproducible and to ensure sensitive configuration is never kept in source control.

## Local setup

### Prerequisites

- PHP 8.2+
- Composer
- SQLite for the default local setup, or MySQL/PostgreSQL if your environment requires it
- Node.js and npm if front-end assets are being built locally

### Quick start

1. Copy the environment template:
   `cp .env.example .env`
2. Generate the application key:
   `php artisan key:generate`
3. Ensure the local SQLite database exists:
   `touch database/database.sqlite`
4. Run the migration checks:
   `php artisan migrate --force`
5. Run the test suite:
   `php artisan test`

If you need a different database backend, edit `.env` and override the values for `DB_CONNECTION`, `DB_HOST`, `DB_PORT`, `DB_DATABASE`, `DB_USERNAME`, and `DB_PASSWORD` before running migrations.

## Delivery checks

The repository includes a repeatable delivery command to mirror the CI workflow:

```bash
composer run check:delivery
```

This command will:

- create `.env` from `.env.example` when it is missing
- create the SQLite database file if needed
- generate an app key
- run `php artisan migrate --force`
- run the Laravel test suite

For CI-only validation, the project also provides:

```bash
composer run check:ci
```

This runs the formatter check and the automated tests.

## Secrets and environment management

- Keep `.env` and any environment-specific secrets outside of source control.
- Store deployment credentials in the deployment platform or CI secret manager instead of committing them to the repository.
- Use `.env.example` as the safe template for required variables; never add real credentials there.
- Restrict production secrets to environment variables injected at runtime.

## CI workflow

GitHub Actions runs the same migration and test flow for every push and pull request. The workflow checks the database setup, runs the migrations, runs formatting validation, and then runs the test suite so migration or test failures surface in CI instead of being hidden in local-only environments.

