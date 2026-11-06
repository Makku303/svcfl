# A1-T2 — Policy and Service Decision Register

## Status and use

This register records decisions that need clinic or technical-owner approval before the affected work is treated as ready. It is not itself a policy approval. The repository contains no approval evidence or approved clinic-specific values for the decisions below; no payment rules, clinical thresholds, or authorization defaults are being introduced.

For each decision, the accountable owner must record the approved value or decision, the named individual who approved it, the approval date, and a link or reference to the approval evidence. If it remains unresolved, keep its status explicit and do not implement an assumed default. Resolve conditional decisions before starting their affected package.

“Owner” below identifies the role accountable for obtaining the decision. An individual decision owner has not been named in the available project materials and must be assigned by the clinic or technical team.

## Release-blocking decisions

| ID | Decision to confirm | Status | Approved value / approval evidence | Decision owner (role; individual) | Affected stories / gate |
|---|---|---|---|---|---|
| A1-D01 | Which patient identifiers staff may use; how possible duplicates are reviewed; who may approve a merge and how history is preserved. | Unresolved — approval and individual owner pending. | None recorded. | Clinic operations / privacy owner; individual TBD. | B1, C1, B3 |
| A1-D02 | When an intake/request becomes an order; how visit, request, and order numbers are assigned; who may place, change, or cancel orders. | Unresolved — approval and individual owner pending. | None recorded. | Clinic operations / laboratory lead; individual TBD. | B2, C1, C3 |
| A1-D03 | Visit, order, specimen, payment, and result states and permitted transitions; required actors, handoffs, timestamps, and reasons. | Unresolved — approval and individual owner pending. | None recorded. | Laboratory lead / clinic operations; individual TBD. | B2, C3, D1–D3, E1–E4 |
| A1-D04 | Whether collection may proceed before payment completion; accepted payment methods; receipt numbering and the meaning of any legacy receipt/reference field; partial payments; cancellation, adjustment, refund, and reversal rules. | Unresolved — approval and individual owner pending. | None recorded. | Clinic finance / operations; individual TBD. | C4 and related collection/release operations |
| A1-D05 | Collection, receipt, rejection, and recollection handoffs, including identity checks, required actors, timestamps, reasons, and escalation. | Unresolved — approval and individual owner pending. | None recorded. | Laboratory / phlebotomy lead; individual TBD. | D1–D3 |
| A1-D06 | Who may enter, review, authorize, release, and amend results; review eligibility and criteria; whether separation of duties is required. | Unresolved — approval and individual owner pending. | None recorded. | Laboratory director or designated quality lead; individual TBD. | E1–E4 |
| A1-D07 | Approved examination/specimen requirements, preparation information, reference metadata and intervals, and critical thresholds, including the approver and source for each value. | Unresolved — approval and individual owner pending. | No clinical values recorded or enabled. | Laboratory lead; individual TBD. | C2, E1, E4 |
| A1-D08 | Critical-result follow-up, contact/escalation steps, required documentation, and when communication may be considered complete. | Unresolved — approval and individual owner pending. | None recorded. | Laboratory director / clinical governance; individual TBD. | E4 |
| A1-D09 | Result-handover identity verification, eligible recipients, approved delivery channels, and amendment approvals. | Unresolved — approval and individual owner pending. | None recorded. | Laboratory lead / privacy owner; individual TBD. | E3–E4; G2 before activation |
| A1-D10 | Minimum required patient data, access review, audit/privacy controls, retention and deletion, and applicable local privacy, health-record, and accreditation obligations. | Unresolved — approval and individual owner pending. | None recorded; no compliance determination is made by this register. | Privacy / compliance owner; individual TBD. | B1, B3, F2–F3, production readiness |
| A1-D11 | Expected routine and peak volumes, operating hours, and measurable service targets for registration and worklists. | Unresolved — values and individual owner pending. | None recorded. | Technical / operations lead with clinic operations; individual TBD. | A2, F2–F3, deployment sizing and readiness |
| A1-D12 | Recovery objectives (including agreed RPO/RTO), backup schedule and coverage, hosting model, downtime responsibilities, and restore expectations. | Unresolved — approval and individual owner pending. | None recorded. | Technical / operations lead; individual TBD. | A2, F3, production readiness |
| A1-D13 | Legacy migration mapping, reconciliation, cutover, rollback, and retirement of legacy result-entry paths. | Unresolved — approval and individual owner pending. | None recorded. | Technical lead / laboratory lead; individual TBD. | B3 and release readiness |

## Conditional decisions for later packages

| ID | Decision to confirm | Status | Approved value / approval evidence | Decision owner (role; individual) | Affected stories / gate |
|---|---|---|---|---|---|
| A1-D14 | Instrument protocol and external provider/channel selection, including operational, privacy, and security approval. | Deferred — not a core-release blocker; approval required before the relevant integration is planned or enabled. | None recorded. | Laboratory / technical lead; individual TBD. | G1–G2 |

## A1-T2 completion record

- **Current outcome:** The required decision register is established. All release-blocking policy and service decisions remain explicitly unresolved because no approved values or stakeholder sign-offs were present in the repository.
- **Acceptance status:** The decisions, accountable owner roles, and affected stories are documented. Named individual owners, approved values, and approval evidence remain outstanding; A1 is not ready to unblock dependent implementation until the applicable decisions are approved.
- **Guardrail:** Do not implement clinic-dependent state transitions, payment rules, reference ranges, critical thresholds, or result-authorization rules from assumptions. Keep the relevant rows unresolved until approval evidence is recorded here.
- **Approval record format:** Update the row’s status and approved-value/evidence fields, identify the individual decision owner, and record the approval date and evidence reference. Preserve prior decisions when policy changes by adding dated decision history rather than silently replacing an approved value.
