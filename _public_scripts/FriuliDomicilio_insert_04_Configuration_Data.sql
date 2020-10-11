/*****************************/
/***Incominciamo dai domini***/
/*****************************/

/*Insert 1: t_file_types */

insert into t_file_types (t_file_types_code, t_file_types_name, t_file_types_description, t_file_types_visible) values('PIC', 'Picture', 'Picture', 1);
insert into t_file_types (t_file_types_code, t_file_types_name, t_file_types_description, t_file_types_visible) values('ICO', 'Icone', 'Icone', 1);

/*Insert 2: t_social_network_types */

insert into t_social_network_types(t_social_network_types_code, t_social_network_types_name, t_social_network_types_description, t_social_network_types_visible) values ('FACEBOOK', 'Facebook', 'Facebook', 1);
insert into t_social_network_types(t_social_network_types_code, t_social_network_types_name, t_social_network_types_description, t_social_network_types_visible) values ('INSTAGRAM', 'Instagram', 'Instagram', 1);
insert into t_social_network_types(t_social_network_types_code, t_social_network_types_name, t_social_network_types_description, t_social_network_types_visible) values ('WHATSAPP', 'Whatsapp', 'Whatsapp', 1);
insert into t_social_network_types(t_social_network_types_code, t_social_network_types_name, t_social_network_types_description, t_social_network_types_visible) values ('TWITTER', 'Twitter', 'Twitter', 1);
insert into t_social_network_types(t_social_network_types_code, t_social_network_types_name, t_social_network_types_description, t_social_network_types_visible) values ('TIKTOK', 'TikTok', 'TikTok', 1);
insert into t_social_network_types(t_social_network_types_code, t_social_network_types_name, t_social_network_types_description, t_social_network_types_visible) values ('SNAPCHAT', 'SnapChat', 'SnapChat', 1);
insert into t_social_network_types(t_social_network_types_code, t_social_network_types_name, t_social_network_types_description, t_social_network_types_visible) values ('LINKEDIN', 'LinkedIn', 'LinkedIn', 1);

/**************************************************************************/
/***Passiamo adesso ai link ai file statici che abbiamo caricato per ora***/
/**************************************************************************/

/*insert 3: e_files*/

insert into e_files(e_files_path, e_files_name, e_files_extension, e_files_description, e_files_visible, e_files_t_file_types_id) values ('/pictures/categories/pizzerie.jpg','pizzerie','jpg','Categoria Pizzerie', 1, (select t_file_types_id from t_file_types where t_file_types_code = 'PIC' and t_file_types_visible= 1));
insert into e_files(e_files_path, e_files_name, e_files_extension, e_files_description, e_files_visible, e_files_t_file_types_id) values ('/pictures/categories/farmacie.jpg','farmacie','jpg','Categoria Farmacie', 1, (select t_file_types_id from t_file_types where t_file_types_code = 'PIC' and t_file_types_visible= 1));
insert into e_files(e_files_path, e_files_name, e_files_extension, e_files_description, e_files_visible, e_files_t_file_types_id) values ('/pictures/categories/ortofrutta.jpg','ortofrutta','jpg','Categoria Ortofrutta', 1, (select t_file_types_id from t_file_types where t_file_types_code = 'PIC' and t_file_types_visible= 1));
insert into e_files(e_files_path, e_files_name, e_files_extension, e_files_description, e_files_visible, e_files_t_file_types_id) values ('/pictures/categories/sushi.jpg','sushi','jpg','Categoria Sushi', 1, (select t_file_types_id from t_file_types where t_file_types_code = 'PIC' and t_file_types_visible= 1));
insert into e_files(e_files_path, e_files_name, e_files_extension, e_files_description, e_files_visible, e_files_t_file_types_id) values ('/pictures/categories/ristoranti.jpg','ristoranti','jpg','Categoria Ristoranti', 1, (select t_file_types_id from t_file_types where t_file_types_code = 'PIC' and t_file_types_visible= 1));
insert into e_files(e_files_path, e_files_name, e_files_extension, e_files_description, e_files_visible, e_files_t_file_types_id) values ('/pictures/categories/ristoranti_etnici.jpg','ristoranti_etnici','jpg','Categoria Ristoranti Etnici', 1, (select t_file_types_id from t_file_types where t_file_types_code = 'PIC' and t_file_types_visible= 1));
insert into e_files(e_files_path, e_files_name, e_files_extension, e_files_description, e_files_visible, e_files_t_file_types_id) values ('/pictures/categories/panifici.jpg','panifici','jpg','Categoria Panifici', 1, (select t_file_types_id from t_file_types where t_file_types_code = 'PIC' and t_file_types_visible= 1));
insert into e_files(e_files_path, e_files_name, e_files_extension, e_files_description, e_files_visible, e_files_t_file_types_id) values ('/pictures/categories/pasticcerie.jpg','pasticcerie','jpg','Categoria Pasticcerie', 1, (select t_file_types_id from t_file_types where t_file_types_code = 'PIC' and t_file_types_visible= 1));
insert into e_files(e_files_path, e_files_name, e_files_extension, e_files_description, e_files_visible, e_files_t_file_types_id) values ('/pictures/categories/aziende_vinicole.jpg','aziende_vinicole','jpg','Categoria Aziende Vinicole', 1, (select t_file_types_id from t_file_types where t_file_types_code = 'PIC' and t_file_types_visible= 1));
insert into e_files(e_files_path, e_files_name, e_files_extension, e_files_description, e_files_visible, e_files_t_file_types_id) values ('/pictures/categories/servizi_professionali.jpg','servizi professionali','jpg','Categoria Servizi Professionali', 1, (select t_file_types_id from t_file_types where t_file_types_code = 'PIC' and t_file_types_visible= 1));
insert into e_files(e_files_path, e_files_name, e_files_extension, e_files_description, e_files_visible, e_files_t_file_types_id) values ('/pictures/categories/commercio_al_dettaglio.jpg','commercio_al_dettaglio','jpg','Categoria Commercio Al Dettaglio', 1, (select t_file_types_id from t_file_types where t_file_types_code = 'PIC' and t_file_types_visible= 1));
insert into e_files(e_files_path, e_files_name, e_files_extension, e_files_description, e_files_visible, e_files_t_file_types_id) values ('/pictures/shops/00000001.jpg','00000001','jpg','Il pesce di Francesco', 1, (select t_file_types_id from t_file_types where t_file_types_code = 'PIC' and t_file_types_visible= 1));
insert into e_files(e_files_path, e_files_name, e_files_extension, e_files_description, e_files_visible, e_files_t_file_types_id) values ('/pictures/shops/00000002.jpg','00000002','jpg','Il pesce di Francesco', 1, (select t_file_types_id from t_file_types where t_file_types_code = 'PIC' and t_file_types_visible= 1));
insert into e_files(e_files_path, e_files_name, e_files_extension, e_files_description, e_files_visible, e_files_t_file_types_id) values ('/pictures/shops/00000003.jpg','00000003','jpg','Il pesce di Francesco', 1, (select t_file_types_id from t_file_types where t_file_types_code = 'PIC' and t_file_types_visible= 1));
insert into e_files(e_files_path, e_files_name, e_files_extension, e_files_description, e_files_visible, e_files_t_file_types_id) values ('/pictures/shops/00000004.jpg','00000004','jpg','Foto Er Vino de Pino', 1, (select t_file_types_id from t_file_types where t_file_types_code = 'PIC' and t_file_types_visible= 1));
insert into e_files(e_files_path, e_files_name, e_files_extension, e_files_description, e_files_visible, e_files_t_file_types_id) values ('/pictures/shops/00000005.jpg','00000005','jpg','Foto Er Vino de Pino', 1, (select t_file_types_id from t_file_types where t_file_types_code = 'PIC' and t_file_types_visible= 1));
insert into e_files(e_files_path, e_files_name, e_files_extension, e_files_description, e_files_visible, e_files_t_file_types_id) values ('/pictures/shops/00000006.jpg','00000006','jpg','Foto Er Vino de Pino', 1, (select t_file_types_id from t_file_types where t_file_types_code = 'PIC' and t_file_types_visible= 1));
insert into e_files(e_files_path, e_files_name, e_files_extension, e_files_description, e_files_visible, e_files_t_file_types_id) values ('/pictures/shops/00000007.jpg','00000007','jpg','Foto Lo sviluppatore convinto', 1, (select t_file_types_id from t_file_types where t_file_types_code = 'PIC' and t_file_types_visible = 1));

/************************************/
/***Viene il turno delle categorie***/
/************************************/

/* insert 4: e_categories */

insert into e_categories(e_categories_code, e_categories_name, e_categories_description, e_categories_visible, e_categories_e_files_id) values ('RIST', 'Ristoranti', 'Ristoranti', 1, (select e_files_id from e_files where e_files_path = '/pictures/categories/ristoranti.jpg' and e_files_visible = 1));
insert into e_categories(e_categories_code, e_categories_name, e_categories_description, e_categories_visible, e_categories_e_files_id) values ('RETN', 'Ristoranti etnici', 'Ristoranti etnici', 1, (select e_files_id from e_files where e_files_path = '/pictures/categories/ristoranti_etnici.jpg' and e_files_visible = 1));
insert into e_categories(e_categories_code, e_categories_name, e_categories_description, e_categories_visible, e_categories_e_files_id) values ('SUSH', 'Sushi', 'Sushi', 1, (select e_files_id from e_files where e_files_path = '/pictures/categories/sushi.jpg' and e_files_visible = 1));
insert into e_categories(e_categories_code, e_categories_name, e_categories_description, e_categories_visible, e_categories_e_files_id) values ('FARM', 'Farmacie', 'Farmacie', 1, (select e_files_id from e_files where e_files_path = '/pictures/categories/farmacie.jpg' and e_files_visible = 1));
insert into e_categories(e_categories_code, e_categories_name, e_categories_description, e_categories_visible, e_categories_e_files_id) values ('PIZZ', 'Pizzerie', 'Pizzerie', 1, (select e_files_id from e_files where e_files_path = '/pictures/categories/pizzerie.jpg' and e_files_visible = 1));
insert into e_categories(e_categories_code, e_categories_name, e_categories_description, e_categories_visible, e_categories_e_files_id) values ('PANF', 'Panifici', 'Panifici', 1, (select e_files_id from e_files where e_files_path = '/pictures/categories/panifici.jpg' and e_files_visible = 1));
insert into e_categories(e_categories_code, e_categories_name, e_categories_description, e_categories_visible, e_categories_e_files_id) values ('PAST', 'Pasticcerie', 'Pasticcerie', 1, (select e_files_id from e_files where e_files_path = '/pictures/categories/pasticcerie.jpg' and e_files_visible = 1));
insert into e_categories(e_categories_code, e_categories_name, e_categories_description, e_categories_visible, e_categories_e_files_id) values ('CDET', 'Commercio al dettaglio', 'Commercio al dettaglio', 1, (select e_files_id from e_files where e_files_path = '/pictures/categories/commercio_al_dettaglio.jpg' and e_files_visible = 1));
insert into e_categories(e_categories_code, e_categories_name, e_categories_description, e_categories_visible, e_categories_e_files_id) values ('ORTF', 'Ortofrutta', 'Ortofrutta', 1, (select e_files_id from e_files where e_files_path = '/pictures/categories/ortofrutta.jpg' and e_files_visible = 1));
insert into e_categories(e_categories_code, e_categories_name, e_categories_description, e_categories_visible, e_categories_e_files_id) values ('AZVN', 'Aziende vinicole', 'Aziende vinicole', 1, (select e_files_id from e_files where e_files_path = '/pictures/categories/aziende_vinicole.jpg' and e_files_visible = 1));
insert into e_categories(e_categories_code, e_categories_name, e_categories_description, e_categories_visible, e_categories_e_files_id) values ('SPRO', 'Servizi professionali', 'Servizi professionali', 1, (select e_files_id from e_files where e_files_path = '/pictures/categories/servizi_professionali.jpg' and e_files_visible = 1));


