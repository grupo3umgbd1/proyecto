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

