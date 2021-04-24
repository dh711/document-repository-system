use project;

insert into Department values ('CE', 'Computer Science and Engineering');
insert into Department values ('EE', 'Electrical Engineering');
insert into Department values ('EC', 'Electronics and Comunication Engineering');
insert into Department values ('CL', 'Civil Engineering');
insert into Department values ('CH', 'Chemical Engineering');
insert into Department values ('ME', 'Mechanical Department');

insert into Program values ('B.Tech', 'Bachelor of Engineering');
insert into Program values ('M.Tech', 'Masters of Engineering');
insert into Program values ('Diploma', 'Diploma');

INSERT INTO `Course` VALUES ('2CS601', 'Theory of Computation', '', 6, 'B.Tech', 'CE');
INSERT INTO `Course` VALUES ('2CSDE69', 'Lamp Technology', '', 6, 'B.Tech', 'CE');
INSERT INTO `Course` VALUES ('UEIM007', 'Financial Management', '', 6, 'B.Tech', 'CE');
INSERT INTO `Course` VALUES ('2CSDE54', 'Information and Network Security', '', 6, 'B.Tech', 'CE');
INSERT INTO `Course` VALUES ('2CLOE02', 'Remote Sensing, GIS and GPS', '', 6, 'B.Tech', 'CE');
INSERT INTO `Course` VALUES ('2CSDE67', 'Cloud Computing', '', 6, 'B.Tech', 'CE');

INSERT INTO `teacher_course` VALUES ('2CS601', '12345');
INSERT INTO `teacher_course` VALUES ('2CSDE69', '12345');
INSERT INTO `teacher_course` VALUES ('UEIM007', '12345');
INSERT INTO `teacher_course` VALUES ('2CSDE54', '12345');
INSERT INTO `teacher_course` VALUES ('2CLOE02', '12345');
INSERT INTO `teacher_course` VALUES ('2CSDE67', '12345');

INSERT INTO `course_student` VALUES ('2CS601', '18BCE049');
INSERT INTO `course_student` VALUES ('2CSDE69', '18BCE049');
INSERT INTO `course_student` VALUES ('UEIM007', '18BCE049');
INSERT INTO `course_student` VALUES ('2CSDE54', '18BCE049');
INSERT INTO `course_student` VALUES ('2CLOE02', '18BCE049');
INSERT INTO `course_student` VALUES ('2CSDE67', '18BCE049');

INSERT INTO `course_student` VALUES ('2CS601', '18BCE052');
INSERT INTO `course_student` VALUES ('2CSDE69', '18BCE052');
INSERT INTO `course_student` VALUES ('UEIM007', '18BCE052');
INSERT INTO `course_student` VALUES ('2CSDE54', '18BCE052');
INSERT INTO `course_student` VALUES ('2CLOE02', '18BCE052');
INSERT INTO `course_student` VALUES ('2CSDE67', '18BCE052');

INSERT INTO `course_student` VALUES ('2CS601', '18BCE057');
INSERT INTO `course_student` VALUES ('2CSDE69', '18BCE057');
INSERT INTO `course_student` VALUES ('UEIM007', '18BCE057');
INSERT INTO `course_student` VALUES ('2CSDE54', '18BCE057');
INSERT INTO `course_student` VALUES ('2CLOE02', '18BCE057');
INSERT INTO `course_student` VALUES ('2CSDE67', '18BCE057');