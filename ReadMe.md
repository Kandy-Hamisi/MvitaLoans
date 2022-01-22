### Mvita Loan Management Information System

Create database 'MvitaLoans' in phpmyadmin then import MvitaLoans.sql from the database folder

acces the system in your browser after extracting it to the xammp/wampp specific folder

- The system has four modules
    - Admin Module
        - Manage borrowers
        - Disburse/Approve Loan
        - Deny Loan
        - check users available
        - Add Loan type
        - Add Loan Plan

    - User Module
        - Register and Login
        - take loan
        - View loan status
        - logout
        - Pay Loan
        - View Loan History on take loan page
        
    to access the user module: localhost/MvitaLoans/users/login.php
    to access the admin module: localhost/MvitaLoans/admin/login.php

### The technologies used
The following technologies were used:
- Core PHP
- MySQL
- Ajax
- Javascript
- HTML5
- CSS3
- jQquery

### Third Party Technologies
The following Third Party technologie and tools were used:
- SB Admin Dashboard template
- composer
- PHPMailer
- Bootstrap
- DataTables

### PHP Mailer
For user mailing functionality edit signup.php in users/controller/register.php
- replace the text 'your email' with your own email that will be used in sending email to users.
- Go to your email settings in your device and enable unsecure apps

Any rectification is accepted.