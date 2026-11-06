# LIS Development Plan

This plan translates the target design in [ARCHITECTURE.md](./ARCHITECTURE.md) into a sequenced delivery roadmap and implementable user stories. It is a planning document, not a claim that the workflows or controls are already implemented.

## 1. Delivery approach

Build the LIS as a Laravel modular monolith backed by a relational database. Deliver a usable, auditable walk-in workflow before adding external integrations. Keep controllers focused on HTTP concerns, policies responsible for authorization, application services responsible for workflow transitions and transactions, and models responsible for persisted entities.

### Planning conventions

- **P0 — foundation / release blocker:** required to safely deliver the first operational workflow.
- **P1 — initial operational release:** required for the core walk-in, laboratory, and result lifecycle.
- **P2 — operational maturity:** quality, reporting, recovery, and workflow improvements.
- **P3 — later / conditional:** integrations and capabilities that depend on proven core workflows.
- The task bullets under each story are implementation subtasks. The agent work packages below group those subtasks by skill, assign an accountable role, and define independent acceptance criteria.
- Agent names describe skill-based ownership, not a requirement to use separate people or AI agents. One person may own multiple roles; coordinate changes to shared models, states, and interfaces through the lead.
- Stories are complete only when their acceptance criteria pass, authorization and audit behavior are verified, and relevant failure paths are tested.

## 2. Delivery phases and exit gates

| Phase | Priority | Outcome | Exit gate |
|---|---|---|---|
| 0. Discovery and delivery foundation | P0 | Confirm clinic rules, establish application boundaries, test strategy, and migration approach. | Decisions affecting data, money, result authorization, privacy, and operations are recorded with an owner; deployment and rollback approach is agreed. |
| 1. Secure data and workflow foundation | P0 | Persist staff access, patients, visits, orders, work items, audit history, and core policies. | Migrations and constraints protect required relationships; sensitive actions are authorized; legacy-data mapping and reconciliation are tested. |
| 2. Walk-in operations | P1 | Deliver patient check-in through catalog selection, payment recording, collection, and specimen tracking. | A staff member can complete and trace a walk-in order; duplicate submissions and invalid transitions do not create inconsistent records. |
| 3. Results and communication | P1 | Deliver result entry, review, authorization, release, amendments, critical follow-up, and delivery tracking. | No result can bypass configured review/authorization; released results remain immutable; each release and amendment is attributable. |
| 4. Operational maturity | P2 | Add quality records, dashboards, downtime reconciliation, and verified backup/restore operations. | Operational measures have agreed definitions; recovery and reconciliation drills are documented and passed. |
| 5. Integrations and extensions | P3 | Add instrument and external delivery adapters where justified. | Core identity matching, audit, idempotency, retry, quarantine, and staff exception workflows are proven before enabling an integration. |

Phases are a dependency-oriented sequence, not calendar estimates. Schedule and capacity should be set after the clinic confirms scope, workflow policies, expected volumes, and team availability.

## 3. Cross-cutting definition of done

Apply these checks to every story where relevant:

- Validate inputs and enforce server-side authorization; do not rely on hidden UI controls.
- Use database transactions for multi-record workflow changes and safe retry/idempotency for repeatable operations.
- Preserve actor, timestamp, source, and history for sensitive actions; do not place unnecessary patient data in logs.
- Return actionable validation, authorization, conflict, and processing errors; do not represent failed work as successful.
- Add or update automated tests for normal, unauthorized, invalid-transition, duplicate/retry, and failure cases.
- Keep accessible, responsive, keyboard-friendly staff workflows and show the current operational status clearly.
- Update relevant runbooks and user-facing instructions when behavior or operations change.

## 4. Stories, tasks, and subtasks

### Epic A — Discovery, domain decisions, and delivery foundation

#### A1. Confirm clinic workflow and policy decisions — P0

**User story:** As a clinic and laboratory lead, I want workflow and policy decisions documented before implementation so that software behavior matches approved operations.

**Acceptance criteria**

- Confirm patient identifiers and duplicate-review/merge authority.
- Confirm whether collection can proceed before payment is complete, and define payment/refund rules.
- Approve order, visit, specimen, and result transitions and staff roles permitted to perform them.
- Identify who approves reference ranges, critical thresholds, result authorization, amendment, and escalation rules.
- Define required data, retention, privacy, audit, downtime, and recovery obligations with the appropriate owners.
- Record unresolved decisions, owner, and target resolution point; do not invent defaults in implementation.

**Tasks**

- Map existing walk-in, collection, testing, payment, result, and handover processes.
- Review current application models and legacy result-entry paths against the target domain.
- Produce a decision register and obtain clinic sign-off on release-blocking policies.
- Define expected volume, operating hours, service targets, and recovery objectives with stakeholders.

#### A2. Establish modular application and delivery conventions — P0

**User story:** As a development team, we want stable module boundaries and quality gates so that workflow changes remain testable and consistent.

**Acceptance criteria**

- Domain ownership for identity/access, registry, visits/queue, catalog, orders/billing, specimens, results, delivery, and operations is documented.
- The project has a repeatable migration, test, and deployment process.
- Sensitive workflow transitions are implemented through application services and policies, not only controllers or views.

**Tasks**

- Inspect the current Laravel application structure and decide how target modules fit existing namespaces and models.
- Define naming and ownership conventions for migrations, policies, services, jobs, events, and tests.
- Establish CI checks for formatting/static checks where configured, migrations, and automated tests.
- Document environment configuration, secret handling, local setup, and deployment prerequisites.

### Epic B — Secure foundation, data model, and migration

#### B1. Manage staff identities and least-privilege access — P0

**User story:** As an administrator, I want staff accounts and role-based permissions so that each person can access only the workflows needed for their role.

**Acceptance criteria**

- Staff authentication, account activation/deactivation, and password recovery follow approved policy.
- Protected actions perform server-side permission checks.
- Roles and permissions distinguish registration, cashier, collection, bench entry, review/authorization, administration, and other approved duties.
- Sensitive administrative and result-release actions are attributable and use any additional approved controls.

**Tasks**

- Review existing user/authentication implementation and reuse it where suitable.
- Define roles, permissions, policies, and account lifecycle operations with clinic owners.
- Apply policies to routes/controllers and cover positive and negative authorization cases.
- Configure secure session, CSRF, password, and rate-limit settings for the deployed application.
- Add audit events for access and permission/account changes as approved.

#### B2. Establish normalized, traceable LIS entities — P0

**User story:** As clinic staff, I want each visit, order, specimen, and result connected through explicit records so that work can be traced and reconciled.

**Acceptance criteria**

- Patients have many visits; visits belong to patients; orders belong to visits; examination work items trace to order selections.
- Specimens and results link to the relevant ordered examination/work item.
- Operational identifiers are unique and searchable; barcodes contain opaque identifiers rather than demographics.
- Foreign keys, uniqueness constraints, and indexes protect relationships and worklist/search use cases.
- Workflow state and timestamps are represented explicitly instead of inferred from a screen or unrelated record.

**Tasks**

- Design and implement migrations/models for patients, visits, orders, order items, ordered examinations, specimens, results, and supporting records.
- Define separate state fields and allowed transitions for visits, orders, specimens, payments, and results.
- Add constraints and indexes for patient search, visit number, accession/barcode, status, and workflow timestamps.
- Add application services for multi-record creation and transitions with transactions.
- Add model, service, and feature tests for relationships, constraints, and invalid state changes.

#### B3. Preserve audit history and migrate existing records — P0

**User story:** As an authorized reviewer, I want sensitive changes attributable and legacy records migrated with reconciliation so that history remains trustworthy.

**Acceptance criteria**

- Patient, order, result, payment, and delivery changes are recorded with actor, action, entity, and time, with appropriate before/after details.
- Normal application roles cannot silently alter or delete audit history.
- Existing records are mapped explicitly; source identifiers are retained where useful.
- Migration dry runs report mapping exceptions and reconciliation totals; rollback and audit procedures are documented.

**Tasks**

- Design append-only audit event storage and privacy-conscious audit payloads.
- Instrument sensitive services to emit audit events and test that events correspond to committed transactions.
- Inventory legacy tables and result-entry paths; document source-to-target mapping and unsupported cases.
- Build repeatable migration/import commands with validation, exception reporting, and idempotent behavior.
- Compare source and target record counts and relevant totals; document rollback and cutover checks.
- Plan how legacy result-entry paths are disabled when the authorized workflow becomes active.

### Epic C — Patient check-in, catalog, order, and payment

#### C1. Find or register a patient and create a visit — P1

**User story:** As a front-desk staff member, I want to find or register a patient and open a walk-in visit so that the encounter starts with a reliable identity and traceable visit number.

**Acceptance criteria**

- Staff can search using clinic-approved identifiers and review possible matches before creating a patient.
- Duplicate candidates are not silently merged; review and merge actions require approved permissions and preserve history.
- A new visit has a unique human-readable visit number, check-in time, responsible staff, and explicit status.
- Search results expose only information permitted for the user's role.

**Tasks**

- Implement patient search, registration, duplicate candidate review, and authorized merge/review flow.
- Implement transactional visit creation, visit-number generation, and status history.
- Build responsive, keyboard-friendly check-in and visit-summary screens.
- Test duplicate submissions, ambiguous matches, unauthorized access, and visit-number uniqueness.
- Define and verify patient search data minimization and audit behavior.

#### C2. Maintain examinations, packages, and pricing — P1

**User story:** As an authorized catalog manager, I want to maintain active examinations and packages so that staff can place accurate orders using approved preparation and pricing information.

**Acceptance criteria**

- Individual examinations and packages are separately selectable and priced.
- Package components and versions/effective dates can be maintained without changing already placed orders.
- Catalog entries include approved specimen requirements, preparation information, and configurable result metadata.
- Inactive or expired catalog entries cannot be newly ordered, while historical orders remain readable.

**Tasks**

- Implement catalog CRUD and permissions for examinations, packages, components, and price records.
- Model package version/effective-date behavior and validate component configuration.
- Capture approved specimen requirements, preparation text, active state, and result metadata.
- Add catalog history/audit events and tests for effective dates and historical stability.
- Avoid entering clinical reference intervals or thresholds until approved values and ownership are provided.

#### C3. Place an order and resolve laboratory work items — P1

**User story:** As front-desk or clinical staff, I want to order standalone examinations and packages for a visit so that billing selections and laboratory work are both represented correctly.

**Acceptance criteria**

- An order records visit, ordering staff/source, and timestamps.
- Each billable line is a standalone examination or package and snapshots its description and price.
- Package selections generate examination work items from the selected package version; component examinations are not charged again unless approved policy explicitly says so.
- Selecting an examination both individually and in a package triggers a staff-visible overlap decision; no component is silently dropped or double charged.
- Order creation is transactional and safe against repeated submissions.

**Tasks**

- Implement order/order-item creation and catalog snapshotting.
- Resolve package components into ordered examination work items with provenance to source lines and package version.
- Implement overlap detection and record the staff decision and applicable policy.
- Add idempotency or unique operation references for duplicate order submissions.
- Test package edits after ordering, mixed orders, overlaps, failures, and retry behavior.

#### C4. Record payment and issue receipts — P1

**User story:** As a cashier, I want to record payments and receipts separately from laboratory status so that financial reconciliation does not alter clinical workflow history.

**Acceptance criteria**

- Payment captures approved method, amount, reference/receipt number, cashier, time, and related charge items.
- Payment status remains distinct from order/specimen/result status.
- Partial payments, reversals, or refunds follow approved clinic policy and are represented as auditable transactions rather than silent edits/deletions.
- Whether collection may proceed before payment completion follows configured and approved policy.

**Tasks**

- Confirm payment, receipt-number, partial-payment, adjustment, reversal, and refund rules with clinic stakeholders.
- Implement payment and payment-item records with transactional posting and unique receipt/reference handling.
- Build cashier payment and receipt views/print templates.
- Add authorization, audit, idempotency, reconciliation, and failure-path tests.

### Epic D — Specimen collection and laboratory worklists

#### D1. Collect, label, receive, and route specimens — P1

**User story:** As a phlebotomist or receiving staff member, I want to identify, label, collect, and receive specimens so that every sample is matched to the right ordered work.

**Acceptance criteria**

- A specimen has a unique accession/barcode, opaque identifier, required specimen type, linked order/work item, and current status.
- Collection records actor, time, and relevant collection details; receipt is a separate attributable event.
- Labels show a scannable identifier and human-readable fallback without embedding patient demographics in the barcode.
- Collection confirms patient/specimen identity according to the approved procedure.

**Tasks**

- Implement specimen records and append-only collection/receipt/routing events.
- Generate unique accession/barcode identifiers with collision protection.
- Build collection and receiving worklists with label/receipt printing.
- Test wrong/missing identifiers, duplicate scans/submissions, and transaction failures.

#### D2. Reject specimens and manage recollection — P1

**User story:** As laboratory staff, I want to record specimen rejection and link recollections so that invalid samples are handled transparently without erasing history.

**Acceptance criteria**

- Rejection requires a reason and records actor and time.
- Recollection creates a new specimen linked to the rejected/replaced specimen and relevant ordered work.
- Original specimen and events remain visible in history; rejected specimens cannot proceed as valid samples.
- Worklists clearly show recollection-required work.

**Tasks**

- Define allowed rejection/recollection transitions with laboratory stakeholders.
- Implement rejection reasons, specimen-event history, and recollection linkage.
- Add recollection worklist indicators and staff workflow screens.
- Test invalid transitions, unauthorized rejection, duplicate recollection, and history preservation.

#### D3. Operate specimen and examination worklists — P1

**User story:** As laboratory staff, I want worklists derived from explicit workflow status so that I can see what needs collection, receipt, processing, or completion.

**Acceptance criteria**

- Worklists are filtered by explicit state and timestamps, not inferred from page navigation.
- Staff can search by visit, accession/barcode, and other approved operational identifiers.
- Transitions are role-checked, recorded, and protected against stale or duplicate requests.
- Outstanding and blocked work is visible with actionable reasons.

**Tasks**

- Define queue filters and status transitions for collection, receiving, and bench work.
- Implement indexed worklist queries and responsive staff screens.
- Add optimistic conflict handling or equivalent protection for concurrent updates.
- Test queue membership, ordering, permissions, and status-change races.

### Epic E — Result lifecycle and patient communication

#### E1. Enter and validate results — P1

**User story:** As authorized laboratory staff, I want to enter results against ordered examinations so that results retain provenance, units, and the correct reference metadata.

**Acceptance criteria**

- Every result identifies the ordered examination, entry source, actor, and time.
- Values, units, flags, and reference-range snapshots use the configured result metadata.
- Invalid, incomplete, or out-of-range data is surfaced explicitly; entry alone does not release a result.
- Manual-entry permissions and changes are auditable.

**Tasks**

- Implement structured result records and result-entry validation based on approved per-examination metadata.
- Snapshot applicable units and reference metadata at the appropriate workflow point.
- Build manual entry and result worklist screens.
- Test value validation, missing metadata, invalid state transitions, and unauthorized entry.

#### E2. Review and authorize results — P1

**User story:** As an authorized reviewer, I want to review and authorize eligible results so that only approved results can proceed to release.

**Acceptance criteria**

- Review decisions record reviewer, decision, time, and reason where required.
- Only approved roles can authorize; separation-of-duty requirements are enforced if the clinic adopts them.
- Ineligible or incomplete results cannot be authorized.
- State transitions are explicit, auditable, and safe against repeated authorization requests.

**Tasks**

- Confirm reviewer eligibility, separation-of-duty, and review criteria with laboratory leadership.
- Implement review history, authorization policy, and transition service.
- Build review screens with flags and sufficient provenance for a decision.
- Test role restrictions, incomplete results, duplicate requests, and concurrent review.

#### E3. Release reports and track delivery — P1

**User story:** As authorized staff, I want to release an authorized result and record how it was delivered so that the patient receives the correct report and the clinic can prove the handover.

**Acceptance criteria**

- Only eligible, authorized results can be released.
- Release creates an immutable report snapshot and records actor, time, and release event.
- Delivery records channel, recipient identity-check method, time, outcome, and delivery attempts as applicable.
- Failed or pending delivery remains visible and is never represented as successful.
- Identity verification follows the clinic-approved handover procedure.

**Tasks**

- Define release eligibility, report contents, identity verification, and allowed delivery channels.
- Implement release transaction, immutable report snapshot, and idempotent release reference.
- Implement delivery event and attempt tracking, including explicit failure states.
- Build report rendering, staff handover screen, and required printing.
- Test premature release denial, repeat release, failed rendering/delivery, and audit history.

#### E4. Amend released results and manage critical-result follow-up — P1

**User story:** As authorized laboratory staff, I want released-result corrections and critical-result follow-up recorded as new history so that changes and communications remain accountable.

**Acceptance criteria**

- A released result is not overwritten; a correction creates a revision/amendment with prior value, replacement, reason, actor, and time.
- An amendment generates a new release/delivery event and preserves the earlier report.
- A critical result creates an actionable follow-up record.
- A critical result is not marked communicated until recipient, contact attempt/outcome, and time are documented.

**Tasks**

- Confirm amendment approval and critical-value/contact escalation policies with clinic stakeholders.
- Implement result revision and amendment workflow with append-only history.
- Implement critical-result event/task creation, contact attempts, and unresolved escalation views.
- Test immutable released records, repeat amendment requests, failed contact attempts, and authorization.

### Epic F — Quality, operations, and resilience

#### F1. Record quality control and reagent lots — P2

**User story:** As a laboratory quality lead, I want quality-control runs and reagent lots recorded so that operational quality events can be reviewed and traced.

**Acceptance criteria**

- Reagent lots include relevant lot/expiry details and approved links to tests or instruments.
- QC runs record configured measurements, outcome, actor, time, and applicable lot/instrument/work period.
- QC status and failed checks are visible to authorized staff and do not silently permit affected work to proceed where policy blocks it.

**Tasks**

- Confirm QC, lot, expiry, and out-of-control handling requirements with laboratory leadership.
- Implement reagent lot and QC records, validation, and permissions.
- Add audit events, worklist indicators, and tests for expired lots and failed QC policy.

#### F2. Provide operational dashboards and turnaround reporting — P2

**User story:** As a clinic manager, I want operational workload and turnaround measures so that delays and backlogs can be identified.

**Acceptance criteria**

- Reports show workload and collection-to-result and result-to-release turnaround measures using approved definitions.
- Access is restricted and exports are auditable.
- Operational summaries avoid unnecessary patient identifiers.
- Queries remain appropriate for expected clinic volume.

**Tasks**

- Agree metric definitions, filters, roles, and expected volumes.
- Implement indexed aggregates and operational dashboards.
- Add export authorization/audit and verify privacy-conscious output.
- Test calculation boundaries, date/time handling, and reporting permissions.

#### F3. Prepare for downtime and verify recovery — P2

**User story:** As an operations lead, I want a tested downtime, backup, and restoration procedure so that clinic workflows can recover without losing traceability.

**Acceptance criteria**

- Downtime forms and later reconciliation preserve pre-numbered identifiers and detect duplicates.
- Database and uploaded artifacts are backed up according to approved schedule and encryption policy.
- Backup health is monitored; restoration is tested against agreed recovery objectives.
- Queue failures and operational incidents remain visible and actionable without exposing patient data in general logs.

**Tasks**

- Document downtime forms, identity/specimen checks, reconciliation responsibilities, and cutover procedure.
- Implement duplicate-aware reconciliation tooling and tests.
- Configure encrypted backups, monitoring, retention, and restoration runbook.
- Exercise a restore and reconciliation drill; record results and remediation.
- Add monitoring for application errors, queue depth, database capacity, failed logins, and backup health.

### Epic G — Deferred integrations and extensions

#### G1. Integrate laboratory instruments through an adapter — P3

**User story:** As laboratory staff, I want instrument messages received and matched safely so that eligible results can enter the normal review workflow without bypassing controls.

**Acceptance criteria**

- Integration is isolated behind an adapter and validates instrument identity, message structure, units, and patient/specimen mapping.
- Duplicate messages are idempotent; unmatched or invalid messages are quarantined for staff resolution.
- Imported results retain source and receipt provenance and cannot bypass configured review/authorization.
- Failures and retries are observable and do not lose or silently accept messages.

**Tasks**

- Confirm instrument protocol, supported message types, mapping rules, and validation responsibilities.
- Implement adapter, durable message receipt, deduplication, and quarantine workflow.
- Add monitoring, bounded retries, and staff exception handling.
- Test malformed, duplicate, unmatched, delayed, and replayed messages.

#### G2. Add external result delivery channels — P3

**User story:** As clinic operations staff, I want approved external delivery channels so that results can be delivered securely with traceable outcomes.

**Acceptance criteria**

- Channel activation follows approved privacy and identity-verification requirements.
- Jobs are retry-safe and delivery attempts/outcomes are persisted and visible.
- A channel failure cannot mark a result delivered; release authorization remains independent.

**Tasks**

- Select and assess a channel only after privacy/security and operational approval.
- Implement a channel adapter using the existing delivery-event workflow.
- Configure credentials outside source control and establish rotation/incident procedures.
- Test retries, provider failures, delivery status reconciliation, and patient-data minimization.

## 5. Agent-based task breakdown and acceptance criteria

Each task below is a separately trackable work package with an accountable skill role and its own acceptance criteria. The subtasks under the matching story are the implementation scope; the package is done only when its criteria pass. QA validates behavior but does not replace the implementation owner's responsibility for tests.

Role names and skill expectations are defined in [MULTI_AGENT_SKILLS.md](./MULTI_AGENT_SKILLS.md). "Clinical reviewer" means a clinic/laboratory stakeholder or qualified reviewer, not an engineering agent making policy decisions.

### Epic A — Discovery and delivery foundation

| Task | Accountable skill role | Subtask scope | Task acceptance criteria |
|---|---|---|---|
| A1-T1: Map current workflows | Clinical workflow reviewer | Existing registration, collection, testing, payment, results, and handover process mapping; legacy workflow review. | Current-state flow and exceptions are reviewed by clinic representatives; undocumented or conflicting steps are recorded as open questions rather than assumed requirements. |
| A1-T2: Approve policy and service decisions | Clinical workflow reviewer; lead / architecture agent | Decision register, policy sign-off, volume, operating hours, service targets, and recovery objectives. | Every release-blocking decision has a documented value or explicit unresolved status, a named decision owner, and an affected story; no unapproved clinical thresholds or payment rules are introduced. |
| A2-T1: Define module boundaries and engineering conventions | Lead / architecture agent | Domain ownership, Laravel application boundaries, naming and change coordination conventions. | Each target module has an owner and documented boundary; workflow and authorization rules are assigned to application services/policies rather than controllers or views. |
| A2-T2: Establish delivery and environment checks | QA / test agent; operations / integration agent | CI checks, migrations/tests, local setup, environment, secrets, and deployment prerequisites. | A developer can follow documented setup and run the required checks; CI reports migration/test failures; secrets are configured outside source control. |

### Epic B — Secure foundation, data model, and migration

| Task | Accountable skill role | Subtask scope | Task acceptance criteria |
|---|---|---|---|
| B1-T1: Define staff roles and account lifecycle | Security / authorization agent; clinical workflow reviewer | Role/permission matrix, account operations, and role policy decisions. | Clinic-approved roles map to explicit permissions and account lifecycle rules; sensitive actions have named authorized roles; unresolved policy choices are recorded, not defaulted. |
| B1-T2: Enforce authentication and authorization | Security / authorization agent; QA / test agent | Policies, route/controller checks, session/CSRF/password/rate-limit configuration, authorization tests. | Protected endpoints deny unauthenticated and unauthorized requests server-side; session and CSRF controls are verified; tests cover allowed and denied access for each sensitive action. |
| B1-T3: Audit identity and access changes | Security / authorization agent; data-model agent | Access/account audit events and persistence. | Approved account and permission changes are attributable by actor, action, entity, and time; ordinary application roles cannot silently alter audit history; sensitive values are not unnecessarily logged. |
| B2-T1: Implement normalized LIS entities | Data-model agent | Migrations and Eloquent models for patient, visit, order, order item, ordered examination, specimen, result, and supporting records. | Relationships match the architecture; required foreign keys and uniqueness constraints exist; model tests verify traceability and prevent orphan records. |
| B2-T2: Define and enforce workflow states | Workflow / backend agent; clinical workflow reviewer | State definitions, allowed transitions, timestamps, and transaction-backed application services. | Approved states and transitions are documented; invalid transitions return explicit conflicts; multi-record transitions are transactional and covered by service tests. |
| B2-T3: Add query performance and integrity safeguards | Data-model agent; QA / test agent | Search/worklist indexes, database constraints, relationship and invalid-state tests. | Required operational identifiers are unique/searchable; indexes cover agreed search and queue predicates; tests demonstrate constraints reject invalid relationships and duplicates. |
| B3-T1: Design and emit audit events | Security / authorization agent; data-model agent | Append-only audit storage, privacy-conscious payload design, and service instrumentation. | Sensitive committed changes produce attributable audit events; rolled-back transactions do not appear as completed changes; standard application roles cannot update/delete audit entries. |
| B3-T2: Map and import legacy records | Data-model agent; workflow / backend agent | Legacy inventory, source mapping, repeatable import commands, validation, exception reporting, and idempotency. | Mapping is documented; dry run identifies unsupported/ambiguous records; rerunning the import does not duplicate migrated records; source identifiers are preserved where useful. |
| B3-T3: Reconcile and prepare cutover | Operations / integration agent; clinical workflow reviewer | Count/total reconciliation, rollback/cutover checks, and retirement of legacy result-entry paths. | Reconciliation results meet clinic-approved tolerances or list exceptions for sign-off; rollback steps are rehearsed; legacy release paths cannot bypass the authorized workflow after cutover. |

### Epic C — Patient check-in, catalog, order, and payment

| Task | Accountable skill role | Subtask scope | Task acceptance criteria |
|---|---|---|---|
| C1-T1: Implement patient search and duplicate review | Workflow / backend agent; security / authorization agent | Search, registration, candidate review, and authorized merge/review flow. | Search uses only approved identifiers; candidate records are not silently merged; merge/review is permission-checked, auditable, and preserves history. |
| C1-T2: Create visits and check-in UX | Workflow / backend agent; frontend / workflow UX agent | Transactional visit creation, visit-number generation, status history, check-in and visit-summary screens. | Visit numbers remain unique under concurrent requests; visit records contain required actor/time/status; staff can complete check-in by keyboard and see actionable validation errors. |
| C1-T3: Verify privacy and edge cases | Security / authorization agent; QA / test agent | Data minimization, audit review, duplicate submission, ambiguity, and access tests. | Unauthorized search is denied; returned fields follow role policy; tests cover duplicate submissions, ambiguous matches, and visit-number collisions. |
| C2-T1: Implement catalog and package data | Data-model agent; workflow / backend agent | Catalog CRUD, price records, package versions/effective dates, components, and validation. | Individual examinations and packages remain distinct; invalid package composition is rejected; catalog edits do not mutate historical order snapshots. |
| C2-T2: Build and verify catalog management | Frontend / workflow UX agent; QA / test agent | Catalog screens, permissions, specimen/preparation/result metadata, history and tests. | Authorized users can manage approved catalog data; inactive/expired items cannot be newly selected; tests prove effective-date and historical stability behavior. |
| C2-T3: Gate clinical metadata on approval | Clinical workflow reviewer | Approved specimen requirements, preparation text, reference metadata, intervals, and thresholds. | Each clinical metadata value has an identified approver/source; unapproved reference intervals and critical thresholds are not entered or enabled. |
| C3-T1: Create billable orders and snapshots | Workflow / backend agent; data-model agent | Order and order-item creation, price/description snapshots, transaction handling. | An order records visit, ordering source/staff, and time; line type and snapshots are valid; failed transactions leave no partial order. |
| C3-T2: Resolve packages and handle overlaps | Workflow / backend agent; clinical workflow reviewer | Package component work items, provenance, overlap decision and policy. | Work items trace to the chosen line and package version; package components are not charged twice by default; overlap requires a recorded staff decision under approved policy. |
| C3-T3: Make order submission retry-safe | Workflow / backend agent; QA / test agent | Idempotency/unique operation reference and tests for mixed orders, catalog edits, overlaps, failures, retries. | Repeating the same submission creates no duplicate order or work items; a distinct valid submission remains possible; tests verify snapshot stability and failure recovery. |
| C4-T1: Approve payment rules | Clinical workflow reviewer; lead / architecture agent | Payment method, receipt, partial payment, adjustment, refund/reversal, and collection gating decisions. | Finance/clinic owners approve documented rules and who may perform them; payment gating does not get inferred from laboratory status. |
| C4-T2: Implement payment posting and receipts | Data-model agent; workflow / backend agent | Payment/payment-item records, transactional posting, receipt/reference uniqueness, cashier views and receipt templates. | Payments link to charge items and record cashier/time/method/reference; retries cannot post duplicate transactions; receipts match persisted amounts and status. |
| C4-T3: Verify cashier UX and financial controls | Frontend / workflow UX agent; security / authorization agent; QA / test agent | Cashier permissions, audit/idempotency/reconciliation and failure tests. | Only authorized cashiers can post or reverse permitted transactions; reversals/refunds are new auditable records; tests cover partial payment, duplicate posting, and failed transactions. |

### Epic D — Specimen collection and worklists

| Task | Accountable skill role | Subtask scope | Task acceptance criteria |
|---|---|---|---|
| D1-T1: Persist specimen lifecycle events | Data-model agent; workflow / backend agent | Specimen records and collection, receipt, and routing events. | Each specimen links to its ordered work; collection and receipt are separate attributable events; event history is preserved and invalid lifecycle changes are rejected. |
| D1-T2: Generate and print labels | Operations / integration agent; workflow / backend agent | Opaque accession/barcode generation, collision protection, label/receipt printing. | Barcodes contain no patient demographics; identifiers are unique and scannable with a human-readable fallback; collision and printer failure are surfaced to staff. |
| D1-T3: Deliver collection and receiving workflow | Frontend / workflow UX agent; QA / test agent | Collection/receiving worklists, identity confirmation, duplicate and failure tests. | Staff can verify patient/specimen identity and record collection/receipt; missing or mismatched identity blocks completion; duplicate scans and transaction failures do not create false completion. |
| D2-T1: Approve rejection and recollection rules | Clinical workflow reviewer | Allowed rejection reasons, transitions, and recollection policy. | Laboratory leadership approves rejection/recollection states and reason requirements; rejected specimens cannot be treated as valid specimens. |
| D2-T2: Implement rejection history and recollection linkage | Workflow / backend agent; data-model agent | Rejection events, reasons, actor/time, replacement linkage and transition tests. | Rejection requires a reason; each recollection links to the rejected/replaced specimen and ordered work; prior specimen/event history remains immutable and visible. |
| D2-T3: Surface recollection work to staff | Frontend / workflow UX agent; QA / test agent | Recollection indicators, screens, permissions, duplicate and invalid-transition tests. | Recollection-required work is actionable in the worklist; unauthorized or duplicate recollection is blocked with an explicit error. |
| D3-T1: Implement status-driven worklist queries | Workflow / backend agent; data-model agent | Queue filters, indexed queries, search and status transition service. | Worklist membership derives from explicit status/timestamps; agreed identifiers can be searched; query plans use appropriate indexes for expected filters. |
| D3-T2: Build role-specific worklist UX | Frontend / workflow UX agent | Responsive collection, receiving, and bench worklist screens and blocked-work messaging. | Staff can identify next actions and reasons for blocked work; common operations are keyboard-accessible and respect role permissions. |
| D3-T3: Protect concurrent work and verify queue behavior | Workflow / backend agent; QA / test agent | Stale-update/conflict behavior, ordering, permissions, status races. | Concurrent or stale transitions return a visible conflict rather than overwriting newer state; automated tests cover queue membership, permissions, and races. |

### Epic E — Result lifecycle and patient communication

| Task | Accountable skill role | Subtask scope | Task acceptance criteria |
|---|---|---|---|
| E1-T1: Persist and validate structured results | Data-model agent; workflow / backend agent | Result records, per-examination metadata, value/unit/flag validation, provenance. | Results link to ordered work and record source, actor, and time; approved metadata is snapshotted; invalid/incomplete values are rejected or explicitly flagged and cannot release. |
| E1-T2: Build result-entry workflow | Frontend / workflow UX agent | Manual entry screens, worklist, validation feedback, permissions. | Authorized staff can enter and review their entry before submission; validation errors identify corrective action; the UI never implies that entry releases a result. |
| E1-T3: Verify entry authorization and failure cases | Security / authorization agent; QA / test agent | Audit, unauthorized entry, missing metadata, invalid transition and boundary tests. | Unauthorized result entry is denied server-side; tests cover missing configuration, invalid values, retries, and audit attribution. |
| E2-T1: Approve review and authorization policy | Clinical workflow reviewer | Reviewer eligibility, review criteria, reasons, separation-of-duty decision. | Laboratory leadership approves criteria and roles, including an explicit decision on separation of duty; unapproved criteria are not hard-coded. |
| E2-T2: Implement review history and authorization gate | Workflow / backend agent; security / authorization agent | Review record, authorization policy, transition service, idempotency and audit. | Only eligible roles authorize complete results; every decision is attributable; invalid and repeated authorization requests produce explicit, safe outcomes. |
| E2-T3: Build reviewer UX and test controls | Frontend / workflow UX agent; QA / test agent | Review screens, flags/provenance, role, incomplete-result and concurrency tests. | Reviewer sees the information needed for an approved decision; denied/incomplete cases are clear; automated tests verify role restrictions and concurrent review behavior. |
| E3-T1: Define release and identity-verification rules | Clinical workflow reviewer; security / authorization agent | Release eligibility, report contents, recipient identity verification, approved channels. | Clinic and privacy owners approve release prerequisites and handover method; each decision is recorded and no channel is enabled without approval. |
| E3-T2: Implement authorized release and immutable report | Workflow / backend agent; data-model agent | Release transaction, report snapshot, actor/time, idempotent release reference. | Release is possible only for eligible authorized results; report snapshot cannot be silently changed; retries do not create duplicate releases. |
| E3-T3: Track delivery attempts and failures | Operations / integration agent; workflow / backend agent | Delivery events, attempts, failure states, queue/retry behavior. | Each attempt and outcome is persisted; pending/failed delivery remains visible and is never marked delivered; retries are bounded and safe. |
| E3-T4: Build report and handover experience | Frontend / workflow UX agent; operations / integration agent | Report rendering, handover screen, required printing. | Report content matches the release snapshot; staff can record the approved identity check and handover; render/print failures are explicit and retryable. |
| E3-T5: Verify release end to end | QA / test agent; security / authorization agent | Premature/repeat release denial, rendering/delivery failure, audit tests. | End-to-end tests prove unauthorized or premature release is denied, valid release is attributable, duplicate release is prevented, and failed delivery is not success-shaped. |
| E4-T1: Approve amendment and critical follow-up policy | Clinical workflow reviewer | Amendment authority, critical-value escalation, contact and documentation requirements. | Laboratory leadership approves the amendment process and critical-result escalation criteria; unresolved thresholds or contacts are not invented. |
| E4-T2: Implement immutable amendments and new delivery events | Workflow / backend agent; data-model agent; security / authorization agent | Revision history, replacement values, reasons, approval, amendment release/delivery. | Released values remain unchanged; amendments preserve prior and replacement values with actor/time/reason; each amendment requires authorization and creates a new delivery event. |
| E4-T3: Implement critical-result follow-up workflow | Workflow / backend agent; frontend / workflow UX agent | Follow-up task/event, contact attempts, unresolved escalation screens. | Critical values create actionable follow-up; communication is recorded only with recipient, time, and outcome; unresolved attempts stay visible to authorized staff. |
| E4-T4: Verify amendment and escalation invariants | QA / test agent; security / authorization agent | Immutability, retries, failed contact, and authorization tests. | Automated tests demonstrate immutable prior releases, denied unauthorized amendments, safe retries, and no false communication status after failed contact. |

### Epic F — Quality, operations, and resilience

| Task | Accountable skill role | Subtask scope | Task acceptance criteria |
|---|---|---|---|
| F1-T1: Approve QC and reagent rules | Clinical workflow reviewer | QC/lot/expiry requirements and out-of-control handling. | Laboratory leadership approves required fields, review process, and any work-blocking conditions before policy is configured. |
| F1-T2: Implement lot and QC records | Data-model agent; workflow / backend agent | Reagent lot/QC schema, validation, permissions, and audit events. | Records capture approved lot/expiry, test/instrument/work period, measurement/outcome, actor, and time; unauthorized changes are denied and auditable. |
| F1-T3: Surface quality exceptions | Frontend / workflow UX agent; QA / test agent | Worklist indicators and tests for expired lots and failed QC policy. | Authorized staff can see actionable quality exceptions; configured blocking behavior is enforced; tests cover expired and failed-QC cases. |
| F2-T1: Approve operational metric definitions | Clinical workflow reviewer; lead / architecture agent | Turnaround definitions, filters, roles, and expected volumes. | Metric start/end events, exclusions, and aggregation period are agreed and documented before dashboards are considered authoritative. |
| F2-T2: Implement privacy-conscious dashboards | Workflow / backend agent; data-model agent; frontend / workflow UX agent | Indexed aggregates, dashboard views, performance checks. | Dashboard values match approved definitions on representative test data; access is role-restricted; routine summaries do not expose unnecessary patient identifiers. |
| F2-T3: Secure exports and verify calculations | Security / authorization agent; QA / test agent | Export authorization/audit, boundary/timezone and permission tests. | Export access is authorized and auditable; tests cover date boundaries and metric calculations; unauthorized exports are denied. |
| F3-T1: Document downtime and reconciliation procedure | Operations / integration agent; clinical workflow reviewer | Pre-numbered forms, identity/specimen checks, roles, reconciliation and cutover runbook. | Clinic owners approve a usable downtime procedure; responsibilities and reconciliation checks are explicit; identifiers can be reconciled without silently merging records. |
| F3-T2: Implement duplicate-aware reconciliation | Data-model agent; workflow / backend agent; QA / test agent | Reconciliation tooling, duplicate detection, tests. | Reconciliation is repeatable and reports duplicate/conflicting identifiers for resolution; it preserves source references and does not silently overwrite live records. |
| F3-T3: Configure backups and restoration | Operations / integration agent | Encrypted backups, artifact coverage, monitoring, retention, restore runbook and drill. | Backup scope, schedule, encryption, and retention match approved objectives; a restoration drill demonstrates recoverability and records measured results. |
| F3-T4: Monitor application and queue health | Operations / integration agent; security / authorization agent | Error, queue, database, failed-login, and backup monitoring without patient data in general logs. | Alerts identify actionable failures; dashboards/logs exclude unnecessary patient data; a simulated queue or backup failure is detected and handled per runbook. |

### Epic G — Deferred integrations and extensions

| Task | Accountable skill role | Subtask scope | Task acceptance criteria |
|---|---|---|---|
| G1-T1: Approve instrument interface contract | Operations / integration agent; clinical workflow reviewer | Protocol, supported messages, mapping, instrument identity and validation rules. | Laboratory and technical owners approve a versioned interface contract and exception ownership before connection to production data. |
| G1-T2: Implement durable, validated instrument adapter | Operations / integration agent; workflow / backend agent; security / authorization agent | Adapter, durable receipt, validation, deduplication, quarantine, provenance. | Valid messages map only to verified work; malformed/unmatched messages are quarantined; duplicate messages are idempotent; imported results remain subject to review and authorization. |
| G1-T3: Add monitoring and exercise failures | Operations / integration agent; QA / test agent | Bounded retries, staff exception workflow, malformed/duplicate/unmatched/delayed/replayed tests. | Retry exhaustion and quarantined messages are visible and actionable; tests show no data loss, duplicate result, or release bypass across failure scenarios. |
| G2-T1: Approve delivery channel and privacy controls | Security / authorization agent; clinical workflow reviewer | Provider assessment, recipient verification, privacy approval, credential and incident requirements. | Privacy/security and clinic owners approve the provider, data flow, identity verification, credential handling, and incident process before implementation is enabled. |
| G2-T2: Implement external delivery adapter | Operations / integration agent; workflow / backend agent | Channel adapter, existing delivery-event workflow, secret configuration and rotation procedure. | Adapter records each attempt and outcome; credentials are external to source control and rotatable; provider failure cannot mark a result delivered or alter release authorization. |
| G2-T3: Verify retries and data minimization | QA / test agent; security / authorization agent | Provider failure, retry, status reconciliation and patient-data minimization tests. | Tests verify bounded idempotent retries, accurate delivery reconciliation, restricted access, and transmission of only approved patient data. |

## 6. Dependency and release guidance

- Complete **A1** before implementing clinic-dependent state transitions, payment rules, reference ranges, critical thresholds, or result authorization.
- **A2**, **B1**, and **B2** are prerequisites for safely delivering the core operational workflows.
- **B3** must be planned before production migration or cutover; migration testing should use representative data and a rollback plan.
- **C1–C4** establish the traceable order that **D1–D3** and **E1–E4** depend on.
- Do not enable result release until authorization, immutable report snapshots, audit history, identity verification, and delivery-failure behavior have passed end-to-end testing.
- **F1–F3** improve operational maturity; prioritize according to clinic risk assessment and deployment readiness.
- Start **G1–G2** only after core identity matching, authorization, audit, retry safety, exception handling, and monitoring are proven.

## 7. Release validation checklist

- [ ] A walk-in patient can be found or registered, checked in, ordered, and traced through the visit lifecycle.
- [ ] Package composition and price snapshots remain historically stable after catalog changes.
- [ ] Payment status is independent of laboratory status; reversals/refunds are auditable.
- [ ] Specimen identity, collection, receipt, rejection, and recollection are traceable.
- [ ] Unauthorized staff cannot enter, authorize, release, amend, or administer outside assigned permissions.
- [ ] No result can be released before required review and authorization.
- [ ] Released results remain immutable; amendments and new deliveries preserve prior history.
- [ ] Duplicate requests, transaction failures, job retries, and delivery failures do not produce success-shaped outcomes or duplicate records.
- [ ] Audit events, operational reports, exports, logs, backups, and support workflows follow privacy requirements.
- [ ] Migration reconciliation, downtime procedure, backup restoration, monitoring, and rollback have been exercised before production use.

## 8. Open decisions and owners

The [A1-T2 policy and service decision register](./A1-T2-POLICY-AND-SERVICE-DECISION-REGISTER.md) is the canonical record of each decision, its status, accountable owner role, affected stories, and approval evidence. An affected story is not ready while any release-blocking decision remains unresolved. Every unresolved decision must retain an accountable owner; do not infer clinic policy from the target architecture.
