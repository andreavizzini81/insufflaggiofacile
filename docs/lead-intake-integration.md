# Dedicated Zapier lead intake

- Public website forms: `POST /api/richiedi-preventivo`, mandatory reCAPTCHA.
- Legacy `POST /api/facebook-lead-request`: same public action and reCAPTCHA requirement as before this change. The historical Zap is not modified.
- New Zap only: `POST /api/zapier-lead-request`, dedicated bearer authentication from server `ZAPIER_LEAD_TOKEN`. No reCAPTCHA required on this authenticated route. Body/query fields cannot authenticate it. Missing/short server secret returns 503; invalid bearer returns 401 before side effects.
- Move the existing reCAPTCHA secret into server `RECAPTCHA_SECRET_KEY` without putting it in the repository. Its exposure in history still requires rotation through the provider separately; relocation is not rotation.
- Generate a dedicated cryptographically random 32-byte-or-longer secret. Configure it on the server and in the NEW Zap's Authorization header only, over HTTPS. Do not reuse existing credentials, include it in a URL/lead payload or print it in logs.
- Back up production files/configuration outside the web root before deployment. Keep .env outside repository updates and protected. Ensure Authorization headers reach PHP.
- Run PHP lint and `php tests/lead_intake_guards.php`. Test missing/wrong integration auth and public missing reCAPTCHA without sending contacts. A valid real browser reCAPTCHA acceptance test is separate.
- Deploy code and environment together. Update only the new Zap URL/header; keep the historical Zap untouched.
- Retest exactly one clearly labeled authorized TEST lead. Verify Meta delivery, Zapier input/output, CRM application status and actual record. Account for CRM email, calendar and contact-sync effects; a Successful Zapier badge alone is insufficient.
- No campaign publication is authorized.
