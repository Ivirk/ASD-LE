<?php
$servername = "localhost";
$username = "root";
$password = "";

// Create connection
$conn = new mysqli($servername, $username, $password);

/// Create database
$conn->query("CREATE DATABASE IF NOT EXISTS shjp");
$conn->select_db("shjp");

// Create table Parishioners
$conn->query("CREATE TABLE IF NOT EXISTS Parishioners (
    parishioner_id INT AUTO_INCREMENT PRIMARY KEY,
    full_name VARCHAR(100),
    dob DATE,
    address VARCHAR(255),
    contact_number VARCHAR(20),
    email VARCHAR(100),
    username VARCHAR(50),
    password VARCHAR(255),
    date_registered DATE
)");

// Create table Administrator
$conn->query("CREATE TABLE IF NOT EXISTS Administrator (
    admin_id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100),
    email VARCHAR(100),
    contact_number VARCHAR(20),
    username VARCHAR(50),
    password VARCHAR(255)
)");

// Create table BaptismalRecords
$conn->query("CREATE TABLE IF NOT EXISTS BaptismalRecords (
    baptismalrecord_id INT AUTO_INCREMENT PRIMARY KEY,
    full_name VARCHAR(100),
    date_baptism DATE,
    place_baptism VARCHAR(255),
    father_name VARCHAR(100),
    mother_name VARCHAR(100),
    godfather VARCHAR(255),
    godmother VARCHAR(255),
    priest_name VARCHAR(100)
    )");

// Create table ConfirmationRecords
$conn->query("CREATE TABLE IF NOT EXISTS ConfirmationRecords (
    confirmationrecord_id INT AUTO_INCREMENT PRIMARY KEY,
    full_name VARCHAR(100),
    date_confirmation DATE,
    place_confirmation VARCHAR(255),
    father_name VARCHAR(100),
    mother_name VARCHAR(100),
    sponsors VARCHAR(255),
    priest_name VARCHAR(100)
    )");

// Create table CertificateRequests
$conn->query("CREATE TABLE IF NOT EXISTS CertificateRequests (
    request_id INT AUTO_INCREMENT PRIMARY KEY,
    parishioner_id INT,
    admin_id INT,
    type ENUM('Baptismal', 'Confirmation'),
    owner_name VARCHAR(100),
    father_name VARCHAR(100),
    mother_name VARCHAR(100),
    reason VARCHAR(255),
    date_requested DATE,
    status ENUM('Pending', 'Approved', 'Rejected'),
    date_approved DATE,
    FOREIGN KEY (parishioner_id) REFERENCES Parishioners(parishioner_id),
    FOREIGN KEY (admin_id) REFERENCES Administrator(admin_id)
)");

// Create table BaptismalCertificate
$conn->query("CREATE TABLE IF NOT EXISTS BaptismalCertificate (
    baptismal_id INT AUTO_INCREMENT PRIMARY KEY,
    request_id INT,
    date_baptism DATE,
    place_baptism VARCHAR(255),
    father_name VARCHAR(100),
    mother_name VARCHAR(100),
    godparents VARCHAR(255),
    priest_name VARCHAR(100),
    remarks VARCHAR(255),
    certificate_number INT,
    date_issued DATE,
    FOREIGN KEY (request_id) REFERENCES CertificateRequests(request_id)
)");

// Create table ConfirmationCertificate
$conn->query("CREATE TABLE IF NOT EXISTS ConfirmationCertificate (
    confirmation_id INT AUTO_INCREMENT PRIMARY KEY,
    request_id INT,
    date_confirmation DATE,
    place_confirmation VARCHAR(255),
    officiant_name VARCHAR(100),
    sponsors VARCHAR(255),
    remarks VARCHAR(255),
    certificate_number VARCHAR(50),
    date_issued DATE,
    FOREIGN KEY (request_id) REFERENCES CertificateRequests(request_id)
)");

// Insert default data for admin
$conn->query("INSERT IGNORE INTO Administrator (admin_id, name, email, contact_number, username, password) VALUES
    ('1','TeamB', 'teamb@gmail.com', '09123456789', 'admin', 'admin')");


// Insert baptismal records 
$conn->query("INSERT IGNORE INTO BaptismalRecords (full_name, date_baptism, place_baptism, father_name, mother_name, godfather, godmother, priest_name) VALUES
('Kervy How', '2006-05-14', 'Sacred Heart Of Jesus Parish Bo. Obero', 'Jose How', 'Maria How', 'Antonio Reyes', 'Teresa Lopez', 'Fr. Miguel Alonzo'),
('Serc Noan Buque', '2008-11-23', 'Sacred Heart Of Jesus Parish Bo. Obero', 'Manuel Buque', 'Anna Buque', 'Roberto Cruz', 'Lily Flores', 'Fr. Ricardo Medina'),
('Joshua Delos Santos', '2010-01-05', 'Sacred Heart Of Jesus Parish Bo. Obero', 'Luis Delos Santos', 'Teresa Delos Santos', 'Gabriel Aquino', 'Kristine Tan', 'Fr. Antonio Garcia'),
('Joaquin Cabañero', '2015-03-12', 'Sacred Heart Of Jesus Parish Bo. Obero', 'Daniel Cabañero', 'Lourdes Cabañero', 'Carlos Bautista', 'Patricia Morales', 'Fr. Jose Fernandez'),
('Mary Jash Malintad', '2011-08-30', 'Sacred Heart Of Jesus Parish Bo. Obero', 'Kevin Malintad', 'Michelle Malintad', 'Ronald Santos', 'Catherine Ramos', 'Fr. Emmanuel Cruz'),
('Queenie Thea Edurece', '2007-09-17', 'Sacred Heart Of Jesus Parish Bo. Obero', 'Rafael Edurece', 'Lourdes Edurece', 'Angel Ortiz', 'Nicole Perez', 'Fr. Benjamin Alcantara'),
('Carlo Tan', '2018-12-05', 'Sacred Heart Of Jesus Parish Bo. Obero', 'Jose Tan', 'Maria Tan', 'Victor De Leon', 'Angelica Estrada', 'Fr. Manuel Santos'),
('Patricia Flores', '2019-11-22', 'Sacred Heart Of Jesus Parish Bo. Obero', 'Roberto Flores', 'Cristina Flores', 'Kevin Malonzo', 'Lucinda Cortez', 'Fr. Ricardo Alcantara'),
('Jose Dela Rosa', '2005-06-03', 'Sacred Heart Of Jesus Parish Bo. Obero', 'Roberto Dela Rosa', 'Gloria Dela Rosa', 'Marc Santos', 'Luisa Miranda', 'Fr. Lorenzo Reyes'),
('Maria Carina Mercado', '2014-04-10', 'Sacred Heart Of Jesus Parish Bo. Obero', 'Orlando Mercado', 'Diana Mercado', 'Fabian Ordonez', 'Elvira Santos', 'Fr. Francisco Cruz'),
('Kristoffer Garcia', '2020-10-01', 'Sacred Heart Of Jesus Parish Bo. Obero', 'Joshua Garcia', 'Anna Garcia', 'Samuel Castillo', 'Valerie De Guzman', 'Fr. Emilio Dizon'),
('Carmen Bautista', '2017-07-08', 'Sacred Heart Of Jesus Parish Bo. Obero', 'Mark Bautista', 'Liza Bautista', 'Danilo Santos', 'Carmen dela Vega', 'Fr. Gregorio Fernandez'),
('Francis Pangilinan', '2012-05-21', 'Sacred Heart Of Jesus Parish Bo. Obero', 'Antonio Pangilinan', 'Lourdes Pangilinan', 'Mark Velasco', 'Teresa Gonzales', 'Fr. Daniel Velarde'),
('Angel Aquino', '2021-09-15', 'Sacred Heart Of Jesus Parish Bo. Obero', 'Miguel Aquino', 'Elisa Aquino', 'Jordan Malonzo', 'Sabrina Rios', 'Fr. Eugene Navarro'),
('Paolo Santos', '2023-11-03', 'Sacred Heart Of Jesus Parish Bo. Obero', 'Renato Santos', 'Valerie Santos', 'James Perez', 'Amanda Cortez', 'Fr. Roberto Matias')
");

// Insert confirmation records
$conn->query("INSERT IGNORE INTO ConfirmationRecords (full_name, date_confirmation, place_confirmation, father_name, mother_name, sponsors, priest_name) VALUES
('Maria Cecilia Dela Cruz', '2006-12-02', 'Sacred Heart Of Jesus Parish Bo. Obero', 'Roberto Dela Cruz', 'Lucinda Dela Cruz', 'Gabriel Santos and Ana Lopez', 'Fr. Daniel Santos'),
('John Michael Reyes', '2009-08-15', 'Sacred Heart Of Jesus Parish Bo. Obero', 'Jose Reyes', 'Maria Reyes', 'Christian Bautista and Miriam Santos', 'Fr. Miguel Garcia'),
('Vanessa Garcia', '2011-03-18', 'Sacred Heart Of Jesus Parish Bo. Obero', 'Manuel Garcia', 'Teresa Garcia', 'Carlos Dominguez and Patricia Gomez', 'Fr. Antonio Fernandez'),
('Angelica Santos', '2013-05-22', 'Sacred Heart Of Jesus Parish Bo. Obero', 'Ramon Santos', 'Ana Santos', 'Mark Tuazon and Angel Aquino', 'Fr. Lorenzo Cruz'),
('Kevin dela Vega', '2016-11-05', 'Sacred Heart Of Jesus Parish Bo. Obero', 'Alberto dela Vega', 'Isabel dela Vega', 'Joshua Cruz and Teresa Malonzo', 'Fr. Jose Alfaro'),
('Patricia Flores', '2018-01-13', 'Sacred Heart Of Jesus Parish Bo. Obero', 'Ricardo Flores', 'Cynthia Flores', 'Mark Reyes and Rachel Cortez', 'Fr. Eduardo Garcia'),
('Paolo Hernandez', '2019-06-30', 'Sacred Heart Of Jesus Parish Bo. Obero', 'Daniel Hernandez', 'Teresa Hernandez', 'Anthony Delos Santos and Michelle Lopez', 'Fr. Manuel Aquino'),
('Maria Lourdes Gonzales', '2020-12-12', 'Sacred Heart Of Jesus Parish Bo. Obero', 'Francisco Gonzales', 'Lucia Gonzales', 'Victor Mercado and Maricel Gutierrez', 'Fr. Ramon Santos'),
('Carla Joy Mendoza', '2021-03-21', 'Sacred Heart Of Jesus Parish Bo. Obero', 'Luis Mendoza', 'Maria Mendoza', 'Gabriel Reyes and Cristina dela Cruz', 'Fr. Ronald Alonzo'),
('Mark Anthony Rivera', '2022-08-19', 'Sacred Heart Of Jesus Parish Bo. Obero', 'Jose Rivera', 'Ann Rivera', 'Paolo Santos and Giselle Lopez', 'Fr. Nickolas Fernandez'),
('Angelica Cruz', '2023-04-15', 'Sacred Heart Of Jesus Parish Bo. Obero', 'Ernesto Cruz', 'Maria Cruz', 'Dennis Ortiz and Francesca Ramos', 'Fr. Andrew Mendoza'),
('Francis Paolo Alvarez', '2008-09-10', 'Sacred Heart Of Jesus Parish Bo. Obero', 'Alfonso Alvarez', 'Gloria Alvarez', 'Rodelio Aquino and Jessica Flores', 'Fr. Roberto Garcia'),
('Helen Grace Aquino', '2014-02-28', 'Sacred Heart Of Jesus Parish Bo. Obero', 'Vicente Aquino', 'Aurora Aquino', 'Martin Reyes and Erika Santos', 'Fr. Enrico del Rosario'),
('Cesar Valencia', '2015-06-17', 'Sacred Heart Of Jesus Parish Bo. Obero', 'Victor Valencia', 'Maria Valencia', 'Eduardo Santos and Lourdes Cruz', 'Fr. Eduardo Dela Rosa'),
('Jessa Marie Sanchez', '2007-10-05', 'Sacred Heart Of Jesus Parish Bo. Obero', 'Carlos Sanchez', 'Theresa Sanchez', 'Rolando Aquino and Celia Hernandez', 'Fr. Andres Gonzalez')
");
