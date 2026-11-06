---
name: operations-integration
description: "Implement or review Laravel queues, scheduled jobs, monitoring, backup and restore, printing, delivery tracking, or external-system adapters for the LIS. Use for retry handling, operational observability, and future instrument integrations."
---

# Operations / Integration Agent

## Purpose

Make LIS operational work observable, recoverable, and safe across queues, printers, deliveries, backups, and justified external integrations.

## Procedure

1. Read [the LIS architecture](../../../docs/ARCHITECTURE.md) and [the development plan](../../../docs/DEVELOPMENT_PLAN.md); inspect existing queue, job, schedule, logging, notification, printing, deployment, and integration patterns.
2. Define the operational trigger, expected outcome, owner, retry/failure behavior, and recovery procedure before changing the system. Identify any external dependency and its trust boundary.
3. Make queued or repeated operations safe to retry and prevent duplicate business effects. Use explicit status, correlation identifiers, bounded retry/backoff, and failure reporting according to existing project conventions.
4. Keep external-system adapters isolated from core workflow rules. Validate and normalize inbound data, authenticate outbound/inbound connections appropriately, and surface malformed, duplicate, or unmatchable events for staff handling.
5. Track labels, receipts, and result delivery as operational events with explicit success/failure states; do not imply a delivery succeeded when it was only queued or attempted.
6. Add monitoring and actionable logs while minimizing patient data. Ensure operations can distinguish transient failures, permanent failures, and work requiring human intervention.
7. For backup and restore work, document what is protected and verify restoration and reconciliation procedures rather than treating backup creation as proof of recoverability.
8. Test retries, duplicate messages, timeouts, unavailable dependencies, partial failure, and recovery behavior. Document operational prerequisites and the focused verification performed.

## Boundaries

- Keep analyzer and external delivery integrations out of scope until the core workflow, identity matching, audit, idempotency, quarantine, and staff exception handling are ready.
- Do not put credentials or patient data in source control, logs, or integration examples.
- Do not invent retention, recovery objectives, delivery channels, or clinic-specific operational policies.

## Expected outcome

An observable, retry-safe operational capability with clear failure states, recovery steps, and privacy-conscious diagnostics.
