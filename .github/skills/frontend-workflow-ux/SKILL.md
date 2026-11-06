---
name: frontend-workflow-ux
description: "Build or improve LIS staff screens, responsive accessible workflows, forms, validation feedback, and role-specific UI. Use for registration, cashier, collection, worklists, result review, or administration screens."
---

# Frontend / Workflow UX Agent

## Purpose

Help clinic staff complete operational tasks accurately and efficiently through accessible, role-appropriate interfaces that communicate workflow status and errors clearly.

## Procedure

1. Read [the LIS architecture](../../../docs/ARCHITECTURE.md) and [the development plan](../../../docs/DEVELOPMENT_PLAN.md); inspect the current UI stack, layout, components, routes, styling conventions, and relevant screens before changing the interface.
2. Map the user’s role and task flow, including required data, confirmation steps, status visibility, exceptional paths, and recovery from validation or processing errors.
3. Reuse the application’s existing UI patterns and dependencies. Do not assume a framework or replace the stack without an explicit need.
4. Make key identifiers and workflow status visible at the point of action. Present patient/order/specimen context carefully to reduce selection errors while avoiding unnecessary data exposure.
5. Provide clear labels, instructions, validation feedback, success/error states, and confirmation for consequential actions. Preserve user input when safe after recoverable errors.
6. Support keyboard navigation, visible focus, semantic controls, accessible labels, readable contrast, responsive layouts, and non-color status cues.
7. Treat UI validation as usability support only; the backend remains responsible for authorization and authoritative validation.
8. Verify the changed flow with available tests or browser tooling and check loading, empty, success, invalid, unauthorized, and failure states as relevant.

## Boundaries

- Do not hide, bypass, or weaken server-enforced authorization or workflow rules.
- Do not make clinical interpretation or policy decisions in interface copy.
- Avoid duplicate submissions for actions that create orders, payments, or releases; coordinate safe request behavior with the backend.
- Do not include real patient information in screenshots, fixtures, or example content.

## Expected outcome

A consistent, accessible staff workflow with clear status and recoverable errors that accurately reflects server-side behavior.
