# Clean Architecture Compliance Standards

## 1. Purpose  
Ensure all teams follow a unified, maintainable, and testable project structure based on Clean Architecture principles across APIs and microservices.

## 2. Scope  
Applies to all teams developing services using Python (Flask) and Node.js (Express) — and any future backend technologies supported by Google Cloud.  

## 3. Definitions  
- **Entity Layer:** Core business objects, independent of frameworks or external libraries.  
- **Repository Layer:** Handles data access and abstracts the database implementation.  
- **Use Case Layer:** Business logic coordinating between entities, repositories, and external systems.  
- **Infrastructure Layer:** Frameworks, APIs, and external services implementation.  
- **Dependency Inversion Principle (DIP):** High-level modules should not depend on low-level modules. Both should depend on abstractions.

---

## 4. Requirements  

### 4.1. General Requirements  
- All projects **must** follow the layered structure: `entity`, `repository`, `use_case`, `infrastructure`.  
- Inner layers **cannot** depend on outer layers — dependencies flow inward.  
- Business logic must reside exclusively in **use cases** — never in controllers or infrastructure.  
- No external libraries (e.g., Flask, Express, ORMs) should leak into the **entity** or **use_case** layers.  

### 4.2. Specific Requirements  

#### 4.2.1. Entities  
- Pure Python/JavaScript classes representing core business models.  
- No framework dependencies, validations, or serialization logic allowed.

#### 4.2.2. Repositories  
- Interfaces must be defined at the use case level.  
- Implementations belong to the infrastructure layer (e.g., SQLAlchemy, MongoDB, Firestore).  
- Ensure CRUD operations are abstracted — no raw queries in use cases.

#### 4.2.3. Use Cases  
- Each use case **must** represent a single business operation (e.g., `CreateOrder`, `CancelBooking`).  
- No HTTP requests, DB connections, or framework logic allowed here.  
- Should remain unit-test friendly — mocked repositories and external services.

#### 4.2.4. Infrastructure  
- Handles framework-specific code: Flask controllers, Express routes, database engines, etc.  
- Avoid business logic leaks — controllers call only use cases and map HTTP requests to domain models.  

---

## 5. Procedures  

### 5.1. General Procedures  
- Teams **must** start new projects with the Clean Architecture structure in place.  
- Existing projects **should** be gradually refactored to match this structure.

### 5.2. Specific Procedures  
- **Dependency Injection** must be used to provide repositories and external services to use cases.  
- Use environment variables for configuration — avoid hardcoding.  
- Implement error handling at the infrastructure level, not in the domain.  

---

## 6. Roles and Responsibilities  

- **Developers:** Ensure each new feature or refactor aligns with Clean Architecture.  
- **Code Reviewers:** Reject PRs with misplaced logic (e.g., business logic in infrastructure).  
- **Tech Leads:** Oversee compliance, guide refactors, and ensure cross-team consistency.

---

## 7. Tools and Resources  

- Python: Flask, SQLAlchemy, Marshmallow (only in infrastructure).  
- Node.js: Express, Sequelize/Mongoose, Joi (only in infrastructure).  
- Database migrations: Alembic (Python), Sequelize CLI (Node).  
- Unit testing: Pytest, Jest.  
- Linting: Black, ESLint.  

---

## 8. Monitoring and Compliance  

- Code reviews **must** validate adherence to Clean Architecture principles.  
- Periodic architecture audits by tech leads every 3 months.  
- Teams failing to comply **must** prioritize refactors in the next sprint.  

---

## 9. Review and Update  

- Reviewed quarterly or upon adopting a new backend technology or major process change.

---

## 10. Appendices  

### Example Project Structure (Python Flask)
```plaintext
📁 src/
│
├── 📁 entity/
│   └── order.py
│
├── 📁 repository/
│   └── order_repository.py
│
├── 📁 use_case/
│   └── create_order.py
│
└── 📁 infrastructure/
    ├── order_repository_sqlalchemy.py
    └── app.py
