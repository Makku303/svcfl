---
name: development-plan-orchestrator
description: "Coordinate LIS implementation from the development plan. Use when delegating, planning, or implementing a planned story or work package: route work to the skill roles listed in its Accountable skill role column, coordinate dependencies, and verify acceptance criteria."
---

# Development Plan Orchestrator

## Purpose

Coordinate planned LIS work by using the accountable skill-role assignments in [the development plan](../../../docs/DEVELOPMENT_PLAN.md) as the source of truth for delegation. Do not select owners based only on the epic, task title, or personal preference.

## Procedure

1. Read the relevant development-plan section and [the role reference](../../../docs/MULTI_AGENT_SKILLS.md). Identify the exact story or work-package ID supplied by the user. If none is supplied, locate the closest matching work package from the request; ask for clarification only if multiple packages are plausible.
2. Find that work-package row in section 5, **Agent-based task breakdown and acceptance criteria**. Extract its **Accountable skill role**, **Subtask scope**, and **Task acceptance criteria** verbatim in meaning. Use the story subtasks in section 4 only to clarify the scope.
3. Map every role listed in the row to its matching skill:
   - [Lead / architecture](../../../.github/skills/lead-architecture/SKILL.md)
   - [Data model](../../../.github/skills/data-model/SKILL.md)
   - [Workflow / backend](../../../.github/skills/workflow-backend/SKILL.md)
   - [Security / authorization](../../../.github/skills/security-authorization/SKILL.md)
   - [Frontend / workflow UX](../../../.github/skills/frontend-workflow-ux/SKILL.md)
   - [QA / test](../../../.github/skills/qa-test/SKILL.md)
   - [Operations / integration](../../../.github/skills/operations-integration/SKILL.md)
   - [Clinical workflow reviewer](../../../.github/skills/clinical-workflow-reviewer/SKILL.md)
4. Delegate implementation or review only to the assigned role skills. Include the work-package ID, bounded subtask scope, relevant acceptance criteria, known dependencies, and required output in each delegation. Require each delegate to follow its skill's boundaries and return changed files, tests run and results, unresolved decisions, and integration risks.
5. When multiple roles are assigned, involve every listed role and divide work by the row's subtask scope and each skill's remit. State file and interface ownership explicitly; do not have parallel delegates edit the same files or shared contracts. Coordinate shared model, state, authorization, and service-interface changes through the lead / architecture role when it is assigned. Otherwise coordinate those interfaces before parallel implementation.
6. Delegate independent work in parallel only after confirming there are no unresolved dependencies or overlapping file/interface ownership. Sequence dependent work in the order required by the plan. Do not delegate the same work package more than once.
7. Respect dependency and release guidance in section 6. Do not start a package whose prerequisites are unmet without surfacing the dependency and obtaining direction when it changes the plan.
8. Integrate the results, check the exact acceptance criteria for the selected package, and run the smallest relevant existing tests/checks. QA participation does not remove the implementation owner's responsibility to test their changes.
9. Report the work-package ID, accountable roles used, delegation and integration outcome, acceptance criteria verified or outstanding, tests and actual results, and any blocked policy decisions. Do not claim completion for unverified criteria.

## Guardrails

- Treat plan assignments as ownership, not a requirement for separate people or agents. If delegated subagents are unavailable, follow the same role boundaries yourself and state that no separate delegation occurred.
- Do not infer clinic policy or fill in an unresolved decision. Route clinical or operational questions to the role and stakeholder identified by the plan.
- Do not broaden scope beyond the assigned package without user approval; surface cross-package dependencies instead.
- Preserve security, privacy, audit, data-integrity, retry-safety, and clinical workflow constraints in every relevant delegation.
- If a plan row has no matching skill, or its assigned role conflicts with the requested work, stop and ask for direction rather than silently reassigning accountability.
