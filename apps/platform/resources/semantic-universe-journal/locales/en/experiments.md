# Semantic Universe Experiments Register

This file records the experiments that have been tried so far, whether they worked or where they got stuck.

## E-001 | Hemorrhoid pilot-domain experiment

Purpose:
- To produce a pilot domain based on patient / protocol / form / follow-up.

What Was Tried:
- HTML form structure.
- PHP web application.
- Laravel-based domain model.

Outcome:
- The pilot-domain logic was made to work.
- However, it became clear that this should remain a separate application from Semantic Universe.

## E-002 | Semantic Universe local shell experiment

Purpose:
- To visually test the main frame/shell structure of the semantic universe.

What Was Tried:
- Top bar.
- Ribbon.
- Left tree menu.
- Center workspace.
- Right context panel.
- Bottom dock.

Outcome:
- A working local shell was established.

## E-003 | God Mode shell experiment

Purpose:
- To separate the public shell from the super-admin shell.

What Was Tried:
- Session-based login/logout.
- Empty shell vs. full shell separation.

Outcome:
- The basic logic worked.

## E-004 | Theme and frame behavior panel

Purpose:
- To produce theme and behavior preferences for each frame.

What Was Tried:
- Theme selection.
- Frame behavior.
- Settings ribbon and panel logic.

Outcome:
- The first working settings logic emerged.

## E-005 | GitHub-centered SemanticUniverse repo transition

Purpose:
- To move local work into the official Git foundation.

What Was Tried:
- Repo initialization.
- Remote binding.
- Initial foundation commits.
- Basic CI workflow.

Outcome:
- The official repository became active.

## E-006 | Ubuntu staging VM experiment on ZEN/Xen

Purpose:
- To open a clean Ubuntu 24.04 VM for staging.

What Was Tried:
- Creating a new VM.
- Choosing a public network.
- Importing an ISO.

Issues:
- There was no bootable device.
- The Ubuntu ISO was missing from the ISO repository.
- An XO import timeout error appeared.
- A storage/space problem was suspected.

Outcome:
- It became clear that the hypervisor layer required extra audit and a proper ISO strategy.

## E-007 | ZEN Server audit phase

Purpose:
- To understand what is critical, what is test-only and what is a candidate inside the current virtual environment.

What Was Tried:
- The VM list was classified.
- An audit checklist was opened.

Outcome:
- A controlled audit approach was adopted instead of aggressive deletion.

## E-008 | Laravel + PostgreSQL installation experiment on Ubuntu staging

Purpose:
- To establish an official, internet-accessible staging backbone for Semantic Universe.

What Was Tried:
- Ubuntu server installation.
- SSH/SFTP access.
- `nginx`, `postgresql`, `redis-server`, `php`, `composer`.
- Laravel application installation and PostgreSQL connection.
- Nginx vhost + DNS for `staging.semanger.com`.

Outcome:
- A working staging environment emerged.
- The first opening screen was the default Laravel welcome page.

## E-009 | Porting the local shell into the Laravel Blade view layer

Purpose:
- To move the SemanticUniverse shell, previously held as `local-platform/index.php`, into the official Laravel layer.

What Was Tried:
- Conversion from the source shell into Blade.
- Session-based God Mode routes.
- Moving the existing style file into the Laravel public directory.
- Route-cache cleanup and route verification.

Outcome:
- The local shell was made to run inside Laravel.
- The next step became push to GitHub and `git pull` on staging.

## E-010 | CWP + staging automation experiment for the history host

Purpose:
- To point `history.semanger.com` to the history/timeline layer.

What Was Tried:
- Opening an HTTP session in the CWP user panel and attempting automatic access to the DNS editor.
- Writing an Nginx vhost with Posh-SSH on the staging server, creating the symlink, reloading services and testing via host header.
- Pulling the staging application from GitHub and synchronizing history routes and permissions.

Outcome:
- CWP DNS-editor automation behaved unstably and the record could not be added fully automatically.
- In contrast, the history host was prepared successfully on the staging server; host-header testing began to return 200 for the history route.

## E-011 | Manual completion of the history DNS record

Purpose:
- To connect the `history.semanger.com` host to the staging history layer using a real DNS record.

What Was Tried:
- An `A` record for `history.semanger.com` was manually added in the CWP DNS zone screen.
- The target IP was set to `89.252.182.73`.

Outcome:
- The last step that had stalled under automation was completed manually.
- Only verification and propagation timing remained.

## E-012 | Shared-memory writing standard correction experiment

Purpose:
- To clean lowercase starts, spelling problems and punctuation faults in the shared-memory files.

What Was Tried:
- Timeline, decisions, definitions and experiment contents were reorganized according to the Turkish writing standard.
- Detail files were regenerated according to the same standard.
- The writing standard was recorded into the decisions and definitions layers.

Outcome:
- The texts in the history view reached a more readable, consistent and institutional writing order.

## E-013 | Multilingual content-alignment experiment for history and sources

Purpose:
- To make language switching work at the visible-content level in the history and sources surfaces.

What Was Tried:
- Locale-based journal files.
- English metadata fields in the sources manifest.
- Turkish fallback and English content resolution together.

Outcome:
- Language selection became effective not only in menus, but also in the history and sources content.
