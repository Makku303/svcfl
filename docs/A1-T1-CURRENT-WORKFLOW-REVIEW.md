# A1-T1 — Current Workflow Map

## Review scope and evidence

This review examines the Laravel snapshot in [`svcl_backup_20261106/`](../svcl_backup_20261106). Because the directory is named as a backup, confirm that it represents the current application before treating this map as the clinic's authoritative workflow. This is a review of repository evidence, not confirmation of actual clinic standard operating procedures.

## Workflow represented in the repository

1. **Request intake:** A public form collects patient details, a requesting physician, and selected tests or packages. Its POST handler validates and stores a `diagnostics` record; it also inserts a `users` row when the email is new. No patient duplicate-review or visit-creation step was identified.
   - [Intake form](../svcl_backup_20261106/resources/views/express-diagnostics.blade.php)
   - [Intake controller](../svcl_backup_20261106/app/Http/Controllers/DiagnosticsController.php)
2. **Catalog selection:** The form offers individual tests and packages. The code loads their names, but this review found no evidence of active/effective-date handling, order-time snapshots, or package-component resolution.
3. **Lab lookup and result entry:** Staff-facing test pages are behind authentication and email-verification middleware. Their search calls a separate endpoint by record ID or exact name; the endpoint returns the matching diagnostics row.
   - [Routes](../svcl_backup_20261106/routes/web.php)
   - [Search handler](../svcl_backup_20261106/app/Http/Controllers/DiagnosticsController.php)
4. **Saving results:** A result-writing endpoint exists, but no result-table migration was found in the inspected migrations. The CBC screen's Save button is `type="button"` in a form with no action. A complete, working result-persistence workflow is therefore not established by this code.
   - [Result handler](../svcl_backup_20261106/app/Http/Controllers/ResultsController.php)
   - [CBC screen](../svcl_backup_20261106/resources/views/admin-pages/diagnostics/cbc.blade.php)
5. **Payment, specimens, review, release, and follow-up:** No distinct payment, specimen, result-review/authorization, delivery, or critical-result workflow was found in the inspected application migrations and routes. The public result pages appear to be static forms, not a demonstrated lookup-and-release process.
   - [Routes](../svcl_backup_20261106/routes/web.php)
   - [CBC result page](../svcl_backup_20261106/resources/views/cbc-results.blade.php)

## Traceability and usability gaps

The represented flow does not connect a patient to a uniquely identified visit, order, bill/payment, specimen, and result. The inspected code also does not show event history for collection, receipt, rejection, recollection, result review or amendment, release/delivery, or follow-up.

These are expected target-design concepts in the [LIS architecture](./ARCHITECTURE.md), not claims about existing behavior. The tests found during this review cover authentication/profile scaffolding rather than LIS workflows.

## Decisions requiring clinic confirmation

| Decision to confirm | Why it affects the workflow | Suggested decision owner |
|---|---|---|
| Which identifiers staff use to find patients; how possible duplicates are reviewed or merged | Determines safe registration and lookup behavior | Registration lead and clinic privacy/identity owner |
| When a request becomes an order; how visit/request numbers are assigned; who may place or change orders | The current intake record does not define those lifecycle steps | Clinic operations and laboratory lead |
| Whether collection may happen before payment; what “OR No” means; partial payment, cancellation, refund, and reversal rules | A displayed receipt field is not a payment workflow | Clinic manager and cashier/finance lead |
| Collection, receipt, rejection, and recollection handoffs; required actors, timestamps, reasons, and identity checks | Needed to preserve specimen traceability | Laboratory/phlebotomy lead |
| Who enters, reviews, authorizes, releases, and amends results; how amendments preserve history | Determines role boundaries and release controls | Laboratory director or designated quality lead |
| Critical-result criteria and escalation/contact process | Must come from approved clinical governance, not be inferred by engineering | Laboratory director and clinical governance |
| Result handover identity checks and delivery channels/outcomes | Needed to define safe release and delivery records | Clinic operations and privacy owner |
| Required data, access, retention, downtime, operating targets, and recovery objectives | Affects data capture, permissions, and operational procedures | Privacy/compliance owner and IT/operations lead |

Clinic representatives must validate the real-world process and approve policy decisions. This review does not supply clinical thresholds or clinic-specific rules.
