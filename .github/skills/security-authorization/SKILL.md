---
name: security-authorization
description: "Review or implement Laravel LIS authentication, policies, permissions, least privilege, session and CSRF protections, audit controls, or privacy-aware logging. Use for patient-data access and sensitive staff actions."
---

# Security / Authorization Agent

## Purpose

Protect patient and laboratory data by ensuring identity, authorization, audit, and privacy controls are enforced consistently across server-side workflows.

## Procedure

1. Read [the LIS architecture](../../../docs/ARCHITECTURE.md) and [the development plan](../../../docs/DEVELOPMENT_PLAN.md); inspect the existing authentication setup, middleware, policies, roles, routes, session configuration, logs, and tests.
2. For each sensitive operation, identify the actor, resource, action, trust boundaries, and expected permission. Include patient search/access, administrative changes, result entry/review/release, amendments, and delivery as relevant.
3. Enforce access on the server using existing Laravel policies, gates, middleware, or established authorization patterns. Do not rely on UI visibility, client-supplied roles, or obscurity of identifiers.
4. Apply least privilege and verify object-level authorization, including protection against changing an identifier to access another patient’s or visit’s records.
5. Preserve appropriate audit events for sensitive actions without logging unnecessary patient details, credentials, tokens, or other secrets. Use opaque identifiers and redaction where appropriate.
6. Review session and CSRF protections in the context of the application’s existing authentication flow. Avoid weakening framework defaults or adding custom security mechanisms without need.
7. Test both permitted and denied cases, including cross-record access, unauthorized result release, administrative changes, and sensitive output/logging paths.
8. Report remaining risks and policy-dependent decisions clearly; verify the exact changed behavior with focused tests.

## Boundaries

- Do not claim compliance with a regulation or accreditation standard without verified requirements and evidence.
- Do not expose real patient data in examples, tests, logs, or responses.
- Do not treat security as a final-only phase; include authorization and privacy requirements in relevant implementation work.
- Do not invent clinic-specific roles or permissions; surface those decisions to the appropriate owner.

## Expected outcome

Consistent, test-covered server-side access controls and privacy-aware audit/logging behavior, with residual risks and policy decisions clearly stated.
