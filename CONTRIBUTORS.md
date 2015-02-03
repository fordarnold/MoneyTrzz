# Welcome contributors!
Dear contributors, we would like to welcome you to the Money Trzz project. Your input is highly valued.

## Way forward
The following features are to be worked on step by step, with different contributors choosing his/her preferred feature to work on.  Looking forward to seeing that commit tree. :)

### Git flow / Git branch structure
It's important to define a **git flow** in the early stages of a software project. The git flow for the Money Trzz app is as follows:

**Master branch:** This is the production branch. Stable Features are merged into this branch, but only after serious code review by the team leaders/core contributors.  
**Develop branch:** This is the development branch. Use it for staging features for commit into the 'master' branch. If you feel a feature is stable enough, test it first in the 'develop' branch.  
**Feature branches:** The feature branches are of the form 'feature-featurename'. Use these branches for developing the different features of the application.

### Features (milestones)

- User Account management
	- Master user account setup
	- User account resource CRUD algorithms
	- Login and Logout of Session

- Bank Account management 
	- Bank account resource CRUD algorithms
	- master user hasOne Bank
	- Owner, Personal/Business account
	- Type definition, Savings/Checking/Current account
	- Business account attached to Bank Account owner: business

- User Business Account management 
	- master user hasMany

- Deposits management
	- Deposit resource CRUD algorithms

- Withdrawals management
	- Withdrawal resource CRUD algorithms

- Currency management
	- Currency resource CRUD algorithms

- Savings management
- Bank charge management
- Tax management
- Reports Management
	- Bank statements
		- for each bank account
		- filtered by financial quarter/month
		- electronic mail
	- Aggregate savings reports
		- filtered by Quarter/Month
	- Aggregate deposits
		- filtered by Quarter/Month
	- Aggregate withdrawals
		- filtered by Quarter/Month

### Marketing 

- Online portal registration
	- Domain name, MoneyTrzz.com
	- Hosting, LAMP stack
