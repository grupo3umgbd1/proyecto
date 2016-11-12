/* Insercion de datos iniciales para tabla ESMPR*/
insert into ESMPR(ESMPRIDENTITY,IDPERSONA,IDCOLOR,PRIMERNOMBRE,SEGUNDONOMBRE,TERCERNOMBRE,PRIMERAPELLIDO,SEGUNDOAPELLIDO,APELLIDOCASADA,FECHANACIMIENTO,GENERO,ESTADO)
           values(SEQ_ESMPR.NEXTVAL,1,1,'IVAN','JOSE','','PINEDA','ORTEGA','',TO_DATE('1980/01/15 11:02:44','yyyy/mm/dd hh24:mi:ss'),'M','A')


/* Insercion de datos iniciales para tabla ESUSR*/
insert into ESUSR(ESUSRIDENTITY,IDSUCURSAL,IDJORNADA,IDUSUARIO,USUARIO,CLAVE,IDROL,IDPERSONA,SESION,EDOCONEXION,FECHACREACION,FECHAMOD,FECHAULTINGRESO,HORAULTINGRESO,ESTATUS)
values(SEQ_ESUSR.NEXTVAL,1,1,1,'ADMIN','ADMIN',1,1,'','','13/10/2016','','','','A')

/* Insercion de datos iniciales para tabla ESROL*/
insert into ESROL(ESROLIDENTITY,IDROL,DESCRIPCION,ESTADO)
values(SEQ_ESROL.NEXTVAL,1,'ROL ADMINISTRADOR','A')

/* Insercion de datos iniciales para tabla ESPER*/
DECLARE DESCR varchar2(60);
BEGIN
  FOR i IN  1..4 LOOP
  	IF i = 1 THEN
  		DESCR := 'Personas';
  	END IF;
  	IF i = 2 THEN
  		DESCR := 'Usuarios';
  	END IF;
  	IF i = 3 THEN
  		DESCR := 'Reportes';
  	END IF;
  	IF i = 4 THEN
  		DESCR := 'Graficas';
  	END IF;
   insert into ESPER(ESPERIDENTITY,IDPERFIL,DESCRIPCION,ESTADO)
			  values(SEQ_ESPER.NEXTVAL,i,DESCR,'A');
  END LOOP;
  COMMIT;
END;

/* Insercion de datos iniciales para tabla ESRRP*/
BEGIN
  FOR i IN  1..4 LOOP
   insert into ESRRP(ESRRPIDENTITY,IDROL,IDPERFIL,ESTADO)
			  values(SEQ_ESPER.NEXTVAL,1,i,'A');
  END LOOP;
  COMMIT;
END;

/* Insercion de datos iniciales para tabla ESRPL*/
BEGIN
  FOR i IN  1..5 LOOP
    insert into ESRPL(ESRPLIDENTITY,IDPERFIL,IDLISTA,ESTADO)
               values(SEQ_ESRPL.NEXTVAL,2,i,'A');
  END LOOP;
  COMMIT;
END;

/* Insercion de datos iniciales para tabla ESLTS*/
DECLARE DESCR varchar2(60);
BEGIN
  FOR i IN  1..5 LOOP
    IF i = 1 THEN
      DESCR := 'Usuarios';
    END IF;
    IF i = 2 THEN
      DESCR := 'Roles';
    END IF;
    IF i = 3 THEN
      DESCR := 'Perfiles';
    END IF;
    IF i = 4 THEN
      DESCR := 'Listas';
    END IF;
    IF i = 5 THEN
      DESCR := 'Transacciones';
    END IF;
   insert into ESLTS(ESLTSIDENTITY,IDLISTA,DESCRIPCION,ESTADO)
        values(SEQ_ESLTS.NEXTVAL,i,DESCR,'A');
  END LOOP;
  COMMIT;
END;

/* Insercion de datos iniciales para tablas ESRLT / ESRLT*/
DECLARE DESCR varchar2(60);
BEGIN
  FOR i IN  1..5 LOOP
      FOR j in 1..2 LOOP
        insert into ESRLT(ESRLTIDENTITY,IDLISTA,IDTRX,ESTADO)
                   values(SEQ_ESRLT.NEXTVAL,i,j,'A');
      END LOOP;
  END LOOP;
  COMMIT;
END;

/* Insercion de datos iniciales para tablas ESRLT / ESTRX*/
DECLARE DESCR varchar2(60);
BEGIN
  FOR j IN  1..10 LOOP
        IF j = 1 THEN
          DESCR  := 'Mantenimiento de Usuarios';
        END IF;

        IF j = 2 THEN
          DESCR  := 'Consulta de Usuarios';
        END IF;

        IF j = 3 THEN
          DESCR  := 'Mantenimiento de Roles';
        END IF;

        IF j = 4 THEN
          DESCR  := 'Consulta de Roles';
        END IF;
        IF j = 5 THEN
          DESCR  := 'Mantenimiento de Perfiles';
        END IF;

        IF j = 6 THEN
          DESCR  := 'Consulta de Perfiles';
        END IF;
        IF j = 7 THEN
          DESCR  := 'Mantenimiento de Listas';
        END IF;

        IF j = 8 THEN
          DESCR  := 'Consulta de Listas';
        END IF;
        IF j = 9 THEN
          DESCR  := 'Mantenimiento de Transacciones';
        END IF;

        IF j = 10 THEN
          DESCR  := 'Consulta de Transacciones';
        END IF;

        insert into ESTRX(ESTRXIDENTITY,IDTRX,NOMBRE,ESTADO)
                   values(SEQ_ESTRX.NEXTVAL,j,DESCR,'A');
  END LOOP;
  COMMIT;
END;