

# Automated Deployment Standard  

## 1. Purpose  
Ensure consistent, secure, and reliable automated deployments using GCP Cloud Build across all teams and projects. This standard defines the structure, workflow, and requirements for automated deployment pipelines, ensuring rollbacks and environment separation are handled effectively.  

## 2. Scope  
This standard applies to all teams developing APIs and microservices using Python (Flask) and Node.js (Express), deploying to Google Cloud Platform (Cloud Run or App Engine).  

## 3. Definitions  
- **Cloud Build**: GCP's CI/CD service used to build, test, and deploy applications.  
- **Trigger**: Event-based mechanism in Cloud Build that starts a pipeline upon changes in the source repository.  
- **Rollback**: The process of reverting to a previous, stable version of the application.  
- **Secret Manager**: GCP service used to securely store and manage environment variables and secrets.  
- **Mirror Repo**: A mirrored version of the Bitbucket repo on GCP for deployment purposes.  

---

## 4. Requirements  

### 4.1. General Requirements  
- All projects must include automated deployment pipelines using GCP Cloud Build.  
- Deployments must support both `stage` and `prod` environments.  
- Rollback procedures must be included in deployment configurations.  
- Environment variables must be securely stored in GCP Secret Manager.  
- Repository structure and naming must follow defined conventions.  

---

### 4.2. Specific Requirements  

#### 4.2.1. Repository Naming Convention  
- **Bitbucket repository name**: `[sigla-nombre-proyecto]-nombre-repo`  
  - Example: `api-storefront-backend`  
- The Bitbucket project must match the GCP project name.  
- A mirror of the Bitbucket repo must exist on GCP for deployment pipelines.  

#### 4.2.2. Cloud Build Triggers  
- Each project must have **two Cloud Build triggers**:  
  - **Stage Trigger**: Activated on push to the `stage` branch.  
  - **Prod Trigger**: Activated on push to the `prod` branch.  

- Each trigger must include substitution variables to differentiate environments, e.g.:  
  ```yaml
  _ENVIRONMENT: stage  
  _PROJECT_ID: my-gcp-project-stage  
  ```

#### 4.2.3. Rollback Mechanism  
- Cloud Run and App Engine services must retain previous versions to enable rollback.  
- Rollbacks should be initiated manually after validating errors or performance degradation.  
- A rollback guide must be documented per service (recommended as part of the repo’s README).  

#### 4.2.4. Environment Variables  
- All sensitive environment variables must be stored and managed through GCP Secret Manager.  
- Secrets must not be hardcoded or stored in the code repository.  
- Each environment (`stage`/`prod`) must have its own set of secrets.  

---

## 5. Procedures  

### 5.1. General Procedures  
- All code changes must go through a **Pull Request (PR)** review process before merging.  
- Merges into `stage` or `prod` branches automatically trigger their respective Cloud Build pipelines.  
- No direct pushes to `stage` or `prod` branches are allowed.  

---

### 5.2. Deployment Process  
1. Developer creates a feature branch from `stage`.  
2. After development and local testing, create a **PR** targeting `stage`.  
3. **Reviewer** approves the PR (following the Pull Request Guidelines).  
4. Merge PR → triggers the **stage** deployment pipeline.  
5. After QA validation, create a **PR** targeting `prod`.  
6. **Reviewer** approves and merges into `prod` → triggers the **prod** deployment pipeline.  
7. Monitor deployment and validate service health.  

---

### 5.3. Rollback Procedure  
1. Identify the faulty deployment.  
2. Go to GCP Cloud Run or App Engine service version history.  
3. Manually select the last stable version and deploy it.  
4. Create an incident report and address the issue before attempting a new deployment.  

---

## 6. Roles and Responsibilities  

- **Developer**: Implements feature, follows PR guidelines, ensures changes are tested.  
- **Reviewer**: Reviews PRs, ensures code quality, and approves merges.  
- **Team Lead/DevOps Engineer**: Monitors pipelines, handles rollbacks, and maintains CI/CD configurations.  

---

## 7. Tools and Resources  

- **Bitbucket**: Source control and code review.  
- **Cloud Build (GCP)**: CI/CD pipeline.  
- **Secret Manager (GCP)**: Environment variable and secret storage.  
- **Cloud Run / App Engine (GCP)**: Deployment targets for services.  
- **Monitoring tools** (e.g., Stackdriver): For service health checks and performance.  

---

## 8. Monitoring and Compliance  

- Pipelines must include basic unit tests and linting.  
- All merges must follow the Pull Request Guidelines.  
- Cloud Build pipeline logs must be monitored for failures.  
- Rollbacks must be documented as incidents, reviewed, and resolved.  

---

## 9. Review and Update  

- This standard must be reviewed quarterly.  
- Changes require approval from Engineering Leadership.  

---

## 10. Appendices  

### Example Cloud Build Trigger Configuration  
```yaml
steps:
  - name: 'gcr.io/cloud-builders/gcloud'
    args:
      - 'run'
      - 'deploy'
      - '$_SERVICE_NAME'
      - '--image=$_IMAGE'
      - '--region=$_REGION'
      - '--platform=managed'
      - '--set-env-vars=ENVIRONMENT=$_ENVIRONMENT'
      - '--project=$_PROJECT_ID'
substitutions:
  _SERVICE_NAME: 'api-backend'
  _IMAGE: 'gcr.io/my-gcp-project/api-backend'
  _REGION: 'us-central1'
  _ENVIRONMENT: 'stage'
  _PROJECT_ID: 'my-gcp-project-stage'
```

---

### Deployment Checklist  
✅ PR created and approved.  
✅ Merge performed into `stage` or `prod`.  
✅ Cloud Build pipeline triggered.  
✅ Service deployed to correct GCP environment.  
✅ Health checks passed.  
✅ Rollback plan validated.  
