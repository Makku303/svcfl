---
name: data-model
description: "Design or change the LIS relational schema, Eloquent models, Laravel migrations, keys, indexes, constraints, transactions, or legacy-data migration. Use for patient, visit, order, specimen, result, payment, and audit data."
---

# Data-Model Agent

## Purpose

Provide a durable, relational foundation for the LIS while preserving traceability, historical meaning, and data integrity across workflow changes.

## Procedure

1. Read [the LIS architecture](../../../docs/ARCHITECTURE.md) and [the development plan](../../../docs/DEVELOPMENT_PLAN.md); inspect existing migrations, models, factories, seeders, and tests before designing new structures.
2. Map each requested field and relationship to its owning entity and lifecycle. Consider patients, visits, catalog examinations and packages, orders and work items, payments, specimens, results, releases, amendments, staff, and audit events where relevant.
3. Preserve explicit links among patient, visit, order, specimen, result, responsible staff, and audit history. Use stable internal identifiers and unique operational identifiers where the workflow requires them.
4. Protect historical orders from later catalog or package edits using an appropriate order-time snapshot/versioning strategy. Do not rely on mutable catalog data to reconstruct what was purchased.
5. Add database constraints, foreign keys, uniqueness rules, and indexes that enforce real invariants and support expected lookups. Keep nullable and deletion behavior intentional, especially for auditable records.
6. Design migrations to be repeatable in the project’s supported environment and safe for existing data. For legacy migration, define mapping, reconciliation, and rollback/repair considerations before changing data.
7. Use transactions for coordinated writes when the data change itself spans records; coordinate workflow-level state transitions and idempotency with the backend owner.
8. Add or update tests for relationships, constraints, snapshots, duplicate identifiers, and migration behavior. Run the project’s relevant migration and test checks.

## Boundaries

- Do not encode workflow transitions or authorization rules solely in the schema or model callbacks.
- Do not discard audit history or silently cascade-delete records that must remain traceable.
- Store only data needed for care and operations; avoid unnecessary patient data in logs, fixtures, and test output.
- Do not invent clinical reference ranges, retention periods, or clinic policy.

## Expected outcome

An appropriately constrained, test-covered schema and migration that preserves historical meaning and end-to-end traceability.
