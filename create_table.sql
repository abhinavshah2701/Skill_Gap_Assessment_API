create table user_master(
    user_id int primary key auto_increment,
    first_name varchar(30) not null,
    middle_name varchar(30),
    last_name varchar(30) not null,
    gender enum('Male','Female'),
    email varchar(100) unique not null,
    passwd varchar(255) not null,
    contact varchar(15) unique not null,
    user_type enum('Admin','Employee','Manager','Client')
);

create table employee_master(
    employee_id int primary key auto_increment,
    user_id int references user_master(user_id)
);

create table manager_master(
    manager_id int primary key auto_increment,
    user_id int references user_master(user_id)
);

create table category_master(
    category_id int primary key auto_increment,
    category_description varchar(50) unique not null
)

create table sub_category_master(
    sub_category_id int primary key auto_increment,
    category_id int references category_master(category_id),
    sub_category_description varchar(50) unique not null
)

create table skill_master(
    skill_id int primary key auto_increment,
    sub_category_id int references sub_category_master(sub_category_id),
    skill_description varchar(50) unique not null
)

create table form_master(
	form_id int primary key auto_increment,
    skill_id int references skill_master(skill_id),
	form_name varchar(30) unique not null
)

create table question_master(
    question_id int primary key auto_increment,
	form_id int references form_master(form_id),
    question_type enum('Single Option','Multiple Option'),
    question_description varchar(255) not null,
    total_rating int not null
)

create table question_option_master(
    question_id int references question_master(question_id),
    option_id int not null,
    option_description varchar(50) not null,
    correct_option enum('true','false'),
    option_rating int not null,
    CONSTRAINT question_option_id PRIMARY KEY (question_id,option_id)
)

create table user_response(
    user_id int references user_master(user_id),
    employee_id int references employee_master(employee_id),
    question_id int references question_master(question_id),
    form_id int references form_master(form_id),
    question_total_rating varchar(100) not null,
    CONSTRAINT user_response_id PRIMARY KEY (user_id,employee_id,question_id)
)


create table user_response_option(
    user_response_id int references user_response(user_response_id),
    option_id int references question_option_master(question_option_id),
    option_rating varchar(100) not null,
    CONSTRAINT user_response_id PRIMARY KEY (user_response_id,option_id)
)