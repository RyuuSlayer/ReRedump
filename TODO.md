- Design layout skeleton for redump can already be done without DB.
- Build user management in tailwind, only accessible with user management permissions (permissions can be influenced for a user, permissions/rules can be influenced, best case a user only gets roles)
    Role has permissions, all things that should be behind a lock, only permissions are checked there, meaning if user has role, then they have permissions, i.e. no hardcoding of roles
- Create seeder for standard roles & permissions
- Besides user management, role & permission management is needed on a admin level

- Add region select additionally to the standard filters in the discs menu
- Make the hamburger menu on mobile work with the discs submenu