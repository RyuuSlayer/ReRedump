# Security Policy

## Supported Versions

We release patches for security vulnerabilities. Below are the currently supported versions:

| Version | Supported          |
| ------- | ------------------ |
| 1.0.x   | :white_check_mark: |
| < 1.0   | :x:                |

## Reporting a Vulnerability

We take the security of ReRedump seriously. If you believe you have found a security vulnerability, please report it to us as described below.

**Please do not report security vulnerabilities through public GitHub issues.**

Instead, please report them via email or discord message to:
- Primary: security@reredump.org (Not currently setup)
- Secondary: https://discord.gg/Yg9WfGKFJr (Notify one of the admins)

You should receive a response within 48 hours. If for some reason you do not, please follow up via email to ensure we received your original message.

Please include the following information in your report:

- Type of issue (e.g., buffer overflow, SQL injection, cross-site scripting, etc.)
- Full paths of source file(s) related to the manifestation of the issue
- The location of the affected source code (tag/branch/commit or direct URL)
- Any special configuration required to reproduce the issue
- Step-by-step instructions to reproduce the issue
- Proof-of-concept or exploit code (if possible)
- Impact of the issue, including how an attacker might exploit it

## Preferred Languages

We prefer all communications to be in English.

## Security Update Process

1. The security team will acknowledge your email within 48 hours.
2. The team will investigate and update you as we make progress.
3. If the team confirms a vulnerability:
   - We will develop and test a fix
   - We will prepare a security advisory
   - The fix will be applied to the main branch and backported to supported versions
   - A new release will be published with the fix
4. We will publicly disclose the vulnerability after users have had sufficient time to update.

## Public Disclosure Process

1. Security vulnerabilities will be announced through:
   - GitHub Security Advisories
   - Our security mailing list
   - The release notes

2. The disclosure will include:
   - Details of the vulnerability
   - Impact on users
   - Steps users should take
   - Attribution to the reporter (if desired)

## Comments on this Policy

If you have suggestions on how this process could be improved, please submit a pull request.
