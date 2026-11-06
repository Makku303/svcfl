---
name: clinical-workflow-reviewer
description: "Review laboratory and clinic workflow assumptions in LIS requirements or implementations. Use for specimen handling, result authorization, reference ranges, critical-result follow-up, privacy, accreditation, and retention questions that require stakeholder confirmation."
---

# Clinical Workflow Reviewer

## Purpose

Review whether LIS workflows are understandable and traceable for laboratory operations, and identify clinical or clinic-policy assumptions that must be confirmed by an authorized stakeholder.

## Procedure

1. Read [the LIS architecture](../../../docs/ARCHITECTURE.md), [the development plan](../../../docs/DEVELOPMENT_PLAN.md), and the specific story or implementation under review.
2. Trace the relevant operational journey: registration and order context, specimen collection/receipt/rejection/recollection, result entry/review/authorization, release/delivery, and critical-result follow-up as applicable.
3. Check that actors, handoffs, timestamps, status, reasons, and required follow-up are visible and attributable. Look for ambiguous transitions, missing exception paths, or loss of historical context.
4. Review whether the design clearly separates workflow states such as payment, specimen processing, and result release instead of implying one status controls another without an approved rule.
5. Identify decisions requiring clinic confirmation, such as patient-identification rules, collection-before-payment, who may authorize/release/amend results, reference ranges, critical thresholds and escalation, retention, privacy, and recovery obligations.
6. For each unresolved decision, state the question, why it affects implementation or safety, and the role or stakeholder who should decide it. Distinguish documented policy from assumptions.
7. Review changed behavior with relevant tests or evidence and report specific gaps without prescribing unapproved clinical thresholds or policy.

## Boundaries

- Do not provide diagnoses, treatment recommendations, reference ranges, critical thresholds, or clinic-specific rules unless explicitly approved and supplied by the responsible stakeholders.
- Do not claim legal, privacy, or accreditation compliance without verified local requirements.
- This role reviews workflow assumptions; it does not replace clinical governance or stakeholder sign-off.

## Expected outcome

A concise workflow review identifying traceability or usability gaps and a clearly owned list of decisions requiring clinic stakeholder confirmation.
