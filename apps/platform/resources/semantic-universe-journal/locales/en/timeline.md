# Semantic Universe Timeline

This file gathers the main work carried out in the Semantic Universe journey in chronological order.

## 2026-03-26 | Initial document and prototype reviews

What We Did:
- The existing HTML, PHP and form infrastructures of the hemorrhoid study were reviewed.
- The form structures, patient/protocol/follow-up flow and data collection logic were studied.

Why We Did It:
- To establish a first working application and data flow through a medical pilot domain.
- To prepare a pilot field for the larger semantic platform idea.

Outcome:
- A local patient -> protocol -> clinical form -> follow-up flow was established.

## 2026-03-26 | Laravel platform foundation was established

What We Did:
- A Laravel-based foundation was created.
- Patient, examination protocol, clinical form and follow-up structures were built.
- Authentication, role/permission, basic CRUD and dashboard layers were prepared.

Why We Did It:
- To create a stronger and more scalable platform foundation.
- To move from the existing prototype toward a product architecture.

Outcome:
- A working Laravel core was established.

## 2026-03-26 | The Semantic Universe upper structure began to be defined

What We Did:
- The main Semantic Universe project idea, philosophical upper structure and first documents were created.
- Architecture, roadmap, workflow and backlog documents were opened.

Why We Did It:
- To define the main universe that will carry individual applications such as the hemorrhoid domain.

Outcome:
- Semantic Universe was named as an official program and upper system.

## 2026-03-26 | History and decision memory were established

What We Did:
- Documents such as history, strategic execution log, decision register and foundational intake were opened.
- The documentary layer and knowledge intake layer were established.

Why We Did It:
- To ensure that the work done would not be lost.
- To prepare a foundation for a manifesto, timeline, documentary and interactive history layer.

Outcome:
- Written memory and a decision trail started to form.

## 2026-03-26 | The Semantic Universe local shell was established

What We Did:
- A separate local SemanticUniverse platform was opened outside the hemorrhoid domain.
- A separate shell running at `http://localhost/SemanticUniverse/` was created.

Why We Did It:
- To separate the publicly accessible application from the super-admin/God Mode platform.
- To make the frame and shell logic of the semantic universe visually observable.

Outcome:
- An independent local SemanticUniverse shell was obtained.

## 2026-03-26 | The Semantic Universe shell design was improved

What We Did:
- The top bar, ribbon, left tree navigation, center workspace, right context panel and bottom dock were created.
- An Outlook + Teams hybrid platform language was targeted.
- An adaptive, Bootstrap-based shell was attempted.

Why We Did It:
- To create a frame screen through which the user can visually direct the semantic system.

Outcome:
- The basic shell structure emerged.

## 2026-03-26 | The System > Resources > Define Resource flow was started

What We Did:
- `System` was established as the first main menu.
- The `Resources` layer was created beneath it.
- The `Define Resource` screen was opened beneath that layer.

Why We Did It:
- According to the user's philosophy, the first practical act of bringing the universe into existence is to bring resources into existence.

Outcome:
- The skeleton of the first semantic data-entry screen was created.

## 2026-03-26 | God Mode logic was established

What We Did:
- God Mode login/logout logic was added.
- A structure was created that shows super-admin content when logged in and an empty shell when logged out.
- God Mode profile information was added to the shell.

Why We Did It:
- To separate the public-facing view from the authorized super-admin workspace.

Outcome:
- A controlled shell mode was established.

## 2026-03-26 | The user began transferring the semantic philosophy

What We Did:
- The user's medical, surgical, informatics, systems engineering and management-science background was recorded.
- The distinctions of `object / event`, `transition from object to resource`, `existence + function + activity + target`, `human / movable / immovable / time`, and `base / derivative / derived / functional` were captured.

Why We Did It:
- To move the founding ontology of Semantic Universe into written memory without losing it.

Outcome:
- The first semantic core was captured in writing.

## 2026-03-26 | Process philosophy was recorded

What We Did:
- The approach of explaining the event universe through processes was written down.
- The division of processes into four main classes was defined.
- Existence and management, core work, support services, and measurement-evaluation-development classes were recorded.

Why We Did It:
- To establish event/process semantics together with resource semantics.

Outcome:
- The main resource + process based structure emerged.

## 2026-03-27 | The official SemanticUniverse GitHub repository was opened

What We Did:
- The repository `https://github.com/SAGIMKARINCA/SemanticUniverse` was opened.
- The folder `C:\\Projects\\semantic-universe` was connected to this repository.
- The first foundation commits and CI skeleton were added.

Why We Did It:
- To make the local work the official versioned center.

Outcome:
- GitHub became the official source of truth.

## 2026-03-27 | The live transition and PostgreSQL direction were clarified

What We Did:
- The live transition strategy was drafted.
- The staging -> production model was accepted.
- PostgreSQL was proposed as the main database direction.
- Live platform transition plans were created.

Why We Did It:
- To make Semantic Universe suitable for SaaS and POA growth.

Outcome:
- Plans and decisions for live architecture were established.

## 2026-03-27 | A new Ubuntu VM trial began on ZEN / Xen Orchestra

What We Did:
- Access to the ZEN panel was verified.
- Attempts were made to open a new Ubuntu 24.04 VM inside Xen Orchestra.
- Network and boot issues were observed.
- An ISO import timeout problem was encountered.

Why We Did It:
- To open a clean Ubuntu-based environment for staging.

Outcome:
- It became clear that the hypervisor/ISO layer required extra audit and a proper ISO strategy first.

## 2026-03-28 | The ZEN Server audit and optimization phase was started

What We Did:
- An audit checklist was produced for the ZEN Server.
- An initial VM classification draft was created.

Why We Did It:
- To avoid aggressive changes before understanding the storage, network and VM layout.

Outcome:
- A safe optimization framework was established.

## 2026-03-28 | The shared memory layer was activated

What We Did:
- The shared-memory journal folder was created.
- The files `timeline.md`, `decisions.md`, `definitions.md` and `experiments.md` were opened.

Why We Did It:
- To preserve all conversations, decisions, definitions and experiments in a shared memory.
- To be able to turn this into a timeline/documentary/web layer later.

Outcome:
- The first core of the official shared-memory layer was opened.

## 2026-03-28 | A working Ubuntu staging server was established

What We Did:
- A new Ubuntu server was brought up at `89.252.182.73`.
- SSH/SFTP access was verified.
- `nginx`, `postgresql`, `redis-server`, `php 8.3` and `composer` were installed.
- The PostgreSQL database `semanticuniverse_staging` and the user `semanticuser` were created.
- The SemanticUniverse GitHub repository was cloned under `/var/www/semantic-universe`.
- The `apps/platform` Laravel application was created inside the repository.
- `.env` was connected to PostgreSQL and the migrations were run.

Why We Did It:
- To establish an official staging environment accessible on the internet.

Outcome:
- A working Laravel staging environment was obtained on `staging.semanger.com`.

## 2026-03-28 | The SemanticUniverse shell began to be ported into the Laravel application

What We Did:
- A Laravel application was created under `C:\\Projects\\semantic-universe\\apps\\platform`.
- A port script was written to move the `local-platform/index.php` logic into Laravel routes + Blade views.
- `semantic-universe`, `godmode-login` and `logout` routes were added to `routes/web.php`.
- Blade shell and public CSS files were produced inside the Laravel app.
- Route cache was cleared and the new routes were verified.

Why We Did It:
- To move from a standalone local PHP shell to the official Laravel platform layer inside the same SemanticUniverse repository.

Outcome:
- The local shell was made ready to live inside Laravel and to be pushed to staging.

## 2026-03-28 | A protected history web layer was established

What We Did:
- The timeline, decisions, definitions and experiments files in the journal were confirmed as the official shared-memory layer.
- These files were copied into the Laravel staging application.
- A password-protected history/timeline page was designed.

Why We Did It:
- To make the shared memory visible in a protected web layer instead of keeping it only in the filesystem.
- To prepare the foundation for a documentary / timeline presentation layer.

Outcome:
- The protected history interface for the staging environment was prepared.

## 2026-03-28 | The history host was prepared on the staging server

What We Did:
- A separate Nginx virtual host definition was created for the history host on the staging server.
- A host flow was configured to redirect root requests to the `semantic-universe/journal` area.
- `git pull`, `composer install`, `optimize:clear` and Nginx/PHP-FPM reloads were run on the staging server.

Why We Did It:
- To present the shared memory under a distinct history/documentary host identity, separate from the main workshop.

Outcome:
- The history host on the staging server was prepared.

## 2026-03-29 | Overflow fixes, search, year filter and presentation mode were added to the history page

What We Did:
- A dedicated body class was defined to resolve global overflow issues on the history page.
- A search box and year selector were added for the timeline.
- Featured cards and timeline records were connected to a shared filtering logic.
- A presentation mode that hides side panels with a single action was added.

Why We Did It:
- To fix link and scroll behavior on the history page.
- To gain easier browsing and presentation capability within the timeline.

Outcome:
- The history layer now scrolls more smoothly, can be navigated with search/year filters, and can be switched into presentation mode.

## 2026-03-29 | Record IDs and detail files were added to the history records

What We Did:
- Record IDs in the format `SUH-YYYYMMDD-XX` were assigned to same-day history entries.
- A dedicated detail markdown file was produced for each record.
- A record-based Details popup was added to the history page.

Why We Did It:
- To make multiple records on the same day hierarchical and readable.
- To keep conversation, execution and outcome information in a separate file layer for each record.

Outcome:
- The history timeline turned into a research interface with record IDs and file-based detail expansions.

## 2026-03-29 | The shared-memory writing standard was defined

What We Did:
- Lowercase starts, spelling mistakes and punctuation problems in the shared-memory files were corrected.
- History detail files were regenerated according to a single writing standard.
- The writing standard was recorded in the decisions and definitions layers.

Why We Did It:
- To make the history layer more readable and institutional.
- To prevent the same type of spelling and writing problems from repeating.

Outcome:
- Shared-memory content reached a consistent Turkish writing standard.

## 2026-03-29 | Related-source recording became mandatory in history details

What We Did:
- A permanent rule was added requiring the user's files, presentations, educational explanations and defining texts to be written into related detail records.
- A Related Sources section was added to the detail generation template.
- The history system was extended so that the foundational determinant document and semantic explanations can be linked to related records.

Why We Did It:
- To turn the history layer into a memory system that preserves not only results, but also the sources that fed them.
- To ensure that the user's files and educational texts are not lost in later rounds.

Outcome:
- Source/document references became a mandatory recording standard in the history layer.

## 2026-03-29 | Source files began to be archived on the server

What We Did:
- The first foundational determinant document was connected to a structure that allows it to be archived on the server.
- Clickable source-link support was defined in detail records.

Why We Did It:
- To make the user's sources visible in history details not only as text, but also as openable documents.
- To turn the shared memory into a real research archive and evidence layer.

Outcome:
- The first source-file archive model accessible through the journal session was defined.

## 2026-03-29 | The semantic hospital presentation set was added to the source archive

What We Did:
- The source files in the semantic hospital presentation set were recorded in the journal archive catalog.
- Downloadable files were added to the server archive, while a large file was marked as a pending source in the catalog.
- A Source Documents panel was added to the journal screen.

Why We Did It:
- To use these presentations later as principles, values, strategic methods and roadmaps.
- To turn the history layer into a living source-document archive.

Outcome:
- A downloadable source-document catalog was formed inside the journal.

## 2026-03-29 | The Sources page was converted into a card-based archive view

What We Did:
- The source summary area inside the journal was turned into a separated card structure.
- A separate `Sources` page was created.
- Category filter, status filter and search were added to this page.
- The placement, titles and descriptions of source cards were reorganized into block structures.

Why We Did It:
- To make it clearer which document belongs to which block.
- To make the source archive readable and navigable at a glance.
- To present the sources inside the history/journal layer as a separate research surface.

Outcome:
- Source documents can now be viewed as separated cards.
- A separate source page with search and filtering support was created.

## 2026-03-29 | Encoding issues were diagnosed at the file level and the UTF-8 standard was clarified

What We Did:
- Visible texts in the shell, history and sources layers were re-examined from a file-encoding perspective.
- Content errors and file-encoding errors were separated from each other.
- A decision requiring UTF-8 verification of release files was recorded in the shared memory.

Why We Did It:
- To correctly diagnose the real cause of broken characters seen in the browser.
- To prevent the same problem from recurring in staging and history layers.

Outcome:
- Content correction and encoding correction will now be treated as separate control steps for visible texts.
- The UTF-8 quality gate was clarified at the file level.

## 2026-03-29 | The multilingual interface foundation was established

What We Did:
- Turkish and English language files were created for the Semantic Universe shell, history and sources pages.
- A language switcher was added to the menu and active locale became session-based.
- Visible texts were moved out of the Blade files and into language-key based access.

Why We Did It:
- To build the Semantic Universe workshop so that it can grow not only in Turkish but also in English and later languages.
- To avoid translating the same visible text manually over and over.
- To establish multilingual release discipline from the start and avoid an expensive later migration.

Outcome:
- The multilingual foundation was prepared for the shell, history and sources layers.
- A foundational infrastructure was established for managing new visible texts through language files.

## 2026-03-30 | The history and sources content layer became locale-based

What We Did:
- English copies of the `timeline`, `decisions`, `definitions` and `experiments` files were added for the history layer.
- English category, summary, role and status-note fields were added to the sources manifest.
- The journal routes were completed so that they resolve content files according to locale.

Why We Did It:
- To ensure that language switching changes not only the menu and shell, but also the content layer.
- To eliminate mixed Turkish-English views in the history and sources surfaces.

Outcome:
- Multilingual switching now works at the visible content level in the history and sources pages.
