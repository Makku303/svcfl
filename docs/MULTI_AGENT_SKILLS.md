# Multi-Agent Skills for LIS Development

This reference maps the target architecture in [ARCHITECTURE.md](./ARCHITECTURE.md) to suggested AI-agent responsibilities and skills. The architecture describes system modules and safeguards; it does not mandate specific AI-agent roles.

## Suggested agents

| AI agent | Skills needed | Likely focus |
|---|---|---|
| **[Lead / architecture agent](../.github/skills/lead-architecture/SKILL.md)** | Laravel 11 architecture, modular monoliths, application boundaries, task decomposition, integration review | Coordinate work and keep changes consistent with the shared data model, workflow rules, and implementation sequence. |
| **[Data-model agent](../.github/skills/data-model/SKILL.md)** | Relational database design, Eloquent, migrations, foreign keys, indexing, transactions, data migration | Patients, visits, orders, order items, specimens, results, audit events, and order-time snapshots for catalog and package data. |
| **[Workflow / backend agent](../.github/skills/workflow-backend/SKILL.md)** | Laravel controllers and application services, state transitions, validation, idempotency, retry-safe jobs | Registration and ordering, payment, specimen collection and receipt, result review and release, amendments, and critical-result follow-up. |
| **[Security / authorization agent](../.github/skills/security-authorization/SKILL.md)** | Laravel authentication, policies and permissions, least privilege, session and CSRF protections, privacy-aware logging, audit design | Protect patient data and enforce server-side authorization for sensitive actions, including result release and administrative changes. |
| **[Frontend / workflow UX agent](../.github/skills/frontend-workflow-ux/SKILL.md)** | The application's existing UI stack, accessible responsive UI, role-specific screens, form validation, keyboard-friendly workflows | Staff screens for registration, cashier, collection, worklists, result review, and administration. |
| **[QA / test agent](../.github/skills/qa-test/SKILL.md)** | Laravel testing, database and feature tests, workflow and authorization testing, retry and failure-case testing | Verify architecture invariants and end-to-end flows, including duplicate submissions, rejected specimens, unauthorized result release, and delivery failures. |
| **[Operations / integration agent](../.github/skills/operations-integration/SKILL.md)** | Laravel queues and jobs, monitoring, backups and restoration, printing, external-system adapters, retry and exception handling | Queue reliability, labels and receipts, future instrument interfaces, delivery tracking, and operational observability. |
| **[Clinical workflow reviewer](../.github/skills/clinical-workflow-reviewer/SKILL.md)** | Laboratory operations knowledge and awareness of local privacy, accreditation, and retention requirements | Review workflow assumptions, result authorization, reference ranges, critical-result processes, and policy decisions. This role should identify decisions for clinic stakeholders rather than invent clinic-specific rules. |

## Shared expectations

Every agent should:

- Read and follow the architecture document and stay within its assigned scope.
- Preserve traceability among patients, visits, orders, specimens, results, staff, and audit history.
- Respect least-privilege access and avoid exposing patient data in logs or outputs.
- Write or update tests for changed behavior and check relevant failure cases.
- Surface validation, authorization, queue, and delivery failures explicitly; do not silently treat failures as success.
- Coordinate changes to shared models, workflow states, and interfaces with the lead agent.

## Coordination approach

A practical starting point is one lead agent with a small number of focused implementation agents. Have QA review the highest-risk workflows, and involve the clinical workflow reviewer when requirements depend on laboratory or clinic policy. Keep security and authorization requirements in every relevant task rather than treating them as a final-only review.

Prioritize cross-agent review of result authorization, released-result immutability and amendments, audit history, retry safety, and patient-data protection. Clinic-specific reference ranges, critical thresholds, retention periods, and authorization rules must be confirmed by the appropriate clinic stakeholders.
