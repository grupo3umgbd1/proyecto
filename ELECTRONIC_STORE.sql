/*==============================================================*/
/* DBMS name:      ORACLE Version 11g                           */
/* Created on:     11/11/2016 11:37:27 p. m.                    */
/*==============================================================*/



-- Type package declaration
create or replace package PDTypes  
as
    TYPE ref_cursor IS REF CURSOR;
end;

-- Integrity package declaration
create or replace package IntegrityPackage AS
 procedure InitNestLevel;
 function GetNestLevel return number;
 procedure NextNestLevel;
 procedure PreviousNestLevel;
 end IntegrityPackage;
/

-- Integrity package definition
create or replace package body IntegrityPackage AS
 NestLevel number;

-- Procedure to initialize the trigger nest level
 procedure InitNestLevel is
 begin
 NestLevel := 0;
 end;


-- Function to return the trigger nest level
 function GetNestLevel return number is
 begin
 if NestLevel is null then
     NestLevel := 0;
 end if;
 return(NestLevel);
 end;

-- Procedure to increase the trigger nest level
 procedure NextNestLevel is
 begin
 if NestLevel is null then
     NestLevel := 0;
 end if;
 NestLevel := NestLevel + 1;
 end;

-- Procedure to decrease the trigger nest level
 procedure PreviousNestLevel is
 begin
 NestLevel := NestLevel - 1;
 end;

 end IntegrityPackage;
/


drop trigger TRIGGER_1
/

alter table ESDIR
   drop constraint FK_ESDIR_REFERENCE_ESMUN
/

alter table ESDIR
   drop constraint FK_ESDIR_REFERENCE_ESDEP
/

alter table ESDIR
   drop constraint FK_ESDIR_REFERENCE_ESMPA
/

alter table ESDIR
   drop constraint FK_ESDIR_REFERENCE_ESMPR
/

alter table ESEMP
   drop constraint FK_ESEMP_REFERENCE_ESDIR
/

alter table ESEMP
   drop constraint FK_ESEMP_REFERENCE_ESJOR
/

alter table ESEMP
   drop constraint FK_ESEMP_REFERENCE_ESARE
/

alter table ESEMP
   drop constraint FK_ESEMP_REFERENCE_ESPLA
/

alter table ESEMP
   drop constraint FK_ESEMP_REFERENCE_ESMPT
/

alter table ESEMP
   drop constraint FK_ESEMP_REFERENCE_ESMPR
/

alter table ESEMP
   drop constraint FK_ESEMP_REFERENCE_ESSUC
/

alter table ESRDM
   drop constraint FK_ESRDM_REFERENCE_ESMUN
/

alter table ESRDM
   drop constraint FK_ESRDM_REFERENCE_ESDEP
/

alter table ESRLT
   drop constraint FK_ESRLT_REFERENCE_ESLTS
/

alter table ESRLT
   drop constraint FK_ESRLT_REFERENCE_ESTRX
/

alter table ESRPD
   drop constraint FK_ESRPD_REFERENCE_ESMPA
/

alter table ESRPD
   drop constraint FK_ESRPD_REFERENCE_ESDEP
/

alter table ESRPL
   drop constraint FK_ESRPL_REFERENCE_ESRRP
/

alter table ESRPL
   drop constraint FK_ESRPL_REFERENCE_ESLTS
/

alter table ESRRP
   drop constraint FK_ESRRP_REFERENCE_ESROL
/

alter table ESRRP
   drop constraint FK_ESRRP_REFERENCE_ESPER
/

alter table ESUSR
   drop constraint FK_ESUSR_REFERENCE_ESEMP
/

alter table ESUSR
   drop constraint FK_ESUSR_REFERENCE_ESROL
/

drop table BITACORA cascade constraints
/

drop index IND_ESARE
/

drop table ESARE cascade constraints
/

drop table ESDEP cascade constraints
/

drop index IND_ESDIR
/

drop table ESDIR cascade constraints
/

drop table ESEMP cascade constraints
/

drop index IND_ESJOR
/

drop table ESJOR cascade constraints
/

drop index IND_ESLTS
/

drop table ESLTS cascade constraints
/

drop index IND_ESMPA
/

drop table ESMPA cascade constraints
/

drop index IND_ESMPR
/

drop table ESMPR cascade constraints
/

drop index IND_ESMPT
/

drop table ESMPT cascade constraints
/

drop index IND_ESMUN
/

drop table ESMUN cascade constraints
/

drop index IND_ESPER
/

drop table ESPER cascade constraints
/

drop index IND_ESPLA
/

drop table ESPLA cascade constraints
/

drop index IND_ESRDM
/

drop table ESRDM cascade constraints
/

drop index IND_ESRLT
/

drop table ESRLT cascade constraints
/

drop index IND_ROL
/

drop table ESROL cascade constraints
/

drop table ESRPD cascade constraints
/

drop index IND_ESRPL
/

drop table ESRPL cascade constraints
/

drop index IND_ESRRP
/

drop table ESRRP cascade constraints
/

drop index IND_ESSUC
/

drop table ESSUC cascade constraints
/

drop index IND_ESTRX
/

drop table ESTRX cascade constraints
/

drop index IND_ESUSR
/

drop table ESUSR cascade constraints
/

drop index IND_SESSION
/

drop table "SESSION" cascade constraints
/

drop table BITACORA cascade constraints;

/*==============================================================*/
/* Table: BITACORA                                              */
/*==============================================================*/
create table BITACORA 
(
   IDBITACORA           number(20),          not null,
   LLAVE                number(30),
   CAMPO                varchar2(30),
   VALORANT             varchar2(100),
   VALORNUE             varchar2(100),
   FECHA                date,
   USUARIO              varchar2(10),
   TERMINAL             varchar2(50),
   TABLA                varchar2(30),
   constraint PK_BITACORA primary key (IDBITACORA)
);

comment on table BITACORA is
'Bitacora';

CREATE SEQUENCE SEQ_BITACORA
 START WITH 1
 INCREMENT BY 1;

create or replace procedure  PRC_BITACORA
   (NTABLA varchar2,NLLAVE number,SCAMPO varchar2,SVALORANT varchar2,SVALORNUE varchar2,USERBITA varchar2,EQUIPO varchar2) is
   PRAGMA AUTONOMOUS_TRANSACTION;

   begin
      insert into BITACORA(IDBITACORA,LLAVE,CAMPO,VALORANT,VALORNUE,FECHA,USUARIO,TERMINAL,TABLA)
         values(SEQ_BITACORA.NEXTVAL,NLLAVE,SCAMPO,SVALORANT,SVALORNUE,SYSDATE,USERBITA ,EQUIPO,NTABLA);
         COMMIT;
      EXCEPTION
         when others then
            RAISE_APPLICATION_ERROR(-20001,'Error Insertando Bitacora' || sqlerrm);
   end;


drop index IND_ESMDP;

drop table ESMDP cascade constraints;

/*==============================================================*/
/* Table: ESMDP                                                 */
/*==============================================================*/
create table ESMDP 
(
   ESMDPIDENTITY        NUMBER               not null,
   IND_ESMDP            as (case when (-1)<ESMDPIDENTITY AND ESTADO <> 'N' then 0 else ESMDPIDENTITY end),
   IDPAIS               number(3),
   IDDEPARTAMENTO       number(2),
   DEPARTAMENTO         VARCHAR2(50),
   ESTADO               VARCHAR2(1),
   constraint PK_ESMDP primary key (ESMDPIDENTITY)
);

/*==============================================================*/
/* Index: IND_ESMDP                                             */
/*==============================================================*/
create unique index IND_ESMDP on ESMDP (
   IND_ESMDP ASC,
   IDPAIS ASC,
   IDDEPARTAMENTO ASC
);

CREATE SEQUENCE SEQ_ESMDP
 START WITH 1
 INCREMENT BY 1;

CREATE OR REPLACE TRIGGER TRG_BIR_ESMDP BEFORE INSERT /*BEFORE INSERT RECORD*/
ON ESMDP
FOR EACH ROW
BEGIN
    SELECT SEQ_ESMDP.NEXTVAL INTO :NEW.ESMDPIDENTITY FROM DUAL;
END;

/*==============================================================*/
/* Table: ESARE                                                 */
/*==============================================================*/
create table ESARE 
(
   ESAREIDENTITY        NUMBER               not null,
   IND_ESARE            NUMBER,
   IDAREA               NUMBER               not null,
   AREA                 VARCHAR(60),
   ESTADO               VARCHAR(1),
   constraint PK_ESARE primary key (ESAREIDENTITY, IDAREA)
)
/

comment on table ESARE is
'MAESTRO DE AREAS DE TRABAJO'
/

/*==============================================================*/
/* Index: IND_ESARE                                             */
/*==============================================================*/
create unique index IND_ESARE on ESARE (
   IND_ESARE ASC,
   IDAREA ASC
)
/

/*==============================================================*/
/* Table: ESDEP                                                 */
/*==============================================================*/
create table ESDEP 
(
   ESDEPIDENTITY        number(2)            not null,
   IND_ESDEP            number(3),
   IDDEPTO              VARCHAR2(50),
   DEPARTAMENTO         CHAR(10),
   ESTADO               CHAR(10),
   constraint PK_ESDEP primary key (ESDEPIDENTITY)
)
/

/*==============================================================*/
/* Table: ESDIR                                                 */
/*==============================================================*/
create table ESDIR 
(
   ESDIRIDENTITY        NUMBER               not null,
   IND_ESDIR            NUMBER,
   IDDIRE               NUMBER               not null,
   ESMPRIDENTITY        NUMBER,
   ESM_IDPERSONA        number(10),
   ESMUNIDENTITY        number(3),
   ESDEPIDENTITY        number(2),
   PAISIDENTITY         number,
   IDPAIS               NUMBER,
   IDDEPTO              NUMBER,
   IDMUNI               NUMBER,
   IDPERSONA            NUMBER,
   COLONIA              VARCHAR(60),
   CALLE                VARCHAR(60),
   AVENIDA              VARCHAR(60),
   ZONA                 NUMBER,
   EDIFICIO             VARCHAR(60),
   NIVEL                VARCHAR(60),
   OFICINA              VARCHAR(60),
   ESTADO               VARCHAR(1),
   constraint PK_ESDIR primary key (ESDIRIDENTITY, IDDIRE)
)
/

comment on table ESDIR is
'MAESTRO DE DIRECCIONES'
/

/*==============================================================*/
/* Index: IND_ESDIR                                             */
/*==============================================================*/
create unique index IND_ESDIR on ESDIR (
   IND_ESDIR ASC,
   IDDIRE ASC
)
/

/*==============================================================*/
/* Table: ESEMP                                                 */
/*==============================================================*/
create table ESEMP 
(
   ESEMPIDENTITY        NUMBER,
   IND_ESEMP            NUMBER,
   IDEMPLEADO           number(10)           not null,
   ESMPRIDENTITY        NUMBER,
   IDPERSONA            number(10),
   ESSUCIDENTITY        NUMBER,
   ESDIRIDENTITY        NUMBER,
   IDDIRE               NUMBER,
   ESJORIDENTITY        NUMBER,
   IDJOR                NUMBER,
   ESAREIDENTITY        NUMBER,
   FECHAINGRESO         DATE,
   FECHAEGRESO          DATE,
   IDPUESTO             NUMBER,
   IDSUCURSAL           NUMBER,
   IDAREA               NUMBER,
   ESPLAIDENTITY        NUMBER,
   IDPLANILLA           NUMBER,
   ESMPTIDENTITY        NUMBER,
   ESTADO               VARCHAR(1),
   constraint PK_ESEMP primary key (IDEMPLEADO)
)
/

comment on table ESEMP is
'MAESTRO DE EMPLEADOS'
/

/*==============================================================*/
/* Table: ESJOR                                                 */
/*==============================================================*/
create table ESJOR 
(
   ESJORIDENTITY        NUMBER               not null,
   IND_ESJOR            NUMBER,
   IDJOR                NUMBER               not null,
   JORNADA              VARCHAR(60),
   ESTADO               VARCHAR(1),
   constraint PK_ESJOR primary key (ESJORIDENTITY, IDJOR)
)
/

comment on table ESJOR is
'MAESTRO DE JORNADAS'
/

/*==============================================================*/
/* Index: IND_ESJOR                                             */
/*==============================================================*/
create unique index IND_ESJOR on ESJOR (
   IND_ESJOR ASC,
   IDJOR ASC
)
/

drop index IND_ESLTS;

drop table ESLTS cascade constraints;

/*==============================================================*/
/* Table: ESLTS                                                 */
/*==============================================================*/
create table ESLTS 
(
   ESLTSIDENTITY        NUMBER               not null,
   IND_ESLTS            as (case when (-1)<ESLTSIDENTITY AND ESTADO <> 'N' then 0 else ESLTSIDENTITY end),
   IDLISTA              NUMBER,
   DESCRIPCION          VARCHAR2(60),
   ESTADO               VARCHAR2(1),
   constraint PK_ESLTS primary key (ESLTSIDENTITY)
);

comment on table ESLTS is
'Maestro de listas';

/*==============================================================*/
/* Index: IND_ESLTS                                             */
/*==============================================================*/
create unique index IND_ESLTS on ESLTS (
   IND_ESLTS ASC,
   IDLISTA ASC
);


CREATE SEQUENCE SEQ_ESLTS
 START WITH 1
 INCREMENT BY 1;

CREATE OR REPLACE TRIGGER TRG_BIR_ESLTS BEFORE INSERT /*BEFORE INSERT RECORD*/
ON ESLTS
FOR EACH ROW
BEGIN
    SELECT SEQ_ESLTS.NEXTVAL INTO :NEW.ESLTSIDENTITY FROM DUAL;
END;

drop index IND_ESMPA;

drop table ESMPA cascade constraints;

/*==============================================================*/
/* Table: ESMPA                                                 */
/*==============================================================*/
create table ESMPA 
(
   ESMPAIDENTITY        number               not null,
   IND_ESMPA            as (case when (-1)<ESMPAIDENTITY AND ESTADO <> 'N' then 0 else ESMPAIDENTITY end),
   IDPAIS               number,
   PAIS                 varchar2(60),
   ESTADO               varchar2(1),
   constraint PK_ESMPA primary key (ESMPAIDENTITY)
);

/*==============================================================*/
/* Index: IND_ESMPA                                             */
/*==============================================================*/
create unique index IND_ESMPA on ESMPA (
   IND_ESMPA ASC,
   IDPAIS ASC
);

CREATE SEQUENCE SEQ_ESMPA
 START WITH 1
 INCREMENT BY 1;

CREATE OR REPLACE TRIGGER TRG_BIR_ESMPAS BEFORE INSERT /*BEFORE INSERT RECORD*/
ON ESMPA
FOR EACH ROW
BEGIN
    SELECT SEQ_ESMPA.NEXTVAL INTO :NEW.ESMPAIDENTITY FROM DUAL;
END;


drop index IND_ESMPR;

drop table ESMPR cascade constraints;

/*==============================================================*/
/* Table: ESMPR                                                 */
/*==============================================================*/
create table ESMPR 
(
   ESMPRIDENTITY        NUMBER               not null,
   IND_ESMPR            as (case when (-1)<ESMPRIDENTITY AND ESTADO <> 'N' then 0 else ESMPRIDENTITY end),
   IDPERSONA            number(10)           not null,
   IDCOLOR              number(2),
   PRIMERNOMBRE         VARCHAR2(50),
   SEGUNDONOMBRE        VARCHAR2(50),
   TERCERNOMBRE         VARCHAR2(50),
   PRIMERAPELLIDO       VARCHAR2(50),
   SEGUNDOAPELLIDO      VARCHAR2(50),
   APELLIDOCASADA       VARCHAR2(50),
   FECHANACIMIENTO      DATE,
   GENERO               VARCHAR2(1),
   ESTADO               VARCHAR2(1),
   constraint PK_ESMPR primary key (ESMPRIDENTITY)
);

/*==============================================================*/
/* Index: IND_ESMPR                                             */
/*==============================================================*/
create unique index IND_ESMPR on ESMPR (
   IND_ESMPR ASC,
   IDPERSONA ASC
);


comment on table ESMPR is
'Maestro de personas';

CREATE SEQUENCE SEQ_ESMPR
 START WITH 1
 INCREMENT BY 1;

CREATE OR REPLACE TRIGGER TRG_BIR_ESMPR BEFORE INSERT /*BEFORE INSERT RECORD*/
ON ESMPR
FOR EACH ROW
BEGIN
    SELECT SEQ_ESMPR.NEXTVAL INTO :NEW.ESMPRIDENTITY FROM DUAL;
END;

/*==============================================================*/
/* Index: IND_ESMPR                                             */
/*==============================================================*/
create unique index IND_ESMPR on ESMPR (
   IND_ESMPR ASC,
   IDPERSONA ASC
)
/

/*==============================================================*/
/* Table: ESMPT                                                 */
/*==============================================================*/
create table ESMPT 
(
   ESMPTIDENTITY        NUMBER               not null,
   IND_ESMPT            NUMBER,
   IDPUESTO             NUMBER               not null,
   PUESTO               VARCHAR(60),
   ESTADO               VARCHAR(1),
   constraint PK_ESMPT primary key (ESMPTIDENTITY, IDPUESTO)
)
/

comment on table ESMPT is
'MAESTRO DE PUESTOS DE TRABAJO'
/

/*==============================================================*/
/* Index: IND_ESMPT                                             */
/*==============================================================*/
create unique index IND_ESMPT on ESMPT (
   IND_ESMPT ASC,
   IDPUESTO ASC
)
/

drop index IND_ESMUN;

drop table ESMUN cascade constraints;

/*==============================================================*/
/* Table: ESMUN                                                 */
/*==============================================================*/
create table ESMUN 
(
   ESMUNIDENTITY        NUMBER               not null,
   IND_ESMUN            as (case when (-1)<ESMUNIDENTITY AND ESTADO <> 'N' then 0 else ESMUNIDENTITY end),
   IDPAIS               number(2),
   IDDEPARTAMENTO       number,
   IDMUNICIPIO          number(3),
   MUNICIPIO            VARCHAR2(50),
   ESTADO               VARCHAR2(1),
   constraint PK_ESMUN primary key (ESMUNIDENTITY)
);

/*==============================================================*/
/* Index: IND_ESMUN                                             */
/*==============================================================*/
create unique index IND_ESMUN on ESMUN (
   IND_ESMUN ASC,
   IDMUNICIPIO ASC
);

CREATE SEQUENCE SEQ_ESMUN
 START WITH 1
 INCREMENT BY 1;

CREATE OR REPLACE TRIGGER TRG_BIR_ESMUN BEFORE INSERT /*BEFORE INSERT RECORD*/
ON ESMUN
FOR EACH ROW
BEGIN
    SELECT SEQ_ESMUN.NEXTVAL INTO :NEW.ESMUNIDENTITY FROM DUAL;
END;

/*==============================================================*/
/* Index: IND_ESMUN                                             */
/*==============================================================*/
create unique index IND_ESMUN on ESMUN (
   IND_ESMUN ASC,
   IDMUNI ASC
)
/

drop index IND_ESPER;

drop table ESPER cascade constraints;

/*==============================================================*/
/* Table: ESPER                                                 */
/*==============================================================*/
create table ESPER 
(
   ESPERIDENTITY        NUMBER,
   IND_ESPER            as (case when (-1)<ESPERIDENTITY AND ESTADO <> 'N' then 0 else ESPERIDENTITY end),
   IDPERFIL             NUMBER,
   DESCRIPCION          VARCHAR2(60),
   ESTADO               VARCHAR2(1)
);

/*==============================================================*/
/* Index: IND_ESPER                                             */
/*==============================================================*/
create unique index IND_ESPER on ESPER (
   IND_ESPER ASC,
   IDPERFIL ASC
);

CREATE SEQUENCE SEQ_ESPER
 START WITH 1
 INCREMENT BY 1;

CREATE OR REPLACE TRIGGER TRG_BIR_ESPER BEFORE INSERT /*BEFORE INSERT RECORD*/
ON ESPER
FOR EACH ROW
BEGIN
    SELECT SEQ_ESPER.NEXTVAL INTO :NEW.ESPERIDENTITY FROM DUAL;
END;

/*==============================================================*/
/* Table: ESPLA                                                 */
/*==============================================================*/
create table ESPLA 
(
   ESPLAIDENTITY        NUMBER               not null,
   IND_ESPLA            NUMBER,
   IDPLANILLA           NUMBER               not null,
   SUELDO               DECIMAL,
   COMISION             DECIMAL,
   ESTADO               VARCHAR(1),
   constraint PK_ESPLA primary key (ESPLAIDENTITY, IDPLANILLA)
)
/

comment on table ESPLA is
'MAESTRO DE PLANILLA'
/

/*==============================================================*/
/* Index: IND_ESPLA                                             */
/*==============================================================*/
create unique index IND_ESPLA on ESPLA (
   IND_ESPLA ASC,
   IDPLANILLA ASC
)
/

/*==============================================================*/
/* Table: ESRDM                                                 */
/*==============================================================*/
create table ESRDM 
(
   ESRDMIDENTITY        NUMBER               not null,
   IND_ESRDM            NUMBER,
   ESMUNIDENTITY        number(3),
   ESDEPIDENTITY        number(2),
   IDDEPTO              NUMBER,
   IDMUNI               NUMBER,
   ESTADO               VARCHAR(1),
   constraint PK_ESRDM primary key (ESRDMIDENTITY)
)
/

comment on table ESRDM is
'RELACION DEPARTAMENTO/MUNICIPIO'
/

/*==============================================================*/
/* Index: IND_ESRDM                                             */
/*==============================================================*/
create unique index IND_ESRDM on ESRDM (
   IND_ESRDM ASC,
   IDDEPTO ASC,
   IDMUNI ASC
)
/

drop index IND_ESRLT;

drop table ESRLT cascade constraints;

/*==============================================================*/
/* Table: ESRLT                                                 */
/*==============================================================*/
create table ESRLT 
(
   ESRLTIDENTITY        NUMBER               not null,
   IND_ESRLT            as (case when (-1)<ESRLTIDENTITY AND ESTADO <> 'N' then 0 else ESRLTIDENTITY end),
   IDLISTA              NUMBER,
   IDTRX                NUMBER,
   ESTADO               VARCHAR2(1),
   constraint PK_ESRLT primary key (ESRLTIDENTITY)
);

/*==============================================================*/
/* Index: IND_ESRLT                                             */
/*==============================================================*/
create unique index IND_ESRLT on ESRLT (
   IND_ESRLT ASC,
   IDLISTA ASC,
   IDTRX ASC
);


CREATE SEQUENCE SEQ_ESRLT
 START WITH 1
 INCREMENT BY 1;

CREATE OR REPLACE TRIGGER TRG_BIR_ESRLT BEFORE INSERT /*BEFORE INSERT RECORD*/
ON ESRLT
FOR EACH ROW
BEGIN
    SELECT SEQ_ESRLT.NEXTVAL INTO :NEW.ESRLTIDENTITY FROM DUAL;
END;

/*==============================================================*/
/* Table: ESROL                                                 */
/*==============================================================*/
create table ESROL 
(
   ESROLIDENTITY        number               not null,
   IND_ESROL            as (case when (-1)<ESROLIDENTITY AND ESTADO <> 'N' then 0 else ESROLIDENTITY end),
   IDROL                NUMBER,
   DESCRIPCION          VARCHAR2(60),
   ESTADO               VARCHAR2(1),
   constraint PK_ESROL primary key (ESROLIDENTITY)
);

/*==============================================================*/
/* Index: IND_ROL                                               */
/*==============================================================*/
create unique index IND_ESROL on ESROL (IND_ESROL ASC,IDROL ASC);

CREATE SEQUENCE SEQ_ESROL
 START WITH 1
 INCREMENT BY 1;

CREATE OR REPLACE TRIGGER TRG_BIR_ESROL BEFORE INSERT /*BEFORE INSERT RECORD*/
ON ESROL
FOR EACH ROW
BEGIN
    SELECT SEQ_ESROL.NEXTVAL INTO :NEW.ESROLIDENTITY FROM DUAL;
END;

/*==============================================================*/
/* Table: ESRPD                                                 */
/*==============================================================*/
create table ESRPD 
(
   ESRPDIDENTITY        NUMBER               not null,
   PAISIDENTITY         number,
   ESDEPIDENTITY        number(2),
   IDPAIS               NUMBER,
   IDDEPTO              NUMBER,
   constraint PK_ESRPD primary key (ESRPDIDENTITY)
)
/

comment on table ESRPD is
'RELACION PAIS / MUNICIPIO.'
/

drop index IND_ESRPL;

drop table ESRPL cascade constraints;

/*==============================================================*/
/* Table: ESRPL                                                 */
/*==============================================================*/
create table ESRPL 
(
   ESRPLIDENTITY        NUMBER               not null,
   IND_ESRPL            as (case when (-1)<ESRPLIDENTITY AND ESTADO <> 'N' then 0 else ESRPLIDENTITY end),
   IDPERFIL             NUMBER,
   IDLISTA              NUMBER,
   ESTADO               VARCHAR2(1),
   constraint PK_ESRPL primary key (ESRPLIDENTITY)
);

/*==============================================================*/
/* Index: IND_ESRPL                                             */
/*==============================================================*/
create unique index IND_ESRPL on ESRPL (
   IND_ESRPL ASC,
   IDPERFIL ASC,
   IDLISTA ASC
)

CREATE SEQUENCE SEQ_ESRPL
 START WITH 1
 INCREMENT BY 1;

CREATE OR REPLACE TRIGGER TRG_BIR_ESRPL BEFORE INSERT /*BEFORE INSERT RECORD*/
ON ESRPL
FOR EACH ROW
BEGIN
    SELECT SEQ_ESRPL.NEXTVAL INTO :NEW.ESRPLIDENTITY FROM DUAL;
END;

/*==============================================================*/
/* Index: IND_ESRPL                                             */
/*==============================================================*/
create unique index IND_ESRPL on ESRPL (
   IND_ESRPL ASC,
   IDPERFIL ASC
)
/

drop index IND_ESRRP;

drop table ESRRP cascade constraints;

/*==============================================================*/
/* Table: ESRRP                                                 */
/*==============================================================*/
create table ESRRP 
(
   ESRRPIDENTITY        NUMBER               not null,
   IND_ESRRP            as (case when (-1)<ESRRPIDENTITY AND ESTADO <> 'N' then 0 else ESRRPIDENTITY end),
   IDROL                NUMBER,
   IDPERFIL             NUMBER,
   ESTADO               VARCHAR2(1),
   constraint PK_ESRRP primary key (ESRRPIDENTITY)
);

comment on table ESRRP is
'Relacion de rol / perfil';

/*==============================================================*/
/* Index: IND_ESRRP                                             */
/*==============================================================*/
create unique index IND_ESRRP on ESRRP (
   IND_ESRRP ASC,
   IDROL ASC,
   IDPERFIL ASC
);

CREATE SEQUENCE SEQ_ESRRP
 START WITH 1
 INCREMENT BY 1;

CREATE OR REPLACE TRIGGER TRG_BIR_ESRRP BEFORE INSERT /*BEFORE INSERT RECORD*/
ON ESRRP
FOR EACH ROW
BEGIN
    SELECT SEQ_ESRRP.NEXTVAL INTO :NEW.ESRRPIDENTITY FROM DUAL;
END;

drop index IND_ESSUC;

drop table ESSUC cascade constraints;

/*==============================================================*/
/* Table: ESSUC                                                 */
/*==============================================================*/
create table ESSUC 
(
   ESSUCIDENTITY        NUMBER               not null,
   IND_ESSUC             as (case when (-1)<ESSUCIDENTITY AND ESTADO <> 'N' then 0 else ESSUCIDENTITY end),
   IDSUCURSAL           NUMBER,
   SUCURSAL             VARCHAR2(60),
   ESTADO               VARCHAR2(1),
   constraint PK_ESSUC primary key (ESSUCIDENTITY)
);

comment on table ESSUC is
'MAESTRO DE SUCURSALES';

/*==============================================================*/
/* Index: IND_ESSUC                                             */
/*==============================================================*/
create unique index IND_ESSUC on ESSUC (
   IND_ESSUC ASC,
   IDSUCURSAL ASC
);

CREATE SEQUENCE SEQ_ESSUC
 START WITH 1
 INCREMENT BY 1;

CREATE OR REPLACE TRIGGER TRG_BIR_ESSUC BEFORE INSERT /*BEFORE INSERT RECORD*/
ON ESSUC
FOR EACH ROW
BEGIN
    SELECT SEQ_ESSUC.NEXTVAL INTO :NEW.ESSUCIDENTITY FROM DUAL;
END;

drop index IND_ESTRX;

drop table ESTRX cascade constraints;

/*==============================================================*/
/* Table: ESTRX                                                 */
/*==============================================================*/
create table ESTRX 
(
   ESTRXIDENTITY        NUMBER               not null,
   IND_ESTRX            as (case when (-1)<ESTRXIDENTITY AND ESTADO <> 'N' then 0 else ESTRXIDENTITY end),
   IDTRX                NUMBER,
   NOMBRE               VARCHAR2(60),
   ESTADO               VARCHAR2(60),
   constraint PK_ESTRX primary key (ESTRXIDENTITY)
);

/*==============================================================*/
/* Index: IND_ESTRX                                             */
/*==============================================================*/
create unique index IND_ESTRX on ESTRX (
   IND_ESTRX ASC,
   IDTRX ASC
);

CREATE SEQUENCE SEQ_ESTRX
 START WITH 1
 INCREMENT BY 1;

CREATE OR REPLACE TRIGGER TRG_BIR_ESTRX BEFORE INSERT /*BEFORE INSERT RECORD*/
ON ESTRX
FOR EACH ROW
BEGIN
    SELECT SEQ_ESTRX.NEXTVAL INTO :NEW.ESTRXIDENTITY FROM DUAL;
END;
drop table ESUSR cascade constraints;

/*==============================================================*/
/* Table: USUARIO                                               */
/*==============================================================*/
create table ESUSR 
(
   ESUSRIDENTITY        number               not null,
   IND_ESUSR            as (case when (-1)<ESUSRIDENTITY AND ESTATUS <> 'N' then 0 else ESUSRIDENTITY end),
   IDSUCURSAL           number,
   IDJORNADA            number,
   IDUSUARIO            number,
   USUARIO              varchar2(15),
   CLAVE                varchar2(30),
   IDROL                number,
   IDPERSONA            number,
   SESION               varchar2(50),
   EDOCONEXION          varchar2(3),
   FECHACREACION        varchar2(10),
   FECHAMOD             varchar2(10),
   FECHAULTINGRESO      varchar2(10),
   HORAULTINGRESO       varchar2(6),
   ESTATUS              varchar2(1),
   constraint PK_ESUSR primary key (ESUSRIDENTITY)
);

create unique index IND_ESUSR  on ESUSR (IND_ESUSR,USUARIO ASC);

CREATE SEQUENCE SEQ_ESUSR
 START WITH 1
 INCREMENT BY 1;

CREATE OR REPLACE TRIGGER TRG_BIR_ESUSR BEFORE INSERT /*BEFORE INSERT RECORD*/
ON ESUSR
FOR EACH ROW
BEGIN
    SELECT SEQ_ESUSR.NEXTVAL INTO :NEW.ESUSRIDENTITY FROM DUAL;
END;

drop index IND_SESSION;

drop table "SESSION" cascade constraints;

/*==============================================================*/
/* Table: "SESSION"                                             */
/*==============================================================*/
create table "SESSION" 
(
   SESSIONIDENTITY      NUMBER               not null,
   IND_SESSION          as (case when (-1)<SESSIONIDENTITY AND ESTATUS <> 'N' then 0 else SESSIONIDENTITY end),
   "USER"               varchar2(15),
   USRSESSION           varchar2(50),
   ESTATUS              varchar2(1),
   constraint PK_SESSION primary key (SESSIONIDENTITY)
);

/*==============================================================*/
/* Index: IND_SESSION                                           */
/*==============================================================*/
create unique index IND_SESSION  on "SESSION" (IND_SESSION,"USER" ASC);

CREATE SEQUENCE SEQ_SESSION
 START WITH 1
 INCREMENT BY 1;

CREATE OR REPLACE TRIGGER TRG_BIR_SESSION BEFORE INSERT /*BEFORE INSERT RECORD*/
ON "SESSION"
FOR EACH ROW
BEGIN
    SELECT SEQ_SESSION.NEXTVAL INTO :NEW.SESSIONIDENTITY FROM DUAL;
END;

/*==============================================================*/
/* Index: IND_SESSION                                           */
/*==============================================================*/
create unique index IND_SESSION on "SESSION" (
   IND_SESSION ASC,
   "USER" ASC
)
/

alter table ESDIR
   add constraint FK_ESDIR_REFERENCE_ESMUN foreign key (ESMUNIDENTITY)
      references ESMUN (ESMUNIDENTITY)
/

alter table ESDIR
   add constraint FK_ESDIR_REFERENCE_ESDEP foreign key (ESDEPIDENTITY)
      references ESDEP (ESDEPIDENTITY)
/

alter table ESDIR
   add constraint FK_ESDIR_REFERENCE_ESMPA foreign key (PAISIDENTITY)
      references ESMPA (PAISIDENTITY)
/

alter table ESDIR
   add constraint FK_ESDIR_REFERENCE_ESMPR foreign key (ESMPRIDENTITY, ESM_IDPERSONA)
      references ESMPR (ESMPRIDENTITY, IDPERSONA)
/

alter table ESEMP
   add constraint FK_ESEMP_REFERENCE_ESDIR foreign key (ESDIRIDENTITY, IDDIRE)
      references ESDIR (ESDIRIDENTITY, IDDIRE)
/

alter table ESEMP
   add constraint FK_ESEMP_REFERENCE_ESJOR foreign key (ESJORIDENTITY, IDJOR)
      references ESJOR (ESJORIDENTITY, IDJOR)
/

alter table ESEMP
   add constraint FK_ESEMP_REFERENCE_ESARE foreign key (ESAREIDENTITY, IDAREA)
      references ESARE (ESAREIDENTITY, IDAREA)
/

alter table ESEMP
   add constraint FK_ESEMP_REFERENCE_ESPLA foreign key (ESPLAIDENTITY, IDPLANILLA)
      references ESPLA (ESPLAIDENTITY, IDPLANILLA)
/

alter table ESEMP
   add constraint FK_ESEMP_REFERENCE_ESMPT foreign key (ESMPTIDENTITY, IDPUESTO)
      references ESMPT (ESMPTIDENTITY, IDPUESTO)
/

alter table ESEMP
   add constraint FK_ESEMP_REFERENCE_ESMPR foreign key (ESMPRIDENTITY, IDPERSONA)
      references ESMPR (ESMPRIDENTITY, IDPERSONA)
/

alter table ESEMP
   add constraint FK_ESEMP_REFERENCE_ESSUC foreign key (ESSUCIDENTITY)
      references ESSUC (ESSUCIDENTITY)
/

alter table ESRDM
   add constraint FK_ESRDM_REFERENCE_ESMUN foreign key (ESMUNIDENTITY)
      references ESMUN (ESMUNIDENTITY)
/

alter table ESRDM
   add constraint FK_ESRDM_REFERENCE_ESDEP foreign key (ESDEPIDENTITY)
      references ESDEP (ESDEPIDENTITY)
/

alter table ESRLT
   add constraint FK_ESRLT_REFERENCE_ESLTS foreign key (ESLTSIDENTITY)
      references ESLTS (ESLTSIDENTITY)
/

alter table ESRLT
   add constraint FK_ESRLT_REFERENCE_ESTRX foreign key (ESTRXIDENTITY)
      references ESTRX (ESTRXIDENTITY)
/

alter table ESRPD
   add constraint FK_ESRPD_REFERENCE_ESMPA foreign key (PAISIDENTITY)
      references ESMPA (PAISIDENTITY)
/

alter table ESRPD
   add constraint FK_ESRPD_REFERENCE_ESDEP foreign key (ESDEPIDENTITY)
      references ESDEP (ESDEPIDENTITY)
/

alter table ESRPL
   add constraint FK_ESRPL_REFERENCE_ESRRP foreign key (ESRRPIDENTITY)
      references ESRRP (ESRRPIDENTITY)
/

alter table ESRPL
   add constraint FK_ESRPL_REFERENCE_ESLTS foreign key (ESLTSIDENTITY)
      references ESLTS (ESLTSIDENTITY)
/

alter table ESRRP
   add constraint FK_ESRRP_REFERENCE_ESROL foreign key (ESROLIDENTITY)
      references ESROL (ESROLIDENTITY)
/

alter table ESRRP
   add constraint FK_ESRRP_REFERENCE_ESPER foreign key (ESPERIDENTITY, IDPERFIL)
      references ESPER (ESPERIDENTITY, IDPERFIL)
/

alter table ESUSR
   add constraint FK_ESUSR_REFERENCE_ESEMP foreign key (IDEMPLEADO)
      references ESEMP (IDEMPLEADO)
/

alter table ESUSR
   add constraint FK_ESUSR_REFERENCE_ESROL foreign key (ESROLIDENTITY)
      references ESROL (ESROLIDENTITY)
/

