# project10-employee-management

<h4 align="center"><a href="https://my-employee-manager-maskoul.herokuapp.com/">Live version >></a></h4>


## Table of Contents

- [About](https://github.com/maskoul-mohamed/project10-employee-management#about)
- [Preview](https://github.com/maskoul-mohamed/project10-employee-management#preview)
- [Built with](https://github.com/maskoul-mohamed/project10-employee-management#built-with)
- [Installation](https://github.com/maskoul-mohamed/project10-employee-management#installation)
    - [Online version](https://github.com/maskoul-mohamed/project10-employee-management#online-version)
    - [Local version](https://github.com/maskoul-mohamed/project10-employee-management#local-version)
- [Author](https://github.com/maskoul-mohamed/project10-employee-management#author)
- [Show your support](https://github.com/maskoul-mohamed/project10-employee-management#show-your-support)



## About

employee management  system for sme (small and medium-sized enterprises).

## Preview

<img src="https://github.com/maskoul-mohamed/project10-employee-management/blob/main/screenshots/Screenshot-Employees.png" width="400" display="inline">
<img src="https://github.com/maskoul-mohamed/project10-employee-management/blob/main/screenshots/Screenshot-add-new.png" width="400" display="inline">

## Built With

- HTML5; 
- CSS3;
- PHP;
- Bootstrap v5.0;
- MYSQL.

## Installation

- ### Online version:

Just access this [link](https://my-employee-manager-maskoul.herokuapp.com/) and type the city name on the input to get the current temperature and weather forecast for the next five days.
- Username is : admin
- Password is : admin

- ### Local version:

1. Install XAMPP [here](https://www.apachefriends.org/download.html)
2. Download or clone the project [here](https://github.com/maskoul-mohamed/project10-employee-management.git)
3. Move the reposotory to C:\xampp\htdocs\
4. Open XAMPP Control panal and start [apache] and [mysql] 
5. Open link localhost/phpmyadmin
6. Click on new at side navbar.
7. Give a database name as (employees_db) hit on create button.
8. After creating database name click on import.
9. browse the file in directory     [project10-employee-management/realisation/database/employees_db.sql].
10. Go to [project10-employee-management/realisation/src/employeeManager.php] for Changing username and password of database 
```
 $this->Connection = mysqli_connect('localhost', 'username', 'password', 'employees_db');

``` 
11. open any browser and type http://localhost/project10-employee-management/realisation/src/index.php/.
12. Password and username is admin
## Author

:man: **Maskoul Mohamed**

- Github: [@maskoul-mohamed](https://github.com/maskoul-mohamed)
- Linkedin: [Maskoul Mohamed](https://www.linkedin.com/in/mohammed-maskoul/)
- Email: maskoul.mohammed@gmail.com
- Portfolio: [maskoul-mohamed](https://maskoul-mohamed.github.io/)

## Show your support

Give a ⭐️ if you like this project!