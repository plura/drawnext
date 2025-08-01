# DrawNext

**DrawNext** is a collaborative drawing web app inspired by the *Cadavre Exquis* (Exquisite Corpse) surrealist game. Multiple users contribute to a single drawing in distinct sections and pages—without seeing each other's full input—creating unexpected and playful results.

## Concept

DrawNext is built around the metaphor of a **notebook**:

- Each **notebook** has multiple **pages**.
- Each **page** is divided into a fixed number of **sections**.
- Each **section** is drawn by a different user.
- Users only see minimal guides from the previous section to continue the drawing (just like in the classic game).

## Tech Stack

- **Backend**: PHP (custom MVC structure)
- **Database**: MySQL (relational design with notebooks, pages, sections, users)
- **Frontend**: React (for submission, drawing canvas, preview)
- **Communication**: REST API between React frontend and PHP backend

## Folder Structure (Work in Progress)

```text
backend/
├── api/
│ ├── create.php # Handles new drawing submissions
│ └── show.php # Displays drawing info
├── lib/
│ ├── Database.php # Simple PDO wrapper
│ ├── Validation.php # All backend validation logic
│ └── utils.php
└── sql/
└── schema.sql # Database schema
frontend/
└── ... (React app)
```


## Database Design

Core tables:

- `users`: Registered users (by email)
- `notebooks`: Container for collaborative drawing sessions
- `sections`: Defines drawing slots per page (e.g. 3 per page)
- `drawings`: Stores actual user contributions
- `pages`: Tracks page numbers within notebooks

Each `drawing` links to:
- A `user`
- A `notebook`, `page`, and `section`

## Validation Rules

- All inputs (notebook ID, section ID, page number, email) are validated on the backend.
- Page ranges are checked against the notebook's max pages.
- Sections are verified to belong to the selected notebook.
- Emails must exist and be valid.

## To Do

- [x] Backend validation logic
- [ ] Image upload and storage
- [ ] Drawing canvas (React)
- [ ] Authentication (optional)
- [ ] Notebook creation UI
- [ ] Preview / gallery view of completed pages

## License

MIT License (or specify another if needed)
