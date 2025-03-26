# Proper Use of Commits  

## 1. Purpose  
Ensure that commits are clear, meaningful, and maintainable to improve code traceability, facilitate code reviews, and help future debugging efforts.  

## 2. Scope  
This standard applies to all developers contributing to repositories within the organization.  

## 3. Definitions  
- **Commit:** A snapshot of changes made to the codebase.  
- **Squash:** Combining multiple commits into one before merging to clean up the history.  
- **Rebase:** Moving or reordering commits on top of another branch’s latest state.  

## 4. Requirements  

### 4.1. General Requirements  
- Commits must be small and frequent — each commit should represent a single, logical change.  
- Commit messages must clearly express the **intent** of the change.  
- The author of the commit is fully responsible for its quality, and reviewers may request changes if commits are unclear or messy.  

### 4.2. Specific Requirements  

#### 4.2.1. Commit Message Structure  
Commit messages should follow this structure:

```commandline
[type]: [short description]
[Optional longer description]
```

- **Type**: Describes the nature of the change (see table below).  
- **Short description**: A concise summary of the change (max 72 characters).  
- **Optional longer description**: If needed, explain *why* the change was made or provide relevant details (wrapped at 72 characters per line).  

**✅ Good Examples:**

feat: add user login functionality
fix: resolve checkout page crash on mobile
refactor: simplify database query logic

**❌ Bad Examples:**  

update stuff
fix bug
wip: trying new things


#### 4.2.2. Commit Types  
| **Type**     | **Description**                                         | **Example**                          |
|--------------|---------------------------------------------------------|-------------------------------------|
| `feat`       | New feature implementation.                             | `feat: add profile picture upload`  |
| `fix`        | Bug fixes or error corrections.                         | `fix: handle empty cart correctly`  |
| `refactor`   | Code restructuring without changing behavior.           | `refactor: extract cart logic`      |
| `style`      | Code style changes (formatting, spaces, etc.).           | `style: fix indentation`            |
| `chore`      | Maintenance tasks like config updates or CI changes.    | `chore: update dependencies`        |
| `docs`       | Documentation updates.                                  | `docs: add setup instructions`      |
| `test`       | Adding or modifying tests.                              | `test: add checkout service tests`  |

#### 4.2.3. Commit Frequency Guidelines  
- ✅ **One change per commit:** Each commit must reflect a **single responsibility** (e.g., fix one bug, add one feature, improve one function).  
- ✅ **Atomic commits:** Ensure the commit works independently (e.g., avoid breaking the build).  
- ❌ **Avoid “work in progress” (WIP) commits:** Instead, commit meaningful progress or use temporary local branches for incomplete work.  

---

## 5. Procedures  

### 5.1. General Procedures  
1. **Write clean code** before committing — avoid pushing incomplete or messy changes.  
2. **Use the defined commit message format.**  
3. **Push frequently** to ensure work is backed up and traceable.  
4. **Review commits before pushing** to ensure they meet team standards.  

### 5.2. Optional Best Practices  
- **Squash commits** (if applicable) for very noisy branches before merging into `master` or `stage`.  
  - Example: Squash `10 WIP commits` into `1 clean commit` summarizing the changes.  
- **Rebase (optional)** to keep the commit history clean and linear when pulling updates.  

---

## 6. Roles and Responsibilities  
- **Developer:** Responsible for creating clear, meaningful commits.  
- **Reviewer:** Ensure the commit history remains clean and easy to understand.  
- **Engineering manager:** Review the convention periodically and update if needed.  

## 7. Tools and Resources  
- Git (CLI, Sourcetree, or preferred Git client).  
- Git hooks (optional, for enforcing style or message format).  

## 8. Monitoring and Compliance  
- PR reviewers will verify that commits follow this standard.  
- Non-compliant commits will be flagged for revision.  

## 9. Review and Update  
- This standard will be reviewed every 6 months to ensure it remains aligned with team needs and practices.  

## 10. Appendices  

### Example Commit Workflow  
```bash
# Create a branch
git checkout -b feature/APP-123-add-user-authentication  

# Make small, focused changes
git add src/auth.js  
git commit -m "feat: implement basic auth logic"  

# Another small change
git add src/routes.js  
git commit -m "feat: add auth routes"  

# Push changes
git push origin feature/APP-123-add-user-authentication  

