/*==============================================================*/
/* DBMS name:      PostgreSQL 8                                 */
/* Created on:     3/10/2020 20:03:29                           */
/*==============================================================*/


drop index ADMINISTRADOR_PK;

drop table ADMINISTRADOR;

drop index CATEGORIA_PRODUCTO_PK;

drop table CATEGORIA_PRODUCTO;

drop index RELATIONSHIP_3_FK;

drop index CLIENTE_PK;

drop table CLIENTE;

drop index TIENE_FK;

drop index DIRECCION_PK;

drop table DIRECCION;

drop index REALIZA_FK;

drop index PEDIDO_PK;

drop table PEDIDO;

drop index PERTENECE_A_FK;

drop index ADMINISTRA_FK;

drop index PRODUCTO_PK;

drop table PRODUCTO;

drop index PRODUCTOXPEDIDO_FK;

drop index PRODUCTOXPEDIDO2_FK;

drop index PRODUCTOXPEDIDO_PK;

drop table PRODUCTOXPEDIDO;

drop index PERTENECE_FK;

drop index ADMINISTRA2_FK;

drop index RECETAS_PK;

drop table RECETAS;

drop index RECETAXPRODUCTO_FK;

drop index RECETAXPRODUCTO2_FK;

drop index RECETAXPRODUCTO_PK;

drop table RECETAXPRODUCTO;

drop index TIPO_RECETA_PK;

drop table TIPO_RECETA;

/*==============================================================*/
/* Table: ADMINISTRADOR                                         */
/*==============================================================*/
create table ADMINISTRADOR (
   IDCEDULAADMINISTRADOR CHAR(10)             not null,
   NOMBREADMINISTRADOR  CHAR(40)             not null,
   CARGOADMINISTRADOR   CHAR(30)             not null,
   TELEFONOADMINISTRADOR CHAR(10)             not null,
   CORREOADMINISTRADOR  CHAR(40)             not null,
   IMAGENADMINISTRADOR  CHAR(254)            not null,
   constraint PK_ADMINISTRADOR primary key (IDCEDULAADMINISTRADOR)
);

/*==============================================================*/
/* Index: ADMINISTRADOR_PK                                      */
/*==============================================================*/
create unique index ADMINISTRADOR_PK on ADMINISTRADOR (
IDCEDULAADMINISTRADOR
);

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
/* Table: CLIENTE                                               */
/*==============================================================*/
create table CLIENTE (
   IDCEDULACLIENTE      CHAR(10)             not null,
   NOMBREUSUARIO        CHAR(10)             not null,
   CONTRASENA           CHAR(10)             not null,
   ROL                  CHAR(15)             not null,
   IDCEDULAADMINISTRADOR CHAR(10)             not null,
   TELEFONOCLIENTE      CHAR(10)             not null,
   NOMBRECLIENTE        CHAR(30)             not null,
   CORREOCLIENTE        CHAR(40)             not null,
   IMAGENCLIENTE        CHAR(254)            not null,
   constraint PK_CLIENTE primary key (IDCEDULACLIENTE)
);

/*==============================================================*/
/* Index: CLIENTE_PK                                            */
/*==============================================================*/
create unique index CLIENTE_PK on CLIENTE (
IDCEDULACLIENTE
);

/*==============================================================*/
/* Index: RELATIONSHIP_3_FK                                     */
/*==============================================================*/
create  index RELATIONSHIP_3_FK on CLIENTE (
IDCEDULAADMINISTRADOR
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
   IDCEDULAADMINISTRADOR CHAR(10)             not null,
   IDTIPOPROD           CHAR(10)             not null,
   NOMBREPRODUCTO       CHAR(30)             not null,
   DETALLE              CHAR(100)            not null,
   TAMANOPRODUCTO       CHAR(10)             not null,
   CANTIDADPRODUCTO     FLOAT8               not null,
   PRECIOPRODUCTO       NUMERIC(5)           not null,
   IMAGENPRODUCTO       CHAR(254)            null,
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
IDCEDULAADMINISTRADOR
);

/*==============================================================*/
/* Index: PERTENECE_A_FK                                        */
/*==============================================================*/
create  index PERTENECE_A_FK on PRODUCTO (
IDTIPOPROD
);

/*==============================================================*/
/* Table: PRODUCTOXPEDIDO                                       */
/*==============================================================*/
create table PRODUCTOXPEDIDO (
   IDPEDIDO             CHAR(10)             not null,
   IDPRODUCTO           CHAR(10)             not null,
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
/* Index: PRODUCTOXPEDIDO2_FK                                   */
/*==============================================================*/
create  index PRODUCTOXPEDIDO2_FK on PRODUCTOXPEDIDO (
IDPEDIDO
);

/*==============================================================*/
/* Index: PRODUCTOXPEDIDO_FK                                    */
/*==============================================================*/
create  index PRODUCTOXPEDIDO_FK on PRODUCTOXPEDIDO (
IDPRODUCTO
);

/*==============================================================*/
/* Table: RECETAS                                               */
/*==============================================================*/
create table RECETAS (
   IDRECETA             CHAR(10)             not null,
   IDCEDULAADMINISTRADOR CHAR(10)             not null,
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
IDCEDULAADMINISTRADOR
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
/* Index: RECETAXPRODUCTO2_FK                                   */
/*==============================================================*/
create  index RECETAXPRODUCTO2_FK on RECETAXPRODUCTO (
IDPRODUCTO
);

/*==============================================================*/
/* Index: RECETAXPRODUCTO_FK                                    */
/*==============================================================*/
create  index RECETAXPRODUCTO_FK on RECETAXPRODUCTO (
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

alter table CLIENTE
   add constraint FK_CLIENTE_RELATIONS_ADMINIST foreign key (IDCEDULAADMINISTRADOR)
      references ADMINISTRADOR (IDCEDULAADMINISTRADOR)
      on delete restrict on update restrict;

alter table DIRECCION
   add constraint FK_DIRECCIO_TIENE_CLIENTE foreign key (IDCEDULACLIENTE)
      references CLIENTE (IDCEDULACLIENTE)
      on delete restrict on update restrict;

alter table PEDIDO
   add constraint FK_PEDIDO_REALIZA_CLIENTE foreign key (IDCEDULACLIENTE)
      references CLIENTE (IDCEDULACLIENTE)
      on delete restrict on update restrict;

alter table PRODUCTO
   add constraint FK_PRODUCTO_ADMINISTR_ADMINIST foreign key (IDCEDULAADMINISTRADOR)
      references ADMINISTRADOR (IDCEDULAADMINISTRADOR)
      on delete restrict on update restrict;

alter table PRODUCTO
   add constraint FK_PRODUCTO_PERTENECE_CATEGORI foreign key (IDTIPOPROD)
      references CATEGORIA_PRODUCTO (IDTIPOPROD)
      on delete restrict on update restrict;

alter table PRODUCTOXPEDIDO
   add constraint FK_PRODUCTO_PRODUCTOX_PRODUCTO foreign key (IDPRODUCTO)
      references PRODUCTO (IDPRODUCTO)
      on delete restrict on update restrict;

alter table PRODUCTOXPEDIDO
   add constraint FK_PRODUCTO_PRODUCTOX_PEDIDO foreign key (IDPEDIDO)
      references PEDIDO (IDPEDIDO)
      on delete restrict on update restrict;

alter table RECETAS
   add constraint FK_RECETAS_ADMINISTR_ADMINIST foreign key (IDCEDULAADMINISTRADOR)
      references ADMINISTRADOR (IDCEDULAADMINISTRADOR)
      on delete restrict on update restrict;

alter table RECETAS
   add constraint FK_RECETAS_PERTENECE_TIPO_REC foreign key (IDTIPORECETA)
      references TIPO_RECETA (IDTIPORECETA)
      on delete restrict on update restrict;

alter table RECETAXPRODUCTO
   add constraint FK_RECETAXP_RECETAXPR_RECETAS foreign key (IDRECETA)
      references RECETAS (IDRECETA)
      on delete restrict on update restrict;

alter table RECETAXPRODUCTO
   add constraint FK_RECETAXP_RECETAXPR_PRODUCTO foreign key (IDPRODUCTO)
      references PRODUCTO (IDPRODUCTO)
      on delete restrict on update restrict;

