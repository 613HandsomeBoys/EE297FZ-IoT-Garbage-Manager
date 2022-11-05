use iot;
drop table garbage;
create table if not exists garbage(
messageId int(60) primary key auto_increment,
alarm int(4),
height float(20),
CID int(10),
per float(20),
set_time timestamp not null default current_timestamp
)ENGINE=InnoDB DEFAULT CHARSET=utf8;