# Lead intake: public forms and Zapier

## Security boundary

- `POST /api/richiedi-preventivo`: public website forms. The existing reCAPTCHA token, score and action verification remains mandatory. A bearer token or a submitted `piattaforma=Facebook` does not bypass it.
- `POST /api/facebook-lead-request`: server-to-server integration only. Requires `Authorization: Bearer <secret>`. No reCAPTCHA token is expected from Zapier. No authentication via query parameters or lead payload.
- Missing/short server secret returns HTTP 503; missing/wrong bearer returns HTTP 401 before any contact, deal, calendar, Google Contacts or mail side effect.
- This is not a deployment. Do not enable or test against production until server configuration is complete.

## Required rollout (do not commit secrets)

1. In the server secret configuration set `RECAPTCHA_SECRET_KEY` to a newly rotated valid reCAPTCHA secret. The previously hardcoded secret was exposed in repository history: deleting the constant does not revoke it. Keep the matching browser site-key configuration valid.
2. Generate a cryptographically random, dedicated Zapier credential (at least 32 bytes of entropy; e.g. 32 random bytes encoded as hex). Store it as `ZAPIER_LEAD_TOKEN` on the server. Do not reuse a reCAPTCHA, SMTP, login or existing webhook secret.
3. Configure the same secret in the Zapier POST header `Authorization` with value `Bearer <secret>`. Prefer a secret-capable connection field; restrict editor access. Never use a URL query parameter or a mapped lead field. Ensure the web server passes the Authorization header to PHP.
4. Inventory every authorized client of `/api/facebook-lead-request` (including historical Zaps and any other integrations). Coordinate their credentials before deploying: existing calls without authentication will be rejected. Do not change the active original Zap without its owner's explicit authorization.
5. Deploy the reviewed code and environment configuration together. Preserve reCAPTCHA on all public forms. Review the existing Enterprise JS/siteverify pairing separately; this change intentionally does not change the verification provider.
6. Run isolated tests: `php tests/lead_intake_guards.php`; lint the controller and index with `php -l`.
7. Retest the authorized, clearly labeled TEST lead once. Verify both Zapier transport and the CRM's application-level `status`, actual CRM record, expected fields and downstream notifications. A Zapier 'Successful' run alone is insufficient. The CRM also creates an appointment and triggers notification/contact-sync side effects.
8. Verify public forms reject missing/invalid reCAPTCHA and accept a genuinely valid browser-generated token. Do not fabricate tokens. Never publish the advertising campaign as part of this rollout.

## Rollback and operations

Do not roll back by exposing the integration without authentication or disabling reCAPTCHA. Pause affected intake clients if deployment/configuration cannot be coordinated. Rotate the dedicated credential in server configuration and authorized Zapier clients together; fail closed during any mismatch. Investigate failures without logging Authorization values or secret environment contents.

No live contact is sent by the isolated guard tests. Database, Google Contacts, email, real reCAPTCHA acceptance and production deployment must be verified separately.
