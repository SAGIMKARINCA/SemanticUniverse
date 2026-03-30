# Semantic Universe Decision Register

This file keeps a short record of the main decisions taken so far.

## D-001 | Semantic Universe is the main upper system

Decision:
- Semantic Universe is not a single application; it is the main upper system that carries all sub-products and systems.

Why:
- To gather all products and standards of the user under a single umbrella.

## D-002 | Laravel is the foundation, Semantic Universe is the upper system

Decision:
- Laravel will be treated as a framework/platform foundation.
- Semantic Universe will be the `System Main Loader` established on that foundation.

Why:
- To avoid conceptually confusing the framework with the upper system.

## D-003 | The Spiral model will be used in the software life cycle

Decision:
- The Spiral model will be taken as the basis in the development, test and release flow.

Why:
- Because this large and philosophically deep system does not progress linearly.

## D-004 | Staging first, then production

Decision:
- The sequence local -> GitHub -> staging -> production will be followed.

Why:
- To reduce risk.
- To enable collaborative testing with AI tools.

## D-005 | PostgreSQL will be the main database direction

Decision:
- PostgreSQL will be the primary database direction for Semantic Universe.

Why:
- It provides JSONB support.
- It is suitable for event/state/rule metadata structures.
- It offers easier semi-structured data handling.

## D-006 | God Mode is separate from the public area

Decision:
- God Mode super-admin workspaces will be separated from the general shell.

Why:
- To avoid mixing super-admin operations with the general user experience.

## D-007 | Resources will be brought into existence first

Decision:
- The first practical step in building the universe is the `Resources` layer.

Why:
- Because according to the user's semantic philosophy, the universe is built by first bringing resources into existence.

## D-008 | The shared memory layer is mandatory

Decision:
- All work will be written into `timeline.md`, `decisions.md`, `definitions.md` and `experiments.md`.

Why:
- So that nothing that is done is lost.
- So that a documentary/timeline web layer can later be produced.

## D-009 | The staging domain will be `staging.semanger.com`

Decision:
- The first official internet-accessible test environment will run under `staging.semanger.com`.

Why:
- To separate the production/public area from the development and test area.

## D-010 | The SemanticUniverse shell will officially move into Laravel

Decision:
- `local-platform` will remain as a temporary prototype source.
- The official working shell will run inside the Laravel application, using routes/views/public structure.

Why:
- To use the same application backbone in GitHub, staging and later production.

## D-011 | The history web layer will be shown behind a password

Decision:
- Timeline, decisions, definitions and experiment records will be shown on staging through a password-protected history page.

Why:
- To make the shared memory both protected and visible.
- To prepare the ground for a documentary/timeline presentation layer later.

## D-012 | History will be served from a separate host

Decision:
- The history layer will be served through `history.semanger.com`.

Why:
- To preserve the staging workshop as the working area while giving the history/documentary layer its own identity.

Outcome:
- A separate Nginx virtual host for the history host was prepared on the staging server, and the DNS record was directed to `89.252.182.73`.

## D-013 | Shared-memory writing standard is mandatory

Decision:
- All user-facing texts in shared-memory records will be written with proper Turkish characters, correct capitalization and correct punctuation.
- Every sentence will start with a capital letter and end with suitable punctuation.
- All user-facing files will be stored as UTF-8; no text containing broken characters will be released.

Why:
- To preserve the readability of history, decision and experiment records.
- To prevent the same writing and spelling problems from repeating.
- To prefer Turkish equivalents in user-facing technical expressions whenever not strictly required otherwise.

## D-014 | Related-source recording is mandatory

Decision:
- The user's files, educational explanations, defining texts and reference sources are written into the related history detail as text and/or links.
- The Related Sources section is a mandatory checkpoint in all future actions.

Why:
- To turn the history layer into a research memory that carries source traces, not only outcomes.
- To prevent provided documents, presentations and educational texts from being lost in later rounds.

## D-015 | Related source files are archived on the server

Decision:
- Files provided by the user during these processes are uploaded into the server archive for the history/journal layer when appropriate.
- File names are shown as clickable links inside detail records.
- The local original path and a short description of the source are preserved in the detail.

Why:
- To turn the history layer into a living memory that carries not only notes but also evidence and documents.
- To prevent determinant files, presentations, trainings and explanation documents from being lost in later rounds.

## D-016 | The source-document catalog is a strategic archive

Decision:
- Presentations, PDFs and similar source files provided by the user are catalogued under Source Documents inside the journal/history layer.
- This catalog is used as the official reference archive for principles, values, strategic methods and roadmaps.
- Files of suitable size are archived on the server; large files are marked as pending and completed through separate upload.

Why:
- To ensure that foundational sources used in future planning and product decisions are not lost.
- To turn the journal layer into an openable and downloadable knowledge archive beyond plain text notes.

## D-017 | Visible texts pass through a Turkish and UTF-8 quality gate before release

Decision:
- All user-facing page, card, button, modal and detail texts are checked for Turkish writing, punctuation and UTF-8 appearance before release.
- If broken characters, lowercase bullet starts, missing punctuation or mixed Turkish-English labels are detected, they are corrected before release.
- Newly added source, history and detail pages are subject to the same quality gate.

Why:
- To keep the visible interface institutional, readable and trustworthy.
- To prevent previously observed encoding and writing problems from being released again.

## D-018 | The encoding of release files is verified at file level

Decision:
- Blade, route, source-manifest, journal and detail markdown files are verified as UTF-8 before release.
- Broken characters seen in terminal or editor output are not treated as content errors until the real file encoding is verified.
- If an encoding issue is detected, the file encoding is corrected first; only genuine content errors are changed through content revision.

Why:
- The same text may appear broken in the browser if the file was saved with the wrong encoding.
- To prevent correctly written content from reproducing the same problem in staging and production due to wrongly encoded files.

## D-019 | Visible interface texts are managed through language files

Decision:
- New user-facing texts in Semantic Universe are not embedded directly into Blade; they are managed through language files and keys.
- New screens are prepared with Turkish and English together at minimum; later languages expand the same key set.
- Language selection is preserved at session level and the main shell, history and sources layers behave together according to that choice.

Why:
- To establish multilingual growth in an orderly way from the start.
- To avoid increasing maintenance cost by rewriting the same text in scattered places across different pages.
- To prevent Turkish-English confusion and later quality loss caused by rushed translation.

## D-020 | History and sources content are loaded from locale-based files

Decision:
- The `timeline`, `decisions`, `definitions` and `experiments` contents in the history surface are loaded from locale-based journal files.
- Metadata such as category, summary, role and status note in the sources surface are resolved from a locale-based manifest layer.
- If a translation is missing, controlled fallback is applied; however, new multilingual content is prepared in Turkish and English together.

Why:
- To prevent language switching from remaining only in the upper shell.
- To produce a genuinely multilingual experience in the history and sources pages.
