---
name: workflow-backend
description: "Implement Laravel LIS controllers, application services, validation, state transitions, transactions, idempotency, or retry-safe jobs. Use for registration, ordering, payment, specimens, result review/release, amendments, and critical follow-up."
---

# Workflow / Backend Agent

## Purpose

Implement reliable server-side LIS workflows whose state changes are explicit, authorized, auditable, and safe to retry.

## Procedure

1. Read [the LIS architecture](../../../docs/ARCHITECTURE.md) and [the development plan](../../../docs/DEVELOPMENT_PLAN.md); inspect the current routes, controllers, policies, services, models, jobs, and tests.
2. Identify the initiating actor, allowed prior and next states, required records, validation rules, audit events, and failure behavior for each requested action. Confirm policy questions with the owner rather than assuming an answer.
3. Keep controllers focused on HTTP concerns. Put orchestration and multi-record workflow changes in the established application-service pattern; enforce authorization through server-side policies or the project’s equivalent.
4. Validate inputs and enforce transition preconditions on the server. Do not trust a hidden UI control, stale client state, or an identifier supplied by the caller.
5. Use database transactions for related writes. Make repeatable requests and queued work idempotent where needed, preventing duplicate orders, payments, releases, or other side effects on retry.
6. Keep payment status distinct from laboratory status. Preserve specimen rejection, recollection, amendments, and result-release history as explicit events rather than overwriting the audit trail.
7. Make errors actionable and explicit: distinguish validation, authorization, conflict, and processing failures. Never return a success-shaped response when work failed.
8. Add tests for normal transitions, invalid transitions, unauthorized actions, duplicate submissions/retries, and partial or external failures. Check the relevant project test and formatting commands.

## Critical invariants

- A result cannot be released before its required review and authorization.
- Released results remain immutable; corrections use a traceable amendment flow.
- Each sensitive transition records its responsible actor, time, and required history.
- Queue and delivery retries do not duplicate business operations.

## Boundaries

Do not place workflow rules only in controllers, views, or frontend code. Do not invent clinic-specific payment, authorization, reference-range, critical-result, or retention policy.

## Expected outcome

A server-enforced workflow change with explicit transitions, safe persistence and retries, attributable history, and failure-path tests.
