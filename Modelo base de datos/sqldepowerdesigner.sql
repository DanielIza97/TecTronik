/*==============================================================*/
/* DBMS name:      PostgreSQL 8                                 */
/* Created on:     24/10/2020 15:24:31                          */
/*==============================================================*/


drop index CATEGORIA_PRODUCTO_PK;

drop table CATEGORIA_PRODUCTO;

drop index TIENE_FK;

drop index DIRECCION_PK;

drop table DIRECCION;

drop index POSEE2_FK;

drop index ADMINISTRA1_FK;

drop index INFORMACION_CLIENTE_PK;

drop table INFORMACION_CLIENTE;

drop index MEDIDA_PK;

drop table MEDIDA;

drop index REALIZA_FK;

drop index PEDIDO_PK;

drop table PEDIDO;

drop index CLASIFICAR_FK;

drop index PERTENECE_A_FK;

drop index ADMINISTRA_FK;

drop index PRODUCTO_PK;

drop table PRODUCTO;

drop index PRODUCTOXPEDIDO2_FK;

drop index PRODUCTOXPEDIDO_FK;

drop index PRODUCTOXPEDIDO_PK;

drop table PRODUCTOXPEDIDO;

drop index PERTENECE_FK;

drop index ADMINISTRA2_FK;

drop index RECETAS_PK;

drop table RECETAS;

drop index RECETAXPRODUCTO2_FK;

drop index RECETAXPRODUCTO_FK;

drop index RECETAXPRODUCTO_PK;

drop table RECETAXPRODUCTO;

drop index TIPO_RECETA_PK;

drop table TIPO_RECETA;

drop index POSEE_FK;

drop index USERS_PK;

drop table USERS;

/*==============================================================*/
/* Table: CATEGORIA_PRODUCTO                                    */
/*==============================================================*/
create table CATEGORIA_PRODUCTO (
   IDTIPOPROD           CHAR(10)             not null,
   NOMBRETIPOPROD       CHAR(15)             not null,
   constraint PK_CATEGORIA_PRODUCTO primary key (IDTIPOPROD)
);

/*==============================================================*/
/* Index: CATEGORIA_PRODUCTO_PK                                 */
/*==============================================================*/
create unique index CATEGORIA_PRODUCTO_PK on CATEGORIA_PRODUCTO (
IDTIPOPROD
);

/*==============================================================*/
/* Table: DIRECCION                                             */
/*==============================================================*/
create table DIRECCION (
   IDDIRECCION          CHAR(20)             not null,
   IDCEDULACLIENTE      CHAR(10)             not null,
   CALLEPRINCIPAL       CHAR(30)             not null,
   CALLESECUNDARIA      CHAR(30)             not null,
   IMAGENDIRECCION      CHAR(254)            null,
   constraint PK_DIRECCION primary key (IDDIRECCION)
);

/*==============================================================*/
/* Index: DIRECCION_PK                                          */
/*==============================================================*/
create unique index DIRECCION_PK on DIRECCION (
IDDIRECCION
);

/*==============================================================*/
/* Index: TIENE_FK                                              */
/*==============================================================*/
create  index TIENE_FK on DIRECCION (
IDCEDULACLIENTE
);

/*==============================================================*/
/* Table: INFORMACION_CLIENTE                                   */
/*==============================================================*/
create table INFORMACION_CLIENTE (
   IDCEDULACLIENTE      CHAR(10)             not null,
   ID                   CHAR(10)             not null,
   USE_ID               CHAR(10)             not null,
   TELEFONOCLIENTE      CHAR(10)             not null,
   NOMBRECLIENTE        CHAR(30)             not null,
   CORREOCLIENTE        CHAR(40)             not null,
   IMAGENCLIENTE        CHAR(254)            not null,
   constraint PK_INFORMACION_CLIENTE primary key (IDCEDULACLIENTE)
);

/*==============================================================*/
/* Index: INFORMACION_CLIENTE_PK                                */
/*==============================================================*/
create unique index INFORMACION_CLIENTE_PK on INFORMACION_CLIENTE (
IDCEDULACLIENTE
);

/*==============================================================*/
/* Index: ADMINISTRA1_FK                                        */
/*==============================================================*/
create  index ADMINISTRA1_FK on INFORMACION_CLIENTE (
ID
);

/*==============================================================*/
/* Index: POSEE2_FK                                             */
/*==============================================================*/
create  index POSEE2_FK on INFORMACION_CLIENTE (
USE_ID
);

/*==============================================================*/
/* Table: MEDIDA                                                */
/*==============================================================*/
create table MEDIDA (
   IDMEDIDA             CHAR(10)             not null,
   NOMBREMEDIDA         CHAR(20)             not null,
   constraint PK_MEDIDA primary key (IDMEDIDA)
);

/*==============================================================*/
/* Index: MEDIDA_PK                                             */
/*==============================================================*/
create unique index MEDIDA_PK on MEDIDA (
IDMEDIDA
);

/*==============================================================*/
/* Table: PEDIDO                                                */
/*==============================================================*/
create table PEDIDO (
   IDPEDIDO             CHAR(10)             not null,
   IDCEDULACLIENTE      CHAR(10)             not null,
   FECHAPEDIDO          DATE                 not null,
   constraint PK_PEDIDO primary key (IDPEDIDO)
);

/*==============================================================*/
/* Index: PEDIDO_PK                                             */
/*==============================================================*/
create unique index PEDIDO_PK on PEDIDO (
IDPEDIDO
);

/*==============================================================*/
/* Index: REALIZA_FK                                            */
/*==============================================================*/
create  index REALIZA_FK on PEDIDO (
IDCEDULACLIENTE
);

/*==============================================================*/
/* Table: PRODUCTO                                              */
/*==============================================================*/
create table PRODUCTO (
   IDPRODUCTO           CHAR(10)             not null,
   ID                   CHAR(10)             not null,
   IDTIPOPROD           CHAR(10)             not null,
   IDMEDIDA             CHAR(10)             null,
   NOMBREPRODUCTO       CHAR(30)             not null,
   DETALLE              CHAR(100)            not null,
   TAMANOPRODUCTO       CHAR(10)             not null,
   CANTIDADPRODUCTO     DECIMAL(6,2)         not null,
   PRECIOPRODUCTO       NUMERIC(5)           not null,
   IMAGENPRODUCTO       CHAR(254)            null,
   SEXO                 CHAR(1)              not null,
   constraint PK_PRODUCTO primary key (IDPRODUCTO)
);

/*==============================================================*/
/* Index: PRODUCTO_PK                                           */
/*==============================================================*/
create unique index PRODUCTO_PK on PRODUCTO (
IDPRODUCTO
);

/*==============================================================*/
/* Index: ADMINISTRA_FK                                         */
/*==============================================================*/
create  index ADMINISTRA_FK on PRODUCTO (
ID
);

/*==============================================================*/
/* Index: PERTENECE_A_FK                                        */
/*==============================================================*/
create  index PERTENECE_A_FK on PRODUCTO (
IDTIPOPROD
);

/*==============================================================*/
/* Index: CLASIFICAR_FK                                         */
/*==============================================================*/
create  index CLASIFICAR_FK on PRODUCTO (
IDMEDIDA
);

/*==============================================================*/
/* Table: PRODUCTOXPEDIDO                                       */
/*==============================================================*/
create table PRODUCTOXPEDIDO (
   IDPEDIDO             CHAR(10)             not null,
   IDPRODUCTO           CHAR(10)             not null,
   SUBTOTAL             DECIMAL(6,2)         not null,
   IVA                  DECIMAL(6,2)         not null,
   TAP                  DECIMAL(6,2)         not null,
   constraint PK_PRODUCTOXPEDIDO primary key (IDPEDIDO, IDPRODUCTO)
);

/*==============================================================*/
/* Index: PRODUCTOXPEDIDO_PK                                    */
/*==============================================================*/
create unique index PRODUCTOXPEDIDO_PK on PRODUCTOXPEDIDO (
IDPEDIDO,
IDPRODUCTO
);

/*==============================================================*/
/* Index: PRODUCTOXPEDIDO_FK                                    */
/*==============================================================*/
create  index PRODUCTOXPEDIDO_FK on PRODUCTOXPEDIDO (
IDPEDIDO
);

/*==============================================================*/
/* Index: PRODUCTOXPEDIDO2_FK                                   */
/*==============================================================*/
create  index PRODUCTOXPEDIDO2_FK on PRODUCTOXPEDIDO (
IDPRODUCTO
);

/*==============================================================*/
/* Table: RECETAS                                               */
/*==============================================================*/
create table RECETAS (
   IDRECETA             CHAR(10)             not null,
   ID                   CHAR(10)             not null,
   IDTIPORECETA         CHAR(10)             not null,
   NOMBRERECETA         CHAR(15)             not null,
   DESCRIPCIONRECETA    CHAR(30)             not null,
   IMAGENRECETA         CHAR(254)            null,
   constraint PK_RECETAS primary key (IDRECETA)
);

/*==============================================================*/
/* Index: RECETAS_PK                                            */
/*==============================================================*/
create unique index RECETAS_PK on RECETAS (
IDRECETA
);

/*==============================================================*/
/* Index: ADMINISTRA2_FK                                        */
/*==============================================================*/
create  index ADMINISTRA2_FK on RECETAS (
ID
);

/*==============================================================*/
/* Index: PERTENECE_FK                                          */
/*==============================================================*/
create  index PERTENECE_FK on RECETAS (
IDTIPORECETA
);

/*==============================================================*/
/* Table: RECETAXPRODUCTO                                       */
/*==============================================================*/
create table RECETAXPRODUCTO (
   IDPRODUCTO           CHAR(10)             not null,
   IDRECETA             CHAR(10)             not null,
   DETALLEINGREDIENTES  CHAR(50)             not null,
   constraint PK_RECETAXPRODUCTO primary key (IDPRODUCTO, IDRECETA)
);

/*==============================================================*/
/* Index: RECETAXPRODUCTO_PK                                    */
/*==============================================================*/
create unique index RECETAXPRODUCTO_PK on RECETAXPRODUCTO (
IDPRODUCTO,
IDRECETA
);

/*==============================================================*/
/* Index: RECETAXPRODUCTO_FK                                    */
/*==============================================================*/
create  index RECETAXPRODUCTO_FK on RECETAXPRODUCTO (
IDPRODUCTO
);

/*==============================================================*/
/* Index: RECETAXPRODUCTO2_FK                                   */
/*==============================================================*/
create  index RECETAXPRODUCTO2_FK on RECETAXPRODUCTO (
IDRECETA
);

/*==============================================================*/
/* Table: TIPO_RECETA                                           */
/*==============================================================*/
create table TIPO_RECETA (
   IDTIPORECETA         CHAR(10)             not null,
   NOMBRETIPORECETA     CHAR(15)             not null,
   constraint PK_TIPO_RECETA primary key (IDTIPORECETA)
);

/*==============================================================*/
/* Index: TIPO_RECETA_PK                                        */
/*==============================================================*/
create unique index TIPO_RECETA_PK on TIPO_RECETA (
IDTIPORECETA
);

/*==============================================================*/
/* Table: USERS                                                 */
/*==============================================================*/
create table USERS (
   ID                   CHAR(10)             not null,
   IDCEDULACLIENTE      CHAR(10)             null,
   USER_NAME            CHAR(40)             not null,
   EMAIL                CHAR(30)             not null,
   PASWORD              CHAR(10)             not null,
   ROL                  CHAR(15)             not null,
   REMEMBER_TOKEN       CHAR(40)             not null,
   CREATED_AT           CHAR(254)            not null,
   UPDATES_AT           DATE                 not null,
   constraint PK_USERS primary key (ID)
);

/*==============================================================*/
/* Index: USERS_PK                                              */
/*==============================================================*/
create unique index USERS_PK on USERS (
ID
);

/*==============================================================*/
/* Index: POSEE_FK                                              */
/*==============================================================*/
create  index POSEE_FK on USERS (
IDCEDULACLIENTE
);

alter table DIRECCION
   add constraint FK_DIRECCIO_TIENE_INFORMAC foreign key (IDCEDULACLIENTE)
      references INFORMACION_CLIENTE (IDCEDULACLIENTE)
      on delete restrict on update restrict;

alter table INFORMACION_CLIENTE
   add constraint FK_INFORMAC_ADMINISTR_USERS foreign key (ID)
      references USERS (ID)
      on delete restrict on update restrict;

alter table INFORMACION_CLIENTE
   add constraint FK_INFORMAC_POSEE2_USERS foreign key (USE_ID)
      references USERS (ID)
      on delete restrict on update restrict;

alter table PEDIDO
   add constraint FK_PEDIDO_REALIZA_INFORMAC foreign key (IDCEDULACLIENTE)
      references INFORMACION_CLIENTE (IDCEDULACLIENTE)
      on delete restrict on update restrict;

alter table PRODUCTO
   add constraint FK_PRODUCTO_ADMINISTR_USERS foreign key (ID)
      references USERS (ID)
      on delete restrict on update restrict;

alter table PRODUCTO
   add constraint FK_PRODUCTO_CLASIFICA_MEDIDA foreign key (IDMEDIDA)
      references MEDIDA (IDMEDIDA)
      on delete restrict on update restrict;

alter table PRODUCTO
   add constraint FK_PRODUCTO_PERTENECE_CATEGORI foreign key (IDTIPOPROD)
      references CATEGORIA_PRODUCTO (IDTIPOPROD)
      on delete restrict on update restrict;

alter table PRODUCTOXPEDIDO
   add constraint FK_PRODUCTO_PRODUCTOX_PEDIDO foreign key (IDPEDIDO)
      references PEDIDO (IDPEDIDO)
      on delete restrict on update restrict;

alter table PRODUCTOXPEDIDO
   add constraint FK_PRODUCTO_PRODUCTOX_PRODUCTO foreign key (IDPRODUCTO)
      references PRODUCTO (IDPRODUCTO)
      on delete restrict on update restrict;

alter table RECETAS
   add constraint FK_RECETAS_ADMINISTR_USERS foreign key (ID)
      references USERS (ID)
      on delete restrict on update restrict;

alter table RECETAS
   add constraint FK_RECETAS_PERTENECE_TIPO_REC foreign key (IDTIPORECETA)
      references TIPO_RECETA (IDTIPORECETA)
      on delete restrict on update restrict;

alter table RECETAXPRODUCTO
   add constraint FK_RECETAXP_RECETAXPR_PRODUCTO foreign key (IDPRODUCTO)
      references PRODUCTO (IDPRODUCTO)
      on delete restrict on update restrict;

alter table RECETAXPRODUCTO
   add constraint FK_RECETAXP_RECETAXPR_RECETAS foreign key (IDRECETA)
      references RECETAS (IDRECETA)
      on delete restrict on update restrict;

alter table USERS
   add constraint FK_USERS_POSEE_INFORMAC foreign key (IDCEDULACLIENTE)
      references INFORMACION_CLIENTE (IDCEDULACLIENTE)
      on delete restrict on update restrict;

