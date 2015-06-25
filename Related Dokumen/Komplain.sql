/*==============================================================*/
/* DBMS name:      MySQL 5.0                                    */
/* Created on:     25-Jun-15 8:18:21 AM                         */
/*==============================================================*/


drop table if exists AKUN;

drop table if exists JENIS_KOMPLAIN;

drop table if exists KOMPLAIN;

drop table if exists LAYANAN;

drop table if exists MEDIA;

drop table if exists PELANGGAN;

drop table if exists POTS;

drop table if exists DATA_KOMPLAIN;

/*==============================================================*/
/* Table: AKUN                                                  */
/*==============================================================*/
create table AKUN
(
   ID_AKUN              int not null auto_increment,
   USER_NAME            varchar(50) not null,
   PASSWORD             varchar(50) not null,
   EMAIL                varchar(100) not null,
   NAMA_LENGKAP         varchar(50) not null,
   primary key (ID_AKUN)
);

/*==============================================================*/
/* Table: JENIS_KOMPLAIN                                        */
/*==============================================================*/
create table JENIS_KOMPLAIN
(
   ID_JENIS_KOMPLAIN    int not null auto_increment,
   JENIS_KOMPLAIN       varchar(20) not null,
   primary key (ID_JENIS_KOMPLAIN)
);

/*==============================================================*/
/* Table: KOMPLAIN                                              */
/*==============================================================*/
create table KOMPLAIN
(
   ID_KOMPLAIN          int not null auto_increment,
   ID_MEDIA             int not null,
   ID_LAYANAN           int not null,
   ID_JENIS_KOMPLAIN    int not null,
   TGL_KOMPLAIN         datetime not null,
   TGL_CLOSE            datetime not null,
   KELUHAN              text,
   SOLUSI               text,
   STATUS_KOMPLAIN      bool not null,
   KETERANGAN           text,
   DOKUMEN              longblob,
   primary key (ID_KOMPLAIN)
);

/*==============================================================*/
/* Table: LAYANAN                                               */
/*==============================================================*/
create table LAYANAN
(
   ID_LAYANAN           int not null auto_increment,
   NAMA_LAYANAN         varchar(20) not null,
   primary key (ID_LAYANAN)
);

/*==============================================================*/
/* Table: MEDIA                                                 */
/*==============================================================*/
create table MEDIA
(
   ID_MEDIA             int not null auto_increment,
   NAMA_MEDIA           varchar(20) not null,
   primary key (ID_MEDIA)
);

/*==============================================================*/
/* Table: PELANGGAN                                             */
/*==============================================================*/
create table PELANGGAN
(
   ID_PELANGGAN         int not null auto_increment,
   NO_INTERNET          varchar(12),
   NAMA_PELANGGAN       varchar(50) not null,
   ALAMAT_PELANGGAN     varchar(200) not null,
   primary key (ID_PELANGGAN)
);

/*==============================================================*/
/* Table: POTS                                                  */
/*==============================================================*/
create table POTS
(
   ID_POTS              varbinary (16) not null,
   ID_PELANGGAN         int not null,
   NO_POTS              char(7) not null,
   primary key (ID_POTS)
);

/*==============================================================*/
/* Table: DATA_KOMPLAIN                                        */
/*==============================================================*/
create table DATA_KOMPLAIN
(
   ID_POTS              varbinary (16) not null,
   ID_KOMPLAIN          int not null,
   primary key (ID_POTS, ID_KOMPLAIN)
);

alter table KOMPLAIN add constraint FK_RELATIONSHIP_3 foreign key (ID_LAYANAN)
      references LAYANAN (ID_LAYANAN) on delete restrict on update restrict;

alter table KOMPLAIN add constraint FK_RELATIONSHIP_6 foreign key (ID_JENIS_KOMPLAIN)
      references JENIS_KOMPLAIN (ID_JENIS_KOMPLAIN) on delete restrict on update restrict;

alter table KOMPLAIN add constraint FK_RELATIONSHIP_7 foreign key (ID_MEDIA)
      references MEDIA (ID_MEDIA) on delete restrict on update restrict;

alter table POTS add constraint FK_MEMPUNYAI foreign key (ID_PELANGGAN)
      references PELANGGAN (ID_PELANGGAN) on delete restrict on update restrict;

alter table DATA_KOMPLAIN add constraint FK_RELATIONSHIP_4 foreign key (ID_POTS)
      references POTS (ID_POTS) on delete restrict on update restrict;

alter table DATA_KOMPLAIN add constraint FK_RELATIONSHIP_5 foreign key (ID_KOMPLAIN)
      references KOMPLAIN (ID_KOMPLAIN) on delete restrict on update restrict;

