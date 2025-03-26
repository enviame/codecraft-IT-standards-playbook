# Bitbucket Pull Request Guidelines  

## 1. Purpose  
Define rules and best practices for creating and reviewing Pull Requests (PRs) in Bitbucket, ensuring code quality, maintainability, and deployment stability.  

## 2. Scope  
This standard applies to all engineering team developers who contribute to the repository and participate in PR reviews.  

## 3. Definitions  
- **PR (Pull Request):** A request to merge changes from a feature branch into *stage* or *master*.  
- **Linting:** Automated tools that check code style compliance with team conventions.  
- **Cloud Build GCP:** Service that triggers CI/CD pipelines when PRs are merged and pushed.  

## 4. Requirements  

### 4.1. General Requirements  
- All code changes must go through a PR before being merged.  
- Each PR must link to a JIRA story and reflect its purpose in the title and description.  
- Code consistency must be maintained according to the team’s coding conventions.  

### 4.2. Specific Requirements  

#### Branch Naming Convention  
Branches must follow the format:  
``
{type}/{JIRA-TICKET-NUMBER}-{short-description}
``

Where:  
- **{type}** describes the nature of the change.  
- **{JIRA-TICKET-NUMBER}** links the branch to a JIRA story.  
- **{short-description}** briefly explains the change in lowercase, using hyphens (`-`) for spaces.  

##### Branch Types  
| **Type**    | **Description** | **Examples** |
|-------------|------------------|--------------|
| `feature`   | New functionality or major enhancement. | `feature/PROJ-123-user-authentication` |
| `bugfix`    | Fix for a reported bug. | `bugfix/PROJ-456-fix-login-error` |
| `hotfix`    | Urgent fix for production issues. | `hotfix/PROD-789-patch-payment-crash` |
| `improvement` | Code refactor or performance improvement without changing functionality. | `improvement/PROJ-321-optimize-db-query` |
| `chore`     | Routine maintenance (e.g., config updates, library upgrades). | `chore/DEVOPS-555-update-dependencies` |
| `release`   | Branch dedicated to preparing a release version. | `release/1.2.0` |
| `docs`      | Documentation updates. | `docs/PROJ-678-update-api-guide` |

#### Branch Usage Guidelines  

- **Feature branches** are for significant code additions or UI updates.  
  - ✅ Example: `feature/APP-101-add-user-dashboard`  
- **Bugfix branches** should only fix the reported issue without refactoring unrelated code.  
  - ✅ Example: `bugfix/APP-203-fix-api-timeout`  
- **Hotfix branches** are reserved for critical production issues that require immediate action.  
  - ✅ Example: `hotfix/APP-500-fix-payment-error`  
- **Improvement branches** focus on optimization or refactoring.  
  - ✅ Example: `improvement/APP-678-refactor-auth-service`  
- **Chore branches** are for non-functional tasks like config changes or dependency updates.  
  - ✅ Example: `chore/DEVOPS-222-update-ci-pipeline`  
- **Docs branches** should only modify documentation files (`README.md`, API docs, etc.).  
  - ✅ Example: `docs/APP-404-update-onboarding-guide`  

⚠️ **Avoid generic or unclear branch names like `feature/new-feature` or `fix/bug`** — branches must reflect the purpose.  

---

## 5. Procedures  

### 5.1. General Procedures  
1. Create a new branch following the naming convention.  
2. Develop the changes, ensuring they comply with team standards.  
3. Create the PR in Bitbucket using the defined template.  
4. Assign intermediate or senior developers as reviewers.  
5. Address comments and apply necessary changes until approved.  
6. Merge into *stage* after approval.  

### 5.2. Specific Procedures  
- If a PR impacts performance, include before-and-after metrics.  
- For significant changes, schedule a quick tech review before approval.  

### 5.3. Handling Change Requests (Author’s Role)  

The author should:  

1. **Acknowledge each comment** (e.g., "Good point — I’ll fix this" or "Let’s discuss this one").  
2. **Resolve must-fix comments** before the PR is approved.  
3. **For suggestions or questions**, choose one of the following responses:  
   - **Implement the suggestion** and push the changes.  
   - **Justify why the current approach is better** (e.g., "This approach is more readable given our current architecture").  
   - **Propose marking it as technical debt** (see next section).  


### 5.4. Marking Changes as Technical Debt
If a non-critical change is too complex or time-consuming for the current release, the team may agree to defer it as technical debt. The process is:

1 Discuss in the PR comments and agree with the reviewer on why it can wait.
✅ Example comment:
```commandline
This refactor would improve performance, but it's too risky for this sprint. Let's track it as technical debt.
```
2. Create a JIRA ticket labeled as tech-debt with a clear description of the problem and proposed improvement.
3. Add the JIRA link to the PR comment to ensure the debt is documented.
4. Mark the PR comment as resolved and proceed with the merge.

## 6. Roles and Responsibilities  
- **Author**:
  - Create a clean, well-described PR. 
  - Respond to reviewer feedback promptly. 
  - Ensure the final PR is clean, squashed if needed, and ready for merge.

- **Reviewer:**
  - Provide constructive, clear feedback. 
  - Focus on performance, readability, and code style. 
  - Request changes if necessary and approve only when standards are met.
  
- **Tech Lead:**
  - Ensure PR guidelines are followed. 
  - Monitor technical debt accumulation and prioritize refactoring when needed.

## 7. Tools and Resources  
- Bitbucket Pull Requests  
- Automated linting  
- Cloud Build GCP for deployments  
- Bitbucket PR templates  

## 8. Monitoring and Compliance  
- Random PR audits will be conducted monthly to ensure compliance with this standard.  
- PRs not meeting requirements may be rejected until corrected.  

## 9. Review and Update  
- This standard will be reviewed every 6 months by the engineering team for potential improvements.  

## 10. Appendices  

### **PR Template**  
```markdown
## Context  
[Brief description of the problem or need.]  

## Changes Made  
[Technical explanation of the changes.]  

## Impact  
[Possible effects on the system, dependencies, or risks.]  

## Tests Performed  
[Test cases executed, expected results.]  
