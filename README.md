STEPS FOR DEMO
1. Firstly, a client can create an account. After creating an account, he can login into the
account. At the first screen , he will see a dashboard screen. He can edit his profile from
the Dashboard page.

2. Next there is a tab called “Documents” from where he can upload the documents.
Admin can access all the documents but clients can only access only documents that
are uploaded by them.

3. ACL- Access control List. In this there are three tabs Users, Roles, Permissions.
- Permissions : This includes permissions which can assign to different Roles.
- Roles: This includes roles like admin, manager, client etc which can assign to each
user.
- Users: These are the clients which can login to the website and the role is assigned to
him and according to that role, he can access only his assigned permissions.
Details for each Page:
1. Login
Client can login to the website after registering an account.

2. Logout
User can log out once he logged into the website.

3. Sign Up
User can create a new account if does not have an account.

4. User management
User can edit his Profile.

5. User Right Management
Admin has a Permission to access all users and documents data and he can assign
different permissions to different roles(Users) from the access control System.
But other roles like manager, vice manager has different permissions. For eg : a simple
user cannot add a new user permissions but he can edit his profile(like username).

6. Document Uploads
In this section, every logged in person can upload a document with the document name,
document he has to upload with the current date and time.
The documents are stored in project directory in an encrypted form and a person can
download by decrypting it.

7. Document List
It shows all the list of uploaded documents.

8. Document Access Rights
Only admin can access all the documents.
Logged in users can only access those documents which are uploaded by them.

9. Document Modification
Logged in users can edit his uploaded document.

10. Document Deletion
Logged in user can delete his uploaded document.

11. Document Encryption
The documents are stored in project directory as well as in Database table field in an
encrypted form and a person can download by decrypting it.

12. Download and display documents
There is a link named “Gallery” in which are the documents are shown. A user can
download the documents in his machine.

13. Security Threat mechanism
For the security mechanism i have followed these things:
● At the time of register, I save the password in encrypted form. I have used MD5
algorithm to encrypt the password.
● Username Limit: Check if the username already exists in database or not. If not,
only then use can register.
● Form validations
● Use the Post method to post the data.(SQL injections)
● Store the userid in a session.
● Encrypt and decrypt the document name and store it.
● Use the ajax and get back the data in json format which shows the error without
reloading the page.
