- Design layout skeleton for redump can already be done without DB.

- Style user management & permission management sites with default theme
- Fix Login & Register header entrie theming, as well as their pages
- Add region select additionally to the standard filters in the discs menu
- Make the hamburger menu on mobile work with the discs submenu
- Specific roles should be able to give a user for example datter & verifier permissions

-----
Suggested by rarenight:

Add the ability for granular per-user database edit permissions, like this:

Submit new discs form permission
For certain systems (choose which ones)
For all systems

Submit verifications form permission
For certain systems (choose which ones)
For all systems

Approve user-submitted new dumps in pending queue
For certain systems (choose which ones)
For all systems

Approve user-submitted verifications in pending queue
For certain systems (choose which ones)
For all systems

In four user classes:

Admin - All permissions assigned by default
Moderator - All permissions assigned by default
Datter - Custom permissions assigned by Admin or Moderator
New Member - Newbies who can only submit forum posts

That way you don't have to be a full-fledged mod to be able to help the staff out and self-submit easy verifications for simple systems like Gamecube.

Also, implement server-side per-system dynamic forms which flag common potential errors (like someone submitting a PS2 ringcode for "SONY DADC" instead of "Sony DADC"). This staff knowledge can be hard-coded and would ward against common stylistic mistakes. 
-----