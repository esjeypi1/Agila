
# AGILA — Thesis Prototype (Mock Data)

Short description
-----------------
AGILA is a PHP + JavaScript + Python prototype created for a thesis project. The codebase demonstrates map visualizations, simple data processing, and an interface for exploring simulated crime statistics per administrative area. IMPORTANT: this repository contains only mock/dummy data intended for testing and demonstration — it is not a production system.

Thesis title
------------
**Agila: Employing Knowledge-Based Recommendations in Crime Mapping for Manila City using ARIMA Forecasting Algorithm**

Repository contents (high level)
--------------------------------
- `index.php`, user/admin pages and UI components
- `scripts/` — server helpers, small PHP utilities, and the JS config emitter
- `scripts/js/` — client-side map code (`maps.js`, `maps_solo.js`) and `config.js.php` (emits runtime config)
- `csv/` — sample CSV datasets (synthetic/test data)
- `styles/`, `images/` — static assets

Quick start (local development)
-------------------------------
Prerequisites:
- PHP 8+ (or your system PHP)
- A modern browser

1) Create a local `.env` from the example and add your local values (DO NOT commit `.env`):

```bash
cp .env.example .env
# Edit .env and set DB + API key values for local testing
```

2) Start a local PHP server at the repository root (where `index.php` is):

```bash
php -S localhost:8000 -t .
# Open http://localhost:8000/ in your browser
```

3) Confirm maps load: The project uses a small server-generated JS (`scripts/js/config.js.php`) which reads `GOOGLE_MAPS_API_KEY` from the environment and sets `window.GOOGLE_MAPS_API_KEY`. The client map scripts (`scripts/js/maps.js`, `scripts/js/maps_solo.js`) reference that global variable when bootstrapping the Maps library.

Environment variables and secrets
--------------------------------
- The repository uses an environment-driven approach for secrets. Do NOT commit `.env` or other credential files.
- Key env variables used by the project:

```
GOOGLE_MAPS_API_KEY=your_google_maps_browser_api_key_here
DB_HOST=localhost
DB_NAME=agiladb
DB_USER=agatha
DB_PASS=your_db_password_here
```

- For local convenience the repo includes `scripts/load_env.php` which will parse a `.env` file into the PHP environment when included. In production, set real environment variables via your host/CI provider instead.

Data disclaimer (thesis / mock data)
----------------------------------
All data included under `csv/` and any sample records used in the UI are synthetic or anonymized and are provided solely for the purpose of thesis demonstration and testing. Do not use these datasets as operational data. If your thesis requires explicit documentation of the synthetic data, include that as part of your write-up.

Notes about the Maps API
-----------------------
- The project uses the Google Maps JavaScript API in the browser. Browser API keys are visible to the client, so always restrict them by HTTP referrer and API surface.
- The repository now reads the Maps API key at runtime via `scripts/js/config.js.php` which reads `GOOGLE_MAPS_API_KEY` from the environment and emits a small JS snippet that sets `window.GOOGLE_MAPS_API_KEY` before other client code runs.

Contributing & license
-----------------------
- This repository was created for a thesis prototype. If you plan to publish it for collaborators, add a `LICENSE` file (MIT/Apache-2.0) and `CONTRIBUTING.md` describing how to set up `.env` locally.

Contact
-------
If you want help finishing the remaining cleanup tasks (final secret scan, history rewrite, fixing `scripts/js/maps.js`, or preparing `SECURITY.md`), open an issue or contact the repository owner and I can prepare step-by-step commands.

--
_This README is intended for publishing on GitHub. It documents that this repo is a mock/test project for thesis use and provides setup and security guidance._
