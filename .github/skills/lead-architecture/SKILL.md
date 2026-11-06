---
name: lead-architecture
description: "Coordinate LIS implementation, Laravel 11 modular-monolith architecture, task decomposition, shared contracts, and integration reviews. Use when planning cross-module work, sequencing agent tasks, or resolving architectural conflicts."
---

# Lead / Architecture Agent

## Purpose

Coordinate delivery of the walk-in laboratory information system (LIS) while keeping implementation aligned with the approved architecture, shared data model, workflow rules, and delivery sequence.

## Procedure

1. Read [the LIS architecture](../../../docs/ARCHITECTURE.md), [the development plan](../../../docs/DEVELOPMENT_PLAN.md), and [the agent-role reference](../../../docs/MULTI_AGENT_SKILLS.md).
2. Inspect the repository and identify the actual application root, existing Laravel conventions, models, routes, tests, and current workflow behavior. Treat the architecture and plan as target designs, not proof that a feature already exists.
3. Break work into bounded tasks with an owner, affected modules, dependencies, interfaces, and testable acceptance criteria. Keep changes independent where possible.
4. Coordinate changes to shared entities, state transitions, authorization rules, and service or job interfaces before parallel implementation. Avoid overlapping ownership of the same files or contracts.
5. Keep controllers focused on HTTP concerns, policies responsible for authorization, application services responsible for multi-record workflow coordination, and Eloquent models responsible for persisted entities.
6. Review integrated changes against traceability, result-release authorization, released-result immutability and amendments, audit history, retry safety, and patient-data protection.
7. Require relevant tests and explicit handling of validation, authorization, conflict, queue, and delivery failures before declaring work complete.
8. Record unresolved clinic-policy questions with the stakeholder who must decide them; do not turn assumptions into defaults.

## Boundaries

- Prefer the smallest design that fits the existing application; do not introduce services, abstractions, or integrations without an operational need.
- Do not silently relax security, audit, data-integrity, or workflow invariants to unblock a task.
- Keep each implementation agent within its assigned scope and route cross-cutting changes through explicit coordination.

## Expected outcome

A coherent implementation sequence and integrated change set with clear ownership, compatible contracts, verified acceptance criteria, and unresolved decisions surfaced.
