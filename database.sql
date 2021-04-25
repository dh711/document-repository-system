drop database project;
create database project;
use project;

create table student (
    rollno varchar(8) not null primary key,
    first_name varchar(20) not null,
    last_name varchar(20) not null,
    address varchar(100) not null,
    phone_no varchar(10) not null,
    DOB date not null,
    email_id varchar(30) not null,
    password varchar(255) not null
);

create table faculty (
    id varchar(10) not null primary key,
    first_name varchar(20) not null,
    last_name varchar(20) not null,
    email_id varchar(30) not null,
    phone_no varchar(10) not null,
    password varchar(255) not null
);

create table Department (
    id varchar(10) not null primary key,
    name varchar(50) not null
);

create table Program (
    id varchar(10) not null primary key,
    name varchar(50) not null
);

create table Course (
    id varchar(10) not null primary key,
    name varchar(50) not null,
    description varchar(255) not null,
    semester int not null,
    program_id varchar(10) not null,
    department_id varchar(10) not null,
    foreign key (program_id) references Program(id),
    foreign key (department_id) references Department(id)
);

create table CourseDocuments (
    id int not null primary key auto_increment,
    name varchar(30) not null, 
    path varchar(100) not null,
    course_id varchar(10) not null,
    foreign key (course_id) references Course(id)
);

create table Course_Student (
    course_id varchar(10) not null,
    student_id varchar(10) not null,
    foreign key (student_id) references student(rollNo) ON DELETE CASCADE,
    foreign key (course_id) references Course(id),
    primary key (course_id,student_id)
);

create table Teacher_Course (
    course_id varchar(10) not null,
    faculty_id varchar(10) not null,
    foreign key (course_id) references Course(id),
    foreign key (faculty_id) references faculty(id)
);

create table messages (
    message_id int primary key auto_increment,
    message text not null,
    course_id varchar(10) not null,
    foreign key (course_id) references Course(id)
);